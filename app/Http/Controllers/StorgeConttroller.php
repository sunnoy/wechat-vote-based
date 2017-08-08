<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        $file = '';
        $fileSave = Storage::disk('vote')->put(date("m-d-h-i-s") . ".jpg", $file);
        if ($fileSave) {
            return "Congratulations ! image saved success ! ";
        }
    }
}
