<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;


class AddGradeController extends Controller
{
    public function addGrade(Request $request){

        $grade = new Grades;
        $grade ->id_subject=$request->id_subject;
        $grade ->id_user=$request->id_user;
        //$grade ->email=$request->email;
        $grade ->grade=$request->grade;
        $grade ->comment=$request->comment;
        $grade ->save();
        return redirect('/');
    }
}
