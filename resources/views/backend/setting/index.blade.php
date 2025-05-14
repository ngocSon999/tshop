@extends('backend.layouts.master')
@section('style')
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="">{{ __('translation.menu.list') }}</h3>
    </div>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th data-orderable="false">#</th>
                <th>{{ __('translation.setting.key') }}</th>
                <th>{{ __('translation.setting.value') }}</th>
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
                url: '{{ route('admin.setting.list') }}',
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
                {data: 'key'},
                {
                    data: 'value',
                    render: function (colValue, type, row) {
                        if(row.key !== 'logo') {
                            return `<input type="text" name="${row.key}" class="form-control" value="${row.value}">`;
                        } else {
                            return `<img src="${row.value}" alt="Logo" style="width: 50px; height: 50px;">
                                    <input type="file" class="form-control" name="${row.key}">`;
                        }
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
                    render: function (colValue, type, row) {
                        let urlAddCoin = '{{ route('admin.setting.update', ':id') }}';
                        urlAddCoin = urlAddCoin.replace(':id', colValue);

                        let urlDelete = '{{ route('admin.setting.delete', ':id') }}';
                        urlDelete = urlDelete.replace(':id', colValue);

                        return `<div class="d-flex align-items-center justify-content-center w-100">
                                        <a type=button class="btn btn-danger btn-sm btn-update" data-id="${row.id}" href="${urlAddCoin}" title="{{ __('translation.menu.update') }}">{{ __('translation.menu.update') }}</a>
                                        <a data-title="{{ __('translation.confirm.delete') }}" title="{{ __('translation.menu.delete') }}" href="${urlDelete}" class="btn btn-info btn-sm ms-1 btn-delete">
                                            {{ __('translation.menu.delete') }}
                                        </a>
                                    </div>`;
                    }
                },
            ],
        });

        $(document).on('click', '.btn-update', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let tr = $(this).closest('tr');
            let inputFile = tr.find('input[type="file"]');
            let inputText = tr.find('input[type="text"]');

            let formData = new FormData();
            // Nếu có file input (logo)
            if (inputFile.length > 0 && inputFile[0].files.length > 0) {
                let name = inputFile.attr('name');
                formData.append(name, inputFile[0].files[0]);
            }

            // Nếu có text input
            if (inputText.length > 0) {
                let name = inputText.attr('name');
                formData.append(name, inputText.val());
            }
            console.log(formData);
            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code === 200) {
                        table.ajax.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });
    </script>
@endsection
