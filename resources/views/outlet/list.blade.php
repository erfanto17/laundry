@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

<!-- Main Content goes here -->

<a href="{{ route('outlet.create') }}" class="btn btn-primary mb-3"><i class="fas fa-folder-plus"></i></a>

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<table class="table table-bordered table-stripped">
    <thead>
        <tr class="bg-dark text-white">
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @foreach ($outlet as $out)
        <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $out->nama }}</td>
            <td>{{ $out->alamat }}</td>
            <td>{{ $out->no_telp }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('outlet.edit', $out->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('outlet.destroy', $out->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


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