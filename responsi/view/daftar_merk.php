<?php
// membuat koneksi ke database
require '../function.php';

// menjalankan query SELECT pada view daftar_merk
$query = "SELECT * FROM daftar_merk";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Daftar Merk</title>
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
                    <a class="nav-link" href="../index.php"><i class="fa fa-home"></i> Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        KELOLA DATA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../index.php">Merk</a>
                        <a class="dropdown-item" href="../sepatu.php">Sepatu</a>
                        <a class="dropdown-item" href="../detail.php">Detail Bayar</a>
                        <a class="dropdown-item" href="../header.php">Header Bayar</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        KATEGORI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="daftar_merk.php">Daftar Merk</a>
                        <a class="dropdown-item" href="sepatu_vans.php">Sepatu Vans</a>
                        <a class="dropdown-item" href="../prosedur/sepatu_terlaris.php">Sepatu Terlaris</a>
                        <a class="dropdown-item" href="../prosedur/sepatu_termahal.php">Sepatu Termahal</a>
                        <a class="dropdown-item" href="../prosedur/sepatu_termurah.php">Sepatu Termurah</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        LAINNYA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../fungsi/lapTotal.php">Laporan Total Pemasukan</a>
                        <a class="dropdown-item" href="../fungsi/no_nota.php">Buat No Nota</a>
                        <a class="dropdown-item" href="pemasukan_harian.php">Pemasukan Harian </a>
                        <a class="dropdown-item" href="../prosedur/total_transaksi.php">Banyak Transaksi Pembelian
                            Sepatu </a>
                        <a class="dropdown-item" href="../prosedur/total_pembelian.php">Hitung Total Pembelian </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="d-flex align-items-center justify-content-center mt-5">
        <div class="p-5">
            <h5 class="text-center">--- View --- Daftar Merk Sepatu</h5>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> Daftar Merk Sepatu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($hasil)) { ?>
                        <tr>
                            <td class="p-2 text-center"><?php echo $row['daftar merk sepatu']; ?></td>
                        </tr>
                        <?php } ?>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>