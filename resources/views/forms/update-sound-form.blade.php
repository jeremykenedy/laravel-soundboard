@php
    $soundActive = [
        'checked' => '',
        'value' => 0,
        'true'  => '',
        'false' => 'checked'
    ];
    if($sound->enabled == 1) {
        $soundActive = [
            'checked' => 'checked',
            'value' => 1,
            'true'  => 'checked',
            'false' => ''
        ];
    }

    $soundStatus = 1;
    if(!$sound->enabled) {
        $soundStatus = 0;
    }
@endphp

<form method="post" action="{{ route('sounds.update', $sound) }}" autocomplete="off">
    @csrf
    @method('put')
    <h6 class="heading-small text-muted mb-4">
        Sound Information
    </h6>
    <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $sound->title) }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('enabled') ? ' has-danger' : '' }}">
            <label class="switch {{ $soundActive['checked'] }}" for="enabled">
                <span class="active"><i class="fa fa-toggle-on fa-2x"></i> {{ __('Enabled') }}</span>
                <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> {{ __('Disabled') }}</span>
                <input type="radio" name="enabled" value={{ $soundStatus }} checked />

            </label>
            @if ($errors->has('enabled'))
                <span class="help-block">
                    <strong>{{ $errors->first('enabled') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="pl-lg-4">
        <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
            <div class="input-group">
                 <a id="lfm" data-input="file" data-preview="holder" class="btn btn-primary text-white btn-input">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
                <input id="file" class="form-control" type="text" name="file" value="{{ old('file', $sound->file) }}" readonly>
                @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="pl-lg-4">
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>