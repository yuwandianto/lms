<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
    <style>
        body {
            padding: 10px 50px;
            font-family: 'Courier New', Courier, monospace;
        }

        td {
            vertical-align: top;
        }

        h3,
        h2,
        h1,
        p {
            margin: 0;
        }

        .kop {
            letter-spacing: 4px;
            margin-bottom: 5px;
        }

        .garis {
            border-bottom: 4px solid black;
            border-top: 2px solid black;
            margin: 10px 0;
            height: 2px;
        }

        u {
            letter-spacing: 8px;
        }

        .dasar {
            width: 80%;
            font-size: 16pt;
            margin-top: 40px;
            line-height: 30px;
        }


        .tujuan {
            width: 80%;
            font-size: 16pt;
            line-height: 30px;
        }

        .ditugaskan {
            font-size: 16pt;
            margin: 40px 0 10px 0;
        }

        .ditugaskan table {
            width: 100%;
            left: 0;
            position: auto;
            margin: 20px 0;
        }

        .ditugaskan tr:first-child td {
            font-weight: bold;
            line-height: 30px;
            background-color: lightgray;
            text-align: center;
        }


        .ditugaskan table,
        .ditugaskan th,
        .ditugaskan td {
            border: 1px solid black;
            border-collapse: collapse;
            line-height: 20px;
            padding: 10px;
        }

        figure {
            margin: 10px 0;
        }

        .tutup {
            font-size: 16pt;
            margin: 20px 0;
        }

        .ttd {
            width: 100%;
            font-size: 16pt;
            margin: 70px 0;
        }
    </style>
</head>

<body>
    <table style="width: 100%; ">
        <tr>
            <th style="width: 10%;">
                <img style="height: 150px;" src="<?= base_url('assets/images/logo/') . $kop1->logoKop; ?>">
            </th>
            <th>
                <h2 class="kop"><?= $kop1->line1; ?></h2>
                <h2 class="kop"><?= $kop1->line2; ?></h2>
                <h1 class="kop"><?= $kop1->line3; ?></h1>
                <p><?= $kop1->line4; ?></p>
                <p><?= $kop1->line5; ?></p>
                <p><?= $kop1->line6; ?></p>
            </th>
        </tr>
    </table>
    <div class="garis"></div>
    <table style="width: 100%;">
        <tr>
            <th>
                <u>
                    <h2>SURAT TUGAS</h2>
                </u>
                <?= $surat->nomor; ?>
            </th>
        </tr>
    </table>
    <table class="dasar">
        <tr>
            <td>Dasar</td>
            <td>:</td>
            <td><?= $surat->dasarSurat; ?></td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td><?= $surat->nomorSurat; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= $surat->tanggalSurat; ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td><?= $surat->perihal; ?></td>
        </tr>
    </table>
    <div class="ditugaskan">
        <?= $surat->ditugaskan; ?>
    </div>
    <table class="tujuan">
        <tr>
            <td>Hari</td>
            <td>:</td>
            <td><?= $surat->hari; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= $surat->tanggal; ?></td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td><?= $surat->waktu; ?></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td><?= $surat->tempat; ?></td>
        </tr>
    </table>
    <p class="tutup">Demikian surat tugas ini dibuat untuk dilaksanakan dengan penih tanggung jawab</p>
    <table class="ttd">
        <tr>
            <td style="width: 60%;"></td>
            <td>Jorong, <?= date('d F Y'); ?></td>
        </tr>
        <tr>
            <td style="width: 60%;"></td>
            <td>Kepala Sekolah,</td>
        </tr>
        <tr>
            <td style="width: 60%; height: 100px"></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 60%;"></td>
            <td><?= $sekolah->namaKepsek; ?></td>
        </tr>
        <tr>
            <td style="width: 60%;"></td>
            <td>NIP. <?= $sekolah->nipKepsek; ?></td>
        </tr>
    </table>
</body>

</html>