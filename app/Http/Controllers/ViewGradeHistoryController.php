<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Grade_change;
use Illuminate\Support\Facades\Auth;

class ViewGradeHistoryController extends Controller
{
    public function joinHistory(){

        if($user = Auth::user()->role == 'student')
        {
        $data = Grade_change::join('grades','grades.id','=','grade_change.id_grade')
        ->join('users','users.id','=','grades.id_user')
        ->get(['grades.grade_value','grade_change.previous_grade', 'grades.comment', 'grade_change.history_created_at', 'grades.created_at'])
        -where('users.id','=', $user = Auth::user()->id);
        return view('grade_history', compact('previous_grade','data'));


        }
        else
        {
            $data = Grade_change::join('grades','grades.id','=','grade_change.id_grade')
            ->join('users','users.id','=','grades.id_user')
            ->get(['grades.grade_value','grade_change.previous_grade', 'grades.comment', 'grade_change.history_created_at', 'grades.created_at']);
            return view('grade_history', compact('data'));
        }
    }

}
