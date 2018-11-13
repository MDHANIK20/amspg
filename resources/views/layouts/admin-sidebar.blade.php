<!--Header-part-->
<div id="header">
  <h1><a href="#">{{ config('app.name', 'AMS ACCOMMODATION') }}</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->name }}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li>
        <a  href="{{route('logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="icon-check"></i> {{ __('Logout') }} </a>  </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf </form>
      
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li>
            <a  href="{{route('logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> {{ __('Logout') }} </a><li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf </form>
            
    
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
      <li class="active"><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      @can('isAdmin')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Location</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('admin/add-location')}}">Add Location</a></li>
          <li><a href="{{route('admin.view-location')}}">View Location</a></li>
          <li><a href="">Edit Location</a></li>
        </ul>
      </li>
      @endcan
      @can('isAdmin')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Managers</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('admin/add-manager')}}">Add Manager</a></li>
          <li><a href="{{route('admin.view-manager')}}">View Manager</a></li>
          <li><a href="">Edit Manager</a></li>
        </ul>
      </li>
      @endcan
     
  @can('isAdmin')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Building</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('admin/add-building')}}">Add Building</a></li>
          <li><a href="{{route('admin.view-building')}}">View Building</a></li>
          <li><a href="">Edit Building</a></li>
        </ul>
      </li>
      @endcan
      @can('isManager')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Rooms</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('manager/add-room')}}">Add Room</a></li>
          <li><a href="{{route('manager.view-room')}}">View Room</a></li>
          <li><a href="">Edit Room</a></li>
        </ul>
      </li>
      @endcan
      @can('isManager')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('manager/add-user')}}">Add User</a></li>
          <li><a href="{{route('manager.view-user')}}">View User</a></li>
          <li><a href="">Edit User</a></li>
        </ul>
      </li>
      @endcan
      @can('isManager')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>User Account</span> <span class="label label-important">3</span></a>
        <ul>
          <li><a href="{{route('manager/add-rent')}}">Add Rent</a></li>
          <li><a href="{{route('manager.view-rent')}}">View Rent</a></li>
          <li><a href="{{route('manager.rent-statement')}}">Rent Statement</a></li>
          
          
        </ul>
      </li>
      @endcan
      @can('isManager')
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manager Account</span> <span class="label label-important">3</span></a>
        <ul>
            <li><a href="{{route('manager.daybook')}}">Daybook</a></li>
            <li><a href="{{route('manager.monthsheet')}}">Monthly Report</a></li>
          
          
        </ul>
      </li>
      @endcan

  </ul>
</div>
<!--sidebar-menu-->

