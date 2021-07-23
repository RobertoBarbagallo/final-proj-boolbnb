<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function filter(Request $request){

        $data = $request->get('name');

        $structures = Structure::where('name', 'like', "%$data%")->get();

        return response()->json([
            'success' => true,
            'results' => $structures,
        ]);
    }
}
