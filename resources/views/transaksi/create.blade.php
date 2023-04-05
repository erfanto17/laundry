@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

<!-- Main Content goes here -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-12">
                            {{-- <div class="total-price text-center" style="padding: 7px;
                                        background-color: rgb(18, 155, 18);
                                        color:#fff;
                                        border-radius: 20px;
                                        margin-bottom: 20px;">
                                Total: Rp.2000.000
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 col-12">
                            @if (Auth::user()->role=='admin')
                                 <div class="form-group">
                                <label for="outlet">Outlet</label>
                                <select class="form-select form-control @error('id_outlet') is-invalid @enderror" name="id_outlet"
                                    id="id_outlet" placeholder="Outlet" autocomplete="off" value="{{ old('id_outlet') }}">
                                    <option selected name="id_outlet">Outlet</option>
                                    @foreach ($outlet as $otl)
                                    <option value="{{ $otl->id }}">{{ $otl->nama }}</option>
                                    @endforeach
                                    <select>
                                        @error('outlet')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>
                            @endif

                            @if (Auth::user()->role=='kasir')
                                {{-- <div class="form-group">
                                <label for="outlet">Outlet</label>
                                <input type="text" name="id_outlet" id="id_outlet" class="form-control" value="{{ Auth::user()->outlet->nama }}" readonly>
                            </div> --}}

                            <div class="form-group">
                                <label for="outlet">Outlet</label>
                                <select class="form-select form-control @error('id_outlet') is-invalid @enderror" name="id_outlet"
                                    id="id_outlet" placeholder="Outlet" autocomplete="off" value="{{ old('id_outlet') }}">
                                    <option value="{{ Auth::user()->outlet->id }}">{{ Auth::user()->outlet->nama }}</option>

                                    <select>
                                        @error('outlet')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>
                            @endif


                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="outlet">Member</label>
                                <select class="form-select form-control @error('id_member') is-invalid @enderror" name="id_member"
                                    id="id_member" placeholder="Outlet" autocomplete="off" value="{{ old('id_outlet') }}">
                                    <option selected name="id_member">Member</option>
                                    @foreach ($member as $mem)
                                    <option value="{{ $mem->id }}">{{ $mem->nama }}</option>
                                    @endforeach
                                    <select>
                                        @error('member')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4 col-12 float-right">
                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    </div>




                </form>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-body mb-3">
                <form action="{{ route('paket.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pelanggan mb-3">Pesanan ke 1</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="col-7 mt-2">
                                            <div class="form-group">
                                                <label for="nama_paket">Jumlah Barang</label>
                                                <input type="text" style=" border-bottom: 2px solid black;"
                                                    class="form-control @error('nama_paket') is-invalid @enderror"
                                                    name="nama_paket" id="nama_paket" placeholder="nama paket"
                                                    autocomplete="off" value="{{ old('nama_paket') }}">
                                                @error('nama_paket')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5 mt-2">
                                            <div class="form-group">
                                                <label for="jenis">Paket</label>
                                                <select
                                                    class="form-select form-control @error('jenis') is-invalid @enderror"
                                                    name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                                                    value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                                                    <option selected name="jenis">jenis</option>
                                                    <option value="kiloan">Kiloan</option>
                                                    <option value="selimut">Selimut</option>
                                                    <option value="bed_cover">Bed Cover</option>
                                                    <option value="kaos">Kaos</option>
                                                    <option value="lain">Lain</option>

                                                    <select>
                                                        @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-danger float-right w-100">Hapus</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                             <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pelanggan mb-3">Pesanan ke 2</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="col-7 mt-2">
                                            <div class="form-group">
                                                <label for="nama_paket">Jumlah Barang</label>
                                                <input type="text" style=" border-bottom: 2px solid black;"
                                                    class="form-control @error('nama_paket') is-invalid @enderror"
                                                    name="nama_paket" id="nama_paket" placeholder="nama paket"
                                                    autocomplete="off" value="{{ old('nama_paket') }}">
                                                @error('nama_paket')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-5 mt-2">
                                            <div class="form-group">
                                                <label for="jenis">Paket</label>
                                                <select
                                                    class="form-select form-control @error('jenis') is-invalid @enderror"
                                                    name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                                                    value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                                                    <option selected name="jenis">jenis</option>
                                                    <option value="kiloan">Kiloan</option>
                                                    <option value="selimut">Selimut</option>
                                                    <option value="bed_cover">Bed Cover</option>
                                                    <option value="kaos">Kaos</option>
                                                    <option value="lain">Lain</option>

                                                    <select>
                                                        @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-danger float-right w-100">Hapus</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-4 col-12">
                                 <button type="submit" class="btn btn-success w-100 mt-2"
                                style="background-color: rgb(18, 155, 18);">Bayar</button>

                            </div>
                            </div>


                        </div>
                    </div>

                </form>
            </div>

        </div>


    </div> --}}
    {{-- <form action="{{ route('paket.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="total-price text-center" style="padding: 7px;
                            background-color: rgb(18, 155, 18);
                            color:#fff;
                            border-radius: 20px;
                            margin-bottom: 20px;">
                    Total: Rp.2000.000
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="nama_paket">Batas Waktu</label>
                    <input type="date" style=" border-bottom: 2px solid black;"
                        class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                        id="nama_paket" placeholder="nama paket" autocomplete="off"
                        value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="nama_paket">Tanggal Bayar</label>
                    <input type="date" style=" border-bottom: 2px solid black;"
                        class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                        id="nama_paket" placeholder="nama paket" autocomplete="off"
                        value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="jenis">Outlet</label>
                    <select class="form-select form-control @error('jenis') is-invalid @enderror"
                        name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                        value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                        <option selected name="jenis">jenis</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>

                        <select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="jenis">Pelanggan</label>
                    <select class="form-select form-control @error('jenis') is-invalid @enderror"
                        name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                        value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                        <option selected name="jenis">jenis</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>

                        <select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="jenis">Status</label>
                    <select class="form-select form-control @error('jenis') is-invalid @enderror"
                        name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                        value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                        <option selected name="jenis">jenis</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>

                        <select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="jenis">Dibayar</label>
                    <select class="form-select form-control @error('jenis') is-invalid @enderror"
                        name="jenis" id="jenis" placeholder="Jenis " autocomplete="off"
                        value="{{ old('jenis') }}" style=" border-bottom: 2px solid black;">
                        <option selected name="jenis">jenis</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>

                        <select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="nama_paket">Biaya Tambahan</label>
                    <input type="text" style=" border-bottom: 2px solid black;"
                        class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                        id="nama_paket" placeholder="nama paket" autocomplete="off"
                        value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="nama_paket">Pajak</label>
                    <input type="text" style=" border-bottom: 2px solid black;"
                        class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                        id="nama_paket" placeholder="nama paket" autocomplete="off"
                        value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="nama_paket">Diskon</label>
                    <input type="text" style=" border-bottom: 2px solid black;"
                        class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket"
                        id="nama_paket" placeholder="nama paket" autocomplete="off"
                        value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 float-right">
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
        </div>




    </form> --}}
</div>


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
