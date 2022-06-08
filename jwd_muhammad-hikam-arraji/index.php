<?php
// mendapatkan data segitiga.txt
$data_segitiga = unserialize(file_get_contents('./data/segitiga.txt'));
// mendapatkan data lingkaran.txt
$data_lingkaran = unserialize(file_get_contents('./data/lingkaran.txt'));
// mendapatkan data persegi.txt
$data_persegi = unserialize(file_get_contents('./data/persegi.txt'));

// menjumlahkan semua data bangun datar
$jumlah_bangun_datar = count($data_segitiga) + count($data_lingkaran) + count($data_persegi);

// menampilkan persentase segitiga
$persentase_segitiga = count($data_segitiga) / $jumlah_bangun_datar * 100;

// menampilkan persentase lingkaran
$persentase_lingkaran = count($data_lingkaran) / $jumlah_bangun_datar * 100;

// menampilkan persentase persegi
$persentase_persegi = count($data_persegi) / $jumlah_bangun_datar * 100;

// menampilkan max
$max = max($persentase_segitiga, $persentase_persegi, $persentase_lingkaran);

// menampilkan min
$min = min($persentase_segitiga, $persentase_persegi, $persentase_lingkaran);

    include 'template/header.php';
    ?>
    <!-- Content -->
    <div class="container mt-3">
        <div class="card p-2 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-2">
                    <!-- Segitiga -->
                    <div class="col-md-3 ml-5 ">
                        <div class="card text-center">
                            <div class="small-box bg-info ">
                                Total Perhitungan
                            </div>
                            <div class="card-body bg-info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= $jumlah_bangun_datar ?><span> Kali</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Max -->
                    <div class="col-md-3 ml-5">
                        <div class="card text-center">
                            <div class="small-box bg-secondary">
                                Nilai Max
                            </div>
                            <div class="card-body bg-secondary">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= round($max) ?><span> %</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Min -->
                     <div class="col-md-3 ml-5">
                        <div class="card text-center">
                            <div class="small-box bg-secondary">
                                Nilai Max
                            </div>
                            <div class="card-body bg-secondary">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= round($min) ?><span> %</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>

         <div class="container mt-3">
        <div class="card p-2 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <!-- Segitiga -->
                    <div class="col-md-3 ml-5">
                        <div class="card text-center">
                            <div class="small-box bg-danger">
                                Persentase Segitiga
                            </div>
                            <div class="card-body bg-danger">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= round($persentase_segitiga) ?><span> %</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lingkaran -->
                    <div class="col-md-3 ml-5">
                        <div class="card text-center">
                            <div class="small-box bg-success">
                                Persentase Lingkaran
                            </div>
                            <div class="card-body bg-success">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= round($persentase_lingkaran) ?><span> %</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Persegi -->
                    <div class="col-md-3 ml-5">
                        <div class="card text-center">
                            <div class="small-box bg-warning">
                                Persentase Persegi
                            </div>
                            <div class="card-body bg-warning">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h1><?= round($persentase_persegi) ?><span> %</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'template/footer.php';
    ?>
