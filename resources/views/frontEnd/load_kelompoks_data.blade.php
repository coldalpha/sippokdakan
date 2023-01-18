<div id="load" style="position: relative;">
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Book Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kelompoks as $kelompok)
            
            <tr>
                <td width="50px">
                {{$kelompok[0]->id}}</th>
                <td>{{$kelompok[0]->nama }}</td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
</div>

{!! $kelompok->render() !!}
