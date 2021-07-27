<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\Structure;
use Illuminate\Http\Request;

class StructuresController extends Controller
{
    public function index(){
        
        $structures = Structure::all();
        return response()->json([
            'result' => $structures
        ]);
    }

    public function servicesList(){
        
        $services = Service::all();
        

        return response()->json([
            'results' => $services
        ]);
    }


    
    public function filter(Request $request){
        
        $url = $request->fullUrl();
        $nameFilter = $request->get('town');
    
        $bedsFilter = $request->get('beds');
       
        $structures = Structure::where('name', 'like', "%$nameFilter%")
                                // ->where('beds', '>=', $bedsFilter )
                                ->get();


        $servicesFilter = $request->get('filterServices');
        
        // $servicesFilter = array_map('intval', explode(',', $servicesFilter));
        $jsonService = json_decode('[' . $servicesFilter . ']', true);
         
        if(count($jsonService) > 0){
            
            $lastFilteredData = [];
            foreach ($structures as $structure) {
                $selectedStructures_services =[];
    
                foreach ($structure->services as $service) {
                    if(!in_array($service->id, $selectedStructures_services)){
    
                        array_push($selectedStructures_services, $service->id);
                    }
                }  
                
            $corrisponding = array_intersect($selectedStructures_services, $jsonService);   
            if($corrisponding){
                if(count($corrisponding) === count($jsonService)){
                    array_push($lastFilteredData, $structure);
                }
            }    

            }
            return response()->json([
                'success' => true,
                'results' => $structures,
                'url' => $url,
                'lastFilteredData' => $lastFilteredData
            ]);
    
        }    

        return response()->json([
            'success' => true,
            'results' => $structures,
        ]);
    }

    
    
}

