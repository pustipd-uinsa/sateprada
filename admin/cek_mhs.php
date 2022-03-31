<?php 
	include '../koneksi/koneksi.php';
	$val = $_POST['val'];
	$sql = mysqli_query($koneksi,"SELECT * FROM tb_penempatan where nim = '$val'");

	if (mysqli_num_rows($sql) > 0){
		echo "data ada";
	} else {
		$sql_prodi = mysqli_query($koneksi,"SELECT tb_nmprodi.prodi as prod, id FROM tb_nmprodi inner join tb_mhs on tb_nmprodi.id = tb_mhs.prodi where tb_mhs.nim = '$val'");
		$d_prodi = mysqli_fetch_array($sql_prodi);
		$id_prodi = $d_prodi['id'];
		$prod = $d_prodi['prod'];

		$select_jum_kuota = mysqli_query($koneksi,"SELECT tb_kuota.*, tb_instansi.nm_instansi FROM `tb_kuota` inner join tb_instansi on tb_instansi.kd_instansi = tb_kuota.kd_instansi where id_prodi = $id_prodi");
		$temp = '<div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Prodi</label>
                                   <input type="text" class="form-control" name="prodi" id="penempatan_prodi" value="'.$prod.'" readonly="" placeholder="Pilih Mahasiswa">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Penempatan / Nama Instansi</label>
                                     <select name="instansi" class="form-control select2ku">
                                     <option value="">-Pilih-</option>';
		while($d_select_jum_kuota = mysqli_fetch_array($select_jum_kuota)){
			$kd_instansi = $d_select_jum_kuota['kd_instansi'];
			$select_jum_mhs_prod = mysqli_query($koneksi,"SELECT * from tb_penempatan inner JOIN tb_mhs on tb_penempatan.nim  = tb_mhs.nim where tb_mhs.prodi = $id_prodi AND tb_penempatan.kd_instansi = '$kd_instansi' AND tb_mhs.stts_hps ='0'");
			$jum_mhs = mysqli_num_rows($select_jum_mhs_prod);

			if ($jum_mhs < $d_select_jum_kuota['jum_kuota'] ){
				//$temp .= $d_select_jum_kuota['kd_instansi']." ".$d_select_jum_kuota['jum_kuota']." < ".$jum_mhs." ";
				
				//$temp .= $d_select_jum_kuota['kd_instansi']." ".$d_select_jum_kuota['jum_kuota']." > ".$jum_mhs." ";
				$s_instansi = mysqli_query($koneksi,"SELECT * from tb_instansi where kd_instansi = '$kd_instansi'");
				$d_instansi = mysqli_fetch_array($s_instansi);
				$temp .= '<option value="'.$d_instansi['kd_instansi'].'">'.$d_select_jum_kuota['nm_instansi'].'</option>';
				
			} else {
				$temp .= '';
			}

			
		}

		$temp .= '</select>
                  </div>
                 
            </div>
        </div>
        <br>';
		//$select_jum_mhs_prod = mysqli_query($koneksi,"SELECT * from tb_penempatan inner JOIN tb_mhs on tb_penempatan.nim  = tb_mhs.nim where tb_mhs.prodi = 14");

		echo $temp;
	}
	// echo $val;
?>