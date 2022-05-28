<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $ambilpasien;
	private $tpl;

	function TampilPasien(){
		//konstruktor
		$this->prosespasien = new ProsesPasien();
		$this->ambilpasien = new ProsesPasien();
	}
	function TambahPasien($data_pasien){
		$this->prosespasien->TambahDataPasien($data_pasien);
	}
	function UpdatePasien($data_pasien){
		$this->prosespasien->UpdateDataPasien($data_pasien);
	}
	function DeletePasien($id){
		$this->prosespasien->DeleteDataPasien($id);
	}

	function tampil(){
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
			<a href='index.php?id_edit=" . $this->prosespasien->getId($i) .  "' class='btn btn-warning' '>Edit</a>
            <a href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a> </td>";
		}
		$add = " <h3>Tambah Data Pasien</h3>
				<form action='index.php' method='post' class='mb-5'>
					<div class='row'>
						<div class='col'>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Nik'>NIK</label>
									<input type='text' class='form-control' name='Nik' />
								</div>
							</div>			
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Nama'>Nama</label>
									<input type='text' class='form-control' name='Nama' />
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Tempat'>Tempat</label>
									<input type='text' class='form-control' name='Tempat' />
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Tl'>Tanggal Lahir</label>
									<input type='date' class='form-control' name='Tl' />
								</div>
							</div>
						</div>
						<div class='col'>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Gender'>Gender</label>
									<select name='Gender' id='Gender' class='form-control'>
										<option value='Perempuan'>Perempuan</option>
										<option value='Laki-Laki'>Laki-Laki</option>
									</select>
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Email'>Email</label>
									<input type='text' class='form-control' name='Email' />
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Telp'>Telp</label>
									<input type='text' class='form-control' name='Telp' />
								</div>
							</div>
						</div>
					</div>	
					<input type='submit' value='Tambah' name='submit' class='btn btn-success'>
					<input type='reset' value='Batal' name='reset' class='btn btn-danger'>	
				</form>";
			

		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_CRUD", $add);
		// Menampilkan ke layar
		$this->tpl->write();
		
	}
			
	function EditDataPasien($id){
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
			<a href='index.php?id_edit=" . $this->prosespasien->getId($i) .  "' class='btn btn-warning' '>Edit</a>
            <a href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a> </td>";
		}
		$this->ambilpasien->AmbilDataPasien($id);
		$add = "<h3>Edit Data Pasien</h3>
				<form action='index.php' method='post' class='mb-5'>
					<div class='row'>
						
						<div class='col'>	
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Nik'>NIK</label>
									<input type='text' class='form-control' name='Nik' value='". $this->ambilpasien->getNik(0) . "' />
								</div>
							</div>			
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Nama'>Nama</label>
									<input type='text' class='form-control' name='Nama' value='". $this->ambilpasien->getNama(0) . "' />
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Tempat'>Tempat</label>
									<input type='text' class='form-control' name='Tempat' value='". $this->ambilpasien->getTempat(0) . "' />
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Tl'>Tanggal Lahir</label>
									<input type='date' class='form-control' name='Tl' value='". $this->ambilpasien->getTl(0) . "'/>
								</div>
							</div>
						</div>
						<div class='col'>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Gender'>Gender</label>
									<select name='Gender' id='Gender' class='form-control'>
										<option value='Perempuan'>Perempuan</option>
										<option value='Laki-Laki'>Laki-Laki</option>
									</select>
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Email'>Email</label>
									<input type='text' class='form-control' name='Email' value='". $this->ambilpasien->getEmail(0) . "'/>
								</div>
							</div>
							<div class='row form-row'>
								<div class='form-group col'>
									<label for='Telp'>Telp</label>
									<input type='text' class='form-control' name='Telp' value='". $this->ambilpasien->getTelp(0) . "'/>
								</div>
							</div>
							<div class='row form-row invisible'>
								<div class='form-group col'>
									<label for='Nik'>NIK</label>
									<input type='text' class='form-control' name='id' value='". $this->ambilpasien->getId(0) . "' />
								</div>
							</div>
						</div>
					</div>
					<input type='submit' value='update' name='update' class='btn btn-warning'>
					<input type='reset' value='Batal' name='reset' class='btn btn-danger'>	
				</form>";
				$this->tpl = new Template("templates/skin.html");

				// Mengganti kode Data_Tabel dengan data yang sudah diproses
				$this->tpl->replace("DATA_TABEL", $data);
				$this->tpl->replace("DATA_CRUD", $add);
				// Menampilkan ke layar
				$this->tpl->write();
	}
}
