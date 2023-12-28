@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
{{-- <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    function change() {
        var productId = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form when user confirms
                window.location = "/products/" + productId + "";
                document.querySelector('form').submit();
            }
        });
    };
</script> --}}
@include('sweetalert::alert')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">All Products</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Products <i class="fas fa-box-open text-primary"></i></h2>
                <p class="section-lead">
                    You can manage all Products, such as editing, deleting and more
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
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
                                    <form action="{{ route('products.index') }}" method="get">
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @if ($product->image)
                                                <td class="text-capitalize pt-2"><img src="{{ asset('storage/image/'. $product->image ) }}" alt="" width="80" height="80"></td>
                                                @else
                                                <td class="text-capitalize pt-2"><img src="{{ asset('img/no-image.png') }}" alt="" width="80" height="80"></td>
                                                @endif
                                                <td class="text-capitalize">{{ $product->name }}</td>
                                                <td class="text-capitalize">{{ $product->category }}</td>
                                                <td class="text-capitalize">{{ $product->stock }}</td>
                                                <td>Rp. {{ $product->price }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-evenly">
                                                        <a href="" class="btn btn-sm btn-warning btn-icon"><i class="fas fa-box-open"></i></a>
                                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('products.destroy', $product) }}" method="post" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete ml-2" id="deleteBtn" onclick="change()" data-id="{{ $product->id }}" data-name="{{ $product->name }}">
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
                                    {{ $products->withQueryString()->Links() }}
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
