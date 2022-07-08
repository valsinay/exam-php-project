<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $students= Student::paginate(5);
        return view('students.index', compact('students'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $request->validate([
            'studname'=>'required',
            'course'=>'required',
            'fee'=>'required',
        ]);
        $student = new Student;
        $student->studname =$request->input('studname');
        $student->course =$request->input('course');
        $student->fee =$request->input('fee');
        $student->user_id=auth()->user()->id;
        if($request->hasfile('profile_picture')){
            $file=$request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $student->profile_picture= $filename;
        }
        $student->save();
        return redirect()->route('students.index')
        ->with('success', 'Students created successfully!');
    }

    public function show(Student $student){
        return view('students.show', compact('student'));
    }

    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student){
        $request -> validate([
            'studname'=>'required',
            'course'=>'required',
            'fee'=>'required',
        ]);

        $student->studname =$request->input('studname');
        $student->course =$request->input('course');
        $student->fee =$request->input('fee');


        if($request->hasfile('profile_picture')){
            $destination = 'uploads/students/'.$student->profile_picture;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $student->profile_picture= $filename;
        }
        $student->update();
        return redirect()->route('students.index')
        ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student){
        $student->delete();

        return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');
    }

}
