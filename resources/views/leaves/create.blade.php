<x-layouts.app title="{{ __('Leave') }}">
    <form method="POST" action="{{ route('leaves.store') }}" class="card">
        @csrf
        <div class="card-header">
            <h3 class="card-title">{{ __('Leave') }}</h3>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer text-end">
            <a href="{{ route('leaves.index') }}" class="btn btn-link">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        </div>
    </form>
</x-layouts.app>