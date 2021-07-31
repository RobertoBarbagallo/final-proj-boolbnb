@extends('layouts.appNoJS')
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
    <form method="post" action='{{ route('user.structures.paymentUpdate', $structure->id) }}' id="postform" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-check form-check-inline">
            @foreach($sponsorships as $sponsorship)

            <label for="{{$sponsorship->id}}">{{$sponsorship->duration}} ORE <br>{{$sponsorship->price}} € </label>
            <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}" required>
            <div class="invalid-feedback">Please choose an option</div>

            @endforeach
        </div>
        <div>
        
            <div id="dropin-container"></div>
            <button type='button' id="submit-button" class="button button--small button--green">Purchase</button>
        
        </div>
    </form>


</div>
@endsection

@section('script')

<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>

<script src="{{ asset('js/paymentsScript.js') }}" defer></script>

<script>

    const SANDBOX_KEY = @JSON(env('BRAINTREE_SANDBOX_KEY'));
    let sponsoredStructuresId = @JSON($activeSponsorships);
    const SELECTED_STRUCTURE = @JSON($structure);

</script>

@endsection
