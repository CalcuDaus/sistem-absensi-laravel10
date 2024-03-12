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
            <h2>Sekolah</h2>
            <div class="row w-75">
                <div class="col custom-card shadow-card overflow-x-auto position-relative">
                    <div class="mt-2">
                        <a href="/admin/sekolah/tambah" class="btn btn-success mb-3"><i class="fa-solid fa-plus bold"></i>
                            Tambah</a>
                        <table id="example" class="display hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($dt_sekolah as $s)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $s['sekolah'] }}</td>
                                        <td>
                                            <form id="deleteForm" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('hapus.sekolah', $s['id']) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('url.edit.sekolah', $s['id']) }}" title="Edit"
                                                    class="btn btn-info"><i class="fa-solid fa-pen text-white"></i></a>
                                                <button type="submit"title="Hapus" class="btn btn-danger"><i
                                                        class="fa-solid fa-eraser text-white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Data Sekolah Tidak Tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success shadow position-absolute top-0" style="right: 27%"
                    onclick="hideElement(this)">
                    {{ session('success') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger shadow position-absolute top-0" style="right: 27%"
                    onclick="hideElement(this)">
                    {{ session('error') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
                </div>
            @endif
        </section>
        <!-- end section main content -->
    @endsection
