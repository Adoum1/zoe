<?php

namespace App\Http\Controllers;

use App\Candidature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{

    public function store(Request $request){
        //return $request->all();

        $this->validate($request, [
            'email' => 'required|email|unique:candidature',
            'nom'   => 'required',
            'body'  => 'required',
            'alerte' => 'required',
            'participation' => 'required'
        ]);

        $candidature = new Candidature();
        $candidature->email = $request->email;
        $candidature->nom = $request->nom;
        $candidature->body = $request->body;
        $candidature->alerte = $request->alerte;
        $candidature->participation = $request->participation;
        $candidature->save();



        Toastr::success('Votre candidature a été envoyé', 'CANDIDATURE');
        return redirect()->back();

    }
}
