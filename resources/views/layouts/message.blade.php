@if (count($errors)>0)
@foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

@if(Session::has('message'))

<div class="alert alert-success alert-dismissible fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong> {{ Session::get('message') }} </strong> 
   </div>
@endif