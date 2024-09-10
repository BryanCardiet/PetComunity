<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Dog;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DogController extends Controller
{

    public function index()
    {
        $user = Auth::user()->id;
/* 
        $communities = Community::with('dogs')->get();
        return view('communities.index', compact('communities')); */

        $dogs = Dog::where('user_id', $user)->get();
        $raza = Community::get();
        return view('dog')->with('dogs', $dogs)->with('razas', $raza);
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'breed' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:0'],
            'color' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $community = Community::where(['id' => $request->breed])->first();

        Dog::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'breed' => $community->name,
            'age' => $request->age,
            'sexo' => $request->sexo,
            'color' => $request->color,
            'weight' => $request->weight,
            'description' => $request->description,
            'photo' => $photoPath,
            'community_id' => $request->breed,
        ]);

        return redirect()->route('dogs')->with('success', 'Perrito registrado con éxito.');
    }
}
