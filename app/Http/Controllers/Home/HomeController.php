<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $imagesToday = Image::where('created_at', '>=', Carbon::today())->orderBy('id', 'desc')->get();
        $imagesOlder = Image::where('created_at', '<', Carbon::today())->take(16)->get();

        return view('home', compact('imagesToday', 'imagesOlder'));
    }

}
