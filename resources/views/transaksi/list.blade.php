@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

<!-- Main Content goes here -->

<a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3"><i class="fas fa-folder-plus"></i></a>

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

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
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @foreach ($transaksi as $trx)
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
            <td>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('transaksi.edit', $trx->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('transaksi.destroy', $trx->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <a href="{{ url('/admin/laporan-transaksi/'. $trx->kode_invoice) }}" class="btn btn-sm btn-secondary ml-2"><i class="fas fa-edit"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- {{ $users->links() }} --}}

<!-- End of Main Content -->
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
    {{ session('warning') }}
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
@endpush
