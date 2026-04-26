@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-auto">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
            </div>
            <div class="col">
                <h2 class="page-title">Edit Permissions — {{ ucfirst($role->name) }}</h2>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Permissions</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table" x-data="rolePermissions()">
                    <thead>
                        <tr>
                            <th>Resource</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Create</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                            <th class="text-center">All</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $resource => $perms)
                        @php
                            $permNames   = $perms->pluck('name')->all();
                            $checkedPerms = $role->permissions->pluck('name')->all();
                            $actions     = ['view', 'create', 'edit', 'delete'];
                        @endphp
                        <tr>
                            <td>{{ ucwords(str_replace('_', ' ', $resource)) }}</td>
                            @foreach($actions as $action)
                            @php $pName = "{$action} {$resource}"; $pId = "perm_" . md5($pName); @endphp
                            <td class="text-center">
                                @if($perms->contains('name', $pName))
                                <input type="checkbox"
                                       class="form-check-input perm-check"
                                       name="permissions[]"
                                       value="{{ $pName }}"
                                       id="{{ $pId }}"
                                       data-resource="{{ $resource }}"
                                       {{ in_array($pName, $checkedPerms) ? 'checked' : '' }}>
                                @endif
                            </td>
                            @endforeach
                            <td class="text-center">
                                <input type="checkbox"
                                       class="form-check-input select-all-row"
                                       data-resource="{{ $resource }}"
                                       title="Select all for {{ $resource }}"
                                       {{ collect($actions)->every(fn($a) => in_array("{$a} {$resource}", $checkedPerms)) ? 'checked' : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-link me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Permissions</button>
            </div>
        </div>
    </form>
</div>

<script>
document.querySelectorAll('.select-all-row').forEach(function(selectAll) {
    var resource = selectAll.dataset.resource;
    selectAll.addEventListener('change', function() {
        document.querySelectorAll('.perm-check[data-resource="' + resource + '"]').forEach(function(cb) {
            cb.checked = selectAll.checked;
        });
    });
});
document.querySelectorAll('.perm-check').forEach(function(cb) {
    cb.addEventListener('change', function() {
        var resource = cb.dataset.resource;
        var allChecked = Array.from(document.querySelectorAll('.perm-check[data-resource="' + resource + '"]'))
            .every(function(c) { return c.checked; });
        var selectAll = document.querySelector('.select-all-row[data-resource="' + resource + '"]');
        if (selectAll) selectAll.checked = allChecked;
    });
});
</script>
@endsection