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
                    <th>State</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Pin Code </th>
                    <th>Actions </th>
                  </tr>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($managers as $manager)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$manager['name']}}</td>
                      <td>{{$manager['email']}}</td>
                      <td>{{$manager['profilepic']}}</td>
                      <td>{{$manager['bid']}}</td>
                      <td>
                        <a href="/admin/edit-location/{{$manager['id']}}" class="btn btn-warning">Edit</a> &nbsp;
                        <a href="/admin/delete-location/{{$manager['id']}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection