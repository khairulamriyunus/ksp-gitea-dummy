@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Roles & Permissions</h2>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <a class="btn-close" data-bs-dismiss="alert"></a>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ ucfirst($role->name) }}</td>
                        <td>
                            @forelse($role->permissions as $permission)
                                <span class="badge bg-azure-lt me-1">{{ $permission->name }}</span>
                            @empty
                                <span class="text-muted">No permissions</span>
                            @endforelse
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-outline-secondary">
                                Edit Permissions
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection