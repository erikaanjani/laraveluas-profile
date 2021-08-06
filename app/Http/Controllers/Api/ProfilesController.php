<?php

namespace App\Http\Controllers\Api;

use App\Models\Profiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profiles::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Profile',
            'data' => $profiles,
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
            'nama' => 'required|unique:profiles|max:255',
            'ttl' => 'required',
            'alamat' => 'required',
            'jenis' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required',
            
        ]);

        $p = profiles::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'jenis' => $request->jenis,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);

        if($profiles)
        {
            return response()->json([
                'success' => true,
                'message' => 'Trans Berhasil Ditambahkan',
                'data' => $profiles
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Trans Gagal Ditambahkan',
                'data' => $profiles
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
          $profile = profiles::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail data profile',
            'data' => $profile
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
        $profiles = profiles::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->tgl,
            'alamat' => $request->jenis,
            'jenis' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Trans berhasil di rubah',
            'data' => $profile
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
        $profile = Profiles::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Profile Berhasil di hapus',
            'data'    => $profile
        ], 200);
    }
}
