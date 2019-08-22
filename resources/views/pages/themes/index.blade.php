@extends('layouts.app')

@section('template_title')
    {!! trans('themes.titles.index') !!}
@endsection

@section('header_title')
    {!! trans('themes.header.index') !!}
@endsection

@section('content')
    @include('layouts.headers.theme-cards')
    <div class="container-fluid">
        <div class="card mt--7 mb-4">
            <div class="card-header">
                @include('forms.default-theme-form')
            </div>
            <div class="container">
                @include('partials.messages')
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            {!! trans('themes.themesTitle') !!} <strong>{{ count($themes) }}</strong> {!! trans('themes.themes') !!}
                        </h3>
                    </div>
                </div>
            </div>
            @include('partials.theme-table-list')
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
@endpush
