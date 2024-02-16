@extends('layouts.app')

@section('title', 'Comments')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
@include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Comments</h1>
                <div class="section-header-button">
                    <a href="{{ route('comments.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Comments</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Comments <i class="fas fa-comments text-primary"></i></h2>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Testimoni Customer Apps</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form action="{{ route('comments.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="text" name="name_customer" id="name_customer" class="form-control" placeholder="Search">
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
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Subjek</th>
                                            <th>Pesan Komentar</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @if ($customer->image != '')
                                                <td class="text-capitalize pt-2 pb-2"><img src="{{ asset('storage/photo/'. $customer->image ) }}" alt="" width="80" height="80"></td>
                                                @else
                                                <td class="text-capitalize pt-2 pb-2"><img src="{{ asset('img/avatar/avatar-1.png') }}" alt="" width="80" height="80"></td>
                                                @endif
                                                <td class="text-capitalize pt-2 pb-2">{{ $customer->name_customer }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $customer->subject }}</td>
                                                <td class="text-capitalize pt-2 pb-2">{{ $customer->message }}</td>
                                                <td class="pt-2 pb-2">
                                                    <div class="d-flex justify-content-evenly">
                                                        <a href="{{ route('comments.show', $customer->id) }}" class="btn btn-sm btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-comment"></i></a>
                                                        <a href="{{ route('comments.edit', $customer->id) }}" class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('comments.destroy', $customer->id) }}" method="post">
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
                                    {{ $customers->withQueryString()->Links() }}
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
