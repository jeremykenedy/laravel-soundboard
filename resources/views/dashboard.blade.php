@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
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
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
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
