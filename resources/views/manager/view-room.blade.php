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
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <th>SN</th>
                    <th>Room No</th>
                    <th>Seats</th>
                    <th>Building ID</th>
                    <th>Actions </th>
                  </tr>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($rooms as $room)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$room['rno']}}</td>
                      <td>{{$room['seats']}}</td>
                      <td>{{$room['bid']}}</td>
                     
                      <td>
                        <a href="/admin/edit-location/{{$room['id']}}" class="btn btn-warning">Edit</a> &nbsp;
                        <a href="/admin/delete-location/{{$room['id']}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection