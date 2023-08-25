<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $student = Student::with('class')
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('gender', $keyword)
                        ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('class', function ($query) use($keyword) {
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->paginate(20);
        return view('student', ['studentList' => $student]);
        
        // query builder
        // $student = DB::table('students')->get();
        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis' => '0201021',
        //     'class_id' => 1
        // ]);

        // DB::table('students')->where('id', 26)->update([
        //     'name' => 'query builder 2',
        //     'class_id' => 3
        // ]);

        // DB::table('students')->where('id', 26)->delete();
        
        // eloquent
        // $student = Student::all();
        // Student::create([
        //     'name' => 'eloquent',
        //     'gender' => 'P',
        //     'nis' => '0201033',
        //     'class_id' => 2
        // ]);

        // Student::find(27)->update([
        //     'name' => 'eloquent 2',
        //     'class_id' => 1
        // ]);

        // Student::find(27)->delete();
        
        // dd($student);
    }

    public function show($slug)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
            // ->findOrFail($id);
            ->where('slug', $slug)->firstOrFail();
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = Classroom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        
        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:8|required',
        //     'name' => 'max:50|required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);

        // $student = new Student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $newName = '';
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        // $request['slug'] = Str::slug($request->name, '-'); //Gaperlu, overwrite Sluggable
        $student = Student::create($request->all());

        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Student Success !!!');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = Classroom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $newName = '';
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        // $deletedStudent = DB::table('students')->where('id', $id)-> delete();

        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Student Deleted !!!');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->paginate(10);
        return view('student-deleted-list', ['student' => $deletedStudent]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();
        
        if($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Student Restored !!!');
        }

        return redirect('/students');
    }

    // public function massUpdate()
    // {
    //     $student = Student::all();
    //     collect($student)->map(function($item) {
    //         $item->slug = Str::slug($item->name);
    //         $item->save();
    //     });
    // }
}
