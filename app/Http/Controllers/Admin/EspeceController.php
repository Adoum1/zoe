<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Embranchement;
use App\Espece;
use App\Famille;
use App\Genre;
use App\Ordre;
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
        $classes = Classe::all();
        $embranchements = Embranchement::all();
        $familles = Famille::all();
        $genres = Genre::all();
        $ordres = Ordre::all();

      /*  if($classes->count() == 0 || $genres->count() == 0){
            Toastr::info('Vous devez ajouter une classe avant pour rattacher une espéce', 'Gestion de la Taximonie du vivant', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }*/

        if($embranchements->count() == 0 ){
            Toastr::info('Vous devez ajouter un Embranchement avant pour rattacher une espéce', 'GESTION DE LA TAXIMONIE DU VIVANT', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        if($classes->count() == 0 ){
            Toastr::info('Vous devez ajouter une Classe avant pour rattacher une espéce', 'Gestion de la Taximonie du vivant', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }


        if($familles->count() == 0 ){
            Toastr::info('Vous devez ajouter une Famille avant pour rattacher une espéce', 'Gestion de la Taximonie du vivant', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        if($genres->count() == 0 ){
            Toastr::info('Vous devez ajouter un Genre avant pour rattacher une espéce', 'Gestion de la Taximonie du vivant', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        if($ordres->count() == 0 ){
            Toastr::info('Vous devez ajouter un Ordre avant pour rattacher une espéce', 'Gestion de la Taximonie du vivant', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }


        return view('admin.espece.create', compact('classes', 'familles', 'embranchements', 'genres', 'ordres'));
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
            'name' => 'required|unique:especes',
          //  'image' => 'required',
            'classes' => 'required',
            'embranchements' => 'required',
            'familles' => 'required',
            'genres' => 'required',
            'ordres' => 'required',
            'description' => 'required',
        ],[
           'name.unique' => 'Cette espèce existe déja.',
           'name.required' => 'Le nom de l espèce est obligatoire.',
           'embranchements.required' => 'L embranchement est obligatoire.',
           'familles.required' => 'La famille est obligatoire.',
           'genres.required' => 'Le genres est obligatoire.',
           'ordres.required' => 'L ordre est obligatoire.',
           'description.required' => 'La description est obligatoire.',
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

            $especeImage = Image::make($image)->resize(1600, 1066)->save();
            Storage::disk('public')->put('espece/'.$imageName, $especeImage);
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
        $espece->regne   = $request->regne;
        $espece->description = $request->description;

       /* if (isset($request->status)){
            $espece->status = true;
        }else{
            $espece->status = false;
        }**/


        $espece->save();
        $espece->embranchements()->attach($request->embranchements);
        $espece->classes()->attach($request->classes);
        $espece->ordres()->attach($request->ordres);
        $espece->familles()->attach($request->familles);
        $espece->genres()->attach($request->genres);


        Toastr::success('Espèce créée :)', 'GESTION DE LA TAXINOMIE');

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
        $classes = Classe::all();
        $embranchements = Embranchement::all();
        $familles = Famille::all();
        $genres = Genre::all();
        $ordres = Ordre::all();

        return view('admin.espece.edit', compact('espece', 'classes', 'embranchements', 'familles', 'ordres', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espece $espece)
    {
        /**
         * Validation champs
         */

        $this->validate($request, [
            'name' => 'required',
            //  'image' => 'required',
            'classes' => 'required',
            'embranchements' => 'required',
            'familles' => 'required',
            'genres' => 'required',
            'ordres' => 'required',
            'description' => 'required',
        ],[
           // 'name.unique' => 'Cette espèce existe déja.',
            'name.required' => 'Le nom de l espèce est obligatoire.',
            'embranchements.required' => 'L embranchement est obligatoire.',
            'familles.required' => 'La famille est obligatoire.',
            'genres.required' => 'Le genres est obligatoire.',
            'ordres.required' => 'L ordre est obligatoire.',
            'description.required' => 'La description est obligatoire.',
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


            //Delete old espece image
            if(Storage::disk('public')->exists('espece/.$espece->image')){
                Storage::disk('public')->delete('espece/'.$espece->image);
            }


            $especeImage = Image::make($image)->resize(1600, 1066)->save();
            Storage::disk('public')->put('espece/'.$imageName, $especeImage);
        }else{
            $imageName = $espece->image;
        }

        /**
         * Madification de l'espece
         */

        $espece->user_id = Auth::id();
        $espece->name   = $request->name;
        $espece->slug    = $slug;
        $espece->image   = $imageName;
        $espece->regne   = $request->regne;
        $espece->description = $request->description;

        /**if (isset($request->status)){
            $espece->status = true;
        }else{
            $espece->status = false;
        }*/

        $espece->save();
        $espece->embranchements()->sync($request->embranchements);
        $espece->classes()->sync($request->classes);
        $espece->ordres()->sync($request->ordres);
        $espece->familles()->sync($request->familles);
        $espece->genres()->sync($request->genres);


        Toastr::success('Espèce mise à jour :)', 'GESTION DE LA TAXINOMIE');

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

        $espece->embranchements()->detach();
        $espece->classes()->detach();
        $espece->ordres()->detach();
        $espece->familles()->detach();
        $espece->genres()->detach();
        $espece->delete();

        Toastr::success('espece supprimée !!', 'GESTION DE LA TAXINOMIE');

        return redirect()->back();
    }
}
