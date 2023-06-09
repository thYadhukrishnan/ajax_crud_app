@extends('main')
@section('content')

@csrf
<div id="tbl_data">
@include('pagination1')
</div>
<script>
    $(document).ready(function(){
        $(document).on('click','.page-link',function(event){
            event.preventDefault();

            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        function fetch_data(page){
            var _token=$("input[name=_token]").val();
            $.ajax({
                url:"{{route('fetch')}}",
                method:"POST",
                data:{_token:_token,page:page},
                success:function(data){
                    $("#tbl_data").html(data);
                }
            });
        }
    });

</script>
@endsection