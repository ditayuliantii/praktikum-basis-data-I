<?php
   require 'function.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <title>Data Detail Bayar</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i> Toko Sepatu </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        KELOLA DATA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php">Merk</a>
                        <a class="dropdown-item" href="sepatu.php">Sepatu</a>
                        <a class="dropdown-item" href="header.php">Header Bayar</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        KATEGORI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="view/daftar_merk.php">Daftar Merk</a>
                        <a class="dropdown-item" href="view/sepatu_vans.php">Sepatu Vans</a>
                        <a class="dropdown-item" href="prosedur/sepatu_terlaris.php">Sepatu Terlaris</a>
                        <a class="dropdown-item" href="prosedur/sepatu_termahal.php">Sepatu Termahal</a>
                        <a class="dropdown-item" href="prosedur/sepatu_termurah.php">Sepatu Termurah</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        LAINNYA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="fungsi/lapTotal.php">Laporan Total Pemasukan</a>
                        <a class="dropdown-item" href="fungsi/no_nota.php">Buat No Nota</a>
                        <a class="dropdown-item" href="view/pemasukan_harian.php">Pemasukan Harian </a>
                        <a class="dropdown-item" href="prosedur/total_transaksi.php">Banyak Transaksi Pembelian
                            Sepatu </a>
                        <a class="dropdown-item" href="prosedur/total_pembelian.php">Hitung Total Pembelian </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="d-flex align-items-center justify-content-center mt-5">
        <div class="p-5">
            <h3 class="text-center">Halaman Detail Bayar</h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>

                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <!-- <th scope="col">ID Detail Bayar</th> -->
                            <th scope="col">Merk</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Jumlah Pembelian</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // $listdetail = mysqli_query($koneksi, "select * from detail_bayar");
                            $query = "SELECT detail_bayar.*, merk.nama_merk, sepatu.warna FROM detail_bayar INNER JOIN sepatu ON detail_bayar.id_sepatu = sepatu.id_sepatu INNER JOIN merk ON sepatu.id_merk = merk.id_merk";
                            $listdetail = mysqli_query($koneksi, $query );

                            while($data = mysqli_fetch_array($listdetail)){
                                $iddetail = $data['id_detail'];
                                $idsepatu = $data['id_sepatu'];
                                $merk = $data['nama_merk'];
                                $warna = $data['warna'];
                                $jumlahbeli = $data  ['jumlah_beli'];                                                
                       ?>
                        <tr>
                            <!-- <td><?=$iddetail;?></td> -->
                            <!-- <td><?=$idsepatu;?></td> -->
                            <td><?=$merk;?></td>
                            <td><?=$warna;?></td>
                            <td><?=$jumlahbeli;?></td>
                            <td>
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                    data-target="#editdetail<?=$iddetail;?>">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#deletedetail<?=$iddetail;?>">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- ubah -->
                        <div class="modal fade" id="editdetail<?=$iddetail;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title">Edit Data</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post">
                                        <div class="modal-body">

                                            <!-- <input type="number" name="idsepatu" value="<?=$idsepatu;?>"
                                                class="form-control" required>
                                            <br> -->

                                            <label for="idmerk">Merk-Warna:</label>
                                            <select name="idsepatu" id="idmerk" class="form-control" required>
                                                <option value="">-- Pilih Sepatu --</option>
                                                <?php
                                                    // Query untuk mengambil data sepatu dan merk
                                                    $query = "SELECT sepatu.id_sepatu, merk.nama_merk, sepatu.warna, sepatu.id_merk
                                                            FROM sepatu
                                                            INNER JOIN merk ON sepatu.id_merk = merk.id_merk";
                                                    $result = mysqli_query($koneksi, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Tampilkan pilihan pada form
                                                        $selected = '';
                                                        if ($row['id_sepatu'] == $idsepatu) {
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option value="'.$row['id_sepatu'].'" '.$selected.'>'.$row['nama_merk'].' - '.$row['warna'].'</option>';
                                                    }
                                                ?>
                                            </select>




                                            <br>


                                            <label for="jumlah">Jumlah Pembelian:</label>
                                            <input type="number" name="jumlahbeli" id="jumlah" value="<?=$jumlahbeli;?>"
                                                class="form-control" required>
                                            <br>
                                            <input type="hidden" name="iddetail" value="<?=$iddetail;?>">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="updatedetail">
                                                    <i class="fa fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- hapus -->
                        <div class="modal fade" id="deletedetail<?=$iddetail;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title">Hapus Data</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post">
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus <?=$iddetail?>?
                                            <br> <br>
                                            <input type="hidden" name="iddetail" value="<?=$iddetail;?>">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger"
                                                    name="hapusdetail">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <?php
                            };
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <!-- <br>
                    <input type="text" name="idsepatu" placeholder="ID Sepatu" class="form-control" required> -->

                    <select name="idsepatu" class="form-control" required>
                        <option value="">-- Pilih Sepatu --</option>
                        <?php
            // Query untuk mengambil data sepatu dan merk
                            $query = "SELECT sepatu.id_sepatu, merk.nama_merk, sepatu.warna
                                    FROM sepatu
                                    INNER JOIN merk ON sepatu.id_merk = merk.id_merk";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Tampilkan pilihan pada form
                                echo '<option value="'.$row['id_sepatu'].'">'.$row['nama_merk'].' - '.$row['warna'].'</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <input type="number" name="jumlahbeli" placeholder="Jumlah Pembelian" class="form-control" required>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submitdetail">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</html>