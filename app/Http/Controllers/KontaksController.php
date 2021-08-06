<?php

namespace App\Http\Controllers;
Use App\Models\Kontaks;
use Illuminate\Http\Request;

class KontaksController extends Controller
{
    public function index()
    {
     $kontaks = Kontaks::orderBy('id','desc')->paginate(5);
     
     return view ('kontaks.index', compact('kontaks'));
    }

    public function create()
    {
     
     return view ('kontaks.create');
    }
    
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'email' => 'required',
          'no_tlp' => 'required',
      ]);
 
         $kontaks = new Kontaks;
 
         $kontaks->email = $request->email;
         $kontaks->no_tlp = $request->no_tlp;
 
         $kontaks->save();
 
         return redirect('/kontaks');
 
    }
    public function show($id)
    {
       $kontak = Kontaks::where('id',$id)->first();
       return view('kontaks.show', ['kontak' => $kontak]);
    }
    public function edit($id)
    {
       $kontak = Kontaks::where('id',$id)->first();
       return view('kontaks.edit', ['kontak' => $kontak]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'email' => 'required',
         'no_tlp' => 'required',
        ]);
   
         Kontaks::find($id)->update([
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
         ]);
   
         return redirect ('/kontaks');
    }
    public function destroy($id)
    {
       Kontaks::find($id)->delete();
       return redirect ('/kontaks');
    }
}