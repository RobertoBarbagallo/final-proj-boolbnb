

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('user.structures.create') }}" role="button">Aggiungi struttura...</a>
    </div>
    <div class="row row-cols-3">
        @if($structures)

        @foreach($structures as $structure)
        <div class="col mb-4">
        
            @if($structure->cover_img_path)
            <img class="card-img-top myimg rounded" src="{{ asset('storage/' . $structure->cover_img_path) }}" alt="Cover of structure">
            @endif
            <div class="card-body">
                <div class="text-center">
                    
                    <h5 class="mt-0 mb-3">{{$structure->name}}</h5>
                    {{-- @if($structure->services)
                    @foreach($structure->services as $service)
                    <span class="badge badge-pill badge-info">{{$service->name}}</span>
                    @endforeach
                    @endif --}}
                    <a class="mybtn default" href="{{route("user.structures.show", $structure->id)}}" role="button">Visualizza dettagli</a>
                    <a class="mybtn default" href="{{route('user.structures.sponsorship', $structure->id)}}" role=“button”>Sponsorizza</a>

                </div>
            </div>

        </div>

        @endforeach
        @endif
    </div>
</div>
@endsection

