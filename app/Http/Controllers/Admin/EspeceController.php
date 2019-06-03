<?php

namespace App\Http\Controllers\Admin;

use App\Espece;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class EspeceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especes = Espece::latest()->get();

        return view('admin.espece.index', compact('especes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.espece.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        /**
         * Validation champs
         */

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            //'body' => 'required',
            'genre' => 'required',
            'gender' => 'required',
            'classification' => 'required',
            'description' => 'required',
        ]);

        /**
         * Setp up Image
         */
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)){
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('espece')){
                Storage::disk('public')->makeDirectory('espece');
            }

            $postImage = Image::make($image)->resize(1600, 1066)->save();
            Storage::disk('public')->put('espece/'.$imageName, $postImage);
        }else{
            $imageName = "default.png";
        }

        /**
         * Creation de l'espece
         */
        $espece = new Espece();
        $espece->user_id = Auth::id();
        $espece->name   = $request->name;
        $espece->slug    = $slug;
        $espece->image   = $imageName;
        $espece->genre   = $request->genre;
        $espece->gender  = $request->gender;
        $espece->classification = $request->classification;
        $espece->description = $request->description;


        $espece->save();


        Toastr::success('Espèce créé :)', 'Success');

        return redirect()->route('admin.espece.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Espece $espece)
    {
        return view('admin.espece.show', compact('espece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Espece $espece)
    {
        return view('admin.espece.edit', compact('espece'));
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
        /**
         * Validation champs
         */

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            //'body' => 'required',
            'genre' => 'required',
            'gender' => 'required',
            'classification' => 'required',
            'description' => 'required',
        ]);

        /**
         * Setp up Image
         */
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image)){
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('espece')){
                Storage::disk('public')->makeDirectory('espece');
            }


            //Delete old post image
            if(Storage::disk('public')->exists('espece/.$espece->image')){
                Storage::disk('public')->delete('espece/'.$espece->image);
            }


            $postImage = Image::make($image)->resize(1600, 1066)->save();
            Storage::disk('public')->put('espece/'.$imageName, $postImage);
        }else{
            $imageName = "default.png";
        }

        /**
         * Madification de l'espece
         */

        $espece->user_id = Auth::id();
        $espece->name   = $request->name;
        $espece->slug    = $slug;
        $espece->image   = $imageName;
        $espece->genre   = $request->genre;
        $espece->gender  = $request->gender;
        $espece->classification = $request->classification;
        $espece->description = $request->description;


        $espece->save();


        Toastr::success('Espèce MAJ :)', 'Success');

        return redirect()->route('admin.espece.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espece $espece)
    {
        if (Storage::disk('public')->exists('espece/'.$espece->image)){
            Storage::disk('public')->delete('espece/'.$espece->image);
        }


        $espece->delete();

        Toastr::success('espece supprimé !!', 'Success');

        return redirect()->back();
    }
}
