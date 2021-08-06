<?php

namespace App\Http\Controllers\Api;

use App\Models\Pendidikans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikans = Pendidikans::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data',
            'data' => $pendidikans,
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
            'nama' => 'required|unique:data|max:255',
            'tahun' => 'required|numeric',
            
        ]);

        $p = Pendidikans::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);

        if($pendidikans)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $pendidikans
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $pendidikans
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
          $p = Pendidikans::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Pendidikans Group',
            'data' => $p
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
        $pendidikans = Pendidikans::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di rubah',
            'data' => $p
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
        $p = Pendidikans::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di hapus',
            'data'    => $p
        ], 200);
    }
}
