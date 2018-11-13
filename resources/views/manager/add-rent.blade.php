@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Rent</h5>
            </div>
            <div class="widget-content nopadding">
               @include('layouts.message')
              <form class="form-horizontal" method="POST" action="{{route('manager.StoreRent')}}" name="basic_validate" id="basic_validate" >@csrf
                <div class="span5">
                  <div class="control-group">
                      <label class="control-label">Customer Name </label>
                      <div class="controls">
                       <select name="cid" id="UserChange">
                         <option disabled selected>Select User</option>
                         @foreach ($userdata as $data)
                           <option value="{{$data['id']}}">{{$data['name']}}</option>
                         @endforeach
                        
                       </select>
                      </div>
                    </div>
                  </div>
                <div class="span5">
                    <div class="control-group">
                        <label class="control-label">Date</label>
                        <div class="controls">
                          <input type="text" name="paydate" class="todaydatePicker"  >
                        </div>
                    </div>
                </div>
              
                <div id="getRentDeails"></div>

                <div class="span5">
                  <div class="control-group">
                      <label class="control-label">Receipt ID</label>
                      <div class="controls">
                        <input type="text" value="{{$rcptId}}" name="rcpid" readonly >
                      </div>
                  </div>
              </div>

                <div class="span5">
                    <div class="control-group">
                        <label class="control-label">Amount Paid</label>
                        <div class="controls">
                          <input type="text" id="amountPaid" name="amtpaid" required>
                        </div>
                    </div>
                </div>
                
               

                <div class="span5">
                  <div class="control-group">
                      <label class="control-label">Payment Mode</label>
                      <div class="controls">
                        <select name="paymode" id="paymode" required>
                          <option selected disabled>Select Payment Mode</option>
                          <option value="Cash">Cash</option>
                          <option value="Paytm">Paytm</option>
                          <option value="BankTF">Bank Transfer</option>
                          <option value="Other">Other Mode</option>
                        </select>
                      </div>
                  </div>
              </div>
              <div id="getBalance" class="span5"></div> 
              <div id="cmnt" class="span12"></div>
              
             

                <div class="span12">
                <div class="form-actions">
                  <input type="submit" id="submitbtn" value="Add Rent" class="btn btn-success">    
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection