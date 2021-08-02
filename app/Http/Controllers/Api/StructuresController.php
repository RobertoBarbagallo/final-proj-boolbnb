<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
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

    public function SponsoredStructure(Request $request) {        
        
        $currentDate = date("Y-m-d H:i:s");
        
        //  Cerca tutte le sponsorizzazioni attive
        
        $sponsorships = DB::table('sponsorship_structure')
        ->select('structure_id')
        ->whereDate('end_date' , '>' , $currentDate)
        ->get();
                
        $sponsoredStructureIDS = [];
        //  Cicla tutte le sponsorizzazioni attive ed aggiunge il corrispondente Id dell'appartamento
        //  all'Array $sponsoredAptIDS, il quale, al termine del foreach conterrà gli ID di tutti gli apt sponsorizzati
        foreach ($sponsorships as $sponsorship) {
            if(!in_array($sponsorship->structure_id , $sponsoredStructureIDS))
            array_push($sponsoredStructureIDS , $sponsorship->structure_id );
        }
        
        $sponsoredStructureAll = []; // array contenente **tutti** gli apt sponsorizzati presenti nel DB
        
        //  Dall'array di Id degli apt sponsorizzati ricava le effettive informazioni relative all'apt
        foreach ($sponsoredStructureIDS as $structureID) {
            $structure =  DB::table('structures')
            ->select('id' , 'user_id' , 'name' , 'lat' , 'lng','rooms','beds', 'bathrooms', 'sqm', 'visible', 'slug', 'cover_img_path', 'created_at', 'updated_at')
            ->where('id', $structureID)
            ->first();

            // $excerpt = substr($apt->description , 0 ,125) . '...';
            
           /*  $excerpt = $this->getExcerpt($structure->description);            
            $cover_img = $this->getAptCoverImg($structureID); */
     
            // Salva le informazioni ottenute in un nuovo array, pushato poi in $filteredApt

            // $filteredStructure = array( 
            //     'name' => $structure->name,
            //     'id' => $structure->id ,
            //     'beds' => $structure->beds , 
            //     'rooms' => $structure->rooms , 
            //     'bathrooms' => $structure->bathrooms ,
            //     'sqm' => $structure->sqm ,
            //     'cover_img_path' => $structure->cover_img_path ,

            //  );

            array_push($sponsoredStructureAll , $structure);
        }

      /*   $sponsoredStructure = []; */

      /*   $nOfItems = $request->input('nOfItems');    // Numero di Apt  richiesti
        
        if($nOfItems > count($sponsoredAptAll) || $nOfItems == 0)
            $nOfItems = count($sponsoredAptAll);
        for ($i=0; $i < $nOfItems; $i++) { 
            array_push($sponsoredApt , $sponsoredAptAll[$i]);
        } */

        //  Compila l'array finale $sponsoredApt in base al numero di apt richiesti nella chiamata API
        //  e finalmente lo restituisce
        
        return response()->json([
            'success'=> true,
            'results'=> $sponsoredStructureAll
        ]);
    }
} 


