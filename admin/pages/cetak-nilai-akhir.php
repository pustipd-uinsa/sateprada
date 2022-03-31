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

<body onload="window.print();">
     <table style="width: 100%">
        <tr>
           <td width="10%">
          <img src="../../images/logo.png" alt="" style="width:100px;height:70px;float: right;">
          </td>
          <td width="90%"> 
            <center>
            <h3><b>UIN Sunan Ampel Surabaya</b></h3>
          <h4>Fakultas Tarbiyah dan Keguruan</h4>
          <p>Jl. A.Yani 117 Surabaya 60237 Telp. 031-8410298 Fax.031-8413300</p>
          <p><span>Website : www.uinsby.ac.id</span>  <span>E-mail : info.uinnsby.ac.id</span> </p>
        </center>
        </td>
         
        </tr>
    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
  <center><b>NILAI AKHIR MAHASISWA</b></center>
  <center><b>PLP/PMPI/PPL</b></center>
 <br>
  </div>
   <?php
                    error_reporting(0);
                   include '../../koneksi/koneksi.php'; 
                      $sql=mysqli_query($koneksi,"SELECT * FROM tb_mhs,tb_penempatan,tb_dosen, tb_nmprodi where tb_dosen.nip=tb_mhs.nip_pembimbing and tb_penempatan.nim=tb_mhs.nim and tb_nmprodi.id=tb_mhs.prodi and tb_mhs.nim='$_GET[nim]'");
                    
                     $q=mysqli_fetch_array($sql);
                     

                        $nim=$q['nim'];

                         $q1=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_nilai_dosen where nim='$nim'"));

                    $total1=$q1['penguasaan_bahasa']+$q1['kemampuan_pengembangan']+$q1['penguasaan_kaidah']+$q1['kelengkapan_laporan']+(int)$q1['total_nilai_dos'];
                    $ndos=$total1/1;

                    $q2=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_nilai_instansi where nim='$nim'"));

                    $total2=$q2['disiplin']+$q2['jujur']+$q2['sosialisasi']+$q2['k_manajerial']+$q2['komunikasi']+$q2['k_komputer']+$q2['k_tim']+$q2['p_ilmu_penunjang']+$q2['kwa_hasil_kerja']+$q2['motivasi_hal_baru']+(int)$q2['total_nilai_inst'];
                    $nins=$total2/1;

                    $nakhir=$ndos*0.40+$nins*0.60;
                     ?>
  <div style="width: 100%;float: left;margin-bottom: 35px;margin-top: 30px;">
    <table>
      <tr>
        <td>NAMA MATAKULIAH</td>
        <td>: </td>
        <td style="padding-left: 5px;"> PRAKTEK PENGALAMAN LAPANGAN</td>
      </tr>
       <tr>
        <td>SEMESTER/TA</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['periode']); ?></td>
      </tr>
    
      <tr>
        <td>NAMA DOSEN PEMBIMBING</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['nm_dosen']); ?></td>
      </tr>
      <tr>
        <td>NIP DOSEN PEMBIMBING</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['nip_pembimbing']); ?></td>
      </tr>
    </table>
    <br>
    <p><br></p>
                      
                     <table class="table table-bordered table-striped">
                        <tr>
                        <td><b><center>No</center></b></td>
                        <td><b><center>Nama Mahasiswa</center></b></td>
                        <td><b><center>NIM</center></b></td>
                        <td><b><center>Nilai Dosen Pamong</center></b></td>
                        <td><b><center>Nilai Dosen Pembimbing</center></b></td>
                        <td><b><center>Nilai Akhir</center></b></td>
                      </tr>
                     <tr>
                        <td>1</td>
                        <td><?php echo strtoupper($q['nama']); ?></td>
                        <td><?php echo strtoupper($q['nim']); ?></td>
                        <td><?php echo $nins; ?></td>
                        <td><?php echo $ndos; ?></td>
                        <td><?php echo round($nakhir); ?></td>
                      </tr>
                  </table>
                  <br>
                  <p>Catatan : -</p>
                  <p>Nilai Akhir PKL = <i>Nilai Supervisor x 60% + Nilai Dosen Pembimbing x 40%</i></p>
  </div>
  <p></p>
  <div class="ttd" style="float: left;">
  Diketahui,<br>
  Kepala Prodi
 <br>
  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555"><?php echo $q['kaprodi'] ?></div>
NIP : <?php echo $q['nip_kaprodi'] ?>
</div>
<div class="ttd" style="float: right;">
  Surabaya, <?php echo date("d F Y"); ?><br>
Dosen Pembimbing
  <br>
  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555"><?php echo $q['nm_dosen'] ?></div>
NIP : <?php echo $q['nip'] ?>
</div>
</body>
</html>
