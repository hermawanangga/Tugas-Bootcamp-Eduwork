@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar User</h1>
    </div>

    {{-- SEARCH --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input type="text"
                   name="search"
                   value="{{ $search }}"
                   class="form-control"
                   placeholder="Cari nama, email, atau ID...">

            <button type="submit" class="btn btn-dark">
                <i class="bi bi-search"></i>
            </button>

            @if($search)
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="card shadow-sm mb-5">
        <div class="card-body p-0">

            {{-- ============================= --}}
            {{-- TAMPILAN TABEL (tablet & desktop) --}}
            {{-- ============================= --}}
            <div class="table-responsive d-none d-md-block">
                <table class="table table-bordered table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th style="width: 120px;">Role</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ sprintf('%04d', $user->id) }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-dark' : 'bg-secondary' }}">
                                    {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    @if($user->id !== Auth::id())
                                        <button type="button"
                                                class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteUserModal{{ $user->id }}">
                                            Hapus
                                        </button>
                                    @endif
                                </div>

                                @if($user->id !== Auth::id())
                                    @include('includes.delete-user-modal')
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                Belum ada user.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ============================= --}}
            {{-- TAMPILAN CARD (mobile) --}}
            {{-- ============================= --}}
            <div class="d-md-none">
                @forelse($users as $user)
                <div class="border-bottom p-3">

                    <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                        <div class="flex-grow-1">
                            <span class="badge bg-secondary mb-1">ID: {{ sprintf('%04d', $user->id) }}</span>
                            <h6 class="fw-semibold mb-0">{{ $user->name }}</h6>
                            <p class="text-muted small mb-0">{{ $user->email }}</p>
                        </div>

                        <span class="badge {{ $user->role === 'admin' ? 'bg-dark' : 'bg-secondary' }}">
                            {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                        </span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="btn btn-warning btn-sm flex-fill">
                            Edit
                        </a>

                        @if($user->id !== Auth::id())
                            <button type="button" class="btn btn-danger btn-sm flex-fill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModalMobile{{ $user->id }}">
                                Hapus
                            </button>
                        @endif
                    </div>

                    @if($user->id !== Auth::id())
                        @include('includes.delete-user-modal', ['modalIdSuffix' => 'Mobile' . $user->id])
                    @endif

                </div>
                @empty
                <div class="p-4 text-center text-muted">
                    Belum ada user.
                </div>
                @endforelse
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-center mb-5">
        {{ $users->links() }}
    </div>

</div>

@endsection