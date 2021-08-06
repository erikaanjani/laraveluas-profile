<?php

namespace App\Http\Controllers;
Use App\Models\Pendidikans;
use Illuminate\Http\Request;

class PendidikansController extends Controller
{
    public function index()
    {
     $pendidikans = Pendidikans::orderBy('id','desc')->paginate(5);
     
     return view ('pendidikans.index', compact('pendidikans'));
    }

    public function create()
    {
     
     return view ('pendidikans.create');
    }
    
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama' => 'required',
          'tahun' => 'required',
      ]);
 
         $pendidikans = new Pendidikans;
 
         $pendidikans->nama = $request->nama;
         $pendidikans->tahun = $request->tahun;
 
         $pendidikans->save();
 
         return redirect('/pendidikans');
 
    }
    public function show($id)
    {
       $p = Pendidikans::where('id',$id)->first();
       return view('pendidikans.show', ['p' => $p]);
    }
    public function edit($id)
    {
       $p = Pendidikans::where('id',$id)->first();
       return view('pendidikans.edit', ['p' => $p]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'nama' => 'required',
         'tahun' => 'required',
        ]);
   
         Pendidikans::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
         ]);
   
         return redirect ('/pendidikans');
    }
    public function destroy($id)
    {
       Pendidikans::find($id)->delete();
       return redirect ('/pendidikans');
    }
}