@extends('layouts.direktur.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Dashboard Saya</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{{ $pengiriman->count() }} Pengiriman Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('direktur.detail.pengiriman') }}">
                    <span class="float-left">Lihat Detail</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>           
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
             <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">{{ $status_pengiriman->count() }} Penerimaan Barang</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('direktur.detail.penerimaan') }}">
                    <span class="float-left">Lihat Detail</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Dashboard
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title">Selamat Datang, {{ Auth::user()->nama }}</h5>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection