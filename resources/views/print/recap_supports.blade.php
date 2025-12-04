<style>
    /* CSS umum untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse; /* Penting untuk menggabungkan batas */
        margin-top: 25px;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 9pt;
        /* Hapus box-shadow dan border-radius jika ingin tampilan yang sangat formal dengan border penuh */
        /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
        /* border-radius: 6px; */
        /* overflow: hidden; */
        
        border: 1px solid #c0c0c0; /* Tambahkan batas luar tabel */
    }

    /* Style untuk Header Tabel */
    th {
        background-color: #007bff; /* Warna biru profesional */
        color: #ffffff; /* Teks putih untuk kontras tinggi */
        padding: 12px 15px;
        text-align: center;
        
        /* Modifikasi untuk border penuh: */
        border: 1px solid #0056b3; /* Batas di antara header */
        
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Style untuk Sel Data */
    td {
        padding: 10px 15px;
        vertical-align: middle;
        line-height: 1.4; /* Meningkatkan line-height untuk keterbacaan yang lebih baik */
        color: #333;
        
        /* Modifikasi untuk border penuh: */
        border: 1px solid #e0e0e0; /* Batas tipis untuk semua sisi sel data */
    }

    /* Style untuk Baris Genap (Zebra Striping) */
    tr:nth-child(even) {
        background-color: #f7f9fc;
    }

    /* Style untuk Baris Ganjil (Opsional, agar terlihat jelas tanpa stripe) */
    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    /* Hilangkan batas bawah pada baris terakhir - Tidak perlu lagi jika menggunakan border: 1px solid */
    /* tbody tr:last-child td { border-bottom: none; } */

    /* Styling untuk Judul */
    h2 {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #0056b3;
        border-bottom: 3px solid #007bff;
        padding-bottom: 8px;
        margin-bottom: 5px;
        font-size: 24pt;
    }
    p {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #555;
        margin-top: 0;
        font-size: 10pt;
    }
    /* Style khusus untuk kolom No. agar rata tengah */
    td:first-child {
        text-align: center;
    }
    
    /* Perbaikan tampilan tanggal */
    .tanggal-cell {
        text-align: center; /* Rata tengah untuk konten di kolom tanggal */
    }
</style>

<h2>Rekapitulasi Buku Tamu</h2>
<p>Periode: {{ \Carbon\Carbon::parse($from)->isoFormat('DD MMMM YYYY') }} - {{ \Carbon\Carbon::parse($to)->isoFormat('DD MMMM YYYY') }} ({{ \Carbon\Carbon::parse($from)->diffInDays($to) }} hari)</p>

<table page-break-inside: auto;>
    <thead>
        <tr>
            <th style="width: 5%;">No.</th>
            <th style="width: 15%;">Nama</th>
            <th style="width: 15%;">Alamat</th>
            <th style="width: 10%;">Tanggal</th>
            <th style="width: 30%;">Keperluan</th>
            <th style="width: 20%;">Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $support->name }}</td>
                <td>{{ $support->instansi }}</td>
                <td class="tanggal-cell">
                    <div>{{ \Carbon\Carbon::parse($support->tanggal_kunjungan)->format('d/m/Y') }}</div>
                </td>
                <td>
                    <div>{{ $support->keperluan }}</div>
                    Lampiran: @if ($support->dokumen_pendukung)
                        <a href="{{ asset($support->dokumen_pendukung) }}">Lihat</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($support->kartu_identitas)
                        <a href="{{ asset($support->kartu_identitas) }}" style="display: block">
                            <img src="{{ $support->kartu_identitas }}" alt="Foto" style="width: 100%">
                        </a>
                    @else
                        Tidak ada foto
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>