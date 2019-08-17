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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sounds as $sound)
                                    <tr>
                                        <th scope="row">
                                            @if($sound->enabled)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </th>
                                        <td>
                                            {{ $sound->title }}
                                        </td>
                                        <td>
                                            <code>
                                                {{ $sound->file }}
                                            </code>
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
@endpush
