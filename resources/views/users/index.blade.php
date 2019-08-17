@extends('layouts.app', ['title' => __('User Management')])

@section('template_title')
    {!! trans('admin.titles.users') !!}
@endsection

@section('content')
    @include('layouts.headers.spaced')

    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Users') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col" class="hidden-xs">{{ __('Email') }}</th>
                                    <th scope="col" >{{ __('Role') }}</th>
                                    <th scope="col" class="hidden-sm hidden-xs">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $aUser)
                                    <tr>
                                        <td>{{ $aUser->name }}</td>
                                        <td class="hidden-xs">
                                            <a href="mailto:{{ $aUser->email }}">{{ $aUser->email }}</a>
                                        </td>
                                        <td>
                                            @foreach ($aUser->roles as $aUser_role)
                                                @if ($aUser_role->name == 'User')
                                                    @php $badgeClass = 'primary' @endphp
                                                @elseif ($aUser_role->name == 'Admin')
                                                    @php $badgeClass = 'warning' @endphp
                                                @elseif ($aUser_role->name == 'Unverified')
                                                    @php $badgeClass = 'danger' @endphp
                                                @else
                                                    @php $badgeClass = 'dark' @endphp
                                                @endif
                                                <span class="badge badge-{{$badgeClass}}">{{ $aUser_role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="hidden-sm hidden-xs">
                                            {{ $aUser->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if ($aUser->id != auth()->id())
                                                        <form action="{{ route('user.destroy', $aUser) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item" href="{{ route('user.edit', $aUser) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="return myConfirm(this.parentElement);">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    @include('scripts.sweatalert-delete-user')
@endpush
