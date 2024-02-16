@extends('layouts.app')

@section('title', 'Reservasi Edit')

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
                <h1>Forms Reservasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Reservasi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Reservasi edit <i class="fas fa-book-open text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('reservasi.update', $reservasi) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $reservasi->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $reservasi->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $reservasi->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jumlah Orang</label>
                                <input type="text" class="form-control @error('people') is-invalid @enderror" name="people" id="people" value="{{ $reservasi->people }}">
                                @error('people')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="">Waktu Awal</label>
                                    <input type="text" class="form-control @error('early_time') is-invalid @enderror" name="early_time" id="early_time" value="{{ $reservasi->early_time }}">
                                    @error('early_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="col-3">
                                    <label for="">Waktu Akhir</label>
                                    <input type="text" class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time" value="{{ $reservasi->end_time }}">
                                    @error('end_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="col-6">
                                    <label for="">Tanggal</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ $reservasi->date }}">
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Pesan" id="floatingTextarea" name="message">{{ $reservasi->message }}</textarea>
                                @error('message')
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
