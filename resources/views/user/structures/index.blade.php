@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('user.structures.create') }}" role="button">Aggiungi struttura...</a>
    </div>
     <div class="row justify-content-center">
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('user.structures.sponsorship') }}" role="button">Sponsorizza struttura</a>
    </div>

    <div class="card-deck flex-wrap">
        @if($structures)

        @foreach($structures as $structure)
        <div class="card mycard my-4">
            
            @if($structure->cover_img_path)
            <img class="card-img-top myimg" src="{{ asset('storage/' . $structure->cover_img_path) }}" alt="Cover of structure">
            @endif
            <div class="card-body">
                <h5 class="mt-0">{{$structure->name}}</h5>
                @if($structure->services)
                @foreach($structure->services as $service)
                <span class="badge badge-pill badge-info">{{$service->name}}</span>
                @endforeach
                @endif
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-outline-primary my-1" href="{{route("user.structures.show", $structure->id)}}" role="button">Dettagli...</a><br>
                <a class="btn btn-outline-primary my-1" href="{{route("user.structures.sponsorship", $structure->id)}}" role="button">Sponsorizza</a><br>
            </div>
            
            

        </div>

        @endforeach
        @endif
    </div>
</div>
<div id="map-div"></div>
@endsection
