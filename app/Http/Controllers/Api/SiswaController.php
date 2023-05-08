<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

use Exception;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();

        if ($data) return ApiResponse::createApi(200, 'berhasil', $data);
        else return ApiResponse::createApi(400, 'gagal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nis' => 'required|unique:siswas|digits:8',
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            Siswa::create($validated);
            return ApiResponse::createApi(200, 'berhasil', $validated);
        } catch (Exception $error) {
            return ApiResponse::createApi(400, $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Siswa::where('id', $id)->get();

        if (count($data) > 1) return ApiResponse::createApi(200, 'berhasil', $data);
        else return ApiResponse::createApi(400, 'gagal');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nis' => "required|digits:8|unique:siswas,nis,{$id}",
                'nama' => 'required',
                'alamat' => 'required',
            ]);


            Siswa::where('id', $id)->update($validated);
            return ApiResponse::createApi(200, 'berhasil', $validated);
        } catch (Exception $error) {
            return ApiResponse::createApi(400, $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Siswa::where('id', $id)->delete();
        if ($data) return ApiResponse::createApi(200, 'berhasil');
        else return ApiResponse::createApi(400, 'gagal');
    }
}
