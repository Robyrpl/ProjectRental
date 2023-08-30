<?php

class Mobil extends Controller {
	
	// public function __construct()
	// {	
	// 	if($_SESSION['session_login'] != 'sudah_login') {
	// 		Flasher::setMessage('Login','Tidak ditemukan.','danger');
	// 		header('location: '. base_url . '/login');
	// 		exit;
	// 	}
	// }
	
	public function index()
	{
        ini_set('display','1');
		$data['title'] = 'Data Mobil';
		$data['mobil'] = $this->model('MobilModel')->getAllMobil();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mobil/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Mobil';
		$data['mobil'] = $this->model('MobilModel')->getAllMobil();
		$this->view('mobil/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['mobil'] = $this->model('MobilModel')->getAllMobil();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN MOBIL',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUDUL',1);
			$pdf->Cell(30,6,'PENERBIT',1);
			$pdf->Cell(30,6,'PENGARANG',1);
			$pdf->Cell(15,6,'TAHUN',1);
			$pdf->Cell(25,6,'KATEGORI',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['buku'] as $row) {
			    $pdf->Cell(85,6,$row['judul'],1);
			    $pdf->Cell(30,6,$row['penerbit'],1);
			    $pdf->Cell(30,6,$row['pengarang'],1);
			    $pdf->Cell(15,6,$row['tahun'],1); 
			    $pdf->Cell(25,6,$row['nama_kategori'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Mobil.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Mobil';
		$data['mobil'] = $this->model('MobilModel')->cariMobil();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mobil/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Mobil';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['mobil'] = $this->model('MobilModel')->getMobilById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mobil/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Mobil';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mobil/create', $data);
		$this->view('templates/footer');
	}

	public function simpan(){		

		if( $this->model('MobilModel')->tambahMobil($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Mobil');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Mobil');
			exit;	
		}
	}

	public function updateMobil(){	
		if( $this->model('MobilModel')->updateDataMobil($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Mobil');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Mobil');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('MobilModel')->deleteMobil($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Mobil');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Mobil');
			exit;	
		}
	}
}