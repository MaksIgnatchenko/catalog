<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.01.2019
 *
 */

namespace App\Modules\StaticContent\Observers;

use App\Modules\StaticContent\Enums\StaticContentStatusEnum;
use App\Modules\StaticContent\Models\StaticContent;

class StaticContentObserver
{
    /**
     * @param StaticContent $content
     */
    public function updating(StaticContent $content) : void
    {
        $changedAttributes = $content->getDirty();
        $status = $changedAttributes['status'] ?? null;
        if ($status === StaticContentStatusEnum::ACTIVE) {
            $this->setActiveStatus($content);
        }
    }

    /**
     * @param StaticContent $content
     */
    public function creating(StaticContent $content) : void
    {
        $status = $changedAttributes['status'] ?? null;
        if ($status === StaticContentStatusEnum::ACTIVE) {
            $this->setActiveStatus($content);
        }
    }

    private function setActiveStatus(StaticContent $content)
    {
        StaticContent::where('content_type', $content->content_type)
            ->update(['status' => StaticContentStatusEnum::BLOCK]);
    }
}