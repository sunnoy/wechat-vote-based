<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        $file = Storage::disk('vote')->put("h.jpg", "dong");
        if ($file) {
            return "Congratulations ! image saved success ! ";
        }
    }
}
