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
                    <th>Room No</th>
                    <th>DOJ</th>
                    <th>Rent</th>
                    <th>Security</th>
                    <th>Actions </th>
                  </tr>
                  @php
                      $i=1;
                  @endphp
                  @foreach ($users as $user)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>
                        @foreach($userdata as $data)
                          @if($user['cid']==$data['id']) 
                            {{$data['name']}}
                          @endif
                        @endforeach
                     </td>
                      <td>
                          
                          @foreach ($rooms as $room)
                            @if ($user['rid']==$room['id'])
                                {{$room['rno']}}
                            @endif
                          @endforeach
                          

                      </td>
                      <td>{{date('d-m-Y', strtotime($user->doj))}}</td>
                      <td>{{$user['rent']}}</td>
                      <td>{{$user['security']}}</td>
                      <td>
                        <a href="/admin/edit-location/{{$user['id']}}" class="btn btn-warning">Edit</a> &nbsp;
                        <a href="/admin/delete-location/{{$user['id']}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </table>
            </div>
          </div>
        </div>
      </div>

@endsection