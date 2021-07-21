@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-primary mb-4 mx-4" href="{{ route('user.structures.create') }}" role="button">Aggiungi struttura...</a>
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
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<div class='map-view'>
        <form class='tt-side-panel js-form'>
            <header class='tt-side-panel__header'>
                <div class='tt-input-icon'>
                    <input class='tt-input' name='query' placeholder='Query e.g. Washington'>
                    <span class='tt-icon -search'></span>
                </div>
            </header>
            <div class='tt-tabs js-tabs'>
                <div class='tt-tabs__tabslist' role='tablist'>
                    <button role='tab' aria-selected='true' aria-controls='options' class='tt-tabs__tab'
                        type='button'>Params</button>
                    <button role='tab' aria-selected='false' aria-controls='results' class='tt-tabs__tab'
                        type='button'>Results</button>
                </div>
                <div role='tabpanel' class='tt-tabs__panel' id='options'>
                    <div class='tt-params-box'>
                        <header class='tt-params-box__header'>
                            Geocode parameters
                        </header>
                        <div class='tt-params-box__content'>
                            <label class='tt-form-label'>
                                Language
                                <select class='js-language-select tt-select'></select>
                            </label>
                            <label class='tt-form-label js-slider'>
                                Limit (<span class='js-counter'>10</span>)
                                <input class='tt-slider' name='limit' type='range' min='1' max='100' value='10'>
                            </label>

                            <div class='tt-spacing-top-24 js-bias-container'>
                                <div class='tt-controls-group'>
                                    <div class='tt-controls-group__title'>
                                        Geobias
                                    </div>
                                    <div class='tt-controls-group__toggle'>
                                        <input id='toggle1' class='tt-toggle js-bias-toggle' type='checkbox'
                                            checked='true'>
                                        <label for='toggle1' class='tt-label'></label>
                                    </div>

                                    <div class='js-bias-controls'>
                                        <label class='tt-form-label js-slider'>
                                            Radius (<span class='js-counter'>0</span>m)
                                            <input class='tt-slider' name='radius' type='range' min='0' max='10000'
                                                value='0'>
                                        </label>
                                        <label class='tt-form-label'>
                                            Latitude
                                            <input class='tt-input' name='latitude' placeholder='e.g. 37.9717162'>
                                        </label>
                                        <label class='tt-form-label'>
                                            Longitude
                                            <input class='tt-input' name='longitude' placeholder='e.g. 23.7263126'>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class='tt-spacing-top-24'>
                                <input type='submit' class='tt-button -primary tt-spacing-top-24' name='submit'
                                    value='Submit'>
                            </div>
                        </div>
                    </div>
                </div>
                <div role='tabpanel' class='tt-tabs__panel' hidden='hidden' id='results'>
                    <div class='js-results' hidden='hidden'></div>
                    <div class='js-results-loader' hidden='hidden'>
                        <div class='loader-center'><span class='loader'></span></div>
                    </div>
                    <div class='tt-tabs__placeholder js-results-placeholder'>
                        NO RESULTS
                    </div>
                </div>
            </div>
        </form>
        <div id='map' class='full-map'></div>
@endsection
