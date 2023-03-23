@extends('main')
@section('content')
<div class="container">
    <form  id="form1">
        @csrf
      <div class="form-group">
       
        <input type="hidden" name="id" value="{{ $address->id }}">

        <label >Name</label>
        <input type="text" name="name" value="{{$address->name}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">

      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" name="email" value="{{$address->email}}" class="form-control"  placeholder="Email">
       
      </div>

      <div class="form-group">
        <label >Phone</label>
        <input type="text" name="phone" value="{{$address->phone}}" class="form-control"  placeholder="Phone">
    </div>

      <button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button>
    </form>
</div> 

<span id="output"></span>

<script>
$(document).ready(function(){
        $("#form1").submit(function(event){
            event.preventDefault();
            var form=$("#form1")[0];
            var data=new FormData(form);

            
            $.ajax({
                type:"POST",
                url:"{{route('update')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    $("#output").text(data.res);

                },
                error:function(e){
                    $("#output").text(e.responseText);
                    console.log(e.responseText);

                }
            });
        });
    });
</script>

@endsection