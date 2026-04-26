<x-layouts.app title="{{ __('Leave') }}">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Leave') }}</h3>
            <div class="card-options">
                <a href="{{ route('leaves.edit', $record) }}" class="btn btn-sm btn-secondary">{{ __('Edit') }}</a>
            </div>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">
            <a href="{{ route('leaves.index') }}" class="btn btn-link">{{ __('Back') }}</a>
        </div>
    </div>
</x-layouts.app>