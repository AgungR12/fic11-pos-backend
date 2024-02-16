@extends('layouts.app')

@section('title', 'Comments Show')

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
                <h1>Forms Comment</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Comment</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"> Comment Detail <i class="fas fa-comments text-primary"></i></h2>
                <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-3 pb-2 d-flex align-items-center">
                                    <img class="rounded img-preview" src="{{ asset('img/avatar/avatar-1.png') }}" alt="" width="150" height="150">
                                </div>
                                <div class="col-8 pb-2">
                                    <ul class="list-group" style="list-style: none">
                                        <li class="nav-item text-capitalize">{{ $customer->name_customer }}</li>
                                        <li class="nav-item text-capitalize">{{ $customer->email }}</li>
                                        <li class="nav-item text-capitalize">{{ $customer->subject }}</li>
                                        <li class="nav-item text-capitalize">{{ $customer->message }}</li>
                                        <li class="nav-item text-capitalize">{{ $customer->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
