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

        return redirect()->route('home.show', [
            "town" => $town
        ]);
    }

    public function show(Request $request)
    {
        $radius = 20000;
        $town = $request->town;
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $town. '.json?limit=1&key=qISPPmwNd3vUBqM2P2ONkZuJGTaaQEmb')->json();
            $lat = $response['results'][0]['position']['lat'];
            $lng = $response['results'][0]['position']['lon'];
            $structures = Structure::all();
            $finalArray = [];
            $finalResponseResultsLat = null;
            $finalResponseResultsLon = null;
            foreach ($structures as $structure) {
                $finalResponse = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geometryFilter/.json?geometryList=%5B%7B%22type%22%3A%22CIRCLE%22%2C%20%22position%22%3A%22' .$lat."%2C%20".$lng."%22%2C%20%22radius%22%3A" . $radius. "%7D%5D&poiList=%5B%7B%22position%22%3A%7B%22lat%22%3A".$structure->lat."%2C%22lon%22%3A".$structure->lng."%7D%7D%5D&key=qISPPmwNd3vUBqM2P2ONkZuJGTaaQEmb")->json(); 
                if($finalResponse){
                    $finalResponse = json_decode(json_encode($finalResponse), FALSE);
                    $tomtomlat =  $finalResponse->results;
                    foreach ($tomtomlat as  $value) {
                        $finalResponseResultsLat = $value->position->lat;   
                        $finalResponseResultsLon = $value->position->lon;          
                    }
                    if( $finalResponseResultsLat == $structure->lat &&  $finalResponseResultsLon == $structure->lng){
                      array_push($finalArray, $structure);  
                    } 
                }
            }

        return view("guestsearch", [
            "lat" => $lat,
            'lng' => $lng,
            "finalArray" => $finalArray,
        ]);
    }

}
