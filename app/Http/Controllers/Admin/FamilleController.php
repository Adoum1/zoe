<?php

namespace App\Http\Controllers\Admin;

use App\Famille;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::latest()->get();
        return view('admin.famille.index', compact('familles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.famille.create');
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

        $famille = new Famille();
        $famille->name = $request->name;
        $famille-> slug = Str::slug($request->name);
        $famille->save();

        Toastr::success('Famille ajoutée.', 'Success');

        return redirect()->route('admin.famille.index');
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
        $famille = Famille::find($id);
        return view('admin.famille.edit', compact('famille'));
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

        $famille = Famille::find($id);
        $famille->name = $request->name;
        $famille-> slug = Str::slug($request->name);
        $famille->save();

        Toastr::success('Famille modifiée.', 'Success');

        return redirect()->route('admin.famille.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Famille::find($id)->delete();
        Toastr::success('Famille successfully Deleted', 'Suppression Tag');

        return redirect()->back();
    }
}
