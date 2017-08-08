<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorgeConttroller extends Controller
{
    public function SaveFile()
    {
        $file = Storage::disk('vote')->put("te.txt", "hah");
        if ($file) {
            echo "ok";
        }
    }
}
