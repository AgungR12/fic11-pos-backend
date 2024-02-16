@extends('layouts.app')

@section('title', 'Working Edit')

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
                <h1>Forms Working Hours</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Working Hours</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Working Hours Edit <i class="fas fa-clock text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('working.update', $working) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Hari</label>
                                <select name="day" id="day" class="from-control selectric">
                                    <option value="{{ $working->day }}">{{ $working->day }}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Informasi</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="information" value="work" class="selectgroup-input"
                                        @if ($working->information == 'work') checked @endif>
                                        <span class="selectgroup-button">Masuk</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="information" value="holiday" class="selectgroup-input"
                                        @if ($working->information == 'holiday') checked @endif>
                                        <span class="selectgroup-button">Libur</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Zona Waktu</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="time_zone" value="WIB" class="selectgroup-input"
                                        @if ($working->time_zone == 'WIB') checked @endif>
                                        <span class="selectgroup-button">WIB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="time_zone" value="WITA" class="selectgroup-input"
                                        @if ($working->time_zone == 'WITA') checked @endif>
                                        <span class="selectgroup-button">WITA</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="time_zone" value="WIT" class="selectgroup-input"
                                        @if ($working->time_zone == 'WIT') checked @endif>
                                        <span class="selectgroup-button">WIT</span>
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
