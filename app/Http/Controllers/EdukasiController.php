<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Edukasi::all();
        return view('edukasi.index',[
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
          $data = Edukasi::all();
          return view('edukasi.create',[
            'edukasi'=> $data,
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

        //create post
         $this->validate($request, [
            'nama_edukasi' => 'required|min:5',
            'id_kategori' => 'required|min:5',
            'dekripsi' => 'required|min:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
          $image = $request->file('gambar');
          $imagePath = $image->storeAs('public/',
          $image->hashName());
           // Create sekolah
        Edukasi::create([
            'nama_edukasi' => $request->nama_edukasi,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $image -> hashName(),
        ]);
        // Redirect to index
        return redirect()->route('edukasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Implement as needed
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data = Edukasi::find($id);
        return view('edukasi.edit',[
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
          $this->validate($request, [
           'nama_edukasi' => 'required|min:5',
            'id_kategori' => 'required|min:5',
            'dekripsi' => 'required|min:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
          $data = Edukasi::find($id);
        $image = $request->file('gambar');
        if($image){
            $image->storeAs('public/', $image->hashName());
            Storage::delete('public/'.$data->file);
              $data->update([
                'nama_edukasi' => $request->nama_edukasi,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $image -> hashName(),
            ]);
               }else{
            $data->update([
                'nama_edukasi' => 'required|min:5',
            'id_kategori' => 'required|min:5',
            'dekripsi' => 'required|min:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
        }
       

        //redirect to index
        return redirect()->route('edukasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data = Edukasi::find($id);

        if ($data === null) {
            return Redirect::route('edukasi.index')->with('error', 'Record not found');
        }
    
        $data->delete();
    
        return redirect()->route('edukasi.index')->with('success', 'Berhasil Dihapus');
    }
}