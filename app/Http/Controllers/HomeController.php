<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $town = $request->input('search');
        $request->validate([
            'search' => ['string', 'max:255'],
        ]);
        return redirect()->route('api.structures.search', [
            "town" => $town,
            "radius" => 20000,
            "fromwelcomepage" => true
        ]);
    }

    public function show (Request $request)
    {
        return view('guestsearch');
    }


}
