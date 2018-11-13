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
              <form class="form-horizontal" method="POST" action="{{route('admin.add-building')}}" name="basic_validate" id="basic_validate" >@csrf
                <div class="control-group">
                  <label class="control-label">Building Name</label>
                  <div class="controls">
                    <input type="text" name="name" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Building Address</label>
                  <div class="controls">
                    <input type="text" name="address" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Owner Name</label>
                  <div class="controls">
                    <input type="text" name="ownername" required >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Location Select </label>
                  <div class="controls">
                   <select name="location" id="">
                     @foreach ($locations as $location)
                       <option value="{{$location['id']}}">{{$location['location']}}</option>
                     @endforeach
                    
                   </select>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Select Manager</label>
                    <div class="controls">
                     <select name="manager" id="">
                       @foreach ($managers as $manager)
                         <option value="{{$manager['id']}}">{{$manager['name']}}</option>
                       @endforeach
                      
                     </select>
                    </div>
                  </div>
                <div class="form-actions">
                  <input type="submit" value="Add Building" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection