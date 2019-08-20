@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sound-edit',['title' => $sound->title]) !!}
@endsection

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
@endphp

@section('content')
    @include('layouts.headers.spaced')

    <div class="container-fluid">
        <div class="row mt--7">
            <div class="col-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <a href="{{ route('sounds') }}" class="btn btn-sm btn-primary float-right">
                                    <i class="fas fa-reply fa-fw"></i>
                                    <span class="hidden-xs">
                                        Back to Sounds
                                    </span>
                                </a>
                                <h3 class="mb-0">
                                    Showing Sounds: <strong>{{ $sound->title }}</strong>
                                </h3>
                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <form method="post" action="{{ route('sounds.update', $sound) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">
                                Sound Information
                            </h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('title', $sound->title) }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="status">
                                        {{ __('Enabled') }}
                                    </label>
                                    <label class="switch {{ $soundActive['checked'] }}" for="status">
                                        <span class="active"><i class="fa fa-toggle-on fa-2x"></i> {{ trans('themes.statusEnabled') }}</span>
                                        <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> {{ trans('themes.statusDisabled') }}</span>
                                        <input type="radio" name="status" value="1" {{ $soundActive['true'] }}>
                                        <input type="radio" name="status" value="0" {{ $soundActive['false'] }}>
                                    </label>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection

@push('js')
    @include('scripts.delete-sound')
    @include('scripts.switch')
@endpush
