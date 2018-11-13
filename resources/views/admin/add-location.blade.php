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
              <form class="form-horizontal" method="POST" action="{{route('admin.add-location') }}" name="basic_validate" id="basic_validate" >@csrf
                <div class="control-group">
                  <label class="control-label">State</label>
                  <div class="controls">
                    <input type="text" name="state" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">City</label>
                  <div class="controls">
                    <input type="text" name="city" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Location(Sector) </label>
                  <div class="controls">
                    <input type="text" name="location" required >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pin </label>
                  <div class="controls">
                    <input type="text" name="pin" required>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add Location" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection