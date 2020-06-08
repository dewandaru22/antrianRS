<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="5" style="background-color: transparent; padding: 20px;">
                    <img class="navbar-brand-full" src="{{('/template/images/rs-islam-logo.png')}}" width="200" height="60" alt="rsiy logo" href="/awal">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>                
                <td style="background-color: #184d26">Pasien Saat Ini</td>
                <td rowspan="4" style="background-color: transparent"></td>
                <td style="background-color: #184d26">Pasien Selanjutnya</td>
                <td rowspan="4" style="background-color: transparent"></td>
                <th colspan="2" rowspan="4" style="background-image: url('template/images/rsiy.jpg');">
                    <!-- <img class="navbar-brand-full" src="{{('/template/images/rsiy.jpg')}}" width="100%" height="90%" alt="rsiy logo" href="/awal"> -->
                </th>
            </tr>
            <tr>
                <th style="background-color: #93B874">D-001</th>
                <th style="background-color: #93B874">D-002</th>
            </tr>
            <tr>
                <td style="background-color: #184d26">Pasien Dilewati</td>
                <td style="background-color: #184d26">Pasien Terakhir</td>
            </tr>
            <tr>
                <th style="background-color: #93B874">-</th>
                <th style="background-color: #93B874">D-010</th>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" style="background-color: #184d26; color:#f5f5f5; font-size:30px;"><marquee>Selamat Datang di RSIY PDHI</marquee></th>
            </tr>
        </tfoot>
    </table>
</body>
</html>