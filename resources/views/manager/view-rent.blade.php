@extends('layouts.commondash')
@section('content')
<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>View Rent</h5>
            </div>
            <div class="widget-content nopadding">
                @include('layouts.message')
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Paid Date</th>
                    <th>Paid Amount</th>
                    <th>Balance</th>
                    <th>Paymode</th>
                    <th>Comment</th>
                    <th>Actions </th>
                  </tr>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($rents as $rent)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>@foreach ($userdata as $data)
                          @if( $rent->cid== $data->id)
                              Rent Received From <strong>{{$data->name}}</strong>
                          @endif
                      @endforeach</td>
                      <td>{{$rent->paydate}}</td>
                      <td>{{$rent->amtpaid}}</td>
                      <td>{{$rent->balance}}</td>
                      <td>{{$rent->paymode}}</td>
                      <td>{{$rent->cmnt}}</td>
                      
                      <td>
                        <a href="view-rent-receipt/{{$rent['id']}}/edit" class="btn btn-warning">View Receipt</a> &nbsp;
                        <a href="/admin/delete-location/{{$rent['id']}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection