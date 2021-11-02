<?php
class M_pendaftaran extends CI_Model{

	function kirim_pesan($nama_lengkap,$jenis_kelamin,$tanggal_lahir,$agama,$alamat,$nomer_telepone,$nama_orang_tua,$telepone_orang_tua,$jurusan_yangdiambil,$nama_sekolah,$alamat_sekolah,$rekomendasi,$bukti_pendaftaran){
		$hsl=$this->db->query("INSERT INTO `tbl_pendaftaran` (`ID`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `alamat`, `nomer_telepone`, `nama_orang_tua`, `telepone_orang_tua`, `jurusan_yangdiambil`, `nama_sekolah`, `alamat_sekolah`, `rekomendasi`, `bukti_pendaftaran`) VALUES (NULL, '$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$agama', '$alamat', '$nomer_telepone', '$nama_orang_tua', '$telepone_orang_tua', '$jurusan_yangdiambil', '$nama_sekolah', '$alamat_sekolah', '$rekomendasi', '$bukti_pendaftaran')");
		return $hsl;
	}

	function get_all_inbox(){
		$hsl=$this->db->query("SELECT * FROM `tbl_pendaftaran` WHERE 2");
		return $hsl;
	}

	function hapus_kontak($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pendaftaran WHERE ID='$kode'");
		return $hsl;
	}

	function hapus_semua(){
		$hsl=$this->db->query("DELETE FROM `tbl_pendaftaran` WHERE `ID`");
		return $hsl;
	}
	function update_status_kontak(){
		$hsl=$this->db->query("SELECT * FROM `tbl_pendaftaran` WHERE 2");
		return $hsl;
	}
	 function getAll(){
		 $data_pendaftar = $this->db->get('ID')->result();
		 return $data_pendaftar;
	}




	function update_profile($id,$nama_lengkap,$jenis_kelamin,$tanggal_lahir,$agama,$alamat,$nomer_telepone,$nama_orang_tua,$telepone_orang_tua,$jurusan_yangdiambil,$nama_sekolah,$alamat_sekolah,$rekomendasi){
		$hsl=$this->db->query(
			"UPDATE tbl_pendaftaran SET nama_lengkap = '$nama_lengkap',jenis_kelamin='$jenis_kelamin',tanggal_lahir = '$tanggal_lahir', agama = '$agama', alamat = '$alamat', nomer_telepone = '$nomer_telepone', nama_orang_tua = '$nama_orang_tua', telepone_orang_tua = '$telepone_orang_tua', jurusan_yangdiambil = '$jurusan_yangdiambil', nama_sekolah = '$nama_sekolah', alamat_sekolah = '$alamat_sekolah', rekomendasi = '$rekomendasi' WHERE ID = '$id'");
		return $hsl;
	}
	
}