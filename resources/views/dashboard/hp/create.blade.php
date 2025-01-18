@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Phone </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Add New Phone</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row">
            <div class="col">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Add Phone</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/dashboard/hp" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="title" required autofocus
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control  @error('slug') is-invalid @enderror"
                                    id="slug" placeholder="Slug" name="slug" required value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control  @error('harga') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="harga"  autofocus
                                    value="{{ old('harga') }}">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <img class="img-preview img-fluid mb-2 col-sm-5">
                                <input class="form-control px-1 py-1 d-block @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                 
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                
                            </div>

                            <div class="form-group">
                                <label for="tanggalRilis">Tahun Rilis</label>
                                <input type="text" class="form-control  @error('tanggalRilis') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="tanggalRilis"  autofocus
                                    value="{{ old('tanggalRilis') }}">
                                @error('tanggalRilis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jaringan">Jaringan</label>
                                <input type="text" class="form-control  @error('jaringan') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="jaringan"  autofocus
                                    value="{{ old('jaringan') }}">
                                @error('jaringan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dimensi">Dimensi</label>
                                <input type="text" class="form-control  @error('dimensi') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="dimensi"  autofocus
                                    value="{{ old('dimensi') }}">
                                @error('dimensi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input type="text" class="form-control  @error('berat') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="berat"  autofocus
                                    value="{{ old('berat') }}">
                                @error('berat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ukuranLayar">Ukuran</label>
                                <input type="text" class="form-control  @error('ukuranLayar') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="ukuranLayar"  autofocus
                                    value="{{ old('ukuranLayar') }}">
                                @error('ukuranLayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="refreshRate">Refresh Rate</label>
                                <input type="text" class="form-control  @error('refreshRate') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="refreshRate"  autofocus
                                    value="{{ old('refreshRate') }}">
                                @error('refreshRate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="resolusi">Resolusi</label>
                                <input type="text" class="form-control  @error('resolusi') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="resolusi"  autofocus
                                    value="{{ old('resolusi') }}">
                                @error('resolusi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="proteksiLayar">Proteksi</label>
                                <input type="text" class="form-control  @error('proteksiLayar') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="proteksiLayar"  autofocus
                                    value="{{ old('proteksiLayar') }}">
                                @error('proteksiLayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="chipset">Chipset</label>
                                <input type="text" class="form-control  @error('chipset') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="chipset"  autofocus
                                    value="{{ old('chipset') }}">
                                @error('chipset')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cpu">CPU</label>
                                <input type="text" class="form-control  @error('cpu') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="cpu"  autofocus
                                    value="{{ old('cpu') }}">
                                @error('cpu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gpu">GPU</label>
                                <input type="text" class="form-control  @error('gpu') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="gpu"  autofocus
                                    value="{{ old('gpu') }}">
                                @error('gpu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ram">RAM</label>
                                <input type="text" class="form-control  @error('ram') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="ram"  autofocus
                                    value="{{ old('ram') }}">
                                @error('ram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="memori">Memori Internal</label>
                                <input type="text" class="form-control  @error('memori') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="memori"  autofocus
                                    value="{{ old('memori') }}">
                                @error('memori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kameraBelakang">Jumlah Kamera Utama</label>
                                <input type="text" class="form-control  @error('kameraBelakang') is-invalid @enderror"
                                id="title" placeholder="Enter Name" name="kameraBelakang"  autofocus
                                value="{{ old('kameraBelakang') }}">
                                @error('kameraBelakang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kameraMpBelakang">Konfigurasi Kamera Utama</label>
                                <input type="text" class="form-control  @error('kameraMpBelakang') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="kameraMpBelakang"  autofocus
                                    value="{{ old('kameraMpBelakang') }}">
                                @error('kameraMpBelakang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kameraDepan">Jumlah Kamera Depan</label>
                                <input type="text" class="form-control  @error('kameraDepan') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="kameraDepan"  autofocus
                                    value="{{ old('kameraDepan') }}">
                                @error('kameraDepan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kameraMpDepan">Konfigurasi Kamera Depan</label>
                                    <input type="text" class="form-control  @error('kameraMpDepan') is-invalid @enderror"
                                        id="title" placeholder="Enter Name" name="kameraMpDepan"  autofocus
                                        value="{{ old('kameraMpDepan') }}">
                                    @error('kameraMpDepan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bluetooth">Bluetooth</label>
                                <input type="text" class="form-control  @error('bluetooth') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="bluetooth"  autofocus
                                    value="{{ old('bluetooth') }}">
                                @error('bluetooth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="infrared">Infrared</label>
                                <input type="text" class="form-control  @error('infrared') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="infrared"  autofocus
                                    value="{{ old('infrared') }}">
                                @error('infrared')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nfc">NFC</label>
                                <input type="text" class="form-control  @error('nfc') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="nfc"  autofocus
                                    value="{{ old('nfc') }}">
                                @error('nfc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gps">GPS (version)</label>
                                <input type="text" class="form-control  @error('gps') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="gps"  autofocus
                                    value="{{ old('gps') }}">
                                @error('gps')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="usb">USB</label>
                                <input type="text" class="form-control  @error('usb') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="usb"  autofocus
                                    value="{{ old('usb') }}">
                                @error('usb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenisBaterai">Jenis Baterai</label>
                                <input type="text" class="form-control  @error('jenisBaterai') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="jenisBaterai"  autofocus
                                    value="{{ old('jenisBaterai') }}">
                                @error('jenisBaterai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kapasitasBaterai">Kapasitas Baterai</label>
                                <input type="text" class="form-control  @error('kapasitasBaterai') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="kapasitasBaterai"  autofocus
                                    value="{{ old('kapasitasBaterai') }}">
                                @error('kapasitasBaterai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fiturCas">Fitur Pengecasan</label>
                                <input type="text" class="form-control  @error('fiturCas') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="fiturCas"  autofocus
                                    value="{{ old('fiturCas') }}">
                                @error('fiturCas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="os">OS(saat rilis)</label>
                                <input type="text" class="form-control  @error('os') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="os"  autofocus
                                    value="{{ old('os') }}">
                                @error('os')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="warna">Warna</label>
                                <input type="text" class="form-control  @error('warna') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="warna"  autofocus
                                    value="{{ old('warna') }}">
                                @error('warna')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="speaker">Speaker</label>
                                <input type="text" class="form-control  @error('speaker') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="speaker"  autofocus
                                    value="{{ old('speaker') }}">
                                @error('speaker')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link Pembelian</label>
                                <input type="text" class="form-control  @error('link') is-invalid @enderror"
                                    id="title" placeholder="Enter Name" name="link"  autofocus
                                    value="{{ old('link') }}">
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>





                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="tambahData">Submit</button>
                        </div>

                        
                    </form>
                </div>
                <!-- /.card -->
                
            </div>
        </div>
    </div>
    
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });


        window.addEventListener("trix-file-accept", function(event) {
            event.preventDefault()
            alert("File attachment not supported!")
        })

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload =function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }        
    </script>
@endsection
