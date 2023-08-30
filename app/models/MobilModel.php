<?php

class MobilModel {
	
	private $table = 'mobil';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllmobil()
	{
		$this->db->query("SELECT * FROM " . $this->table );
		return $this->db->resultSet();
	}

	public function getmobilById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahMobil($data)
	{
		
		$query = "INSERT INTO mobil (nama, merk, waktu, jumlah, harga) VALUES( :nama, :merk, :waktu, :jumlah, :harga)";
		$this->db->query($query);
		// $this->db->bind('', $data['']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('merk', $data['merk']);
		$this->db->bind('waktu', $data['waktu']);
		$this->db->bind('jumlah', $data['jumlah']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDatamobil($data)
	{
		$query = "UPDATE mobil SET id=:id, nama=:nama, merk=:merk, waktu=:waktu, jumlah=:jumlah, harga=:harga WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('merk', $data['merk']);
		$this->db->bind('waktu', $data['waktu']);
		$this->db->bind('jumlah', $data['jumlah']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletemobil($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function carimobil()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE judul LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}