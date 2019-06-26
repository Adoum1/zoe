<?php

namespace App\Http\Controllers\Admin;

use App\Conditions;
use App\Site;
use App\Stockage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StockageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockages = Stockage::latest()->get();
        return view('admin.stockage.index', compact('stockages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sites = Site::all();
        $conditions = Conditions::all();
        return view('admin.stockage.create', compact('sites', 'conditions'));

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
           'name' => 'required',
            'description' => 'required',
            //'status' => 'required',
           // 'condition' => 'required',
        ]);


        /**
         * Creation de stockage
         */
        $stockage = new Stockage();
       // $stockage->user_id = Auth::id();
        $stockage->name = $request->name;
        $stockage->description = $request->description;
        $stockage->status = $request->status;
        $stockage->condition = $request->condition;


        if (isset($request->status)){
             $stockage->status = true;
         }else{
             $stockage->status = false;
         }

        $stockage->save();
        $stockage->sites()->attach($request->sites);
        $stockage->conditions()->attach($request->conditions);



        Toastr::success('Structure de stockage créé :)', 'Success');

        return redirect()->route('admin.stockage.index');


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
    public function edit(Stockage $stockage)
    {
        $sites = Site::all();
        $conditions = Conditions::all();

        return view('admin.stockage.edit', compact('stockage','sites', 'conditions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockage $stockage)
    {

        /**
         * Validation champs
         */


        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            //'status' => 'required',
            // 'condition' => 'required',
        ]);


        /**
         * Modification de stockage
         */

        // $stockage->user_id = Auth::id();
        $stockage->name = $request->name;
        $stockage->description = $request->description;
        $stockage->status = $request->status;
        $stockage->condition = $request->condition;


        if (isset($request->status)){
            $stockage->status = true;
        }else{
            $stockage->status = false;
        }

        $stockage->save();
        $stockage->sites()->sync($request->sites);
        $stockage->conditions()->sync($request->conditions);



        Toastr::success('Structure de stockage mise à jour :)', 'Success');

        return redirect()->route('admin.stockage.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(stockage $stockage)
    {
        $stockage->sites()->detach();
        $stockage->conditions()->detach();
        $stockage->delete();


        Toastr::success('Structure de stockage supprimée', 'Suppresion');

        return redirect()->back();
    }
}
