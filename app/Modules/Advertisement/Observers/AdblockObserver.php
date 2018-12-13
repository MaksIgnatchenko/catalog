<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Observers;

use App\Modules\Advertisement\Models\Adblock;
use Illuminate\Support\Facades\Storage;

class AdblockObserver
{
    public function deleting(Adblock $adblock)
    {
        if ($image = $adblock->image) {
            $fileName = config('image.ads_image_path') . '/' . basename($image);
            Storage::delete($fileName);
        }
    }
}
