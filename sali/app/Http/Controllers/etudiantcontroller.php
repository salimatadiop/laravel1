<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use App\Models\classe;
use Illuminate\Http\Request;

class etudiantcontroller extends Controller
{
    public function index(){

        $etudiants = etudiant::orderBy("nom","asc")->paginate(5);
        return view("etudiant",compact("etudiants"));
    }


    public function create(){

        $classes = classe::all();
        return view("createEtudiant",compact("classes"));
    }

    public function store(Request $request){

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);

        etudiant::create($request->all([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]));
        return back()->with("success","Etudiant cree avec succé");   

    }
    public function edit(etudiant $etudiant){

        $classes = classe::all();
        return view("editeEtudiant",compact("etudiant","classes"));

    }
    public function delete(etudiant $etudiant){
        $nom_complet = $etudiant->nom ." ".$etudiant->prenom ;
        $etudiant->delete();
        return back()->with("successDelete","Etudiant supprimeé '$nom_complet' avec  succé! ");
    }
    public function update(request $request ,etudiant $etudiant) {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);

        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success","Etudiant mis à jour avec succé");

        
    }
}
