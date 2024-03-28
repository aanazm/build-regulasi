<div class="content-wrapper container">
    @if ($message = Session::get('success'))
    <div class="alert alert-light-success color-success alert-dismissible show fade">
        <i class="bi bi-check-circle"></i> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    

    @endif


    @if ($message = Session::get('error'))
    <div class="alert alert-light-danger color-danger alert-dismissible show fade">
        <i class="bi bi-exclamation-circle"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @if ($message = Session::get('warning'))
    <div class="alert alert-light-warning color-warning alert-dismissible show fade">
        <i class="bi bi-exclamation-triangle"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @if ($message = Session::get('info'))

    <div class="alert alert-light-info color-info alert-dismissible show fade">
        <i class="bi bi-star"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    @if ($errors->any())
    <div class="alert alert-light-danger color-danger alert-dismissible show fade">
        <i class="bi bi-exclamation-circle"></i> Please check the form below for errors
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>