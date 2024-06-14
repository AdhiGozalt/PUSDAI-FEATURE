<?php

namespace App\Controllers;

class Home extends BaseController {
    
    // Function index, yang merupakan metode default untuk controller ini
    public function index() {
        // Periksa apakah metode permintaan adalah POST dan apakah tombol 'download' diklik
        if ($this->request->getPost('download')) {
            // Array data dari permintaan POST
            $data_post = [
                'name' => addslashes(trim(htmlspecialchars($this->request->getPost('name')))),
                'phone' => addslashes(trim(htmlspecialchars($this->request->getPost('phone')))),
                'email' => addslashes(trim(htmlspecialchars($this->request->getPost('email')))),
                'facility' => addslashes(trim(htmlspecialchars($this->request->getPost('facility')))),
                'file' => '',
                'availability' => 'Menunggu Formulir',
                'form' => 'Menunggu',
                'status' => 'Menunggu',
                'file_signature' => '',
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')
            ];
            
            // Cek apakah nomor telepon dan email sudah terdaftar di database
            $phone = $this->M_Base->data_where('users', 'phone', $data_post['phone']);
            $email = $this->M_Base->data_where('users', 'email', $data_post['email']);
            
            // Jika ada input yang kosong, set pesan error dan redirect kembali
            if (empty($data_post['name']) OR empty($data_post['phone']) OR empty($data_post['email']) OR empty($data_post['facility'])) {
                $this->session->setFlashdata('error', 'Mohon mengisi semua input.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                
                // Jika nomor telepon belum terdaftar
                if (count($phone) === 0) {
                    // Jika email belum terdaftar
                    if (count($email) === 0) {
                        // Masukkan data baru ke dalam tabel 'users'
                        $this->M_Base->data_insert('users', $data_post);
                        
                        // Set pesan sukses dan redirect kembali
                        $this->session->setFlashdata('success', 'Formulir berhasil didownload.');
                        $this->session->setFlashdata('facility', $data_post['facility']);
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        // Jika email sudah terdaftar, set pesan error dan redirect kembali
                        $this->session->setFlashdata('error', 'Email sudah terdaftar.');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    // Jika nomor telepon sudah terdaftar, set pesan error dan redirect kembali
                    $this->session->setFlashdata('error', 'No. Telp/WA sudah terdaftar.');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }
        
        // Periksa apakah metode permintaan adalah POST dan jika tombol 'check' diklik
        if ($this->request->getPost('check')) {
            // Cari data pengguna berdasarkan email
            $users = $this->M_Base->data_where('users', 'email', $this->request->getPost('email'));
            
            // Jika pengguna ditemukan, redirect ke halaman detail pengguna
            if (count($users) == 1) {
                return redirect()->to(base_url() . '/detail/' . $users[0]['id']);
            } else {
                // Jika pengguna tidak ditemukan, set pesan error dan redirect kembali
                $this->session->setFlashdata('error', 'Email tidak ditemukan.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }
        
        // Tampilkan halaman utama
        return view('Home/index');
    }
    
    // Function detail untuk menampilkan detail pengguna berdasarkan ID
    public function detail($id) {
        // Cari data pengguna berdasarkan ID
    	$users = $this->M_Base->data_where('users', 'id', $id);
        
        // Jika pengguna ditemukan
    	if (count($users) === 1) {
    	    
    	    // Jika metode permintaan adalah POST dan tombol 'upload' diklik
    	    if ($this->request->getPost('upload')) {
    	        // Upload file formulir dan simpan di direktori 'assets/files/'
                $file = $this->M_Base->upload_file($this->request->getFiles()['formulir'], 'assets/files/');
                
                if ($file) {
                    // Perbarui data pengguna dengan file yang diupload
                    $this->M_Base->data_update('users', [
                        'file' => $file,
                        'availability' => 'Dalam Pengecekan',
                        'form' => 'Menunggu',
                        'status' => 'Menunggu',
                        'updated_at' => date('Y-m-d G:i:s')
                    ], $id);
                    
                    // Jika pengguna sudah memiliki file sebelumnya, hapus file tersebut
                    if ($users[0]['file']) {
                        
                        $filePath = 'assets/files/' . $users[0]['file'];
                        
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                        
                    }
                    
                    // Set pesan sukses dan redirect kembali
                    $this->session->setFlashdata('success', 'Formulir berhasil diupload.');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    // Jika file tidak sesuai, set pesan error dan redirect kembali
                    $this->session->setFlashdata('error', 'Formulir tidak sesuai.');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
                
    	    }
    	    
    	    // Jika metode permintaan adalah POST dan tombol 'save_facility' diklik
    	    if ($this->request->getPost('save_facility')) {
    	        
    	        // Perbarui data fasilitas pengguna
                $this->M_Base->data_update('users', [
                    'facility' => $this->request->getPost('facility'),
                    'availability' => 'Menunggu Formulir',
                    'updated_at' => date('Y-m-d G:i:s')
                ], $id);
                
                // Set pesan sukses dan redirect kembali
                $this->session->setFlashdata('success', 'Fasilitas berhasil dipilih.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                
    	    }
    	    
    	    // Siapkan data untuk ditampilkan di view detail
            $data = array_merge($this->base_data, [
                'users' => $users[0],
            ]);
            
            // Tampilkan halaman detail pengguna
		    return view('Home/detail', $data);
    	} else {
    	    // Jika pengguna tidak ditemukan, lempar pengecualian halaman tidak ditemukan
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
        
    }
}