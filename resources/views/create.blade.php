@extends('main')
@section('content')
<div class="container">

    <form  id="form">
        @csrf
      <div class="form-group">
       
        <label >Name</label>
        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">

      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" name="email" class="form-control"  placeholder="Email">
       
      </div>

      <div class="form-group">
        <label >Phone</label>
        <input type="text" name="phone" class="form-control"  placeholder="Phone">
    </div>

      <button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button>
    </form>
</div> 

<span id="output"></span>

<script>
    $(document).ready(function(){
        $("#form").submit(function(event){
            event.preventDefault();
            var form=$("#form")[0];
            var data=new FormData(form);
            $("#btnsubmit").prop("disabled",true);
            
            $.ajax({
                type:"POST",
                url:"{{route('save')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    $("#output").text(data.res);
                    $("#btnsubmit").prop("disabled",true);
                },
                error:function(e){
                    $("#output").text(e.responseText);
                    //console.log(e.responseText);
                    $("#btnsubmit").prop("disabled",false);
                }
            });
        });
    });
</script>

@endsection