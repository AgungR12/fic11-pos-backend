@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
@include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Users <i class="fas fa-users text-primary ps-2"></i></h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('user.index') }}" method="get">
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-capitalize">{{ $user->name }}</td>
                                                <td class="text-capitalize">{{ $user->email }}</td>
                                                <td class="text-capitalize">{{ $user->phone }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-between">
                                                        <a href="" class="btn btn-sm btn-warning btn-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Profile"><i class="fas fa-user"></i></a>
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info btn-icon ml-2" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
                                    {{ $users->withQueryString()->Links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
    $('#delete').click(function(){
    var bookid = $(this).attr('data-id');
    var bookname = $(this).attr('data-name');
    Swal.fire({
        title: 'Apa Kamu Yakin ?',
        text: "Ingin Menghapus "+ bookname +"",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus buku !'
      }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/books-delete/"+ bookid +"";
      Swal.fire(
          'Hapus !',
          'File Anda Telah Berhasil Dihapus !.',
          'success'
        )
      }
      })
    });
</script>
@endsection

@push('scripts')
    {{-- JS Libraies --}}
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    {{-- Page Specific JS File  --}}
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
