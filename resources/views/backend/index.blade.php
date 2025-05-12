@extends('backend.layouts.master')

@section('header')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tổng số người dùng
                    </h5>
                    <p class="card-text">1,500</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tổng số đơn hàng</h5>
                    <p class="card-text">500</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu</h5>
                    <p class="card-text">$10,000</p>
                </div>
            </div>
        </div>
    </div>


    <h2>Biểu đồ</h2>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection
