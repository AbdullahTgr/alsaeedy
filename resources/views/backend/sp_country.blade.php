
       <div class="table-responsive">
        <table class="table table-bordered" id="click-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>country</th>
                <th>ip</th>
                <th>po4</th>
                <th>po4</th>
                <th>browser</th>
                <th>governrate</th>
                <th>city</th>
                <th>post code</th>
                <th>lat</th>
                <th>long</th>
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
                   <td><a href="{{ route('visito_s',$country) }}">{{$country}}</a></td>
                 
                   <td>{{$click->prop1}}</td>
                   <td>{{$click->prop2}}</td>
                   <td>{{$click->prop3}}</td>
                   <td>{{$click->prop4}}</td>
                   <td>{{$click->prop6}}</td>
                   <td>{{$click->prop7}}</td>
                   <td>{{$click->prop8}}</td>
                   <td>{{$click->prop9}}</td>
                   <td>{{$click->prop10}}</td>

            
                   
                 
                </tr>  
            @endforeach




          </tbody>
        </table>
        
      </div>
    </div>
</div>


