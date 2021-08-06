<?php

namespace App\Http\Controllers\Api;

use App\Models\Pengalamans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengalamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalamans = Pengalamans::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data',
            'data' => $pengalamans,
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

        $pengalaman = Pengalamans::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);

        if($pengalamans)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $pengalamans
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $pengalamans
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
          $pengalaman = Pengalamans::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail pengalamans Group',
            'data' => $pengalaman
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
        $pengalamans = Pengalamans::find($id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di rubah',
            'data' => $pengalaman
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
        $pengalaman = Pengalamans::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di hapus',
            'data'    => $pengalaman
        ], 200);
    }
}
