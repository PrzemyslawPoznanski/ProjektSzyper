<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class ViewGradesController extends Controller
{

    public function joinTables(){
        if($user = Auth::user()->role == 'student')
        {
            $data = Users::join('grades','grades.id_user','=','users.id')
            ->where('users.id', '=', $user = Auth::user()->id)
            ->get(['users.id', 'users.name', 'grades.grade_value', 'grades.comment', 'grades.created_at']);
    
            return view('view_grades', compact('data'));
        }
        else
        {
            $data = Users::join('grades','grades.id_user','=','users.id')
            ->get(['users.id', 'users.name', 'grades.grade_value', 'grades.comment', 'grades.created_at']);
    
            return view('view_grades', compact('data'));
        }
    }

    public function editGrade($id){
        
        $data = Grades::find($id);
        return view('edit_grades',['data'=>$data]);
    }
    public function update(Request $request){

        $data=Grades::find($request->id);
        //$data->name=$request->name;
        $data->grade_value=$request->grade_value;
        $data->comment=$request->comment;
        $data->save();
        return redirect('/');

    }



}
