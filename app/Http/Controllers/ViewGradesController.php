<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Users;

class ViewGradesController extends Controller
{

    public function joinTables(){
        $data = Users::join('grades','grades.id_user','=','users.id')
        ->get(['users.name', 'grades.grade_value', 'grades.comment', 'grades.created_at']);
        return view('view_grades', compact('data'));
    }

}
