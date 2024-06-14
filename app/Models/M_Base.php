<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Base extends Model
{
    
	public function all_data($table, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}
	
	public function all_data_order($table, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}
	
	public function data_insert($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}
	
	public function data_where($table, $field, $value)
	{
		return $this->db->table($table)->where($field, $value)->get()->getResultArray();
	}
	
	public function data_where_array($table, $data, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->where($data)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->get()->getResultArray();
		}
	}
	
	public function data_update($table, $data, $id)
	{
		return $this->db->table($table)->set($data)->where('id', $id)->update();
	}
	
	public function data_delete($table, $id)
	{
		return $this->db->table($table)->delete(['id' => $id]);
	}
	
	public function data_like($table, $filed, $data)
	{
		return $this->db->table($table)->like($filed, $data)->orderBy('id', 'DESC')->get()->getResultArray();
	}
	
	public function data_truncate($table)
	{
		return $this->db->table($table)->truncate();
	}
	
	public function data_count($table, $where = null)
	{
		if ($where) {
			return $this->db->table($table)->where($where)->countAllResults();
		} else {
			return $this->db->table($table)->countAllResults();
		}
	}
	
	public function images($file, $path = null)
	{
		if ($file->getError() == 0) {
			if (in_array(strtolower($file->getClientExtension()), ['jpg', 'jpeg', 'png', 'webp'])) {
				$name = $file->getRandomName();

				$file->move($path, $name);

				return $name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function upload_file($file, $path, $custome_name = false, $ex = ['docx', 'pdf'], $get_original = false)
	{
		if ($file) {
			if ($file->getError() == 0) {
				if (in_array(strtolower($file->getClientExtension()), $ex)) {
					if ($custome_name === false) {
						$nama_file = $file->getRandomName();
					} else {
						$nama_file = $custome_name . '.' . $file->getClientExtension();
					}

					$file->move($path, $nama_file);

					if ($get_original) {
						return [
							'name' => $nama_file,
							'original' => $file->getClientName(),
						];
					} else {
						return $nama_file;
					}

				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
    
}