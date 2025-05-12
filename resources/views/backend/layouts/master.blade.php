<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link href="{{ asset('/access/library/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('/access/library/datatable/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/access/backend/css/style.css') }}">
    @yield('style')
    <style>
        .modal.show .modal-dialog {
            transform: translateY(50%);
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }
        .alert-timer-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background-color: rgba(0, 0, 0, 0.2);
            animation: timer-bar-animation 5s linear forwards;
        }
        @keyframes timer-bar-animation {
            from { width: 100%; }
            to { width: 0 }
        }

        .alert.fade-out {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        th.no-sort.sorting::before,
        th.no-sort.sorting::after,
        th.no-sort.sorting_asc::before,
        th.no-sort.sorting_asc::after,
        th.no-sort.sorting_desc::before,
        th.no-sort.sorting_desc::after {
            display: none !important;
        }

        table.dataTable thead>tr>th.sorting:before, table.dataTable thead>tr>th.sorting_asc:before, table.dataTable thead>tr>th.sorting_desc:before, table.dataTable thead>tr>th.sorting_asc_disabled:before, table.dataTable thead>tr>th.sorting_desc_disabled:before, table.dataTable thead>tr>td.sorting:before, table.dataTable thead>tr>td.sorting_asc:before, table.dataTable thead>tr>td.sorting_desc:before, table.dataTable thead>tr>td.sorting_asc_disabled:before, table.dataTable thead>tr>td.sorting_desc_disabled:before {
            color: #0d6efd;
        }
        table.dataTable thead>tr>th.sorting:after, table.dataTable thead>tr>th.sorting_asc:after, table.dataTable thead>tr>th.sorting_desc:after, table.dataTable thead>tr>th.sorting_asc_disabled:after, table.dataTable thead>tr>th.sorting_desc_disabled:after, table.dataTable thead>tr>td.sorting:after, table.dataTable thead>tr>td.sorting_asc:after, table.dataTable thead>tr>td.sorting_desc:after, table.dataTable thead>tr>td.sorting_asc_disabled:after, table.dataTable thead>tr>td.sorting_desc_disabled:after {
            color: #0d6efd;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('backend.layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 px-md-4 content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <button class="btn toggle-sidebar-btn d-md-none" title="menu">
                    <i class="bi bi-list"></i>
                </button>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe me-2"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownLanguage">
                        <li><a class="dropdown-item" href="{{ route('admin.change_language', $locale = 'vi') }}">Tiếng Việt</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.change_language', $locale = 'en') }}">Tiếng Anh</a></li>
                    </ul>
                </div>
                <div>
                    <a target="_blank" style="text-decoration: none" href="/"><i class="bi bi-hdd-network"></i> Website</a>
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Chia sẻ</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Xuất</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-calendar-plus"></i> Thêm mới
                    </button>
                </div>
                @yield('header')
            </div>
            @yield('content')
        </main>
    </div>
</div>
@include('backend.modal.delete')
@include('backend.modal.message')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('/access/library/jquery/jquery-3.7.1.min.js') }}"></script>
<!-- DataTables JS -->
<script src="{{ asset('/access/library/datatable/jquery.dataTables.min.js') }}"></script>
<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

<script src="{{ asset('/access/backend/js/script.js') }}"></script>

@yield('js')

<script>
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let title = $(this).data('title');
        $('#modal-delete').modal('show');
        $('#modal-delete .text-title').text(title);
        $('#modal-delete .btn-confirm').attr('href', url);
    });
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.querySelectorAll('.auto-dismiss-alert').forEach(function (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade-out');
                setTimeout(() => alert.remove(), 500);
            });
        }, 4000);
    });
</script>
</body>
</html>
