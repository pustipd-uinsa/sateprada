<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/logo.png"/>
   <link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
h4,p {
    margin: 0 0 0px;
}
</style>
<?php 
error_reporting(0) ;
      include '../../koneksi/koneksi.php'; 
      $qa=  $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_instansi where kd_instansi='$_GET[kdi]'"));
      ?>
<body onload="window.print();">
     <table style="width: 100%">
        <tr>
           <td width="10%">
          <img src="../../images/user/<?php echo $qa['logo']; ?>" alt="" style="width:100px;height:70px;float: right;">
          </td>
          <td width="90%"> 
            <center>
            <h3><b><?php echo strtoupper($qa['nm_instansi']); ?></b></h3>
          <p><?php echo $qa['alamat']; ?> Telp. <?php echo $qa['telp']; ?> - Fax. <?php echo $qa['fax']; ?></p>
          <p><span>Website : <?php echo $qa['web']; ?></span>  <span>E-mail : <?php echo $qa['email']; ?></span> </p>
        </center>
        </td>
         
        </tr>
    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
  <center><b>FORM NILAI SUPERVISOR INSTANSI</b></center>
  <center><b>PLP/PMPI/PPL</b></center>
 <br>
  </div>
  <?php
                 
                 
                    $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nilai_instansi.*,tb_instansi.nm_instansi,tb_penempatan.posisi,tb_penempatan.tgl_mulai_pkl,tb_penempatan.tgl_akhir_pkl FROM tb_nilai_instansi,tb_mhs,tb_instansi,tb_penempatan where tb_instansi.kd_instansi=tb_nilai_instansi.kd_instansi and tb_mhs.nim=tb_nilai_instansi.nim and tb_penempatan.nim=tb_mhs.nim and tb_mhs.nim='$_GET[nim]'"));

                    $total=$q['disiplin']+$q['jujur']+$q['sosialisasi']+$q['k_manajerial']+$q['komunikasi']+$q['k_komputer']+$q['k_tim']+$q['p_ilmu_penunjang']+$q['kwa_hasil_kerja']+$q['motivasi_hal_baru']+$q['total_nilai_inst'];
                    $nilai=$total/1;
                    ?> 
  <div style="width: 100%;float: left">
    <table>
      <tr>
        <td>NAMA INSTANSI</td>
        <td>: </td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($qa['nm_instansi']); ?></td>
      </tr>
      <tr>
        <td>NAMA MAHASISWA</td>
        <td>: </td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['nama']); ?></td>
      </tr>
       <tr>
        <td>NIM</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['nim']); ?></td>
      </tr>
       <tr>
        <td>TGL PELAKSANAAN PPL</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper(date('d F Y',strtotime($q['tgl_mulai_pkl']))); ?> - <?php echo strtoupper(date('d F Y',strtotime($q['tgl_akhir_pkl']))); ?></td>
      </tr>
       <tr>
        <td>NAMA SUPERVISOR (PENILAI)</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['nm_pbb_instansi']); ?></td>
      </tr>
      
      <tr>
        <td>JABATAN SUPERVISOR</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['jabatan']); ?></td>
      </tr>
    </table>
    <br>
                      
                    <table class="table table-bordered table-striped">
                      <!-- <tr>
                        <td>1.</td>
                        <td> Kedisiplinan</td>
                        <td><?php echo $q['disiplin']; ?></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Kejujuran</td>
                        <td><?php echo $q['jujur']; ?></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kemampuan Bersosialisasi ditempat Linkungan PKL</td>
                        <td><?php echo $q['sosialisasi']; ?></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kemampuan Komunikasi ( Lisan atau Tulisan) Dala Bekerja</td>
                        <td><?php echo $q['komunikasi']; ?></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Kemapuan Manajerial</td>
                        <td><?php echo $q['k_manajerial']; ?></td>
                      <tr>
                        <td>6.</td>
                        <td>Kemampuan Bekerjasama Dalam Tim</td>
                        <td><?php echo $q['k_tim']; ?></td>
                      </tr>
                      <tr>
                        <td>7.</td>
                        <td>Kemampuan Dalam Aplikasi Dunia Komputer</td>
                        <td><?php echo $q['k_komputer']; ?></td>
                      </tr>
                      <tr>
                        <td>8.</td>
                        <td>Penguasaan Ilmu penunjang (Administrasi,akuntansi,dll)</td>
                        <td><?php echo $q['p_ilmu_penunjang']; ?></td>
                      </tr>
                      <tr>
                        <td>9.</td> 
                        <td>Kualitas Hasil Kerja</td>
                        <td><?php echo $q['kwa_hasil_kerja']; ?></td>
                      </tr>
                       <tr>
                        <td>10.</td> 
                        <td>Motivasi Dalam Mempelajari Hal Baru Untuk Kemajuan Instansi</td>
                        <td><?php echo $q['motivasi_hal_baru']; ?></td>
                      </tr>
                      <tr> -->
                        <td>1</td> 
                        <td>Total Nilai Dari Instansi</td>
                        <td><?php echo $q['total_nilai_inst']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td><b><?php echo $total; ?></b></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Nilai Instansi</b></td>
                        <td><b><?php echo $nilai; ?></b></td>
                      </tr>
                  </table>
  </div>
<div class="ttd" style="float: right;">
  Surabaya , <?php echo date("d F Y"); ?><br>
  <br>
  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555"><?php echo $q['nm_pbb_instansi'] ?></div>
NIP : <?php echo $q['nip'] ?>
</div>
</body>
</html>
