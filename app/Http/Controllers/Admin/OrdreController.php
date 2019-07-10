<?php

namespace App\Http\Controllers\Admin;

use App\Ordre;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class OrdreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordres = Ordre::latest()->get();
        return view('admin.ordre.index', compact('ordres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ordre.create');
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
            'name' => 'required|string|max:255|unique:genres',
        ],[
            'name.unique' => 'Cet ordre existe déja.',
            'name.required' => 'Le nom de l ordre est obligatoire.',

        ]);

        //return $request;

        $ordre = new Ordre();
        $ordre->name = $request->name;
        $ordre-> slug = Str::slug($request->name);
        $ordre->save();

        Toastr::success('Ordre ajouté.', 'GESTION DE LA TAXINOMIE');

        return redirect()->route('admin.ordre.index');
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
        $ordre = Ordre::find($id);
        return view('admin.ordre.edit', compact('ordre'));
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
        ],[
            //'name.unique' => 'Cet ordre existe déja.',
            'name.required' => 'Le nom de l ordre est obligatoire.',

        ]);


        //return $request;

        $ordre= Ordre::find($id);
        $ordre->name = $request->name;
        $ordre-> slug = Str::slug($request->name);
        $ordre->save();

        Toastr::success('Ordre modifié.', 'GESTION DE LA TAXINOMIE');

        return redirect()->route('admin.ordre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ordre::find($id)->delete();
        Toastr::success('Ordre supprimé', 'GESTION DE LA TAXINOMIE');

        return redirect()->back();
    }
}
