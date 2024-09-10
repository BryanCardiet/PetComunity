<?php

namespace App\Http\Controllers;
use App\Models\Community;
use App\Models\Dog;
use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommunityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userDogBreeds = $user->dogs()->pluck('breed')->toArray();
        $communities = Community::whereIn('name', $userDogBreeds)->get();

        return view('community.index', compact('communities'));
    }

    public function join( String $community_id )
    {  
        $user = auth()->user();
    
        $community = Community::where('id', $community_id)->first();
        $userDogs = $user->breed( $community_id );

        return view('community.join', compact('community', 'userDogs'));
    }

    public function show($id)
    {
        Carbon::setLocale('es'); 
        $community = Community::with(['dogs', 'posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'blogs'])->findOrFail($id);
        
        $userDogs = auth()->user()->dogs;
        $selectedDogId = session('selected_dog_id');
        $selectedDog = $selectedDogId ? Dog::find($selectedDogId) : null;
    
        return view('community.show', compact('community', 'userDogs', 'selectedDog'));
    }

    public function joinAsDog( Request $request )
    {
        $dogId = $request->input('dog_id');
        $communityId = $request->input('community_id');
        
        $dog = Dog::findOrFail($dogId);
    
        if (!$dog->communities()->where('community_id', $communityId)->exists()) {
            $dog->communities()->attach($communityId);
            session(['selected_dog_id' => $dogId]);
            $message = $dog->name . ' se ha unido a la comunidad.';
        } else {
            session(['selected_dog_id' => $dogId]);
            $message = $dog->name . ' ya está en la comunidad.';
        }
    
        return redirect()->route('community.show', $communityId)->with('success', $message);
    }

    public function createPostAsDog(Request $request, $communityId)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'dog_id' => 'required|exists:dogs,id',
        ]);

        Post::create([
            'dog_id' => $request->dog_id,
            'community_id' => $communityId,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('community.show', $communityId)->with('success', 'Publicación creada con éxito por tu perro.');
    }

    public function blog( String $community_id )
    {
        $articulos = Blog::where('community_id', $community_id)->get();
        $selectedDogId = session('selected_dog_id');
        $selectedDog = $selectedDogId ? Dog::find($selectedDogId) : null;

        return view('community.articles', compact('community_id', 'articulos', 'selectedDog'));
    }

    public function article( String $community_id, String $article_id )
    {
        $articulo = Blog::where('community_id', $community_id)->where('id', $article_id)->first();
        $selectedDogId = session('selected_dog_id');

        return view('community.article', compact('community_id', 'articulo'));
    }

    public function leaveCommunity(Request $request)
    {
        session()->forget('selected_dog_id');
        return redirect()->route('community')->with('success', 'Has salido de la comunidad.');
    }
}
