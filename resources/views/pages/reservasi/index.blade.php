@extends('layouts.app')

@section('title', 'Reservasi')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
@include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Reservasi</h1>
                <div class="section-header-button">
                    <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Reservasi</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Reservasi <i class="fas fa-book-open text-primary"></i></h2>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Reservasi Resto</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form action="{{ route('reservasi.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Telp</th>
                                            <th>Waktu</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($reservasi as $reser)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $reser->name }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $reser->phone }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $reser->early_time }} - {{ $reser->end_time }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $reser->date }}</td>
                                                <td class="pt-2 pb-2">
                                                    <div class="d-flex justify-content-evenly">
                                                        {{-- <a href="{{ route('reservasi.show', $reser->id) }}" class="btn btn-sm btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-comment"></i></a> --}}
                                                        <a href="{{ route('reservasi.edit', $reser->id) }}" class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('reservasi.destroy', $reser->id) }}" method="post">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete ml-2" id="delete" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $reservasi->withQueryString()->Links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- JS Libraies --}}
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    {{-- Page Specific JS File  --}}
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
