@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['member'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['transaksi'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Paket</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['paket'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<a href="{{ route('generate-data')}}" class="btn btn-secondary mb-3"> <i class="fas fa-fw fa-solid fa-print"></i></a>
<div class="row">
    <div class="col-12">
    <table class="table table-bordered table-stripped">
    <thead>
        <tr class="bg-dark text-white">
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Pelanggan</th>
            <th>Outlet</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Dibayar</th>

        </tr>
    </thead>
    <tbody class="bg-white">
        @foreach ($transaksiPaid as $trx)
        <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $trx->kode_invoice }}</td>
            <td>{{ $trx->member->nama }}</td>
            <td>{{ $trx->outlet->nama }}</td>
            <td>{{ $trx->total_harga}}</td>

            <td>
                @if ($trx->status == 'baru')
                <span class="badge bg-primary text-white" style="padding: 8px; font-size: 12px">{{$trx->status}}</span>
            @endif
            @if ($trx->status == 'proses')
                <span class="badge bg-warning text-white" style="padding: 8px; font-size: 12px">{{$trx->status}}</span>
            @endif
            @if ($trx->status == 'diambil')
                <span class="badge bg-warning text-white" style="padding: 8px; font-size: 12px">{{$trx->status}}</span>
            @endif
            @if ($trx->status == 'selesai')
                <span class="badge bg-success text-white" style="padding: 8px; font-size: 12px">{{$trx->status}}</span>
            @endif
            </td>
            <td>
                @if ($trx->dibayar=='dibayar')
                <span class="badge bg-success text-white" style="padding: 8px; font-size: 12px">{{$trx->dibayar}}</span>
                @else()
                <span class="badge bg-danger text-white" style="padding: 8px; font-size: 12px">{{$trx->dibayar}}</span>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-lg-12 col-12 my-5">
                <h5 class="text-primary"><b>Log Aktivitas Laundry</b></h5>
                <div class="pt-5">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr class="bg-dark text-white">
                                <td>No</td>
                                <td>Log</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->log}}</td>
                                    <td>{{$item->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
