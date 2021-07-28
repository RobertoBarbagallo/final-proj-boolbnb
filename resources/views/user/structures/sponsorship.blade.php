@extends('layouts.app')
@section('content')

<div class="container">
    <div class="border row">
        <div class="col">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <div>
                    <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('user.structures.payment', $structure->id) }}" id="postform" enctype="multipart/form-data">
        @csrf
        @method('POST')

        @foreach($sponsorships as $sponsorship)
        <label for="{{$sponsorship->id}}">{{$sponsorship->duration}} ORE <br>{{$sponsorship->price}} PREZZO </label>
        <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}">


        @endforeach
        {{-- <button type="submit" class="btn btn-outline-primary my-1"  role="button">Sponsorizza</button> --}}
        <div id="dropin-container"></div>
        <button id="submit-button" class="button button--small button--green">Purchase</button>
    </form>


</div>
@endsection

@section('script')

{{-- <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>
<script src="https://js.braintreegateway.com/web/3.79.1/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.79.1/js/hosted-fields.min.js"></script> --}}

<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>

<script src="{{ asset('js/paymentsScript.js') }}" defer"></script>

@endsection

<style>

</style>