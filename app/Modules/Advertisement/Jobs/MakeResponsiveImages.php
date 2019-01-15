<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.01.19
 *
 */

namespace App\Modules\Advertisement\Jobs;

use App\Helpers\CustomUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MakeResponsiveImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var float
     */
    private $ratio;

    /**
     * makeResponsiveImages constructor.
     * @param string $imageName
     * @param float $ratio
     */
    public function __construct(string $imageName, float $ratio)
    {
        $this->imageName = $imageName;
        $this->ratio = $ratio;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $imagePath = CustomUrl::getFull(Storage::url($this->imageName));
        Log::alert($imagePath);
        $image = Image::make($imagePath);
        $image = $image->fit($image->height(), $image->height() / $this->ratio, function ($constraint) {
            $constraint->upsize();
        });
        $fileName = $this->imageName . '_' . $this->ratio;
        Storage::put($fileName, $image);
    }
}