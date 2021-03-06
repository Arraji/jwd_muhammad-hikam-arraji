<?php
// menyiapkan data untuk data lingkaran
$data_lingkaran = [];

// cek data di lingkaran.txt  yang ada di dalam diretori
if (file_exists('./data/lingkaran.txt')) {
    // jika ada maka baca file tersebut
    $lingkaran = file('./data/lingkaran.txt');
    // melakukan konversi dari format data serialize menjadi array
    $data_lingkaran = unserialize($lingkaran[0]);

    // menampilkan data dari yang terbesar ke yang terkecil tanggal

    // rsort($data_lingkaran);
}

// FIA isset cek nilai dari form, issets cek apakah ada nilai dari form
// jika di temukan tadi melalui metode post maka akan di proses
if (isset($_POST['jari'])) {
    // mengambil nilai dari form
    $jari = $_POST['jari'];
    $luas = 3.14 * $jari * $jari;
    $date = date('Y-m-d');
    $time = date('H:i:s');
    // menambahkan data ke dalam array
    $data_lingkaran[] = [
        'jari' => $jari,
        'luas' => $luas,
        'date' => $date,
        'time' => $time
    ];
    // menyimpan data array ke dalam file
    file_put_contents('./data/lingkaran.txt', serialize($data_lingkaran));
}

// menghapus data
if (isset($_GET['hapus'])) {
    // mengambil nilai dari form
    $id = $_GET['hapus'];
    // menghapus data
    unset($data_lingkaran[$id]);
    // menyimpan data array ke dalam file
    file_put_contents('./data/lingkaran.txt', serialize($data_lingkaran));
}

    include 'template/header.php';
    ?>
    <!-- Content -->
    <div class="page-container2">
        <!-- hitung lingkaran -->
        <div class="card p-3 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header small-box bg-success">
                                Hitung Luas Lingkaran
                            </div>
                            <div class="card-body">
                                <form action="lingkaran.php" method="post">
                                    <div class="form-group">
                                        <label for="jari">Masukkan Jari-jari</label>
                                        <input type="number" class="form-control" name="jari" id="jari" placeholder="Masukkan jari-jari">
                                    </div>
                                    <button type="submit" class="btn btn-info">Hitung</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-light">
                                Hasil Perhitungan
                            </div>
                            <div class="card-body">
                                <?php
                                    if(isset($_POST['jari'])){
                                        $jari = $_POST['jari'];
                                        $luas = 3.14 * $jari * $jari;
                                        echo "Luas Lingkaran = $luas";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data lingkaran -->
        <div class="card p-3 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header small-box bg-success">
                                Data Lingkaran
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered bg-dark text-light">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jari-jari</th>
                                            <th>Luas</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // mengambil data dari array
                                            foreach ($data_lingkaran as $key => $value) {
                                                echo "<tr>";
                                                echo "<td>".($key+1)."</td>";
                                                echo "<td>".$value['jari']."</td>";
                                                echo "<td>".$value['luas']."</td>";
                                                echo "<td>".$value['date']."</td>";
                                                echo "<td>".$value['time']."</td>";
                                                echo "<td>";
                                                echo "<a href='?hapus=".$key."' class='btn btn-info'>Hapus</a>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
