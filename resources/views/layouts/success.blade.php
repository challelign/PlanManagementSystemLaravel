@if(session()->has('success'))
    <div class="alert alert-info text-center" role="alert">
        {{session()->get('success')}}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{session()->get('error')}}
    </div>
@endif
