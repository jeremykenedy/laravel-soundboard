@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.dashboard') !!}
@endsection

@section('content')
    @include('layouts.headers.dashboard-cards')

    <div class="container-fluid">
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
@endpush
