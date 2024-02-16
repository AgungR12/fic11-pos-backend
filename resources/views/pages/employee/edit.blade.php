@extends('layouts.app')

@section('title', 'Employee Edit')

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
                <h1>Forms Employee</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Employee</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Employee edit <i class="fas fa-comments text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('employee.update', $employee) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 pb-2">
                                    @if ($employee->image != '')
                                        <img class="rounded img-preview" src="{{ asset('storage/photo/'.$employee->image) }}" alt="" width="150" height="150">
                                    @else
                                        <img class="rounded img-preview" src="{{ asset('img/avatar/avatar-1.png') }}" alt="" width="150" height="150">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pb-4 pl-4 pt-2 d-block">
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
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $employee->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $employee->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="work" id="work" class="from-control selectric">
                                    <option value="{{ $employee->work }}">{{ $employee->work }}</option>
                                    @foreach ($work as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter" value="{{ $employee->twitter }}">
                                @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram" value="{{ $employee->instagram }}">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{ $employee->facebook }}">
                                @error('facebook')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="active" class="selectgroup-input"
                                        @if($employee->status == 'active') checked @endif>
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="not active" class="selectgroup-input"
                                        @if($employee->status == 'not active') checked @endif>
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
