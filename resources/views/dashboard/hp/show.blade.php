@extends('dashboard.layouts.main')

@section('container')
    <div class="container post">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <h2>{{ $hp->title }}</h2>
                <h5>{{ $hp->penulis }}</h5>

                        @if ($hp->image)
                        <div style="max-height: 400px; overflow: hidden;">
        
                            <img src="{{ asset('storage/' . $hp->image) }}" class="card-img-top"
                            alt="{{ $hp->title }}">
                            {{-- <img src="{{ route('image.displayImage' , $hp->image) }}" class="card-img-top"
                            alt="{{ $hp->category->name }}"> --}}
                        </div>
                        @else
                        <img src="https://source.unsplash.com/1200x400?/smartphone" class="card-img-top"
                            alt="{{ $hp->title }}">
                        @endif

                <article class="my-3 fs-5">
                    <h3 class="text-dark text-center rounded" style="background-color: rgba(0, 255, 255, 0.315)">SPESIFIKASI</h2>
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mb-1 mt-3">UMUM</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Tahun Rilis</td>
                                        <td>{{ $hp->tanggalRilis ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Jaringan</td>
                                        <td>{{ $hp->jaringan ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">BODY</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Dimensi</td>
                                        <td>{{ $hp->dimensi ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Berat</td>
                                        <td>{{ $hp->berat ?? 'Tidak Diketahui' }} gram</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">LAYAR</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Ukuran</td>
                                        <td>{{ $hp->ukuranLayar ?? 'Tidak Diketahui' }} inch</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Refresh Rate</td>
                                        <td>{{ $hp->refreshRate ?? 'Tidak Diketahui' }} hz</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Resolusi</td>
                                        <td>{{ $hp->resolusi ?? 'Tidak Diketahui' }} pixel</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Proteksi</td>
                                        <td>{{ $hp->proteksiLayar ?? 'Tidak Diketahui' }} </td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">HARDWARE</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Chipset</td>
                                        <td>{{ $hp->chipset ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>CPU</td>
                                        <td>{{ $hp->cpu ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>GPU</td>
                                        <td>{{ $hp->gpu ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">MEMORI</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>{{ $hp->ram ?? 'Tidak Diketahui' }} GB</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Memori Internal</td>
                                        <td>{{ $hp->memori ?? 'Tidak Diketahui' }} GB</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">KAMERA UTAMA</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Jumlah Kamera</td>
                                        <td>{{ $hp->kameraBelakang ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Konfigurasi</td>
                                        <td>{{ $hp->kameraMpBelakang ?? 'Tidak Diketahui' }} MP</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">KAMERA DEPAN</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Jumlah Kamera</td>
                                        <td>{{ $hp->kameraDepan ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Konfigurasi</td>
                                        <td>{{ $hp->kameraMpDepan ?? 'Tidak Diketahui' }} MP</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">KONEKTIVITAS</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Bluetooth</td>
                                        <td>{{ $hp->bluetooth ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Infrared</td>
                                        <td>{{ $hp->infrared ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>NFC</td>
                                        <td>{{ $hp->nfc ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>GPS (Version)</td>
                                        <td>{{ $hp->gps ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>USB</td>
                                        <td>{{ $hp->usb ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">BATERAI</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>Jenis Baterai</td>
                                        <td>{{ $hp->jenisBaterai ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Kapasitas</td>
                                        <td>{{ $hp->kapasitasBaterai ?? 'Tidak Diketahui' }} mAh</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Fitur</td>
                                        <td>{{ $hp->fiturCas ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt-5 mb-1">LAINNYA</h5>
                                    </td>
                                </tr>
                                    <tr>
                                        <td>OS (saat rilis)</td>
                                        <td>{{ $hp->os ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Warna</td>
                                        <td>{{ $hp->warna ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Speaker</td>
                                        <td>{{ $hp->speaker ?? 'Tidak Diketahui' }}</td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                                    <tr>
                                        <td>Link Pembelian</td>
                                        <td><a href="{{ $hp->link ?? 'Tidak Diketahui' }}" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i>  LINK</a></td> {{-- Operator null coalescing untuk menghindari error --}}
                                    </tr>
                            </tbody>
                        </table>
                </article>

            </div>
        </div>
    </div>

@endsection

