<?php
class pendaftaran extends CI_Controller{
  function __construct(){
		parent::__construct();
      $this->load->model('m_pendaftaran');
      $this->load->model('m_pengguna');
      $this->load->helper(array('form', 'url'));
      $this->load->library('upload');
  		
	}
	function index(){
		  $this->load->view('depan/v_pendaftaran');
	}


  function kirim_pendaftaran(){
            $config['upload_path'] = './assets/bukti/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

          $this->upload->initialize($config);
          if(!empty($_FILES['bukti_pendaftaran']['name']))
          {
              if ($this->upload->do_upload('bukti_pendaftaran'))
              {
                      $gbr = $this->upload->data();
                      //Compress Image
                      $config['image_library']='gd2';
                      $config['source_image']='./assets/bukti/'.$gbr['file_name'];
                      $config['create_thumb']= FALSE;
                      $config['maintain_ratio']= FALSE;
                      $config['quality']= '60%';
                      $config['width']= 300;
                      $config['height']= 300;
                      $config['new_image']= './assets/bukti/'.$gbr['file_name'];
                      $this->load->library('image_lib', $config);
                      $this->image_lib->resize();
                      $photo=$gbr['file_name'];
                     
          $nama_lengkap=strip_tags($this->input->post('nama_lengkap'));
          $jenis_kelamin=strip_tags($this->input->post('jenis_kelamin'));
          $tanggal_lahir=strip_tags($this->input->post('tanggal_lahir'));
          $agama=strip_tags($this->input->post('agama'));
          $alamat=strip_tags($this->input->post('alamat'));
          $nomer_telepone=strip_tags($this->input->post('nomer_telepone'));
          $nama_orang_tua=strip_tags($this->input->post('nama_orang_tua'));
          $telepone_orang_tua=strip_tags($this->input->post('telepone_orang_tua'));
          $jurusan_yangdiambil=strip_tags($this->input->post('jurusan_yangdiambil'));
          $nama_sekolah=strip_tags($this->input->post('nama_sekolah'));
          $alamat_sekolah=strip_tags($this->input->post('alamat_sekolah'));
          $rekomendasi=strip_tags($this->input->post('rekomendasi'));
          $this->m_pendaftaran->kirim_pesan($nama_lengkap,$jenis_kelamin,$tanggal_lahir,$agama,$alamat,$nomer_telepone,$nama_orang_tua,$telepone_orang_tua,$jurusan_yangdiambil,$nama_sekolah,$alamat_sekolah,$rekomendasi,$photo);
          echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Terimakasih Telah mendaftar di sekolah kami,selanjutnya admin kami akan menghubungi anda</p>');
          redirect('pendaftaran');
      }
      else{
                  echo $this->session->set_flashdata('msg','warning');
                  redirect('pendaftaran');
              }
               
          }else{
          $nama_lengkap=strip_tags($this->input->post('nama_lengkap'));
          $jenis_kelamin=strip_tags($this->input->post('jenis_kelamin'));
          $tanggal_lahir=strip_tags($this->input->post('tanggal_lahir'));
          $agama=strip_tags($this->input->post('agama'));
          $alamat=strip_tags($this->input->post('alamat'));
          $nomer_telepone=strip_tags($this->input->post('nomer_telepone'));
          $nama_orang_tua=strip_tags($this->input->post('nama_orang_tua'));
          $telepone_orang_tua=strip_tags($this->input->post('telepone_orang_tua'));
          $jurusan_yangdiambil=strip_tags($this->input->post('jurusan_yangdiambil'));
          $nama_sekolah=strip_tags($this->input->post('nama_sekolah'));
          $alamat_sekolah=strip_tags($this->input->post('alamat_sekolah'));
          $rekomendasi=strip_tags($this->input->post('rekomendasi'));
          $this->m_pendaftaran->kirim_pesan($nama_lengkap,$jenis_kelamin,$tanggal_lahir,$agama,$alamat,$nomer_telepone,$nama_orang_tua,$telepone_orang_tua,$jurusan_yangdiambil,$nama_sekolah,$alamat_sekolah,$rekomendasi);
          echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Terimakasih Telah mendaftar di sekolah kami,selanjutnya admin kami akan menghubungi tanpa poto</p>');
          redirect('pendaftaran');
    }
  }
}