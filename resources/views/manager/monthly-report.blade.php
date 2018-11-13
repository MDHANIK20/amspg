@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>DayBook </h5>
            </div>
            <div class="widget-content nopadding">
                @include('layouts.message')
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <th>Date</th>
                    <th style="min-width:300px;">Discription</th>
                    <th>Receipt No</th>
                    <th>Amount<p>Credit</p>
                    </th>
                    <th>Amount<p>Debit</p>
                    </th>
                  </tr>
                  @php
                  $totalincome = null;
                  $totalexp = null;
                  
                  @endphp
                  @foreach ($incomes as $income)
                  @php
                  
                   $totalincome += $income->amtpaid;
                  @endphp
                 
                  <tr>
                    <td>{{$income->paydate}}</td>
                    <td>Rent Received From <strong>
                      @foreach ($userdata as $data)
                          @if ($data->id==$income->cid)
                          {{$data->name}} </strong> 
                          @endif
                      @endforeach
                      Room No. {{$income->rid}} </td>
                      
                    <td>{{$income->rcpid}}</td>
                    <td>{{$income->amtpaid}}</td>
                    <td>Non</td>
                   
                  </tr>  
                  @endforeach
                  @if (count($expens) > 1)
                  @foreach ($expens as $expense)
                  @php
                  $totalexp +=$expense->amount;
                  @endphp
                  <tr>
                    <td>{{$expense->date}}</td>
                    <td>Paid to <strong>{{$expense->discription}} </td>
                    <td>Non</td>
                    <td>Non</td>
                    <td>{{$expense->amount}}</td>
                   
                  </tr>  
                  
                  @endforeach
                      
                  @endif
                  
                 
                  <tr>
                    <td colspan="3">Total</td>
                    <td>{{$totalincome}}</td>
                    <td>{{$totalexp}}</td>
                    
                  </tr>
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection