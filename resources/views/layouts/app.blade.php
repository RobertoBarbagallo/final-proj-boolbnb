<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type='text/javascript' src='{{asset('../assets/js/search/search-results-parser.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/dom-helpers.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/formatters.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/tabs.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/results-manager.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/languages.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/info-hint.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/slider.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search/side-panel.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/tail.select.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/tail-selector.js')}}'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search-markers/search-marker.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/search-markers/search-markers-manager.js')}}'></script>
    <script type='text/javascript' src='{{asset('../assets/js/mobile-or-tablet.js')}}'></script>
    <script>
    {{-- const GOLDEN_GATE_BRIDGE = {lng: -122.47483, lat: 37.80776};
        var map = tt.map({
            key: 'Cywd0Bxu0V2NFQLj5nU7dAsTOAAWKZxm'
            , container: 'map-div'
            , center: GOLDEN_GATE_BRIDGE
            , zoom: 12
        }); --}}
    tt.services.copyrights({
    key: 'Cywd0Bxu0V2NFQLj5nU7dAsTOAAWKZxm'
    })
    .then(function (results) {
    console.log('Copyrights', results);
    })
    .catch(function (reason) {
    console.log('Copyrights', reason);
    });
    tt.setProductInfo('<your-product-name>', '<your-product-version>');
            var map = tt.map({
            key: 'Cywd0Bxu0V2NFQLj5nU7dAsTOAAWKZxm',
            container: 'map',
            center: [6.315226, 45.095108],
            zoom: 1,
            dragPan: !isMobileOrTablet()
            });
            map.addControl(new tt.FullscreenControl({ container: document.querySelector('body') }));
            map.addControl(new tt.NavigationControl());

            new SidePanel('.tt-side-panel', map);
            var searchMarkersManager = new SearchMarkersManager(map);
            var tabs = new Tabs('.js-tabs');
            Array.prototype.slice.call(document.querySelectorAll('.js-slider'))
            .forEach(function(slider) {
            new Slider(slider);
            });

            var languageSelector = new TailSelector(searchLanguages, '.js-language-select', 'en-GB');

            function Geocode() {
            this.domHelpers = DomHelpers;
            this.searchResultsParser = SearchResultsParser;
            this.formatters = Formatters;
            this.resultsManager = new ResultsManager();
            this.errorHint = new InfoHint('error', 'bottom-center', 5000)
            .addTo(document.getElementById('map'));

            this.elements = {
            language: languageSelector.getElement(),
            biasContainer: document.querySelector('.js-bias-container'),
            biasPlaceholder: document.querySelector('.js-bias-placeholder'),
            biasControls: document.querySelector('.js-bias-controls'),
            geobiasToggle: document.querySelector('.js-bias-toggle'),
            form: document.querySelector('.js-form')
            };

            Array.prototype.slice.call(document.querySelectorAll('input'))
            .forEach(function(input) {
            this.elements[input.name] = input;
            }.bind(this));

            this.state = {
            query: this.elements.query.value,
            language: 'en-GB',
            limit: this.elements.limit.value,
            radius: this.elements.radius.value,
            isGeobiasActive: true,
            markers: {}
            };

            this.updateInputValue = this.updateInputValue.bind(this);
            this.updateSelectValue = this.updateSelectValue.bind(this);

            this.bindEvents();
            }

            Geocode.prototype.bindEvents = function() {
            this.elements.language.on('change', this.updateSelectValue.bind(this, 'language'));
            this.elements.query.addEventListener('change', this.updateInputValue.bind(this, 'query'));
            this.elements.latitude.addEventListener('change', this.updateInputValue.bind(this, 'latitude'));
            this.elements.longitude.addEventListener('change', this.updateInputValue.bind(this, 'longitude'));
            this.elements.limit.addEventListener('change', this.updateInputValue.bind(this, 'limit'));
            this.elements.radius.addEventListener('change', this.updateInputValue.bind(this, 'radius'));
            this.elements.geobiasToggle.addEventListener('click', this.toggleGeoBias.bind(this));
            this.elements.submit.addEventListener('click', this.handleSubmit.bind(this));
            this.elements.form.addEventListener('submit', this.handleSubmit.bind(this));

            map.on('load', this.updateBiasPosition.bind(this));
            map.on('moveend', this.updateBiasPosition.bind(this));
            };

            Geocode.prototype.updateBiasPosition = function() {
            var lat = Formatters.roundLatLng(map.getCenter().lat);
            var lng = Formatters.roundLatLng(map.getCenter().lng);
            this.elements.latitude.value = lat;
            this.elements.longitude.value = lng;
            this.state.latitude = lat;
            this.state.longitude = lng;
            };

            Geocode.prototype.updateInputValue = function(property, event) {
            this.state[property] = event.target.value;

            if (property === 'minFuzzyLevel' || property === 'maxFuzzyLevel') {
            this.validateMinMaxFuzzy();
            }
            };

            Geocode.prototype.updateSelectValue = function(property, selected) {
            var selectedKey = selected.key;
            this.state[property] = selectedKey;
            };

            Geocode.prototype.toggleGeoBias = function() {
            var isGeobiasActive = !this.state.isGeobiasActive;
            this.state.isGeobiasActive = isGeobiasActive;

            Array.prototype.slice.call(this.elements.biasControls.querySelectorAll('label, input'))
            .forEach(function(label) {
            if (isGeobiasActive) {
            label.removeAttribute('disabled');
            } else {
            label.setAttribute('disabled', 'true');
            }
            });
            };

            Geocode.prototype.handleSubmit = function(event) {
            event.preventDefault();

            var callParameters = {
            key: '<your-tomtom-maps-API-key>',
                query: this.state.query,
                language: this.state.language,
                limit: this.state.limit
                };

                this.resultsManager.loading();
                searchMarkersManager.clear();
                if (this.state.query) {
                tabs.clickTab(document.querySelector('[aria-controls="results"]'));
                } else {
                this.resultsManager.resultsNotFound();
                }

                if (this.state.isGeobiasActive) {
                callParameters.radius = this.state.radius;
                callParameters.center = [this.state.longitude, this.state.latitude];
                }

                tt.services.geocode(callParameters)

                .then(this.handleResponse.bind(this))
                .catch(this.handleError.bind(this));
                };

                Geocode.prototype.handleResponse = function(response) {
                var resultsDocumentFragment = document.createDocumentFragment();
                if (response.results && response.results.length > 0) {
                this.resultsManager.success();

                Array.prototype.slice.call(response.results)
                .forEach(function(result) {
                var distance = this.searchResultsParser.getResultDistance(result);
                var addressLines = this.searchResultsParser.getAddressLines(result);
                var searchResult = this.domHelpers.createSearchResult(
                addressLines[0],
                addressLines[1],
                distance ? this.formatters.formatAsMetricDistance(distance) : ''
                );

                var resultItem = this.domHelpers.createResultItem();
                resultItem.appendChild(searchResult);
                resultItem.setAttribute('data-id', result.id);
                resultItem.addEventListener('click', this.handleSearchResultItemClick.bind(this));

                resultsDocumentFragment.appendChild(resultItem);
                }, this);

                searchMarkersManager.draw(response.results);

                map.fitBounds(searchMarkersManager.getMarkersBounds(), { padding: 50 });

                var resultList = this.domHelpers.createResultList();
                resultList.appendChild(resultsDocumentFragment);
                this.resultsManager.append(resultList);
                } else {
                this.resultsManager.resultsNotFound();
                this.errorHint.setMessage('No results found for given parameters');
                }
                };

                Geocode.prototype.handleError = function(error) {
                this.errorHint.setMessage(error.message);
                };

                Geocode.prototype.selectResultItem = function(resultItem) {
                Array.prototype.slice.call(document.querySelectorAll('.tt-results-list__item'))
                .forEach(function(item) {
                item.classList.remove('-selected');
                });
                resultItem.classList.add('-selected');
                };

                Geocode.prototype.handleSearchResultItemClick = function(event) {
                var id = event.currentTarget.getAttribute('data-id');
                searchMarkersManager.openPopup(id);
                searchMarkersManager.jumpToMarker(id);
                };

                new Geocode();
    </script>
</body>
</html>
