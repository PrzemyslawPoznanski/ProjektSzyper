<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Users;



class EditGradeController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index(){
        $grades = Grades::orderBy('id','desc')->paginate(5);
        return view('grades.index',compact('grades'));
    }


    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('grades.create');
    }


        /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $request->validate([
            'grade' => ['required', 'int', 'min:1', 'max:6'],
            'comment' => ['required', 'string', 'max:255'],
        ]);

        
        Grades::create($request->post());

        return redirect()->route('grades.index')->with('success','Grade has been added successfully.');
    }

      /**
    * Display the specified resource.
    *
    * @param  \App\grade  $grade
    * @return \Illuminate\Http\Response
    */

    public function show(Grades $grade)
    {
        return view('grades.show',compact('grade'));
    }

    public function edit(Grades $grade)
    {
        return view('grades.edit',compact('grade'));
    }
        /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Grades  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Grades $grade)
    {
        $request->validate([
            'grade' => ['required', 'int', 'min:1', 'max:6'],
            'comment' => ['required', 'string', 'max:255'],
        ]);

        
        $grade->fill($request->post())->save();

        return redirect()->route('grades.index')->with('success','Grade Has Been updated successfully');
    }


        /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Grades  $company
    * @return \Illuminate\Http\Response
    */

    public function destroy(Grades $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success','Grade has been deleted successfully');
    }
}
