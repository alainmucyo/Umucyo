<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Level;
use App\Room;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', TeacherMiddleware::class]);
    }

    public function index()
    {
        $levels = Level::get()->sortBy('name');

        return view('students.students', compact('levels'));
    }

    public function selected($id)
    {
        $level = Level::find($id);
        $classes = $level->rooms;

        return view('ajax.lists', compact('classes'));
    }

    public function table($id)
    {
        $class = Room::find($id);
        $level = $class->level;
        $students = $class->students->sortBy('fname');
        $i = 1;

        return view('ajax.table', compact('level', 'students', 'class', 'i'));
    }

    public function student($id)
    {
        $student = Student::find($id);
        return view('students.student', compact('student'));
    }

    public function search($search)
    {
        $results = Student::where('fname', 'LIKE', '%' . $search . '%')->get()->sortBy('fname');

        return view('ajax.result', compact('results', 'search'));
    }

    public function delete($id)
    {
        $del = Student::find($id)->delete();
        if ($del) {
            session()->flash('success', 'Student Deleted Successfully');
            return redirect('/students');
        } else {
            return back()->withErrors('error', 'Unable To Delete Student');
        }
    }

    public function update($id)
    {
        $student = Student::find($id);
        return view('students.update', compact('student'));
    }

    public function updateStore($id)
    {
        $this->validate(\request(), [
            'fname' => 'required',
            'mother' => 'required',
            'father' => 'required',
            'address' => 'required'
        ]);
        $update = Student::find($id)->update([
            'fname' => \request('fname'),
            'mother' => \request('mother'),
            'father' => \request('father'),
            'address' => \request('address')
        ]);
        if ($update) {
            session()->flash('success', 'Student Updated Successfully');
            return back();
        } else {
            return back()->withErrors('error', 'Unable To Update');
        }
    }
}
