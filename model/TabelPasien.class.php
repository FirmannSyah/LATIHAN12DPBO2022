<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getPasienById($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function AddPasien($data)
	{
		$nik = $data['Nik'];
		$nama = $data['Nama'];
		$tempat = $data['Tempat'];
		$tl = $data['Tl'];
		$gender = $data['Gender'];
		$email = $data['Email'];
		$telp = $data['Telp'];

		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	function UpdatePasien($data)
	{
		$id = $data['id'];
		$nik = $data['Nik'];
		$nama = $data['Nama'];
		$tempat = $data['Tempat'];
		$tl = $data['Tl'];
		$gender = $data['Gender'];
		$email = $data['Email'];
		$telp = $data['Telp'];

		$query = "UPDATE pasien SET nik = '$nik', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telp' WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function DeletePasien($id)
	{

        $query = "DELETE FROM pasien WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
