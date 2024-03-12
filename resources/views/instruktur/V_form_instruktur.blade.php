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
                <form
                    action="{{ $aksi == 'Edit' ? route('edit.instruktur', $dt_instruktur['id']) : route('tambah.instruktur') }}"
                    method="post">

                    @csrf
                    @if ($aksi == 'Edit')
                        @method('put')
                    @endif

                    <?php
                    $instruktur = $dt_instruktur ? $dt_instruktur['lab'] : '';
                    
                    ?>
                    <div class="bg-primary h2-title-card position-absolute top-0 w-100 start-0 py-3 px-3">
                        <h4>{{ $aksi }} Data Instruktur</h4>

                    </div>
                    <div class="mb-3 mt-6">
                        <label for="exampleFormControlInput1" class="form-label w-100">Email
                            <input type="email" name="email" class="form-control"
                                value="{{ $aksi == 'Edit' ? old('email', $dt_instruktur->email) : old('email') }}"
                                id="exampleFormControlInput1" placeholder="..." autocomplete="off" autofocus /></label>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Nama
                            <input type="text" name="nama" class="form-control"
                                value="{{ $aksi == 'Edit' ? old('nama', $dt_instruktur->nama) : old('nama') }}"
                                id="exampleFormControlInput1" placeholder="..." autocomplete="off" autofocus /></label>
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleFormControlInput1" class="form-label w-100">Lab
                            <select class="form-select" name="lab" aria-label="Default select example">
                                <option selected disabled>-- Pilih Lab --</option>
                                <option value="1" {{ $instruktur == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $instruktur == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $instruktur == '3' ? 'selected' : '' }}>3</option>
                            </select>
                            @error('lab')
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
