

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <a class="mybtn default fix-btn my-5 mx-4" href="{{ route('user.structures.create') }}" role="button">Aggiungi una nuova struttura</a>
    </div>
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        @if($structures)

        @foreach($structures as $structure)
        <div class="col-md-6 col-lg-4 mb-5 mycol">
        <a href="{{route("user.structures.show", $structure->id)}}">
        
            @if($structure->cover_img_path)
            <img class="card-img-top myimg rounded" src="{{ asset('storage/' . $structure->cover_img_path) }}" alt="Cover of structure">
            @endif
            <div class="card-body">
                <div class="text-center myinfo">
                    
                    <h5 class="mt-0 mb-3 myinfo">{{$structure->name}}</h5>
                    <a class="mybtn default p-2" href="{{route("user.structures.show", $structure->id)}}" role="button">Visualizza dettagli</a>
                    <a class="mybtn default p-2" href="{{route('user.structures.sponsorship', $structure->id)}}" role=“button”>Sponsorizza</a>

                </div>
            </div>

        </a>
        </div>

        @endforeach
        @endif
    </div>
</div>
@endsection

