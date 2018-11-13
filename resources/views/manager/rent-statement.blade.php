@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
        <h5>Rent Statement</h5>
      </div>
      <div class="widget-content nopadding">
         @include('layouts.message')
        <form class="form-horizontal" method="POST" action="#" name="basic_validate" id="basic_validate" >@csrf
         
            <div class="control-group">
              <label class="control-label">Customer Name </label>
              <div class="controls">
               <select name="bid" id="customerSelect">
                 <option value="" selected disabled>Select Customer</option>
                 @foreach ($users as $user)
                   <option value="{{$user['id']}}">{{$user['name']}}</option>
                 @endforeach
                
               </select>
              </div>
             </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>View Rent Statement</h5>
            </div>
            <div class="widget-content nopadding">
                @include('layouts.message')
                <div id="rentdata"></div>
                
            </div>
          </div>
        </div>
      </div>

@endsection