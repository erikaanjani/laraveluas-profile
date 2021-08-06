<?php

namespace App\Http\Controllers\Api;

use App\Models\Kontaks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontaksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontaks = Kontaks::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data',
            'data' => $kontaks,
        ], 200);
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
            'email' => 'required|unique:data|max:255',
            'no_tlp' => 'required|numeric',
            
        ]);

        $Kontaks = Kontaks::create([
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
        ]);

        if($kontaks)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $kontaks
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $kontaks
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $kontak = Kontaks::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail kontaks Group',
            'data' => $kontak
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kontaks = Kontaks::find($id)->update([
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di rubah',
            'data' => $kontak
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = kontaks::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di hapus',
            'data'    => $kontak
        ], 200);
    }
}
