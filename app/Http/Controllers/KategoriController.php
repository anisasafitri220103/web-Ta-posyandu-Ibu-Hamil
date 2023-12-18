<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index',[
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
        return view('kategori.create',[
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
        Kategori::create([
            'icon'     => $image->hashName(),
            'nama_kategori'     => $request->nama_kategori,
        
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        
        $data = Kategori::find($id);
        return view('kategori.edit',[
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
          
        $data = Kategori::find($id);
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
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::find($id);
        Storage::delete('public/posts/'.$data->icon);
        $data->delete();
         //redirect to index
         return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}