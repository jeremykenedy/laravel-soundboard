@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sounds') !!}
@endsection

@php
    $tableTitles = collect([
        'order'     => trans('admin.sounds.index.table.order'),
        'enabled'   => trans('admin.sounds.index.table.enabled'),
        'title'     => trans('admin.sounds.index.table.title'),
        'file'      => trans('admin.sounds.index.table.file'),
        'yes'       => trans('admin.sounds.index.table.yes'),
        'no'        => trans('admin.sounds.index.table.no'),
        'view'      => trans('admin.sounds.index.table.view'),
        'edit'      => trans('admin.sounds.index.table.edit'),
        'delete'    => trans('admin.sounds.index.table.delete'),
        'modals'    => [
            'delete' => [
                'title'  => trans('admin.modals.delete.title'),
                'text'   => trans('admin.modals.delete.text'),
                'button' => trans('admin.modals.delete.button'),
            ],
            'deleted' => [
                'title'  => trans('admin.modals.deleted.title'),
            ],
        ],
    ]);
@endphp

@section('content')
    @include('layouts.headers.sound-cards')
    <div class="container-fluid">
        <div class="row mt--7">
            <div class="col-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @include('partials.messages')
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">
                                    {{ trans('admin.sounds.index.title') }}
                                </h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('createsound') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    {{ trans('admin.sounds.index.add-new') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <sounds-table :sounds="{{ $sounds }}" :titles="{{ $tableTitles }}"></sounds-table>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
@endpush
