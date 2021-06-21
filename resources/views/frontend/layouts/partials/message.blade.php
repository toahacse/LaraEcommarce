@if($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

@if( Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

@if( Session::has('errors'))
    <div class="alert alert-danger">
        <p>{{ Session::get('errors') }}</p>
    </div>
@endif

@if( Session::has('sticky_error'))
    <div class="alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('sticky_error') }}</p>
    </div>
@endif