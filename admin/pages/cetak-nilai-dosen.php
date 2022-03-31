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
          <p><span>Website : www.uinsby.ac.id</span>  <span>E-mail : info.uinnsby.ac.id</span> </p>>
        </center>
        </td>
         
        </tr>
    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
  <center><b>FORM NILAI PEMBIMBING</b></center>
  <center><b>PLP/PMPI/PPL</b></center>
 <br>
  </div>
  <?php
                       include '../../koneksi/koneksi.php'; 

                       $query_mhs = mysqli_query($koneksi,"SELECT tb_mhs.*,tb_instansi.nm_instansi,tb_dosen.nm_dosen,tb_penempatan.posisi FROM tb_mhs,tb_instansi,tb_dosen,tb_penempatan where tb_instansi.kd_instansi=tb_penempatan.kd_instansi and tb_mhs.nim=tb_penempatan.nim and tb_dosen.nip=tb_mhs.nip_pembimbing and tb_mhs.nim='$_GET[nim]'");

                       if (mysqli_num_rows($query_mhs) > 0){
                        $q_mhs=mysqli_fetch_array($query_mhs);
                        $nama_mhs = $q_mhs['nama'];
                        $nim_mhs = $q_mhs['nim'];
                        $nm_instansi_mhs = $q_mhs['nm_instansi'];
                        $posisi_mhs = $q_mhs['posisi'];
                        $nm_dosen_mhs = $q_mhs['nm_dosen'];
                        $nip = $q_mhs['nip_pembimbing'];
                       }else {
                        $nama_mhs = "";
                        $nim_mhs = "";
                        $nm_instansi_mhs = "";
                        $posisi_mhs = "";
                        $nm_dosen_mhs = "";
                        $nip = "";
                       }

                       $query = mysqli_query($koneksi,"SELECT tb_mhs.*,tb_nilai_dosen.*,tb_instansi.nm_instansi,tb_dosen.nm_dosen,tb_penempatan.posisi FROM tb_nilai_dosen,tb_mhs,tb_instansi,tb_dosen,tb_penempatan where tb_instansi.kd_instansi=tb_penempatan.kd_instansi and tb_mhs.nim=tb_penempatan.nim and tb_dosen.nip=tb_mhs.nip_pembimbing and tb_mhs.nim=tb_nilai_dosen.nim and tb_mhs.nim='$_GET[nim]'");
                    if (mysqli_num_rows($query) > 0){
                      $q=mysqli_fetch_array($query);
                      $penguasaan_bahasa = $q['penguasaan_bahasa'];
                      $penguasaan_kaidah = $q['penguasaan_kaidah'];
                      $kemampuan_pengembangan = $q['kemampuan_pengembangan'];
                      $kelengkapan_laporan = $q['kelengkapan_laporan'];
                      $total_nilai_dos = $q['total_nilai_dos'];

                      $total=$q['penguasaan_bahasa']+$q['kemampuan_pengembangan']+$q['penguasaan_kaidah']+$q['kelengkapan_laporan']+$q['total_nilai_dos'];
                      $nilai=$total/1;
                    } else {
                      $penguasaan_bahasa = 0;
                      $penguasaan_kaidah = 0;
                      $kemampuan_pengembangan = 0;
                      $kelengkapan_laporan = 0;
                      $total_nilai_dos = 0;
                      $total = 0;
                      $nilai = 0;
                    }
                 
                    
                    ?> 
  <div style="width: 100%;float: left">
    <table>
      <tr>
        <td>NAMA MAHASISWA</td>
        <td>: </td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($nama_mhs); ?></td>
      </tr>
       <tr>
        <td>NIM</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($nim_mhs); ?></td>
      </tr>
       <tr>
        <td>NAMA INSTANSI</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($nm_instansi_mhs); ?></td>
      </tr>
       <tr>
        <td>TEMPAT BAGIAN PPL</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($posisi_mhs); ?></td>
      </tr>
       <tr>
        <td>JUDUL LAPORAN</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($q['jd_lap_pkl']); ?></td>
      </tr>
      <tr>
        <td>NAMA DOSEN PEMBIMBING</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($nm_dosen_mhs); ?></td>
      </tr>
    </table>
    <br>
                      
                     <table class="table table-bordered table-striped">
                        <tr>
                        <td><b><center>NO</center></b></td>
                        <td><b><center>Aspek Yang Dinilai</center></b></td>
                        <td><b><center>Nilai</center></b></td>
                      </tr>
                      <!-- <tr>
                        <td>1.</td>
                        <td> Penguasaan Bahasa Dalam Menuangkan ide, Gagasan Dalam Laporan PKL</td>
                        <td><?php echo $penguasaan_bahasa; ?></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Kemampuan Mengembangkan dan Mempertahankan ide Selama Bimbingan </td>
                        <td><?php echo $kemampuan_pengembangan; ?></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Penguasaan Kaidah Penulisan Laporan PKL</td>
                        <td><?php echo $penguasaan_kaidah; ?></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kelengkapan Laporan PKL (Isi, Lampiran, Dll)</td>
                        <td><?php echo $kelengkapan_laporan; ?></td>
                      </tr> -->
                      <tr>
                        <td>1.</td>
                        <td>Nilai Dari Dosen</td>
                        <td><?php echo $total_nilai_dos; ?></td>
                      </tr>
                     
                        <td colspan="2"><b>Total Score</b></td>
                        <td><b><?php echo $total; ?></b></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Nilai Dosen Pembimbing</b></td>
                        <td><b><?php echo $nilai; ?></b></td>
                      </tr>
                  </table>
  </div>
<div class="ttd" style="float: right;">
  Surabaya, <?php echo date("d F Y"); ?><br>
Dosen Pembimbing
  <br>
  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555"><?php echo $nm_dosen_mhs ?></div>
NIP : <?php echo $nip ?>
</div>
</body>
</html>
