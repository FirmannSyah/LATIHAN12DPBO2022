<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function AmbilDataPasien($id);
	public function TambahDataPasien($data_pasien);
	public function UpdateDataPasien($data_pasien);
	public function DeleteDataPasien($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
	public function getEmail($i);
	public function getTelp($i);
}
