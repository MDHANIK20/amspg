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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Owner Name</th>
                    <th>Location ID </th>
                    <th>Assign Manager </th>
                    <th>Actions </th>
                  </tr>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($buildings as $building)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$building['name']}}</td>
                      <td>{{$building['address']}}</td>
                      <td>{{$building['ownername']}}</td>
                      <td>{{$building['lid']}}</td>
                      <td>{{$building['mid']}}</td>
                      <td>
                        <a href="/admin/edit-location/{{$building['id']}}" class="btn btn-warning">Edit</a> &nbsp;
                        <a href="/admin/delete-location/{{$building['id']}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection