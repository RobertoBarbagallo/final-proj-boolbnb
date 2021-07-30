<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StructuresController extends Controller
{
    public function index(){
        
        $structures = Structure::all();
        return response()->json([
            'result' => $structures
        ]);
    }

    public function services(){
        
        $servicesList = Service::all();
        

        return response()->json([
            'results' => $servicesList
        ]);
    }

    public function search(Request $request){

            $radius = $request->radius;
            $town = $request->town;
            $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $town. '.json?limit=1&key=' . env('TOMTOM_API_KEY'))->json();
            $lat = "";
            $lng= "";    
            $lat = $response['results'][0]['position']['lat'];
            $lng = $response['results'][0]['position']['lon'];
            $structures = Structure::all();
            $finalArray = [];
            $finalResponseResultsLat = null;
            $finalResponseResultsLon = null;
            foreach ($structures as $structure) {
                $finalResponse = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geometryFilter/.json?geometryList=%5B%7B%22type%22%3A%22CIRCLE%22%2C%20%22position%22%3A%22' .$lat."%2C%20".$lng."%22%2C%20%22radius%22%3A" . $radius. "%7D%5D&poiList=%5B%7B%22position%22%3A%7B%22lat%22%3A".$structure->lat."%2C%22lon%22%3A".$structure->lng."%7D%7D%5D&key=". env('TOMTOM_API_KEY'))->json(); 
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
            if($request->fromwelcomepage == true){
                return view("guestsearch", [
                    "lat" => $lat,
                    'lng' => $lng,
                    "typeofshow" => 0,
                    "oldtown" => $town,
                    "radius" => $radius,
                    "finalArray" => $finalArray,
                ]);
            }
            else{
                $corrispondingItems = [];
                foreach ($finalArray as $structure) {
                    if($structure->beds >= intVal($request->beds)){
                        array_push($corrispondingItems, $structure);
                    }
                }
                if($request->filterservices){
                    $servicesFilter = $request->filterservices;
                    $jsonService = json_decode('[' . $servicesFilter . ']', true);
                }else{
                    $jsonService = [ ];
                }
                if(count($jsonService) > 0){
                    $lastFilteredData = [];
                    foreach ($corrispondingItems as $structure) {
                        $singleStructureServices= [];
                        foreach ($structure->services as $service) {
                            array_push($singleStructureServices, $service->id);
                        }     
                        $corrisponding = array_intersect($singleStructureServices, $jsonService);   
                        if($corrisponding){
                            if(count($corrisponding) === count($jsonService)){
                                    array_push($lastFilteredData, $structure);
                            }    
                        }
                    }
                    return response()->json([
                        "lat" => $lat,
                        'lng' => $lng,
                        "typeofshow" => 0,
                        "oldtown" => $town,
                        "radius" => $radius,
                        "finalArray" => $lastFilteredData,
                    ]);}else{
                    return response()->json([
                        "lat" => $lat,
                        'lng' => $lng,
                        "typeofshow" => 0,
                        "oldtown" => $town,
                        "radius" => $radius,
                        "finalArray" => $corrispondingItems,
                    ]);
                    }     
            }
               
    }  
} 


