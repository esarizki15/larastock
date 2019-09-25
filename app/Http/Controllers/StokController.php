<?php

namespace App\Http\Controllers;

use App\Stok;
use App\Barang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $barang = Barang::findOrFail($id);
        
        return view('stok.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $barang = Barang::findOrFail($id);
        return view('stok.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::find($request->barang_id);
        $this->validate($request,[
            'barang_id' => 'required|exists:barangs,id',
            'qty'=>'required',
            'keterangan' => 'required',
        ]);
        // $sisa = $request->sisa + $request->qty;
        // dd($sisa);

        $stok = Stok::create([
            'barang_id'=>$request->barang_id,
            'qty'=>$request->qty,
            'sisa'=> $request->sisa + $request->qty,
            'keterangan'=>$request->keterangan,
        ]);
        alert()->success("Berhasil menyimpan data stok $barang->nama", 'Sukses!');
        return redirect()->route('stok.index', $barang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        //
    }
}