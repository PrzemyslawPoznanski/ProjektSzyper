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
            'grade' => 'required',
            'comment' => 'required',
        ]);
        


        
    //dodać sprawdzanie czy wszystko pełne
        $grade = new Grades;
        $grade ->id_subject=$request->id_subject=='1';
        $grade ->id_user=$request->row;
        $grade ->grade=$request->grade;
        $grade ->comment=$request->comment;


        $grade ->save();
        return redirect('/');
    }
}
