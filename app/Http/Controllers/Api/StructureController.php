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

    public function filter(){
        $structures = Structure::with('name')->get();
        $name_filter = isset($_GET['name']) ? strtolower($_GET['name']) : "";
        return response()->json([
            'result' => $this->filter($structures, $name_filter),
        ]);
    }
}
