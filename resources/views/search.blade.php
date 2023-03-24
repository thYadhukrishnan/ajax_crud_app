@extends('main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<div class="container">
    <label for="">Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Search Name Here...">

    <div id="namelist">

    </div>
</div>


<script>
    $(document).ready(function(){
        $("#name").on("keyup",function(){
            var val=$(this).val();
            $.ajax({
                url:"{{route('search')}}",
                type:"GET",
                data:{'name':val},
                success:function(data){
                    $("#namelist").html(data);

                }
            });
        });

        $(document).on('click','li',function(){
            var val=$(this).text();$
            $("#name").val(val);
            $("#namelist").html("");
        });
    });
</script>


@endsection