<?php

namespace App\Models;

use Storage;
use Image as ImageIntervention;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'original_name',
        'storage_name',
        'views',
    ];

    // helper

    public function attachImage($file, $filename)
    {
        // store image
        Storage::disk('images')->putFileAs('', $file, $filename);

        // make thumbnail
        $thumbnail = ImageIntervention::make($file);
        $thumbnail->fit(275, 275, function($constraint) {
            $constraint->upsize();
        });

        // store
        Storage::disk('thumbnails')->put('thumb_'. $filename, (string) $thumbnail->encode());
    }

    public function increaseView()
    {
        // incrase the view count
        $this->views += 1;
        $this->save();
    }

    public function imagePath()
    {
        return Storage::disk('images')->url($this->storage_name);
    }

    public function thumbnailPath()
    {
        return Storage::disk('thumbnails')->url('thumb_'. $this->storage_name);
    }
}
