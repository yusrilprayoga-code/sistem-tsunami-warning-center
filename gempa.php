<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="frontend/Images/tsunami.png">
    <title>Tsunami Warning Center</title>
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
    <style>
        #map {
            height: 80%;
            width: 80%;
            margin: 0 auto 0 auto;
        }

        html,
        body {
            height: 100%;
        }
    </style>
</head>

<!-- navbar -->
<?php include 'frontend/header/navbar.php'; ?>
<!-- akhir navbar -->

<body>

    <div class="main-item container border-bottom">
        <div class="row align-items-center pt-4">
            <div class="col-auto text-gray-500 font-weight-light">
                <h3><b>Daftar 15 Gempabumi M 5.0+</b></h3>
            </div>
        </div>
    </div>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <strong>Data Gempa</strong>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="gempa" class="table table-bordered table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Tanggal dan Waktu</th>

                                        <th>Jam</th>
                                        <th>Magnitude</th>
                                        <th>Kedalaman</th>
                                        <th>Koordinat</th>
                                        <th>Wilayah</th>
                                        <th>Potensi Tsunami</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Kode Baris PHP untuk Mengolah Data gempaterkini.xml
                                        $data = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.xml") or die("Gagal ambil!");
                                        $i = 1;
                                        foreach ($data->gempa as $gempaM5) {

                                            echo '<tr><td>' . $i . '</td><td>' . $gempaM5->Tanggal . '</td><td>' .  $gempaM5->Jam . '</td><td>'
                                                . $gempaM5->Magnitude . '</td><td>' . $gempaM5->Kedalaman . '</td><td>'
                                                . $gempaM5->point->coordinates . '</td><td>'
                                                . $gempaM5->Wilayah . '</td><td>' . $gempaM5->Potensi . '</td><td>';

                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <footer class="section-footer mt-4 mb-4 border-top">
                            <div class="container-fluid border-top">
                                <div class="row justify-content-center align-items-center pt-3">
                                    <div class="col-auto text-gray-500 font-weight-light">
                                        <a href="https://www.bmkg.go.id/"><b>Sumber Data : BMKG (Badan Meteorologi,Klimatologi, dan Geofisika)</b></a>
                                    </div>
                                    <div class="row justify-content-center align-items-center pt-4">
                                        <div class="col-auto text-gray-500 font-weight-light">
                                            2022 Copyright Tsunami Center • All rights reserved • Made in Yogyakarta
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <script src="frontend/libraries/jquery/jquery-3.6.0.min.js"></script>
                        <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
                        <script src="frontend/libraries/retina/retina.min.js"></script>
</body>