@extends('layouts.app')

@section('template_title')
    {!! trans('admin.titles.sound-show',['title' => $sound->title]) !!}
@endsection

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
                    <div class="table-responsive pb-6">
                        <table class="table align-items-center table-flush table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th scope="col">Enabled</th>
                                    <th scope="col">File</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="icon icon-shape @if($sound->enabled) bg-success @else bg-gray @endif text-white rounded-circle shadow">
                                            <i class="ni ni-sound-wave"></i>
                                        </div>
                                    </td>
                                    <td>
                                        @if($sound->enabled)
                                            <span class="badge badge-pill badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <code>
                                            {{ $sound->file }}
                                        </code>
                                    </td>
                                    <td>
                                         <audio-player :file="'{{ $sound->file }}'"></audio-player>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('editsound', $sound) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                                @include('forms.delete-sound')
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
