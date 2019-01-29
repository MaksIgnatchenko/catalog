<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\Observers;

use App\Modules\Files\Models\File;
use App\Modules\Messages\Models\Message;
use Illuminate\Support\Facades\Storage;

class MessageObserver
{
    /**
     * Created message listener.
     *
     * @param Message $message
     */
    public function created(Message $message) : void
    {
        if ($message->file) {
            $fileName = 'files/' . $message->file->hashName();
            Storage::put($fileName, file_get_contents($message->file));
            $file = app()[File::class];
            $file->name = $fileName;
            $message->files()->save($file);
        }
    }

    /**
     * @param Message $message
     */
    public function deleting(Message $message) : void
    {
        foreach ($message->files as $file) {
            Storage::delete($file->name);
        }
        $message->files()->delete();
    }
}