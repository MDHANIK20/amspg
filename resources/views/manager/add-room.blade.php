@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Location</h5>
            </div>
            <div class="widget-content nopadding">
               @include('layouts.message')
              <form class="form-horizontal" method="POST" action="{{route('manager.AddRoom')}}" name="basic_validate" id="basic_validate" >@csrf
                <div class="control-group">
                  <label class="control-label">ROOM No</label>
                  <div class="controls">
                    <input type="text" name="rno" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Total Seat</label>
                  <div class="controls">
                    <input type="text" name="seats" required>
                  </div>
                </div>
               
                <div class="control-group">
                  <label class="control-label">Building </label>
                  <div class="controls">
                   <select name="bid" id="">
                     @foreach ($buildings as $building)
                       <option value="{{$building['id']}}">{{$building['name']}}</option>
                     @endforeach
                    
                   </select>
                  </div>
                </div>
               
                <div class="form-actions">
                  <input type="submit" value="Add Room" class="btn btn-success">    
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection