<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service;
use App\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $structures = Structure::orderBy("id", "DESC")->where("user_id", $request->user()->id)->get();
        return view("user.structures.index",[
            'structures' => $structures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('user.structures.create', [
            "services" => $services,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $newStructureData = $request->all();


        $request->validate([
            'name' => ['required','string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'rooms' => ['required','numeric', 'min:1'],
            'beds' => ['required','numeric', 'min:1'],
            'bathrooms' => ['required','numeric','min:1'],
            'sqm' => ['required','numeric','min:1'],
            'visible' => ['required','boolean'],
            'services' => ['exists:services,id'],
            'cover_img_path' => ['mimes:jpeg,jpg,bmp,png,svg,webp,gif']
        ]);

        $address = $request->address;
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $address. '.json?limit=1&key=qISPPmwNd3vUBqM2P2ONkZuJGTaaQEmb')->json();
            $lat = $response['results'][0]['position']['lat'];
            $lng = $response['results'][0]['position']['lon'];
        $newStructure = new Structure();
        $newStructure->fill($newStructureData);
        $newStructure->lat = $lat;
        $newStructure->lng = $lng;
        $slug = Str::slug($newStructure->name);
        $slug_base = $slug;
        $slugExist = Structure::where('slug', $slug)->first();
        $counter = 1;
        while ($slugExist) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $slugExist = Structure::where('slug', $slug)->first();
        }

        $newStructure->slug = $slug;

        $newStructure->user_id = $request->user()->id;


        if($request['cover_img_path']){
            $newStructure->cover_img_path = Storage::put('uploads' , $newStructureData['cover_img_path']);
        }
        
        $newStructure->save();
        
        if ($request['services'] && count($request['services']) > 0) {
            $newStructure->services()->sync($request["services"]);
        }
        

        return redirect()->route('user.structures.show', $newStructure->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Structure $structure)
    {
        $requestUserId = $request->user()->id;

        if ($structure->user_id == $requestUserId){
        $messages = json_encode($structure->messages, FALSE);

        $lat = $structure->lat;
        $lng = $structure->lng;

        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/reverseGeocode/' . $lat. '%2C%20' . $lng . '.json?limit=1&key=' . env('TOMTOM_API_KEY'))->json();
            $readableAddress = $response['addresses'][0]['address']['freeformAddress'];

        return view("user.structures.show", [
            "structure" => $structure,
            "messages" => $messages,
            "address" => $readableAddress
        ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
        $services = Service::all();


        $lat = $structure->lat;
        $lng = $structure->lng;

        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/reverseGeocode/' . $lat. '%2C%20' . $lng . '.json?limit=1&key=' . env('TOMTOM_API_KEY'))->json();
            $readableAddress = $response['addresses'][0]['address']['freeformAddress'];

        return view("user.structures.edit", [
            "structure" => $structure,
            "services" => $services,
            "address" => $readableAddress
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        $updatedStructureData = $request->all();

        $request->validate([
            'name' => ['required','string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'rooms' => ['required','numeric', 'min:1'],
            'beds' => ['required','numeric', 'min:1'],
            'bathrooms' => ['required','numeric','min:1'],
            'sqm' => ['required','numeric','min:1'],
            'visible' => ['required','boolean'],
            'services' => ['exists:services,id'],
            'cover_img_path' => ['mimes:jpeg,jpg,bmp,png,svg,webp,gif']
        ]);

        $structure->services()->sync($request["services"]);
        
        
       
        if (key_exists("cover_img_path", $updatedStructureData)) {
            if ($structure->cover_img_path) {
                Storage::delete($structure->cover_img_path);
            }

            $storageResult = Storage::put("uploads", $updatedStructureData["cover_img_path"]);

            $updatedStructureData["cover_img_path"] = $storageResult;
        }
        $structure->update($updatedStructureData);
        return redirect()->route("user.structures.show", $structure->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $structure = Structure::FindOrFail($id);
        $structure->delete();
        return redirect()->route("user.structures.index");
    }
}
