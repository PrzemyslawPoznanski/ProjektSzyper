<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Grade_change;


class GradeHistoryController extends Controller
{
    public function viewHistory(){

            $data = Grades::join('grade_change','grade_change.id_grade','=','grades.id')

            ->get(['grade_change.previous_grade', 'grades.comment', 'grade_change.created_at']);
    
            return view('history', compact('data'));

    }
}
