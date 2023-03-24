@extends('main')
@section('content')


<table id="datatable" class="table">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>

      </tr>
</table>

<span id="output"> </span>

<script>
    $(document).ready(function(){
        $.ajax({
            type:"GET",
            url:"{{route('read')}}",
            success:function(data){
                console.log(data);
                if(data.data.length > 0){
                    for(let i=0;i<data.data.length;i++){
                        $("#datatable").append(`<tr>
                            <td>`+(i+1)+`</td>
                            <td>`+data.data[i]['name']+`</td>
                            <td>`+data.data[i]['email']+`</td>
                            <td>`+data.data[i]['phone']+`</td>
                            <td><a href="edit/`+(data.data[i]['id'])+`" class="btn btn-primary">Edit</a>
                            <a href="#" id ="delete" data-id="`+(data.data[i]['id'])+`" class="btn btn-danger">Delete</a></td>
                            </tr>`);
                    }
                }
                else{
                    $("#datatable").append("<tr><td>No data</td></tr>");
                }
            },
            error:function(err){
                console.log(err.responseText);
            }
        });

        $("#datatable").on("click","#delete",function(){
            var id =$(this).attr("data-id");
            var obj=$(this);
            $.ajax({
                type:"GET",
                url:"delete/"+id,
                success:function(data){
                    $(obj).parent().parent().remove();
                    $("#outout").text(data.res);
                },
                error:function(err){
                    console.log(err.responseText);
                }
            });
        })

    });
</script>

@endsection



