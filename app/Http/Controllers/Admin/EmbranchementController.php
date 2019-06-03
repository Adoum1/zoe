<?php

namespace App\Http\Controllers\Admin;

use App\Embranchement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EmbranchementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $embranchements = Embranchement::latest()->get();
        return view('admin.embranchement.index', compact('embranchements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.embranchement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        //return $request;

        $embranchement = new Embranchement();
        $embranchement->name = $request->name;
        $embranchement-> slug = Str::slug($request->name);
        $embranchement->save();

        Toastr::success('Embranchement ajoutée.', 'Success');

        return redirect()->route('admin.embranchement.index');
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
        $embranchement = Embranchement::find($id);
        return view('admin.embranchement.edit', compact('embranchement'));
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
        $this->validate($request,[
            'name' => 'required'
        ]);

        //return $request;

        $embranchement = Embranchement::find($id);
        $embranchement->name = $request->name;
        $embranchement-> slug = Str::slug($request->name);
        $embranchement->save();

        Toastr::success('Embranchement modifiée.', 'Success');

        return redirect()->route('admin.embranchement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Embranchement::find($id)->delete();
        Toastr::success('Embranchement successfully Deleted', 'Suppression Tag');

        return redirect()->back();
    }
}
