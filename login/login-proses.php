<?php
session_start();
include './../koneksi/koneksi.php';
    $username = $_POST['user'];
    $password = md5($_POST['pas']);
    // $level = $_POST['level'];

    $sql_mhs = "SELECT * FROM tb_mhs WHERE username='".$username."' AND password='".$password."'AND stts_hps='0'";
    $query = mysqli_query($koneksi, $sql_mhs) or die(mysqli_error());
    if (mysqli_num_rows($query) > 0) {
        $cid=mysqli_fetch_array($query);
        $_SESSION['id']=$cid['nim'];
        $_SESSION['nama']=$cid['nama'];
        $_SESSION['foto']=$cid['foto'];
        $_SESSION['isLoggedIn']='yes';
        $_SESSION['lev']="Mahasiswa";
        header('Location: ../admin');
    } else {
        $sql_dosen = "SELECT * FROM tb_dosen WHERE username='".$username."' AND password='".$password."'";
        $query = mysqli_query($koneksi, $sql_dosen) or die(mysqli_error());
        if (mysqli_num_rows($query) > 0) {
            $cid=mysqli_fetch_array($query);
            $_SESSION['id']=$cid['nip'];
            $_SESSION['nama']=$cid['nm_dosen'];
            $_SESSION['foto']="default.png";
            $_SESSION['isLoggedIn']='yes';
            $_SESSION['lev']="Dosen";
            header('Location: ../admin');
        } else {
            $sql_prodi = "SELECT * FROM tb_adm_prodi WHERE username='".$username."' AND password='".$password."'";
            $query = mysqli_query($koneksi, $sql_prodi) or die(mysqli_error());
            if (mysqli_num_rows($query) > 0) {
                $cid=mysqli_fetch_array($query);
                $_SESSION['id']=$cid['kd_prodi'];
                $_SESSION['nama']=$cid['nama'];
                $_SESSION['foto']="default.png";
                $_SESSION['isLoggedIn']='yes';
                $_SESSION['lev']="LabFTK";
                header('Location: ../admin');
            } else {
                $sql_instansi = "SELECT * FROM tb_instansi WHERE username='".$username."' AND password='".$password."'";
                $query = mysqli_query($koneksi, $sql_instansi) or die(mysqli_error());
                if (mysqli_num_rows($query) > 0) {
                    $cid=mysqli_fetch_array($query);
                    $_SESSION['id']=$cid['kd_instansi'];
                    $_SESSION['nama']=$cid['nm_instansi'];
                    $_SESSION['foto']="default.png";
                    $_SESSION['isLoggedIn']='yes';
                    $_SESSION['lev']="Instansi";
                    header('Location: ../admin');
                } else {
                    $sql_nmprodi = "SELECT * FROM tb_nmprodi WHERE username='".$username."' AND password='".$password."'";
                    $query = mysqli_query($koneksi, $sql_nmprodi) or die(mysqli_error());
                    if (mysqli_num_rows($query) > 0) {
                        $cid=mysqli_fetch_array($query);
                        $_SESSION['id']=$cid['id'];
                        $_SESSION['nama']=$cid['prodi'];
                        $_SESSION['foto']="default.png";
                        $_SESSION['isLoggedIn']='yes';
                        $_SESSION['lev']="nmprodi";
                        // Prodi1 = prodi
                        header('Location: ../admin');
                    } else {
                        echo "<script type='text/javascript'>
                alert('Username Atau Password Anda Salah..!');
                </script>";
                        echo "<script> window.history.back(); </script>";
                    }
                }
            }
        }
    }

 //    if($level=="Mahasiswa"){
 //        $sql = "SELECT * FROM tb_mhs WHERE username='".$username."' AND password='".$password."'";
 //    }elseif ($level=="Dosen") {
 //       $sql = "SELECT * FROM tb_dosen WHERE username='".$username."' AND password='".$password."'";
 //    }elseif ($level=="Prodi") {
 //       $sql = "SELECT * FROM tb_adm_prodi WHERE username='".$username."' AND password='".$password."'";
 //    }else{
 //        $sql = "SELECT * FROM tb_instansi WHERE username='".$username."' AND password='".$password."'";
 //    }
 //    $query = mysqli_query($koneksi,$sql) or die (mysqli_error());
 //        $row = mysqli_num_rows($query);
 //        // jika $row > 0 atau username dan password ditemukan
 //        if($row > 0){
 //            $cid=mysqli_fetch_array($query);
 //             if($level=="Mahasiswa"){
 //                $_SESSION['id']=$cid['nim'];
 //                $_SESSION['nama']=$cid['nama'];
 //                $_SESSION['foto']=$cid['foto'];
 //            }elseif ($level=="Dosen") {
 //               $_SESSION['id']=$cid['nip'];
 //               $_SESSION['nama']=$cid['nm_dosen'];
 //               $_SESSION['foto']="default.png";
 //            }elseif ($level=="Prodi") {
 //               $_SESSION['id']=$cid['kd_prodi'];
 //               $_SESSION['nama']=$cid['nama'];
 //               $_SESSION['foto']="default.png";
 //            }else{
 //                $_SESSION['id']=$cid['kd_instansi'];
 //                $_SESSION['nama']=$cid['nm_instansi'];
 //                $_SESSION['foto']="default.png";
 //            }

 //            $_SESSION['isLoggedIn']='yes';
 //            $_SESSION['lev']=$level;

 //        }else{
 //          echo "<script type='text/javascript'>
    // 	alert('Username Atau Password Anda Salah..!');
    // </script>";
    // echo "<script> window.history.back(); </script>";

 //        }
