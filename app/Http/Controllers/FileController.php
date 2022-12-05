<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $req){

        $file = $req->file('file');

        $filename = $file->getClientOriginalName();
        echo $fileName;
        return $file->storeAs('', $fileName);
    }
}
