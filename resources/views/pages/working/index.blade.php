@extends('layouts.app')

@section('title', 'Working Hours')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
@include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Working Hours</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('working.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Working Hours</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Working Hours <i class="fas fa-clock text-primary"></i></h2>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Working Hours</h4>
                            </div>
                            <div class="card-body">
                                {{-- <div class="float-right">
                                    <form action="{{ route('description.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        ...
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Hari</th>
                                            <th>Informasi</th>
                                            <th>Zona Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($working as $hours)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{ $hours->day }}</td>
                                                <td class="text-capitalize">
                                                    @if ($hours->information == 'work')
                                                        {{ $hours->information }}
                                                    @elseif($hours->information == 'holiday')
                                                        {{ $hours->information }}
                                                    @endif
                                                </td>
                                                <td class="text-capitalize">{{ $hours->time_zone }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-evenly">
                                                        <a href="{{ route('working.edit', $hours->id) }}" class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('working.destroy', $hours->id) }}" method="post">
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
                                    {{ $working->withQueryString()->Links() }}
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
