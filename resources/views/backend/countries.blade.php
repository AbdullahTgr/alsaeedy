
       <div class="table-responsive">
        <table class="table table-bordered" id="click-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
             <th>البلد</th>
             <th>عدد الزيارات</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
             <th>البلد</th>
             <th>عدد الزيارات</th>
              </tr>
          </tfoot>
          <tbody>
 
           
            @foreach($clicks as $click)   
                <tr>
                 @php
                     if($click->prop5==null){
                       $country="No";
                     }else{
                       $country=$click->prop5;
                     }
                 @endphp

                 @if (isset($post_id))
                 <td><a href="{{ route('visito_s',$country.",".$post_id) }}">{{$country}}</a></td>
                 @else
                     <td><a href="{{ route('visito_s',$country) }}">{{$country}}</a></td>
                 @endif
                   
                 
                   <td>{{$click->total}}</td>
                 
                </tr>  
            @endforeach




          </tbody>
        </table>
        
      </div>
    </div>
</div>


