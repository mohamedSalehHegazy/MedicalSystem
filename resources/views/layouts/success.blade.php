@if(Session::has('success'))
    <div class="alert alert-success mb-4 mt-1" role="alert">
    <strong> Success! </strong>
        {{Session::get('success')}}
            @php
                Session::forget('success');
                header("Refresh:4");
            @endphp
    </div>
@endif