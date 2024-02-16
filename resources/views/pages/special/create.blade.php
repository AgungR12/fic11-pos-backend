@extends('layouts.app')

@section('title', 'Special Package Create')

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
                <h1>Forms Special</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Special</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Special Package create <i class="fas fa-sack-dollar text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('special.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 pb-2">
                                    <img class="rounded img-preview" src="{{ asset('img/noimage.png') }}" alt="" width="300" height="300">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pb-4 pl-4 pt-2 d-block d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary px-4">
                                        <span class="text-capitalize">Pilih Gambar</span>
                                        <input type="file" name="image" id="image" onchange="previewImage()" class="@error('image') is-invalid @enderror">
                                    </button>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Event">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Rp.00">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" placeholder="0">
                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Keterangan" id="floatingTextarea" name="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection

@push('scripts')
@endpush
