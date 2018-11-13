
     <div class="control-group">
                  <label class="control-label">Seat</label>
                  <div class="controls">
                      <select name="sno" id="">
                          <option>Select Room</option>
                          @foreach ($rooms as $room)
                              
                            @for ($i =1; $i <= $room['seats']; $i++)
                                @if ($bookings->count()>0)
                                     <option value="{{$i}}" @foreach ($bookings as $booking) @if ($i==$booking->sno) disabled                                          
                                     @endif @endforeach >Seat {{$i}}</option>
                                            
                             
                                @else($bookings->count()=0){
                                        <option value="{{$i}}">Seat {{$i}}</option>
                                    }
                                        
                                 @endif
                            
                            @endfor
                            
                          @endforeach
                         </select>
                  </div>
    </div>
