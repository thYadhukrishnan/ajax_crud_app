<table class="table">
    <tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    </tr>

    @foreach ($address as $add)
    <tr>
        <td>{{$address->firstItem() + $loop->index}}</td>
        <td>{{$add->name}}</td>
        <td>{{$add->email}}</td>
        <td>{{$add->phone}}</td>
    </tr>
        
    @endforeach
</table>

<div>{{$address->links()}}</div>

