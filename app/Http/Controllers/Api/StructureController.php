<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index(){
        
        $structures = Structure::all();
        

        return response()->json([
            'result' => $structures
        ]);
    }
}
