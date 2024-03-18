<table>
    <thead>
        <tr>
            <th
                style="background-color: lightgray;text-align:center;border: 1px solid black; height:30px;vertical-align: center">
                No</th>
            <th
                style="background-color: lightgray;text-align:center;border: 1px solid black; height:30px;vertical-align: center">
                Nama</th>
            <th
                style="background-color: lightgray;text-align:center;border: 1px solid black; height:30px;vertical-align: center">
                Keterangan</th>
            <th
                style="background-color: lightgray;text-align:center;border: 1px solid black; height:30px;vertical-align: center">
                Sub Keterangan</th>
            <th
                style="background-color: lightgray;text-align:center;border: 1px solid black; height:30px;vertical-align: center">
                Waktu Absen</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($absen as $a)
            <tr>
                <td
                    style=";word-wrap: break-word; text-align:center;border: 1px solid black;height:30px;vertical-align: center">
                    {{ $i++ }}</td>
                <td
                    style="word-wrap: break-word; text-align:center;width: 150px;border: 1px solid black;height:30px;vertical-align: center">
                    {{ $a->nama }}</td>
                <td
                    style="word-wrap: break-word; text-align:center;border: 1px solid black;height:30px;vertical-align: center">
                    {{ $a->keterangan }}</td>
                <td
                    style="word-wrap: break-word; text-align:center;width: 150px;border: 1px solid black;height:30px;vertical-align: center">
                    {{ $a->sub_keterangan }}</td>
                <td
                    style="word-wrap: break-word; text-align:center;width: 150px;border: 1px solid black;height:30px;vertical-align: center">
                    {{ $a->waktu_absen }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
