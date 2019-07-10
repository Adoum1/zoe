<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::latest()->get();
        return view('admin.classe.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classe.create');
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
        ],[
            'name.unique' => 'Cette classe existe déja.',
            'name.required' => 'Le nom de la classe est obligatoire.',

        ]);



        //return $request;

        $classe = new Classe();
        $classe->name = $request->name;
        $classe-> slug = Str::slug($request->name);
        $classe->save();

        Toastr::success('Classe ajoutée.', 'GESTION DE LA TAXINOMIE');

        return redirect()->route('admin.classe.index');
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
        $classe = Classe::find($id);
        return view('admin.classe.edit', compact('classe'));
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
            //'name.unique' => 'Cette classe existe déja.',
            'name.required' => 'Le nom de la classe est obligatoire.',

        ]);

        //return $request

        $classe= Classe::find($id);
        $classe->name = $request->name;
        $classe-> slug = Str::slug($request->name);
        $classe->save();

        Toastr::success('Classe modifiée.', 'GESTION DE LA TAXINOMIE');

        return redirect()->route('admin.classe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classe::find($id)->delete();
        Toastr::success('Classe supprimée', 'GESTION DE LA TAXINOMIE ');

        return redirect()->back();
    }
}
