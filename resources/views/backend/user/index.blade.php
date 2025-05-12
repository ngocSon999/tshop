@extends('backend.layouts.master')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="">{{ __('translation.menu.list') }}</h3>
        <div class="me-2">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">{{ __('translation.menu.add') }}</a>
        </div>
    </div>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('translation.user.name') }}</th>
                <th>{{ __('translation.user.email') }}</th>
                <th>{{ __('translation.user.phone') }}</th>
                <th>{{ __('translation.menu.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@section('js')
    <script>
        $.fn.dataTable.ext.errMode = 'throw';
        let table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            "oLanguage": {
                "sLengthMenu": "Display _MENU_ record",
            },

            ajax: {
                url: '{{ route('admin.user.list') }}',
                data: function (d) {
                }
            },
            columns: [
                {
                    data: 'id', orderable: false, className: 'no-sort',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'name',
                    render: function (colValue, type, row) {
                        let url = '{{ route('admin.user.show', ':id') }}';
                        url = url.replace(':id', row.id);

                        return `<a class="link" href="${url}" title="Chi tiết">${colValue}</a>`;
                    }
                },
                {data: 'email'},
                {data: 'phone'},
                {
                    data: 'id', orderable: false,
                    render: function (colValue) {
                        let urlAddCoin = '{{ route('admin.user.edit', ':id') }}';
                        urlAddCoin = urlAddCoin.replace(':id', colValue);

                        let urlDelete = '{{ route('admin.user.delete', ':id') }}';
                        urlDelete = urlDelete.replace(':id', colValue);

                        return `<div class="d-flex align-items-center justify-content-center w-100">
                                        <a type=button class="btn btn-danger btn-sm" href="${urlAddCoin}" title="{{ __('translation.menu.edit') }}">{{ __('translation.menu.edit') }}</a>
                                        <a data-title="{{ __('translation.confirm.delete') }}" title="{{ __('translation.menu.delete') }}" href="${urlDelete}" class="btn btn-info btn-sm ms-1 btn-delete">
                                            {{ __('translation.menu.delete') }}
                                        </a>
                                    </div>`;
                    }
                },
            ],
        });
    </script>
@endsection
