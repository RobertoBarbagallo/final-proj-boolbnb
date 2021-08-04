@if(count($errors->all()) > 0)
<div class="container">
<div class="errors">

  <ul style="list-style-type:none;">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>

</div>
</div>
@endif

