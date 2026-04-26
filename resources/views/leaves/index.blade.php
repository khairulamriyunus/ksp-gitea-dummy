{{-- Requires: yajra/laravel-datatables:^11.0 in the generated app --}}
<x-layouts.app title="{{ __('Leave') }}">

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="leaves-table" class="table table-vcenter card-table w-100">
                    <thead>
                        <tr>


                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.css">
    @endpush
    @push('scripts')
        <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new DataTable('#leaves-table', {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('leaves.data') }}',
                        data: function (d) {
                        }
                    },
                    pageLength: 25,
                    order: [[0, 'desc']],
                    columns: [
                    
                    ]
                });
            });
        </script>
    @endpush
</x-layouts.app>