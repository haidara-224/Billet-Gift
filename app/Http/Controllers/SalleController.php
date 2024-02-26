<?php

namespace App\Http\Controllers;

use App\Models\salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        $salle=salle::all();
        return response()->json([
            'salle'=>$salle
        ]);
    }
}
