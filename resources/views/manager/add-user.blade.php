@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add User</h5>
            </div>
            <div class="widget-content nopadding">
               @include('layouts.message')
              <form class="form-horizontal" method="POST" action="{{route('manager.addUser')}}" name="basic_validate" id="basic_validate" >@csrf
                
                  <div class="span5">
                    <div class="control-group">
                      <label class="control-label">User Name </label>
                      <div class="controls">
                       <select name="cid" >
                         @foreach ($users as $user)
                           <option value="{{$user['id']}}">{{$user['name']}}</option>
                         @endforeach
                        
                       </select>
                      </div>
                    </div>
                  </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Father Name</label>
                  <div class="controls">
                    <input type="text" name="fname" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">DOB</label>
                  <div class="controls">
                    <input type="text" name="dob" class="todaydatePicker" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Mobile No</label>
                  <div class="controls">
                    <input type="text" name="mob" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">State</label>
                  <div class="controls">
                    <input type="text" name="state" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">City</label>
                  <div class="controls">
                    <input type="text" name="city" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
                    <input type="text" name="add" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Building name</label>
                  <div class="controls">
                    <select name="bid">
                      <option value="{{$buildings->id}}" selected readonly>{{$buildings->name}}</option>
                    </select>
              
                    
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Room No</label>
                  <div class="controls">
                  <select name="rid" id="roomChange">
                    <option selected disabled> Select Room</option>
                      @foreach ($rooms as $room)
                        <option value="{{$room['id']}}">{{$room['rno']}}</option>
                      @endforeach
                     </select>
                  </div>
                </div>
               </div>
               <span id="seat" class="span5"></span>

               <div class="span5">
                <div class="control-group">
                  <label class="control-label">DOJ</label>
                  <div class="controls">
                    <input type="text" name="doj"  class="todaydatePicker" required>
                  </div>
                </div>
               </div>

               

               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Rent</label>
                  <div class="controls">
                    <input type="text" name="rent" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Security</label>
                  <div class="controls">
                    <input type="text" name="security" required>
                  </div>
                </div>
               </div>
               
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Additional Contact No</label>
                  <div class="controls">
                    <input type="text" name="adcno" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">ID Type</label>
                  <div class="controls">
                    <input type="text" name="doctype" required>
                  </div>
                </div>
               </div>

               <div class="span5">
                <div class="control-group">
                  <label class="control-label">ID NO</label>
                  <div class="controls">
                    <input type="text" name="idno" required>
                  </div>
                </div>
               </div>

              
                <div class="span12">
                  <div class="form-actions">
                    <input type="submit" value="Add User" class="btn btn-success">    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection