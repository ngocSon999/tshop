@extends('backend.layouts.master')
@section('content')
    <div class="d-flex justify-content-between">
        <h3 class="">{{ __('translation.menu.list') }}</h3>
    </div>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <th data-orderable="false">#</th>
                <th>{{ __('translation.contact.name') }}</th>
                <th>{{ __('translation.contact.email') }}</th>
                <th>{{ __('translation.contact.phone') }}</th>
                <th>{{ __('translation.contact.message') }}</th>
                <th>{{ __('translation.contact.status') }}</th>
                <th>{{ __('translation.menu.createdAt') }}</th>
                <th>{{ __('translation.menu.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    @include('backend.modal.confirm_contact')
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
                url: '{{ route('admin.contact.list') }}',
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
                {
                    data: 'name',
                    render: function (colValue, type, row) {
                        let url = '{{ route('admin.category.show', ':id') }}';
                        url = url.replace(':id', row.id);

                        return `<a class="link" href="${url}" title="Chi tiết">${colValue}</a>`;
                    }
                },
                { data: 'email'},
                { data: 'phone'},
                {
                    data: 'message',
                    render: function (data) {
                        if (typeof data !== 'string') return '';
                        const maxLength = 80;
                        return data.length > maxLength
                            ? data.substring(0, maxLength) + '...'
                            : data;
                    }
                },
                {
                    data: 'status',
                    render: function (colValue, type, row) {
                        let bgClass = 'bg-warning text-dark';

                        if (colValue === 1) bgClass = 'bg-info text-white';
                        else if (colValue === 2) bgClass = 'bg-success text-white';

                        return `
                                <select ${colValue === 2 ? 'disabled' : ''} style="min-width: 105px" class="form-select form-select-sm status-select ${bgClass}" data-id="${row.id}">
                                    <option value="0" ${colValue === 0 ? 'selected' : ''}>{{ __('translation.contact.status_0') }}</option>
                                    <option value="1" ${colValue === 1 ? 'selected' : ''}>{{ __('translation.contact.status_1') }}</option>
                                    <option value="2" ${colValue === 2 ? 'selected' : ''}>{{ __('translation.contact.status_2') }}</option>
                                </select>`;
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
                        let urlSendMail = '{{ route('admin.contact.send_mail') }}';

                        let urlDelete = '{{ route('admin.contact.delete', ':id') }}';
                        urlDelete = urlDelete.replace(':id', colValue);

                        return `<div class="d-flex align-items-center justify-content-center w-100">
                                        <a data-contact_mail="${row.email}" data-id="${row.id}" style="min-width: 82px" class="btn btn-danger btn-sm btn-send-mail" href="${urlSendMail}" title="{{ __('translation.contact.sendMail') }}">{{ __('translation.contact.sendMail') }}</a>
                                        <a data-title="{{ __('translation.confirm.delete') }}" title="{{ __('translation.menu.delete') }}" href="${urlDelete}" class="btn btn-info btn-sm ms-1 btn-delete">
                                            {{ __('translation.menu.delete') }}
                                        </a>
                                    </div>`;
                    }
                },
            ],
        });

        table.on('change', '.status-select', function () {
            const newStatus = $(this).val();
            const contactId = $(this).data('id');

            $.ajax({
                url: `{{ route('admin.contact.update_status') }}`,
                method: 'POST',
                data: {
                    id: contactId,
                    status: newStatus,
                    _token: '{{ csrf_token() }}'
                },
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

        table.on('click', '.btn-send-mail', function (e) {
            e.preventDefault();
            const url = $(this).attr('href');
            const email = $(this).data('contact_mail');
            $('#modal-confirm-contact').modal('show');
            $('#modal-confirm-contact .text-title').text(`{{ __('translation.sendMail.to') }}: ${email}`);
            $('#modal-confirm-contact #email').val(email);
            $('#form-send-mail').attr('action', url);
        });
        $('#modal-confirm-contact').on('submit', '#form-send-mail', function (e) {
            e.preventDefault();
            let form = $('#form-send-mail')[0];
            let formData = new FormData(form);
            $.ajax({
                url: '{{ route('admin.contact.send_mail') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code === 200) {
                        toastr.success(response.message);
                        $('#modal-confirm-contact form')[0].reset();
                        $('#modal-confirm-contact').modal('hide');
                        table.ajax.reload();
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
