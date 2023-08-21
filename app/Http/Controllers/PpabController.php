<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\ppab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PpabController extends Controller
{
    public function index()
    {
        $ppab = ppab::all();
        return new ResponseResource(200, 'OK', 'Data Berhasil ditampilkan', $ppab);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glsap_id' => 'required',
            'jenis_pekerjaan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $ppab = ppab::create([
                'glsap_id' => $request->glsap_id,
                'jenis_pekerjaan' => $request->jenis_pekerjaan
            ]);
            return new ResponseResource(200, 'OK', 'Data berhasil ditambahkan', $ppab);
        }
    }

    public function show(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
