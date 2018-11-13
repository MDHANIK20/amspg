@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Manager</h5>
            </div>
            <div class="widget-content nopadding">
               @include('layouts.message')
              <form class="form-horizontal" method="POST" action="{{route('admin.add-manager')}}" name="basic_validate" id="basic_validate" >@csrf
                <div class="control-group">
                  <label class="control-label">Manager Name</label>
                  <div class="controls">
                    <input type="text" name="name" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input type="text" name="email" required>
                  </div>
                </div>

                
                  <div class="control-group">
                      <label class="control-label">Role </label>
                      <div class="controls">
                       <select name="role" id="">
                         @foreach ($roles as $role)
                           <option value="{{$role['id']}}">{{$role['name']}}</option>
                         @endforeach
                        
                       </select>
                      </div>
                    </div>

                <div class="control-group">
                  <label class="control-label">Password</label>
                  <div class="controls">
                    <input type="password" name="password" required >
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Confirm Password</label>
                    <div class="controls">
                      <input type="password" name="cpassword" required >
                    </div>
                  </div>
               
                <div class="form-actions">
                  <input type="submit" value="Add Manager" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection