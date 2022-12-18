<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Grades;
use App\Models\Users;



class AddGradeController extends Controller
{

    public function index()
    {
        $data = Users::all();
        return view('add_grades',['data'=>$data]);
    }

    public function addGrade(Request $request){

        $request->validate([
            'grade' => ['required', 'int', 'min:1', 'max:6'],
            'comment' => ['required', 'string', 'max:255'],
        ]);


        $grade = new Grades;
        $grade ->subject=$request->subjectName;
        $grade ->id_user=$request->row;
        $grade ->grade_value=$request->grade;
        $grade ->comment=$request->comment;

        $grade ->save();
        return redirect('/');
    }
}
