@extends('template.main')
@section('content')
    <!-- section title -->
    <section class="container title-container">
        <article class="row">
            <div class="col">
                <h2>{{ $title }}</h2>
            </div>
        </article>
    </section>
    <!-- end section title -->
    <!-- section main content -->
    <section class="container container-content position-relative">
        <div class="row w-100">
            <div class="col custom-card shadow-card overflow-x-auto position-relative">
                <div class="mt-2">
                    <a href="{{ route('absen.instruktur') }}" class="btn btn-success mb-3"><i
                            class="fa-solid fa-plus bold"></i>
                        Tambah</a>
                    <a href="{{ route('absen.export') }}" class="btn btn-success mb-3"><i
                            class="fa-solid fa-circle-down bold"></i>
                        Download</a>
                    <table id="example" class="display hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Sub Keterangan</th>
                                <th>Waktu Absen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @forelse ($dt_absen as $a)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $a['nama'] }}</td>
                                    <td>{{ $a['keterangan'] }}</td>
                                    <td>{{ $a['sub_keterangan'] }}</td>
                                    <td>{{ $a['waktu_absen'] }}</td>
                                    <td>
                                        <form id="deleteForm" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('hapus.absen', $a['id']) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('url.edit.absen', $a['id']) }}" title="Edit"
                                                class="btn btn-info"><i class="fa-solid fa-pen text-white"></i></a>
                                            <button type="submit"title="Hapus" class="btn btn-danger"><i
                                                    class="fa-solid fa-eraser text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Data Absen Tidak Tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success shadow position-absolute top-0" style="right: 27%" onclick="hideElement(this)">
                {{ session('success') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
            </div>
        @endif
    </section>
    <!-- end section main content -->
@endsection
