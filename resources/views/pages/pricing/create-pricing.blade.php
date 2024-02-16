@extends('layouts.app')

@section('title', 'Pricing Create')

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
                <h1>Forms Pricing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Pricing</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Pricing create <i class="fas fa-sack-dollar text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('pricing.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Paket</label>
                                <input type="text" class="form-control @error('package_name') is-invalid @enderror" name="package_name" id="package_name" placeholder="Nama Paket">
                                @error('package_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Paket</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Harga Paket">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Paket</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nominal" value="Ribu" class="selectgroup-input">
                                        <span class="selectgroup-button">Ribu</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nominal" value="Juta" class="selectgroup-input">
                                        <span class="selectgroup-button">Juta</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nominal" value="Miliar" class="selectgroup-input">
                                        <span class="selectgroup-button">Miliar</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="nominal" value="Triliun" class="selectgroup-input">
                                        <span class="selectgroup-button">Triliun</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Paket</label>
                                <select name="warranty" id="warranty" class="from-control selectric">
                                    <option value="hari">Hari</option>
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="active" class="selectgroup-input" checked="">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="not active" class="selectgroup-input">
                                        <span class="selectgroup-button">Tidak Aktif</span>
                                    </label>
                                </div>
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
