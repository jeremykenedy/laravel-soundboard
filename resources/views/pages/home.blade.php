@extends('layouts.soundboard')

@section('template_title')
    {!! trans('soundboard.titles.homepage') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('nav')
    <nav-bar></nav-bar>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <sounds-component></sounds-component>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@endsection
