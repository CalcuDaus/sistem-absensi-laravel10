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
        <h2>Siswa</h2>
        <div class="row w-100">
            <div class="col custom-card shadow-card overflow-x-auto position-relative">
                <div class="mt-2">
                    @if ($title != 'Data Siswa')
                        <form action="{{ route('import.siswa') }}" method="POST"
                            class="d-flex justify-content-center flex-column" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label w-100">Excel File
                                        <input type="file" name="file" class="form-control">
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label w-100">Gelombang
                                        <select class="form-select" name="gelombang" aria-label="Default select example">
                                            <option selected disabled>-- Pilih Gelombang --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </label>
                                    @error('gelombang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label w-100">Instuktur
                                        <select class="form-select" name="instruktur" aria-label="Default select example">
                                            <option selected disabled>-- Pilih Instruktur --</option>
                                            @foreach ($dt_instruktur as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('instruktur')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4"><label for="exampleFormControlInput1" class="form-label w-100">Sekolah
                                        <select class="form-select" name="sekolah" aria-label="Default select example">
                                            <option selected disabled>-- Pilih Sekolah --</option>
                                            @foreach ($dt_sekolah as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->sekolah }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('sekolah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4"><label for="exampleFormControlInput1" class="form-label w-100">Jurusan
                                        <select class="form-select" name="jurusan" aria-label="Default select example">
                                            <option selected disabled>-- Pilih Jurusan --</option>
                                            @foreach ($dt_jurusan as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('jurusan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4"><label for="exampleFormControlInput1" class="form-label w-100">Periode
                                        <select class="form-select" name="periode" aria-label="Default select example">
                                            <option selected disabled>-- Pilih Periode --</option>
                                            @foreach ($dt_periode as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->periode }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    @error('periode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mb-3">Import Excel</button>
                        </form>
                        <a href="/admin/siswa/tambah" class="btn btn-success mb-3"><i class="fa-solid fa-plus bold"></i>
                            Tambah</a>
                    @endif
                    <table id="example" class="display hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Gelombang</th>
                                <th>Instruktur</th>
                                <th>Sekolah</th>
                                <th>Jurusan</th>
                                <th>Lab</th>
                                <th>Periode</th>
                                @if ($title != 'Data Siswa')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @forelse ($dt_siswa as $s)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $s->nis }}</td>
                                    <td>{{ $s->nama_siswa }}</td>
                                    <td>{{ $s->gelombang }}</td>
                                    <td>{{ $s->nama_instruktur }}</td>
                                    <td>{{ $s->sekolah }}</td>
                                    <td>{{ $s->jurusan }}</td>
                                    <td>{{ $s->lab }}</td>
                                    <td>{{ $s->periode }}</td>
                                    @if ($title != 'Data Siswa')
                                        <td>
                                            <form id="deleteForm" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('hapus.siswa', $s->id_siswa) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('url.edit.siswa', $s->id_siswa) }}" title="Edit"
                                                    class="btn btn-info"><i class="fa-solid fa-pen text-white"></i></a>
                                                <button type="submit"title="Hapus" class="btn btn-danger"><i
                                                        class="fa-solid fa-eraser text-white"></i></button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Data Siswa Tidak Tersedia</td>
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
        @elseif(session()->has('error'))
            <div class="alert alert-danger shadow position-absolute top-0" style="right: 27%" onclick="hideElement(this)">
                {{ session('error') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
            </div>
        @endif
    </section>
    <!-- end section main content -->
@endsection
