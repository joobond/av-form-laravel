<br><br>
@if($errors->any())
    <div class="alert alert-danger">
        <h3 style="color:#491217"><b>Erros</b></h3>
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif