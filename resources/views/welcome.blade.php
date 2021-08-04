@extends('layouts.app')
@section('content')
    <div id="app" class="flex-center position-ref full-height">
        <div class="myjumbotron mb-0">   
            <form method="post" action="{{ route('home.search')}}" id="postform" enctype="multipart/form-data">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" aria-describedby="searchHelp" placeholder="Inserisci la città">
                    <div class="input-group-append">
                        <button class="btn px-3" id="submit" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <small id="searchHelp" class="form-text">Dove vuoi andare?</small>
            </form>   
        </div>
        <structures-sponsored
        ></structures-sponsored>
       <div class="container">
            <section class="d-flex host-section">
                <div class="col-6 host-text">
                    <h1>Prova ad ospitare</h1>
                    <p class="mb-5">Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunità.</p>
                    @guest
                    <a  href="{{ route('register') }}" class="mybtn myinvisible host-button">Scopri di più</a>
                    @else
                    <a  href="{{ url('/user/structures/') }}" class="mybtn myinvisible host-button">Scopri di più</a>
                    @endguest
                </div>
                <div class="col-6" id="become-host"> 
                </div>
            </section>
       </div>
@endsection
<script>

</script>