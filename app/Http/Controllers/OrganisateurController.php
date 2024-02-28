<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationRequest;
use App\Models\Organisateur;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function index(Request $request)
    {
        $query=Organisateur::query();
        if($request->has('name'))
        {
            $query->where('name','LIKE','%'.$request->input('name').'%');
        }
        $organisateur=$query->orderByDesc('id')->paginate(4);

        return response()->json([
            'organisateur'=>$organisateur,

        ]);
    }
    public function store(OrganisationRequest $request,Organisateur $organisateur)
    {
        $message=$request->validated();
        $og=$organisateur->create($message);
        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('photos', 'public');
            $og->update(['image' => $photoPath]);
        }
        return response()->json([
            'message'=>$message,
            'organisateur'=>$og,
        ]);
    }
}
