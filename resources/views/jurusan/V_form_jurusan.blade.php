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
                <form action="{{ $aksi == 'Edit' ? route('edit.jurusan', $dt_jurusan['id']) : route('tambah.jurusan') }}"
                    method="post">

                    @csrf
                    @if ($aksi == 'Edit')
                        @method('put')
                    @endif
                    <div class="bg-primary h2-title-card position-absolute top-0 w-100 start-0 py-3 px-3">
                        <h4>{{ $aksi }} Data Jurusan</h4>

                    </div>
                    <div class="mb-3 mt-6">
                        <label for="exampleFormControlInput1" class="form-label w-100">Nama Jurusan
                            <input type="text" name="jurusan" class="form-control"
                                value="{{ $dt_jurusan ? $dt_jurusan['jurusan'] : '' }}" id="exampleFormControlInput1"
                                placeholder="..." autocomplete="off" autofocus /></label>
                        @error('jurusan')
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
