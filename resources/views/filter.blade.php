@extends('main')
@section('content')


<select name="name" id="name">
    <option value="">Select Name</option>
    @foreach ($users as $user)
    <option value="{{$user['id']}}">{{$user->name}}</option>
        
    @endforeach
  
  </select>
  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
  
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
  
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <script>
  $(document).ready(function(){
    $("#name").on('change',function(){
      var name=$(this).val();
      $.ajax({
        url:"{{route('filter')}}",
        type:"GET",
        data:{'name':name},
        success:function(data){
          var users=data.users;
          var html='';
          if(users.length>0){
            for(let i=0;i<users.length;i++){
              html +='<tr>\
                      <td>'+(i+1)+'</td>\
                      <td>'+users[i]['name']+'</td>\
                      <td>'+users[i]['email']+'</td>\
                      </tr>';
  
            }
          }
          else{
            html +='<tr>\
                    <td>No Data</td>\
                    </tr>';
          }
          $("#tbody").html(html);
        }
      });
    });
  });
  </script>










@endsection