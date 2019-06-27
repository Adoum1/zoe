<?php

namespace App\Http\Controllers\Admin;

use App\Salarie;
use App\Site;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salaries = Salarie::all();
        return view('admin.salarie.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sites = Site::all();

        return view('admin.salarie.create',compact('sites'));

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
           'nom' => 'required',
           'prenom' => 'required',
           'poste'  => 'required',
          'sexe'    => 'required'
          // 'adresse' => 'required',
        ]);

        /**
         * Creation de stockage
         */

        $salarie = new Salarie();
        $salarie->user_id = Auth::id();
        $salarie->nom = $request->nom;
        $salarie->prenom = $request->prenom;
        $salarie->sexe = $request->sexe;
        $salarie->poste = $request->poste;
        $salarie->adresse = $request->adresse;

        $salarie->save();

        $salarie->sites()->attach($request->sites);

        Toastr::success('Salarié ajouté.', 'CREATION SALARIE');

        return redirect()->route('admin.salarie.index');

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
    public function edit(Salarie $salarie)
    {
        $sites = Site::all();

        return view('admin.salarie.edit', compact('salarie','sites'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarie $salarie)
    {
        /**
         * Validation champs
         */



        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'poste'  => 'required',
            //'sexe'   => 'sexe',
            // 'adresse' => 'required',
        ]);

        /**
         * Modification
         */

        $salarie->user_id = Auth::id();
        $salarie->nom = $request->nom;
        $salarie->prenom = $request->prenom;
        $salarie->sexe = $request->sexe;
        $salarie->poste = $request->poste;
        $salarie->adresse = $request->adresse;

        $salarie->save();
        $salarie->sites()->sync($request->sites);

        Toastr::success('Salarié mise à jour.', 'MAJ SALARIE');

        return redirect()->route('admin.salarie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {

        $salarie->sites()->detach();
        $salarie->delete();


        Toastr::success('Salarié supprimé', 'Suppresion');

        return redirect()->back();
    }
}
