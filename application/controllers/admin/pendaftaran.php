<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pendaftaran');
	}

	function index(){
		$this->m_pendaftaran->update_status_kontak();
		$x['data']=$this->m_pendaftaran->get_all_inbox();
		$this->load->view('admin/v_pendaftaran',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_pendaftaran->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/pendaftaran');
	}

	function hapus_semuadata(){
		$kode=$this->input->post('kode');
		$this->m_pendaftaran->hapus_semua();
		echo $this->session->set_flashdata('msg','succes-semua');
		redirect('admin/pendaftaran');
	}

	function excel()
		{
			$this->load->model('m_pendaftaran');
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'ID');
			$sheet->setCellValue('B1', 'nama_lengkap');
			$sheet->setCellValue('C1', 'jenis_kelamin');
			$sheet->setCellValue('D1', 'tanggal_lahir');
			$sheet->setCellValue('E1', 'agama');
			$sheet->setCellValue('F1', 'alamat');
			$sheet->setCellValue('G1', 'nomer_telepone');
			$sheet->setCellValue('H1', 'nama_orang_tua');
			$sheet->setCellValue('I1', 'telepone_orang_tua');
			$sheet->setCellValue('J1', 'jurusan_yangdiambil');
			$sheet->setCellValue('K1', 'nama_sekolah');
			$sheet->setCellValue('L1', 'alamat_sekolah');
			$sheet->setCellValue('L1', 'rekomendasi');
			$sheet->setCellValue('L1', 'bukti_pendaftaran');

			
			$pendaftaran = $this->m_pendaftaran->getAll();
			$no = 1;
			$x = 2;
			foreach($pendaftaran as $row)
			{
				$sheet->setCellValue('A'.$x, $ID++);
				$sheet->setCellValue('B'.$x, $row->nama_lengkap);
				$sheet->setCellValue('C'.$x, $row->jenis_kelamin);
				$sheet->setCellValue('D'.$x, $row->tanggal_lahir);
				$sheet->setCellValue('E'.$x, $row->agama);
				$sheet->setCellValue('E'.$x, $row->alamat);
				$sheet->setCellValue('E'.$x, $row->nomer_telepone);
				$sheet->setCellValue('E'.$x, $row->nama_orang_tua);
				$sheet->setCellValue('E'.$x, $row->telepone_orang_tua);
				$sheet->setCellValue('E'.$x, $row->jurusan_yangdiambil);
				$sheet->setCellValue('E'.$x, $row->agama);
				$sheet->setCellValue('E'.$x, $row->nama_sekolah);
				$sheet->setCellValue('E'.$x, $row->alamat_sekolah);
				$sheet->setCellValue('E'.$x, $row->rekomendasi);
				$sheet->setCellValue('E'.$x, $row->bukti_pendaftaran);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-pendaftaran-siswa';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
		}
}