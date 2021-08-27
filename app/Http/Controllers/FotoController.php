<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class FotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $data = Foto::all();

//        if($request->category){
//            $data->where('category',$request->category);
//        }

        return view('vistasAdmin.fotos', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           'caption'=>'required|max:255',
           'category'=>'required',
           'image'=>'required|image|mimes:png,jpg,jpeg,bmp'
        ],[
           'category.required'=>'porfavor seleccione una categoria'
        ]);

        if ($request->hasFile('image')){

            $file=$request->file('image');

            $image_name=rand(1000,9999).time().'.'.$file->getClientOriginalExtension();
            $thumbPath=public_path('images/user_images/thumb');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(300,200,function($c){

            })->save($thumbPath.'/'.$image_name);

            $file->move(public_path('images/user_images'),$image_name);

        }

        Foto::create([
            'caption' => $request->caption,
            'category' => $request->category,
            'image' => $image_name
        ]);

        return redirect()->back()->with('success','Imagen subida correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Foto::findOrFail($id);

        $file_path=public_path('images/user_images/'.$image->image);
        if (\File::exists($file_path)){
            \File::delete($file_path);
        }

        $file_thumb_path=public_path('images/user_images/thumb/'.$image->image);
        if (\File::exists($file_thumb_path)){
            \File::delete($file_thumb_path);
        }

        $image->delete();

        return redirect()->back()->with('success','Imagen eliminada correctamente.');

    }
}
