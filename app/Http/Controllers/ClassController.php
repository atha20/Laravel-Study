<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClassCreateRequest;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        //lazy load
        // $class = Classroom::all();

        //eager load
        // $class = Classroom::get();

        $keyword = $request->keyword;
        $class = Classroom::with('homeroomTeacher')
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('homeroomTeacher', function ($query) use($keyword) {
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->paginate(10);
        return view('class', ['classList' => $class]);
    }

    public function show($id)
    {
        $class = Classroom::with(['students', 'homeroomTeacher'])
            ->findOrFail($id);
        return view('class-detail', ['class' => $class]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('class-add', ['teacher' => $teacher]);
    }

    public function store(ClassCreateRequest $request)
    {
        $class = Classroom::create($request->all());

        if($class) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Class Success !!!');
        }

        return redirect('/class');
    }

    public function edit(Request $request, $id)
    {
        $class = Classroom::with('homeroomTeacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);
        return view('class-edit', ['class' => $class, 'teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $class = Classroom::findOrFail($id);

        $class->update($request->all());
        return redirect('/class');
    }

    public function delete($id)
    {
        $class = Classroom::findOrFail($id);
        return view('class-delete', ['class' => $class]);
    }

    public function destroy($id)
    {
        $deletedClass = Classroom::findOrFail($id);
        $deletedClass->delete();

        if($deletedClass) {
            Session::flash('status', 'success');
            Session::flash('message', 'Class Deleted !!!');
        }

        return redirect('/class');
    }

    public function deletedClass()
    {
        $deletedClass = Classroom::onlyTrashed()->paginate(10);
        return view('class-deleted-list', ['class' => $deletedClass]);
    }

    public function restore($id)
    {
        $deletedClass = Classroom::withTrashed()->where('id', $id)->restore();
        
        if($deletedClass) {
            Session::flash('status', 'success');
            Session::flash('message', 'Class Restored !!!');
        }

        return redirect('/class');
    }
}
