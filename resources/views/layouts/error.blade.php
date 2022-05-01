@if(count($errors)>0)
    <div class="alert alert-danger mb-2" role="alert">
        <strong> Error!</strong>
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
        @php
            header("Refresh:4");
        @endphp
    </div>
@endif