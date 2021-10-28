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

	public function excel()
		{
			include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
			$excel = new PHPExcel();

			//setting awal file excel
			$excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Pendaftaran PPDB SMK ICB Cinta Wisata")
            ->setSubject("PPDB")
            ->setDescription("Laporan endaftaran PPDB SMK ICB Cinta Wisata")
            ->setKeywords("Data PPDB");
			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = array(
				'font' => array('bold' => true), // Set font nya jadi bold
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);
			// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
			$style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
			);
			// $jenis = $this->input->post('jenis');
			//$tahun = '2021';
			//$periode = $this->input->post('periode');
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "Data PPDB SMK ICB Cinta Wisata " ); // Set kolom A1 dengan tulisan "DATA SISWA"
			$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
			$getdata = $this->db->get('tbl_pendaftaran')->result();
			// $getdata = $this->db->get_where('tbl_entry', array('kategori'=>'BOS','jenis'=>$jenis, 'YEAR(tanggal)'=>$tahun))->result();
	
			// Buat header tabel nya pada baris ke 3
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        	$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Lengkap"); // Set kolom A3 dengan tulisan "NO"
        	$excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis Kelamin"); // Set kolom B3 dengan tulisan "NIS"
        	$excel->setActiveSheetIndex(0)->setCellValue('D3', "Tanggal Lahir"); // Set kolom C3 dengan tulisan "NAMA"
        	$excel->setActiveSheetIndex(0)->setCellValue('E3', "Agama"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        	$excel->setActiveSheetIndex(0)->setCellValue('F3', "Alamat");
        	$excel->setActiveSheetIndex(0)->setCellValue('G3', "Nomer Telepon Siswa");
        	$excel->setActiveSheetIndex(0)->setCellValue('H3', "Nama Orang Tua");
        	$excel->setActiveSheetIndex(0)->setCellValue('I3', "Nomer Telepon Orang Tua");
        	$excel->setActiveSheetIndex(0)->setCellValue('J3', "Jurusan Yang Diambil");
			$excel->setActiveSheetIndex(0)->setCellValue('K3', "Asal Sekolah");
			$excel->setActiveSheetIndex(0)->setCellValue('L3', "Alamat Sekolah");
			$excel->setActiveSheetIndex(0)->setCellValue('M3', "Rekomendasi");
			$excel->setActiveSheetIndex(0)->setCellValue('N3', "bukti Pendaftaran");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        	$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        	$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);

			// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			$no = 1; // Untuk penomoran tabel, di awal set dengan 1
			$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
			foreach ($getdata as $data) { // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_lengkap);
				$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->jenis_kelamin);
				$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->tanggal_lahir);
				$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->agama);
				$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->alamat);
				$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->nomer_telepone);
				$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->nama_orang_tua);
				$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->telepone_orang_tua);
				$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->jurusan_yangdiambil);
				$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->nama_sekolah);
				$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->alamat_sekolah);
				$excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->rekomendasi);
				$excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->bukti_pendaftaran);
	
				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);

	
				$no++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}

			// Set width kolom
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('J')->setWidth(35);
			$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('L')->setWidth(35);
			$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('N')->setWidth(35);
	
			 // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
			 $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			 // Set orientasi kertas jadi LANDSCAPE
			 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			 // Set judul file excel nya
			 $excel->getActiveSheet(0)->setTitle("Laporan Data PPDB");
			 $excel->setActiveSheetIndex(0);
			 // Proses file excel
			 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			 header('Content-Disposition: attachment; filename="Data PPDB SMK ICB Cinta Wisata.xlsx"'); // Set nama file excel nya
			 header('Cache-Control: max-age=0');
			 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			 $write->save('php://output');
		
			 echo $this->session->set_flashdata('msg','succes-semua-diprint');
			 redirect('admin/pendaftaran');

		}
	
}