<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
</head>

<body>
    <form action="{{ route('tambah.absen') }}" method="POST">
        @csrf
        <select name="sekolah" id="sekolah" required>
            @foreach ($dt_sekolah as $s)
                <option value="{{ $s->id }}">{{ $s->sekolah }}</option>
            @endforeach
        </select>
        <select name="jurusan" id="jurusan" required>
            @foreach ($dt_jurusan as $s)
                <option value="{{ $s->id }}">{{ $s->jurusan }}</option>
            @endforeach
        </select>
        <select name="siswa" id="siswa" required>
            <option selected disabled>-- Pilih Siswa ---</option>
        </select>
        <input type="hidden" id="base_url" value="{{ url('/') }}">
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
</body>

</html>
