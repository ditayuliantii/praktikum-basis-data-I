<?php

    session_start();

    //Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "toko_sepatu_responsi");

    //input barang
    if(isset($_POST['submitmerk'])){
        // $idmerk = $_POST['idmerk'];
        $merk = $_POST['merk'];
        $model = $_POST['model'];

        $insermerk = mysqli_query($koneksi, "call insert_merk('$merk', '$model')");

        if($insermerk){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    if(isset($_POST['submitsepatu'])){
        // $idsepatu = $_POST['idsepatu'];
        $idmerk = $_POST['idmerk'];
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $insertsepatu = mysqli_query($koneksi, "call insert_sepatu('$idmerk', $ukuran, '$warna', $harga, $stok)");
        
        if($insertsepatu){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }
    
    if(isset($_POST['submitdetail'])){
        // $iddetail = $_POST['iddetail'];
        $idsepatu = $_POST['idsepatu'];
        $jumlah = $_POST['jumlahbeli'];
        
        $insertdetail = mysqli_query($koneksi, "call insert_detail('$idsepatu', $jumlah)");

        if($insertdetail){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    if(isset($_POST['submitheader'])){
        $tanggal = $_POST['tanggal'];
        // $nota = $_POST['nota'];
        $iddetail = $_POST['iddetail'];
        // $totalbeli = $_POST['totalbeli'];
        $bayar = $_POST['bayar'];
        
        $insertheader = mysqli_query($koneksi, "call insert_header('$iddetail', '$tanggal', $bayar)");
    
        if($insertheader){
            echo"
                <script>
                    alert('Data Berhasil Ditambahkan!');    
                </script>
            ";
        }
    }

    // edit merk
    if(isset($_POST['updatemerk'])){
        $idmerk = $_POST['idmerk'];
        $merk = $_POST['merk'];
        $model = $_POST['model'];

        $editmerk = mysqli_query($koneksi, "call update_merk($idmerk, '$merk', '$model')");

        if($editmerk){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

     //edit sepatu
     if(isset($_POST['updatesepatu'])){
        $idsepatu = $_POST['idsepatu'];
        $idmerk = $_POST['idmerk'];
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $editsepatu = mysqli_query($koneksi, "call update_sepatu($idsepatu, $idmerk, $ukuran, '$warna', $harga, $stok)");
        
        if($editsepatu){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    //edit detail bayar
    if(isset($_POST['updatedetail'])){
        $iddetail = $_POST['iddetail'];
        $idsepatu = $_POST['idsepatu'];
        $jumlahbeli = $_POST['jumlahbeli'];
        
        $editdetail = mysqli_query($koneksi, "call update_detail($iddetail, $idsepatu, $jumlahbeli)");

        if($editdetail){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }

    
    // update_headerTes
    if (isset($_POST['updateheader'])){
        $nota = $_POST['nota'];
        $iddetail = $_POST['iddetail'];
        $tanggal = $_POST['tanggal'];
        // $beli = $_POST['totalbeli'];
        $bayar = $_POST['bayar'];
        // $kembalian = $_POST['sisabayar'];
        
        $editheader = mysqli_query($koneksi, "call update_header_new($nota, $iddetail, '$tanggal', $bayar)");
    
        if($editheader){
            echo"
                <script>
                    alert('Data Berhasil Diubah!');    
                </script>
            ";
        }
    }


    //hapus merk
    if(isset($_POST['hapusmerk'])){
        $idmerk = $_POST['idmerk'];
    
        $deletemerk = mysqli_query($koneksi, "call delete_merk('$idmerk')");
    
        if($deletemerk){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script> ";
        } else {
            echo"
            <script>
                alert('Data GAGAL Dihapus!');    
            </script> ";
        }
    }

    //hapus sepatu
    if(isset($_POST['hapussepatu'])){
        $idsepatu = $_POST['idsepatu'];
    
        $deletesepatu = mysqli_query($koneksi, "call delete_sepatu('$idsepatu')");
    
        if($deletesepatu){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>";
            }
    }

    //hapus detail bayar
    if(isset($_POST['hapusdetail'])){
        $iddetail = $_POST['iddetail'];

        $deletedetail = mysqli_query($koneksi, "call delete_detail('$iddetail')");

        if($deletedetail){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

    //hapus header bayar
    if(isset($_POST['hapusheader'])){
        $nota = $_POST['nota'];

        $deleteheader = mysqli_query($koneksi, "call delete_header('$nota')");

        if($deleteheader){
            echo"
                <script>
                    alert('Data Berhasil Dihapus!');    
                </script>
            ";
        }
    }

 
?>