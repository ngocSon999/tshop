@extends('backend.layouts.master')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="">{{ __('translation.menu.list') }}</h3>
        <div class="me-2">
            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary btn-sm">{{ __('translation.menu.add') }}</a>
        </div>
    </div>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th data-orderable="false">#</th>
                <th>{{ __('translation.slider.name') }}</th>
                <th>{{ __('translation.slider.title') }}</th>
                <th>{{ __('translation.slider.link') }}</th>
                <th>{{ __('translation.menu.image') }}</th>
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
                url: '{{ route('admin.slider.list') }}',
                data: function (d) {
                }
            },
            columns: [
                {
                    data: null,
                    orderable: false,
                    className: 'no-sort',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {data: 'name'},
                {data: 'title'},
                {
                    data: 'link',
                    render: function (colValue) {
                        return `<a href="${colValue}" target="_blank">${colValue}</a>`;
                    }
                },
                {
                    data: 'image',
                    render: function (colValue) {
                        return `<img src="${colValue}" alt="" class="img-fluid" style="width: 50px; height: 50px;">`;
                    }
                },
                {
                    data: 'created_at',
                    render: function (colValue) {
                        return moment.utc(colValue).local().format('DD/MM/YYYY');
                    }
                },
                {
                    data: 'id', orderable: false,
                    render: function (colValue) {
                        let urlAddCoin = '{{ route('admin.slider.edit', ':id') }}';
                        urlAddCoin = urlAddCoin.replace(':id', colValue);

                        let urlDelete = '{{ route('admin.slider.delete', ':id') }}';
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
