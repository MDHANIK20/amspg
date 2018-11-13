@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Expenses</h5>
            </div>
            <div class="widget-content nopadding">
               @include('layouts.message')
              <form class="form-horizontal" method="POST" action="{{route('manager.saveExpenses')}}" name="basic_validate" id="basic_validate" >@csrf
                
                  
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Expense Discription</label>
                  <div class="controls">
                    <input type="text" name="discription" required>
                  </div>
                </div>
               </div>
               <div class="span5">
                <div class="control-group">
                  <label class="control-label">Amount</label>
                  <div class="controls">
                    <input type="text" name="amount"  required>
                  </div>
                </div>
               </div>
               <div class="span5">
                  <div class="control-group">
                    <label class="control-label">Date</label>
                    <div class="controls">
                        <input type="date" name="date" id="todaydatePicker" required readonly>
                    </div>
                  </div>
                 </div>
                 <input type="hidden" value={{$mid}} name="mid">
                <div class="span12">
                  <div class="form-actions">
                    <input type="submit" value="Add Expenses" class="btn btn-success">    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection