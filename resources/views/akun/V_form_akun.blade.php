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
                <form action="{{ $aksi == 'Edit' ? route('edit.akun', $dt_user['id']) : route('tambah.akun') }}"
                    method="post">
                    @csrf
                    @if ($aksi == 'Edit')
                        @method('put')
                    @endif
                    <div class="bg-primary h2-title-card position-absolute top-0 w-100 start-0 py-3 px-3">
                        <h4>{{ $aksi }} Data User</h4>
                    </div>
                    <div class="mb-3 mt-6">
                        <label for="exampleFormControlInput1" class="form-label w-100">Nama User
                            <input type="text" name="nama" class="form-control"
                                value="{{ $dt_user ? $dt_user['nama'] : '' }}" id="exampleFormControlInput1"
                                placeholder="..." autocomplete="off" autofocus /></label>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Email
                            <input type="email" name="email" class="form-control"
                                value="{{ $dt_user ? $dt_user['email'] : '' }}" id="exampleFormControlInput1"
                                placeholder="..." autocomplete="off" autofocus /></label>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Password
                            <input type="password" name="password" class="form-control"
                                value="{{ $dt_user ? $dt_user['password'] : '' }}" id="exampleFormControlInput1"
                                placeholder="..." autocomplete="off" autofocus /></label>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if ($aksi != 'Edit')
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
                        @endif

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
