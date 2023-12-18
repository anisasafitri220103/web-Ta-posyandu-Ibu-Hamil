<?php

namespace App\Http\Controllers;

use App\Models\kategori1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Kategori1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kategori1::all();
        return view('kategori1.index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori1.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //upload image
        $image = $request->file('icon');
        $image->storeAs('public/icon', $image->hashName());

        //create post
        kategori1::create([
            'icon'     => $image->hashName(),
            'nama_kategori1'     => $request->nama_kategori,
        
        ]);

        //redirect to index
        return redirect()->route('kategori1.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = kategori1::find($id);
        return view('kategori1.edit',[
            'data' => $data,
        ]);
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
          
        $data = kategori1::find($id);
        //upload image
        $image = $request->file('icon');

        if ($image){
                //delete old image
            Storage::delete('public/posts/'.$data->icon);
            $image->storeAs('public/icon', $image->hashName());

            //create post
            $data->update([
                'icon'     => $image->hashName(),
                'nama_kategori'     => $request->nama_kategori,
            ]);
        }else{
            $data->update([
                'nama_kategori'     => $request->nama_kategori,
            ]);
        }
       

        //redirect to index
        return redirect()->route('kategori1.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kategori1::find($id);
        Storage::delete('public/posts/'.$data->icon);
        $data->delete();
         //redirect to index
         return redirect()->route('kategori1.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}