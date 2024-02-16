@extends('layouts.app')

@section('title', 'Product Show')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<style>
    #image[type="file"]{
  cursor: pointer;
  position: absolute;
  left: 38px;
  top:5px;
  right: 100px;
  width: 200px;
  opacity: 0;
}
</style>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Forms Detail</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">{{ $product->name }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Product <i class="fas fa-box-open text-primary"></i></h2>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-capitalize text-primary text-center">Menu {{ $product->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-4">
                                @if ($product->image)
                                    <td class="text-capitalize pt-2 "><img src="{{ asset('storage/image/'. $product->image ) }}" alt="" width="300" height="300"></td>
                                @else
                                    <td class="text-capitalize pt-2"><img src="{{ asset('img/no-image.png') }}" alt="" width="300" height="300"></td>
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-3">
                                        <h5>Kategori:</h5>
                                        <h5>Harga:</h5>
                                        <h5>Stok:</h5>
                                        <h5>Deskripsi:</h5>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="text-capitalize pb-2">{{ $product->category }}</h6>
                                        <h6 class="text-capitalize pb-2">Rp. {{ $product->price }}</h6>
                                        <h6 class="text-capitalize pb-2">{{ $product->stock }}</h6>
                                        <h6 class="text-capitalize pb-2">{{ $product->description }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
