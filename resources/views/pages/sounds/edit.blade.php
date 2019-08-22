@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sound-edit',['title' => $sound->title]) !!}
@endsection

@section('content')
    @include('layouts.headers.spaced')
    <div class="container-fluid">
        <div class="row mt--7">
            <div class="col-12 mb-3 mb-xl-0 mt--6">
                @include('partials.messages')
            </div>
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
                        @include('forms.update-sound-form')
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    @include('scripts.delete-sound')
@endpush
@section('js')
    @include('scripts.switch')
    @include('scripts.file-manager')
@endsection