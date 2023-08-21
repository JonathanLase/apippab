<?php

namespace App\Http\Controllers;

use App\Models\Glsap;
use Illuminate\Http\Request;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Facades\Validator;

class GlsapController extends Controller
{
    public function index()
    {
        $glsap = Glsap::all();
        return new ResponseResource(200, 'OK', 'Data berhasil ditampilkan', $glsap);
    }

    public function selectGlsap(Request $request)
    {
        $glsap = $request->input('glsap');

        if (!$glsap) {
            return response()->json(['error' => 'Missing required parameter'], 400);
        }

        $dataGlsap = Glsap::where('glsap', $glsap)->first();

        if (!$dataGlsap) {
            return response()->json(['error' => 'Glsap not found!'], 404);
        }

        $response = [
            'id' => $dataGlsap->id,
            'glsap' => $dataGlsap->glsap,
            'costcenter' => $dataGlsap->costcenter,
            'namarekening' => $dataGlsap->namarekening
        ];

        return new ResponseResource(200, 'OK', 'Data berhasil ditampilkan', $response);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'glsap' => 'required|unique:glsap,glsap',
            'costcenter' => 'required',
            'namarekening' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $glsap = Glsap::create([
                'glsap' => $request->glsap,
                'costcenter' => $request->costcenter,
                'namarekening' => $request->namarekening
            ]);
            return new ResponseResource(200, 'OK', 'Data berhasil ditambahkan', $glsap);
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
