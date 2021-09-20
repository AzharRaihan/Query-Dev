<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function createForm(){
        return view('image-upload');
    }

    public function fileUpload(Request $req){
        $req->validate([
          'filenames' => 'required',
          'filenames.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if($req->hasfile('filenames')) {
            foreach($req->file('filenames') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'uploads/', $name);
                $imgData[] = $name;
            }

            $fileModal = new File();
            $fileModal->filenames = json_encode($imgData);


            $fileModal->save();

           return back();
        }
    }
}
