<?php

namespace App\Http\Controllers\Admin;

use App\Alerte;
use App\Classe;
use App\Espece;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertes = Alerte::latest()->get();


        return view('admin.alerte.index', compact('alertes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especes = Espece::all();

        Toastr::success('Veuillez créer l espece si elle n est pas dans la liste déroulante.)', 'GESTION DES ALERTES');

        return view('admin.alerte.create', compact('especes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Validation champs
         */

        $this->validate($request, [
            'title' => 'required|unique:alertes',
            'body'  => 'required',
            'level' =>  'required',
            'especes' => 'required',
        ],[
            'title.unique' => 'Une alerte existe déja avec ce titre.',
            'title.required' => 'Le titre de l alerte est obligatoire.',
            'body.required' => 'La description de l alerte est obligatoire.',
            'level.required' => 'Le niveau de l alerte est obligatoire.',
            'especes.required' => 'Il faut obligatoirement ajouter une espèce à l alaerte.',

        ]);


        $alerte = new Alerte();
        $alerte->user_id = Auth::id();
        $alerte->title = ucfirst($request->title);
        //$slug = str_slug($request->title);
        $slug = Str::slug($request->title);
        $alerte->slug = $slug;
        $alerte->body = $request->body;
        $alerte->level = $request->level;

        if(isset($request->status)){
            $alerte->status =true;
        }else{
            $alerte->status = false;

        }

        $alerte->save();
        $alerte->especes()->attach($request->especes);



        Toastr::success('Alerte créée :)', 'GESTION DES ALERTES');

        return redirect()->route('admin.alerte.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alerte $alerte)
    {

        $especes = Espece::all();

        return view('admin.alerte.show',compact('alerte', 'especes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alerte $alerte)
    {
        $especes = Espece::all();

        return view('admin.alerte.edit', compact('alerte', 'especes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alerte $alerte)
    {
        /**
         * Validation champs
         */

        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'level' =>  'required',
            'especes' => 'required',
        ],[
           // 'title.unique' => 'Une alerte existe déja avec ce titre.',
            'title.required' => 'Le titre de l alerte est obligatoire.',
            'body.required' => 'La description de l alerte est obligatoire.',
            'level.required' => 'Le niveau de l alerte est obligatoire.',
            'especes.required' => 'Il faut obligatoirement ajouter une espèce à l alaerte.',

        ]);



        $alerte->user_id = Auth::id();
        $alerte->title = ucfirst($request->title);
        $slug = Str::slug($request->title);
        $alerte->body = $request->body;
        $alerte->level = $request->level;


        if(isset($request->status)){
            $alerte->status =true;
        }else{
            $alerte->status = false;

        }

        $alerte->save();
        $alerte->especes()->sync($request->especes);


        Toastr::success('Alerte mise à jour :)', 'GESTION DES ALERTES');

        return redirect()->route('admin.alerte.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alerte $alerte)
    {
        $alerte->especes()->detach();
        $alerte->delete();

        Toastr::success('Alerte supprimée !!', 'GESTION DES ALERTES');

        return redirect()->back();
    }
}
