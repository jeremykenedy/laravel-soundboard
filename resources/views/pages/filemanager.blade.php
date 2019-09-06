@extends('layouts.app')

@section('template_title')
    {{-- {!! trans('admin.titles.dashboard') !!} --}}
    File Manager
@endsection

@section('content')
    @include('layouts.headers.files-cards')
    <iframe src="/laravel-filemanager" style="width: 100%; height: 55vh; overflow: hidden; border: none;"></iframe>
    <div class="container-fluid">
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
@endpush
