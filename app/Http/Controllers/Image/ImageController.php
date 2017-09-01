<?php

namespace App\Http\Controllers\Image;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function view(Image $image)
    {
        // increase the view count
        $image->increaseView();

        // show the image
        return view('image.view', compact('image'));
    }

}
