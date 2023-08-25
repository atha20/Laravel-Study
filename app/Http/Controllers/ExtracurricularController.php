<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ExtracurricularCreateRequest;

class ExtracurricularController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $ekskul = Extracurricular::where('name', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
        return view('extracurricular', ['ekskulList' => $ekskul]);
    }
    
    public function show($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-detail', ['ekskul' => $ekskul]);
    }

    public function create()
    {
        $ekskul = Extracurricular::select('id', 'name')->get();
        return view('extracurricular-add', ['ekskul' => $ekskul]);
    }

    public function store(ExtracurricularCreateRequest $request)
    {
        $ekskul = Extracurricular::create($request->all());

        if($ekskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add Extracurricular Success !!!');
        }

        return redirect('/extracurricular');
    }

    public function edit(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-edit', ['ekskul' => $ekskul]);
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);

        $ekskul->update($request->all());
        return redirect('/extracurricular');
    }

    public function delete($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-delete', ['ekskul' => $ekskul]);
    }

    public function destroy($id)
    {
        $deletedEkskul = Extracurricular::findOrFail($id);
        $deletedEkskul->delete();

        if($deletedEkskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'Extracurricular Deleted !!!');
        }

        return redirect('/extracurricular');
    }

    public function deletedEkskul()
    {
        $deletedEkskul = Extracurricular::onlyTrashed()->paginate(10);
        return view('extracurricular-deleted-list', ['ekskul' => $deletedEkskul]);
    }

    public function restore($id)
    {
        $deletedEkskul = Extracurricular::withTrashed()->where('id', $id)->restore();
        
        if($deletedEkskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'Extracurricular Restored !!!');
        }

        return redirect('/extracurricular');
    }
}
