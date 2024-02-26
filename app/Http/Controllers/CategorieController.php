<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index()
    {
        $Categorie=categorie::all();
        return response()->json([
            'categorie'=>$Categorie,
        ]);
    }
}
