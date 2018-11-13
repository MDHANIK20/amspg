        @php
            $i=1;
        @endphp
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
        @foreach($rents as $rent)
        <tr>
            <td>{{$i++}}</td>  
            <td>{{$rent->cid}}</td>  
            <td>{{$rent->rid}}</td>  
            <td>{{$rent->rcpid}}</td>  
            <td>{{$rent->amtpaid}}</td> 
            <td>{{$rent->cmnt}}</td> 
            <td>{{$rent->paydate}}</td>  
        </tr>
        @endforeach
       
      </table>

