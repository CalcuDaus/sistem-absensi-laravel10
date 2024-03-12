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
    <section class="container container-content">
        <div class="row w-75">

            <div class="form-bootstrap position-relative custom-card p-3 shadow-card mt-5">
                <form action="{{ $aksi == 'Edit' ? route('edit.siswa', $dt_siswa['id']) : route('tambah.siswa') }}"
                    method="post">
                    @csrf
                    @if ($aksi == 'Edit')
                        @method('put')
                    @endif
                    <?php
                    $siswa_gelombang = $dt_siswa ? $dt_siswa['gelombang'] : '';
                    ?>
                    <div class="bg-primary h2-title-card position-absolute top-0 w-100 start-0 py-3 px-3">
                        <h4>{{ $aksi }} Data siswa</h4>
                    </div>
                    <div class="mb-3 mt-6">
                        <label for="exampleFormControlInput1" class="form-label w-100">Nis
                            <input type="number" name="nis" class="form-control"
                                value="{{ $aksi == 'Edit' ? old('nis', $dt_siswa->nis) : old('nis') }}"
                                id="exampleFormControlInput1" placeholder="..." autocomplete="off" autofocus />
                        </label>
                        @error('nis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Nama
                            <input type="text" name="nama" class="form-control"
                                value="{{ $aksi == 'Edit' ? old('nama', $dt_siswa->nama) : old('nama') }}"
                                id="exampleFormControlInput1" placeholder="..." autocomplete="off" autofocus />
                        </label>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Gelombang
                            <select class="form-select" name="gelombang" aria-label="Default select example">
                                <option selected disabled>-- Pilih Gelombang --</option>
                                <option value="1" {{ $siswa_gelombang == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $siswa_gelombang == '2' ? 'selected' : '' }}>2</option>
                            </select>
                        </label>
                        @error('gelombang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Instuktur
                            <select class="form-select" name="instruktur" aria-label="Default select example">
                                <option selected disabled>-- Pilih Instruktur --</option>
                                @foreach ($dt_instruktur as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $aksi == 'Edit' ? (old('instruktur', $dt_siswa->instruktur_id) == $item->id ? 'selected' : '') : old('instruktur') }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        @error('instruktur')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Sekolah
                            <select class="form-select" name="sekolah" aria-label="Default select example">
                                <option selected disabled>-- Pilih Sekolah --</option>
                                @foreach ($dt_sekolah as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $aksi == 'Edit' ? (old('sekolah', $dt_siswa->sekolah_id) == $item->id ? 'selected' : '') : old('sekolah') }}>
                                        {{ $item->sekolah }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        @error('sekolah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Jurusan
                            <select class="form-select" name="jurusan" aria-label="Default select example">
                                <option selected disabled>-- Pilih Jurusan --</option>
                                @foreach ($dt_jurusan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $aksi == 'Edit' ? (old('jurusan', $dt_siswa->jurusan_id) == $item->id ? 'selected' : '') : old('jurusan') }}>
                                        {{ $item->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        @error('jurusan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Periode
                            <select class="form-select" name="periode" aria-label="Default select example">
                                <option selected disabled>-- Pilih Periode --</option>
                                @foreach ($dt_periode as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $aksi == 'Edit' ? (old('periode', $dt_siswa->periode_id) == $item->id ? 'selected' : '') : old('periode') }}>
                                        {{ $item->periode }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        @error('periode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </section>
    <!-- end section main content -->
@endsection
