<?php
class pendaftaran extends CI_Controller{
  function __construct(){
		parent::__construct();
      $this->load->model('m_pendaftaran');
      $this->load->model('m_pengunjung');
  		
	}
	function index(){
		  $this->load->view('depan/v_pendaftaran');
	}

  function kirim_pesan(){
      $nama_lengkap=htmlspecialchars($this->input->post('nama_lengkap',TRUE),ENT_QUOTES);
      $jenis_kelamin=htmlspecialchars($this->input->post('jenis_kelamin',TRUE),ENT_QUOTES);
      $tanggal_lahir=htmlspecialchars($this->input->post('tanggal_lahir',TRUE),ENT_QUOTES);
      $agama=htmlspecialchars($this->input->post('agama',TRUE),ENT_QUOTES);
      $alamat=htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES);
      $nomer_telepone=htmlspecialchars($this->input->post('nomer_telepone',TRUE),ENT_QUOTES);
      $nama_orang_tua=htmlspecialchars($this->input->post('nama_orang_tua',TRUE),ENT_QUOTES);
      $telepone_orang_tua=htmlspecialchars($this->input->post('telepone_orang_tua',TRUE),ENT_QUOTES);
      $jurusan_yangdiambil=htmlspecialchars($this->input->post('jurusan_yangdiambil',TRUE),ENT_QUOTES);
      $nama_sekolah=htmlspecialchars($this->input->post('nama_sekolah',TRUE),ENT_QUOTES);
      $alamat_sekolah=htmlspecialchars($this->input->post('alamat_sekolah',TRUE),ENT_QUOTES);
      $bukti_pendaftaran=htmlspecialchars($this->input->post('bukti_pendaftaran',TRUE),ENT_QUOTES);
      $this->m_pendaftaran->kirim_pesan($nama_lengkap,$jenis_kelamin,$tanggal_lahir,$agama,$nomer_telepone,$nama_orang_tua,$nama_orang_tua,$telepone_orang_tua,$jurusan_yangdiambil,$nama_sekolah,$alamat_sekolah,$bukti_pendaftaran);
      echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Terimakasih Telah mendaftar di sekolah kami,selanjutnya admin kami akan menghubungi anda</p>');
      redirect('pendaftaran');
  }
}
