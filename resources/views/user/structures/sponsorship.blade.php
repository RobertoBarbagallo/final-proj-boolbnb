@extends('layouts.appNoJS')
@section('content')

<div class="container pt-5">

    <div class="row">

        <div class="col-md-12 col-lg-6 d-flex flex-column align-items-center justify-content-center">

            <img class='myimg rounded' src="{{ $structure->cover_img_path ? asset('storage/' . $structure->cover_img_path) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">

        </div>
        <div class="col-md-12 col-lg-6 d-flex flex-column align-items-center justify-content-center">

            <h2 class="text-secondary">{{ $structure->name }}</h2>
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>
            @if($activeSponsorships)

                <h4 class="text-secondary">La sponsorizzazione scade il {{ $activeSponsorships->end_date }}</h4>

            @endif


        </div>
        
    </div>

        
    
    <form method="post" action='{{ route('user.structures.payment', ['id' => $structure->id]) }}' id="postform" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
        
            <div class="col-md-12 col-lg-6 pt-4 my-radio">
            
                    @foreach($sponsorships as $sponsorship)
                    <div class="my-3 my-radio">

                        <label for="{{$sponsorship->id}}">Sponsorizza per {{$sponsorship->duration}} ore ({{$sponsorship->price}} €) </label>
                        <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}" required>
                        <div class="invalid-feedback">Seleziona un opzione</div>

                    </div>
                    @endforeach
                <div class="">


                </div>
            
            </div>
            <div class='col-md-12 col-lg-6'>
            
                <div id="dropin-container"></div>
            
            </div>
        
        </div>
        <div class="row justify-content-center mb-3">
        
            <button type='button' id="submit-button" class="mybtn default">Purchase</button>

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
