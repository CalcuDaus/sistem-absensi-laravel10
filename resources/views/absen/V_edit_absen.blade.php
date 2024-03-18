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
                <form action="{{ route('url.update.absen', $dt_absen->id) }}" method="POST">
                    @csrf
                    <label for="keterangan"> Keterangan
                        <select name="keterangan" id="keterangan">
                            <option value="i" {{ $dt_absen->keterangan == 'i' ? 'selected' : '' }}>Izin</option>
                            <option value="a" {{ $dt_absen->keterangan == 'a' ? 'selected' : '' }}>Alpha</option>
                            <option value="s" {{ $dt_absen->keterangan == 's' ? 'selected' : '' }}>Sakit</option>
                        </select>
                    </label>
                    <br>
                    <label for="sub_keterangan"> Sub Keterangan
                        <textarea name="sub_keterangan" id="sub_keterangan" cols="30" rows="10">
                            {{ $dt_absen->sub_keterangan }}
                    </textarea>
                    </label>
                    <input type="hidden" id="base_url" value="{{ url('/') }}">
                    <br>

                    <button type="submit">Simpan Absen</button>
                </form>

                <script>
                    document.getElementById('sekolah').addEventListener('change', fetchData);
                    document.getElementById('jurusan').addEventListener('change', fetchData);
                    var base_url = document.getElementById('base_url').value;

                    function fetchData() {
                        var value1 = document.getElementById('sekolah').value;
                        var value2 = document.getElementById('jurusan').value;

                        fetch(`${base_url}/getData`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    value1: value1,
                                    value2: value2
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                var selectElement = document.getElementById('siswa');
                                selectElement.innerHTML = '';
                                data.forEach(item => {
                                    var option = document.createElement('option');
                                    option.value = item.id;
                                    option.textContent = item.nama;
                                    selectElement.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error:', error));
                    }
                </script>
            </div>
    </section>
    <!-- end section main content -->
@endsection
