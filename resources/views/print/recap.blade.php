<style>
    @page {
        margin: 1cm 1.5cm;
        /* Top/Bottom Left/Right */
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }

    th {
        background-color: #f5f5f5;
        font-weight: normal;
    }
    .keep-together {
        page-break-inside: avoid;
        break-inside: avoid;
    }
</style>

<img src="{{ resource_path('images/kop.png') }}" alt="" style="width: 100%">

<p style="text-align: center; font-weight: bold; font-size: 16px; margin: 20px 0 0 0;">Rekapitulasi Buku Tamu</p>
<p style="text-align: center; font-weight: bold; font-size: 16px; margin: 0;">Pelayanan Terpadu Satu Pintu (PTSP)</p>
<p style="text-align: center; font-weight: bold; font-size: 16px; margin: 0;">MTs Negeri 2 Trenggalek</p>
<p style="text-align: center; font-size: 12px; margin: 10px 0 0 0;">
    Periode :
    <span style="font-weight: bold;">{{ \Carbon\Carbon::parse($from)->format('d F Y') }} - {{
        \Carbon\Carbon::parse($to)->format('d F Y') }}</span>
</p>

<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="width: 5%;">No.</th>
            <th style="width: 15%;">Nama</th>
            <th style="width: 15%;">Alamat</th>
            <th style="width: 15%;">Tanggal</th>
            <th style="width: 30%;">Keperluan</th>
            <th style="width: 100px;">Foto</th>
        </tr>
    </thead>
    <tbody>
        @if ($supports->isEmpty())
        <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data</td>
        </tr>
        @else
        @foreach ($supports as $support)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $support->name }}</td>
            <td>{{ $support->instansi }}</td>
            <td class="tanggal-cell">
                <div>{{ \Carbon\Carbon::parse($support->tanggal_kunjungan)->isoFormat('DD MMMM YYYY') }}</div>
            </td>
            <td>
                <div>{{ $support->keperluan }}</div>
                <br />
                <b>Lampiran:</b> @if ($support->dokumen_pendukung)
                <a href="{{ asset($support->dokumen_pendukung) }}">Lihat</a>
                @else
                -
                @endif
            </td>
            <td>
                @if ($support->kartu_identitas)
                <a href="{{ asset($support->kartu_identitas) }}" style="display: block">
                    <div
                        style="width: 100px; height: 100px; overflow: hidden; background-image: url('{{ ($support->kartu_identitas) }}'); background-size: cover; background-position: center;">
                    </div>
                </a>
                @else
                Tidak ada foto
                @endif
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<div class="keep-together">
    <table style="width: 100%; margin-top: 1cm;">
        <tr>
            <td style="padding-left: 1cm; width: 33%;">
                <p style="margin-top: 1px"></p>
                <p style="text-align: left; margin: 0">Mengetahui,</p>
                <p style="text-align: left; margin: 0">Kepala MTsN 2 Trenggalek</p>
                <br /><br /><br /><br />
                <p style="text-align: left; margin: 0; font-weight: bold; text-decoration: underline;">AHSAN WINARTO, M.Pd.</p>
                <p style="text-align: left; margin: 0">NIP. 197706151999031006</p>
            </td>
            <td style="width: 33%;"></td>
            <td style="width: 33%;">
                <p style="text-align: left; margin: 0">Trenggalek, {{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}</p>
                <p style="margin-top: 1px"></p>
                <p style="text-align: left; margin: 0">Penata Layanan Operasional</p>
                <br /><br /><br /><br />
                <p style="text-align: left; margin: 0; font-weight: bold; text-decoration: underline;">ANIN ANGGA YASTI, S.Pd.</p>
                <p style="text-align: left; margin: 0">NIP. 199106062025212020</p>
            </td>
        </tr>
    </table>
</div>