<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::latest()->get();
        return view('admin.site.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'rue' => 'required',
            'cp'  => 'required',
            'commune' => 'required',
            'pays'    => 'required',
        ]);

        $site = new Site();
        $site->nom = $request->nom;
        $site->rue = $request->rue;
        $site->slug = Str::slug($request->nom);
        $site->cp   = $request->cp;
        $site->commune = $request->commune;
        $site->pays = $request->pays;

        $site->save();

        Toastr::success('Site ajouté.', 'Success');

        return redirect()->route('admin.site.index');
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
        $site = site::find($id);

        return view('admin.site.edit', compact('site'));
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
        $this->validate($request, [
            'nom' => 'required',
            'rue' => 'required',
            'cp'  => 'required',
            'commune' => 'required',
            'pays'    => 'required',
        ]);

        $site = Site::find($id);
        $site->nom = $request->nom;
        $site->rue = $request->rue;
        $site->slug = Str::slug($request->nom);
        $site->cp   = $request->cp;
        $site->commune = $request->commune;
        $site->pays = $request->pays;

        $site->save();

        Toastr::success('Les informations du site ont été mises à jour avec succès.', 'MISE A JOUR');

        return redirect()->route('admin.site.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::find($id)->delete();

        Toastr::success('Le site a été suprimé', 'SUPPRESSION SITE');

        return redirect()->back();
    }
}
