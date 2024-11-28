<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivreController extends Controller
{

    public function accueil(){
        
        
        return view('livres.accueil');
    }
    public function index()
    {
        // Afficher la liste des livres
        return view('livres.index');
    }

    public function create()
    {
        // Afficher le formulaire d'ajout de livre
        return view('livres.create');
    }

    public function store(Request $request)
    {
        // Traiter le formulaire pour ajouter un livre
        // Validation et sauvegarde des données
        return redirect()->route('livres.index');
    }

    public function show($id)
    {
        // Afficher un livre spécifique
        return view('livres.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        // Supprimer un livre
        return redirect()->route('livres.index');
    }
}
