<?php

namespace App\Http\Controllers;

use App\Message;
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
        $structures = Structure::all();
        return view("welcome",[
            'structures' => $structures
        ]);
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

    public function details(Request $request)

    {
        $ipaddress = $request->ip();
        $contactedStructure = $request->contactedStructure;
        $slug = $request->slug;
        $structure = Structure::where('slug', $slug)->first();

        $lat = $structure->lat;
        $lng = $structure->lng;

        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/reverseGeocode/' . $lat. '%2C%20' . $lng . '.json?limit=1&key=' . env('TOMTOM_API_KEY'))->json();

          $readableAddress = $response['addresses'][0]['address']['freeformAddress']; 
          $position = $response['addresses'][0]['position'];

        $minutes = 15;
        views($structure)->cooldown($minutes)->record();
            
        return view("details", [
            "structure" => $structure,
            "contactedStructure" => $contactedStructure,
            "position" => $position,
            "address" => $readableAddress,
            "lat" => $lat,
            "lng" => $lng,
            "typeofshow" => 1
        ]);
    }
    

    public function storemessage(Request $request)
    {
        $messageData = $request->all();
        $request->validate([
            'sender_email' => ['required','string', 'max:255'],
            'content' => ['required','string'],
            'structure_id' => ['required','numeric'],
        ]);
        $structure = Structure::where('id', $request->structure_id)->first();
        $newMessage = new Message();
        $newMessage->fill($messageData);
        $newMessage->save();
        return redirect()->route('home.details', ["slug" => $structure->slug, "contactedStructure" => true]);

    }

}
