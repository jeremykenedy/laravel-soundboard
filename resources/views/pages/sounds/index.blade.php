@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sounds') !!}
@endsection

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
                                    Sounds
                                </h3>
                            </div>
                            <div class="col text-right">

                                <a href="#!" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Enabled</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">File</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sounds as $sound)
                                    <tr>
                                        <td scope="row">
                                            @if($sound->enabled)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            {{ $sound->title }}
                                        </td>
                                        <td>
                                            <code>
                                                {{ $sound->file }}
                                            </code>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('showsound', $sound) }}">
                                                        {{ __('View') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('editsound', $sound) }}">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    @include('forms.delete-sound')
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
