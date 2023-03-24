<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: https://roytuts.com
 */

class M_customers extends CI_model
{

	private $database = 'penjualan';
	private $collection = 'customers';
	private $conn;

	function __construct()
	{
		parent::__construct();
		$this->load->library('mongodb');
		$this->conn = $this->mongodb->getConn();
	}

	function semua_customers()
	{
		try {
			$filter = [];
			$query = new MongoDB\Driver\Query($filter);

			$result = $this->conn->executeQuery($this->database . '.' . $this->collection, $query);

			return $result;
		} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Gagal mendapatkan data customers: ' . $ex->getMessage(), 500);
		}
	}


	function get_user($_id)
	{
		try {
			$filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
			$query = new MongoDB\Driver\Query($filter);

			$result = $this->conn->executeQuery($this->database . '.' . $this->collection, $query);

			foreach ($result as $user) {
				return $user;
			}

			return NULL;
		} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching user: ' . $ex->getMessage(), 500);
		}
	}

	function create_user($name, $alamat)
	{
		try {
			$user = array(
				'nama' => $name,
				'alamat' => $alamat
			);

			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($user);

			$result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

			if ($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while saving users: ' . $ex->getMessage(), 500);
		}
	}

	function update_user($_id, $name, $email)
	{
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('name' => $name, 'email' => $email)]);

			$result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

			if ($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}

	function delete_user($_id)
	{
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->delete(['_id' => new MongoDB\BSON\ObjectId($_id)]);

			$result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

			if ($result == 1) {
				return TRUE;
			}

			return FALSE;
		} catch (MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while deleting users: ' . $ex->getMessage(), 500);
		}
	}
}
