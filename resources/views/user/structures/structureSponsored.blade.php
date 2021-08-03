@extends('layouts.appNoJS')
@section('content')

<div class="container">
    <div class="border row">
        <div class="col">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <div>
                    <img src="{{ $structure->cover_img_path ? asset('storage/' . $structure->cover_img_path) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>
            </div>
        </div>
    </div>

        <h1>la tua struttura risulta già sponsorizzata</h1>
</div>
@endsection