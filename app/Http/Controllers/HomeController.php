<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $name = $request->input('search');
        $request->validate([
            'search' => ['string', 'max:255'],
        ]);

        return redirect()->route('home.show', [
            "name" => $name
        ]);
    }

    public function show(Request $request)
    {
<<<<<<< HEAD
        $name = json_encode($request->query());
        return view("guestsearch", [
            "name" => json_decode($name, true)
=======
        $name = $request->input('name');
        $structures = Structure::all();
        return view("guestsearch", [
            "name" => $name,
            "structures" => $structures

>>>>>>> 3c557b5c3c7cb9f57b6b2dfd4b5ea79adaa2ef31
        ]);
    }

}
