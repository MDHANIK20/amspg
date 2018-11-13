<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AMS ACCOMMODATION') }}</title>

    <!-- Scripts -->
    <script src="{{asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
   
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}" />
  
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <table  class="table table-bordered" style="width:680px; margin:10px auto; ">
    <tr>
      <td class="text-center" colspan="2">
        <img src="{{asset('public/img/logo.png')}}" style="max-width:200px; margin:0 auto;"/>
      </td>
    </tr>
    @foreach ($recipts as $receipt)
    <tr>
      <td>  {{$receipt->id}}</td>
      <td>  {{$receipt->cid}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="2" class="text-center">
          <a href="{{ URL::previous() }}" class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i> Go Back</a>
          <a href="../../pdfdownload/{{$receipt->id}}" class="btn btn-success">Download Receipt </a>

      </td>
    </tr>
  </table>
                 
                    
                      
                    
                  
              
               
</body>
</html>