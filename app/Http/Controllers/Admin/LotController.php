<?php

namespace App\Http\Controllers\Admin;

use App\Espece;
use App\Lot;
use App\Site;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::latest()->get();

        return view('admin.lot.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especes = Espece::all();
        $sites = Site::all();
        return view('admin.lot.create', compact('sites', 'especes'));

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
            'libelle' => 'required|unique:lots',
            'type'    => 'required',
            'numCasier' => 'required',
            'salle'     => 'required',
          //  'quantite'  => 'required',
            'entree'    => 'required',
            'sortie'    => 'required',
        ],[
            'libelle.unique' => 'Ce libellé existe déja.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'type.required' => 'Le type est obligatoire.',
            'numCasier.required' => 'La numéro du casier est obligatoire.',
            'entree.required' => 'La QTE entrée est obligatoire.',
            'sortie.required' => 'La QTE sortie est obligatoire.',

        ]);




        /**
         * Creation de stockage
         */

        $lot = new Lot();
        $lot->user_id = Auth::id();
        $lot->libelle = $request->libelle;
        $lot->type    = $request->type;
        $lot->numCasier = $request->numCasier;
        $lot->salle = $request->salle;
        $lot->entree = $request->entree;
        $lot-> sortie = $request->sortie;
        $lot->quantite = $request->entree - $request->sortie;


        if($request->entree < $request->sortie){
            Toastr::success('La quantité entrée ne peux pas être inférieur à la quantité sortie', 'Attention');
            return redirect()->back();
        }else{
            $lot->save();

            $lot->especes()->attach($request->especes);

            $lot->sites()->attach($request->sites);




            Toastr::success('Lot créé :)', 'GESTION DE LA TAXINOMIE');

            return redirect()->route('admin.lot.index');
        }


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
    public function edit(Lot $lot)
    {
        $sites = Site::all();
        $especes = Espece::all();

        return view('admin.lot.edit', compact('lot','sites', 'especes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {

        /**
         * Validation champs
         */

        $this->validate($request, [
            'libelle' => 'required',
            'type'    => 'required',
            'numCasier' => 'required',
            'salle'     => 'required',
         //   'quantite'  => 'required',
            'entree'    => 'required',
            'sortie'    => 'required',
        ],[
           // 'libelle.unique' => 'Ce libellé existe déja.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'type.required' => 'Le type est obligatoire.',
            'numCasier.required' => 'La numéro du casier est obligatoire.',
            'entree.required' => 'La QTE entrée est obligatoire.',
            'sortie.required' => 'La QTE sortie est obligatoire.',

        ]);




        /**
         * Creation de stockage
         */
        $lot->user_id = Auth::id();
        $lot->libelle = $request->libelle;
        $lot->type    = $request->type;
        $lot->numCasier = $request->numCasier;
        $lot->salle = $request->salle;
        $lot->entree = $request->entree;
        $lot-> sortie = $request->sortie;
        $lot->quantite = $request->entree - $request->sortie;


        if($request->entree < $request->sortie){
            Toastr::success('La quantité entrée ne peux pas être inférieur à la quantité sortie', 'Attention');
            return redirect()->back();
        }else {

            $lot->save();

            $lot->especes()->sync($request->especes);

            $lot->sites()->sync($request->sites);


            Toastr::success('Lot mise à jour :)', 'GESTION DE LA TAXINOMIE');

            return redirect()->route('admin.lot.index');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot)
    {
        $lot->sites()->detach();
        $lot->especes()->detach();

        $lot->delete();

        Toastr::success('Lot supprimé', 'GESTION DE LA TAXINOMIE');

        return redirect()->back();
    }
}
