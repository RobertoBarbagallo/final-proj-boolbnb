@extends('layouts.app')

<<<<<<< HEAD
@section('content')
    <guest-search
    :name = "{{json_encode($name,TRUE)}}"
    >
    </guest-search>

@endsection    
=======
@dump($name)
@dump($structures)


@section('content')

@endsection
>>>>>>> 3c557b5c3c7cb9f57b6b2dfd4b5ea79adaa2ef31
