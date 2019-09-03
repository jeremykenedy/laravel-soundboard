@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sound-create') !!}
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
                        <div class="rlaraow align-items-center">
                            <div class="col">

                                <a href="{{ route('sounds') }}" class="btn btn-sm btn-primary float-right">
                                    <i class="fas fa-reply fa-fw"></i>
                                    <span class="hidden-xs">
                                        {!! trans('admin.sounds.create.back') !!}
                                    </span>
                                </a>
                                <h3 class="mb-0">
                                    {!! trans('admin.sounds.record.title') !!}
                                </h3>

                            </div>
                        </div>
                    </div>
                    <sound-recorder></sound-recorder>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
@endpush
@section('js')
{{--
    @include('scripts.file-manager')
--}}
@endsection
