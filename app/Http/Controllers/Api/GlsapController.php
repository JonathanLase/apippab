<?php

namespace App\Http\Controllers;

use App\Models\Glsap;
use Illuminate\Http\Request;
use App\Http\Resources\GlsapResource;
use Illuminate\Support\Facades\Validator;

class GlsapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glsap = Glsap::all();
        // return response()->json(['data' => $model]);
        return new GlsapResource(200, 'OK', 'Data berhasil ditampilkan', $glsap);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
            return new GlsapResource(200, 'OK', 'Data berhasil ditambahkan', $glsap);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
