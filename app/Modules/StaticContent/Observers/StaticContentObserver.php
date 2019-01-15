<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.01.2019
 *
 */

namespace App\Modules\StaticContent\Observers;

use App\Modules\StaticContent\Enums\StaticContentStatusEnum;
use App\Modules\StaticContent\Exceptions\ActiveContentException;
use App\Modules\StaticContent\Models\StaticContent;

class StaticContentObserver
{
    /**
     * @param StaticContent $content
     * @throws ActiveContentException
     */
    public function updating(StaticContent $content) : void
    {
        $this->handleStatus($content);
    }

    /**
     * @param StaticContent $content
     * @throws ActiveContentException
     */
    public function creating(StaticContent $content) : void
    {
        $this->handleStatus($content);
    }

    /**
     * @param StaticContent $content
     * @throws ActiveContentException
     */
    public function handleStatus(StaticContent $content) : void
    {
        $status = $content->getDirty()['status'] ?? null;
        if ($status) {
            switch ($status) {
                case StaticContentStatusEnum::ACTIVE :
                    StaticContent::where('content_type', $content->content_type)
                        ->update(['status' => StaticContentStatusEnum::BLOCK]);
                    break;
                case StaticContentStatusEnum::BLOCK :
                    $this->checkActiveContent($content);
                    StaticContent::where('content_type', $content->content_type)
                        ->update(['status' => StaticContentStatusEnum::BLOCK]);
            }
            $content->status = $status;
        }
    }

    /**
     * @param StaticContent $content
     * @throws ActiveContentException
     */
    public function deleting(StaticContent $content) : void
    {
        if (StaticContentStatusEnum::ACTIVE === $content->status) {
            throw new ActiveContentException('Active content cannot be deleted');
        }
    }

    /**
     * @param StaticContent $content
     * @throws ActiveContentException
     */
    private function checkActiveContent(StaticContent $content) : void
    {
        $activeContentCount = StaticContent::active()
            ->where('content_type', $content->content_type)
            ->whereNotIn('id', [$content->id])
            ->count();
        if ($activeContentCount < 1) {
            throw new ActiveContentException('It is necessary to activate other content to replace the current one');
        }
    }
}