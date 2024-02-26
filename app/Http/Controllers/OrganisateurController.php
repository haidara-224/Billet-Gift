<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function index(Request $request)
    {
        $organisateur=Organisateur::all();
        $user=$request->user();
        return response()->json([
            'organisateur'=>$organisateur,
            'user'=>$user
        ]);
    }
}
