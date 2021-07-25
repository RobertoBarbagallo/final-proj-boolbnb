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

        $nameFilter = $request->get('name');

        $bedsFilter = $request->get('beds');

        //ricordati che per i services serve il join!!!

        $url = $request->fullUrl();

        $structures = Structure::where('name', 'like', "%$nameFilter%")->get();

        return response()->json([
            'success' => true,
            'results' => $structures,
            'url' => $url
        ]);
    }
}
