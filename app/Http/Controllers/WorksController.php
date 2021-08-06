<?php

namespace App\Http\Controllers;
Use App\Models\Works;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
     $works = Works::orderBy('id','desc')->paginate(5);
     
     return view ('works.index', compact('works'));
    }

    public function create()
    {
     
     return view ('works.create');
    }
    
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama' => 'required',
          'tahun' => 'required',
      ]);
 
         $works = new Works;
 
         $works->nama = $request->nama;
         $works->tahun = $request->tahun;
 
         $works->save();
 
         return redirect('/works');
 
    }
    public function show($id)
    {
       $work = Works::where('id',$id)->first();
       return view('works.show', ['work' => $work]);
    }
    public function edit($id)
    {
       $work = Works::where('id',$id)->first();
       return view('works.edit', ['work' => $work]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'nama' => 'required',
         'tahun' => 'required',
        ]);
   
         Works::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
         ]);
   
         return redirect ('/works');
    }
    public function destroy($id)
    {
       Works::find($id)->delete();
       return redirect ('/works');
    }
}
