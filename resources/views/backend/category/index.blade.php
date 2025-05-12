@extends('backend.layouts.master')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="">{{ __('translation.menu.list') }}</h3>
        <div class="me-2">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">{{ __('translation.menu.add') }}</a>
        </div>
    </div>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('translation.category.category_name') }}</th>
                <th>{{ __('translation.menu.image') }}</th>
                <th>{{ __('translation.category.category_description') }}</th>
                <th>{{ __('translation.menu.createdAt') }}</th>
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
                url: '{{ route('admin.category.list') }}',
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
                        let url = '{{ route('admin.category.show', ':id') }}';
                        url = url.replace(':id', row.id);

                        return `<a class="link" href="${url}" title="Chi tiết">${colValue}</a>`;
                    }
                },
                {
                    data: 'image',
                    render: function (colValue) {
                        return `<img src="${colValue}" alt="${colValue}" class="img-fluid" style="width: 50px; height: 50px;">`;
                    }
                },
                {data: 'description'},
                {
                    data: 'created_at',
                    render: function (colValue) {
                        return moment.utc(colValue).local().format('DD/MM/YYYY HH:mm:ss');
                    }
                },
                {
                    data: 'id', orderable: false,
                    render: function (colValue) {
                        let urlAddCoin = '{{ route('admin.category.edit', ':id') }}';
                        urlAddCoin = urlAddCoin.replace(':id', colValue);

                        let urlDelete = '{{ route('admin.category.delete', ':id') }}';
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
