@if ($message = Session::get('create'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <p class="m-0">
                    <i class='bx bx-check-circle'></i>
                    {{ $message }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('update'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <p class="m-0">
                    <i class='bx bx-check-double'></i>
                    {{ $message }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('delete'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <p class="m-0">
                    <i class='bx bx-trash'></i>
                    {{ $message }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
