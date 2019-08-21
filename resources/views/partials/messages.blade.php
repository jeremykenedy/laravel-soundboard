@if(session()->has('errors'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon">
                <i class="ni ni-like-2"></i>
            </span>
            <span class="alert-inner--text">
                {!! trans('messages.errors.list-title') !!}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

@if(session()->has('error'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove" aria-hidden="true"></i>
            </button>
            <h6>
                <i class="nc-icon nc-alert-circle-i mr-1" aria-hidden="true"></i>
                {!! trans('messages.errors.single-title') !!}
            </h6>
            <p>
                {!! session('error') !!}
            </p>
        </div>
    </div>
</div>
@endif

@if(session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-inner--text">{!! trans('messages.success.single-title') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>
                    {!! session('success') !!}
                </p>
            </div>
        </div>
    </div>
@endif
