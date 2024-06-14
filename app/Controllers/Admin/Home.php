<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController {
    
    // Function index yang merupakan metode default untuk controller ini
    public function index() {
        
        // Periksa apakah pengguna sudah login sebagai admin
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan Login dahulu.');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        // Status ketersediaan fasilitas dengan warna terkait
		$availability = [
			'Menunggu Formulir' => ['name' => 'Menunggu Formulir', 'color' => 'warning'],
			'Dalam Pengecekan' => ['name' => 'Dalam Pengecekan', 'color' => 'info'],
			'Tersedia' => ['name' => 'Tersedia', 'color' => 'success'],
			'Tidak Tersedia' => ['name' => 'Tidak Tersedia', 'color' => 'danger']
		];
        
        // Status form dengan warna terkait
		$form = [
			'Menunggu' => ['name' => 'Menunggu', 'color' => 'warning'],
			'Diterima' => ['name' => 'Diterima', 'color' => 'success'],
			'Ditolak' => ['name' => 'Ditolak', 'color' => 'danger'],
		];
		
		// Status peminjaman dengan warna terkait
		$status = [
			'Menunggu' => ['name' => 'Menunggu', 'color' => 'warning'],
			'Disetujui' => ['name' => 'Disetujui', 'color' => 'success'],
			'Ditolak' => ['name' => 'Ditolak', 'color' => 'danger'],
		];
        
        // Data untuk ditampilkan pada view
    	$data = array_merge($this->base_data, [
    		'users' => $this->M_Base->all_data('users'),
    		'availability' => $availability,
    		'form' => $form,
    		'status' => $status
    	]);
    	
    	// Jika ada permintaan POST untuk upload dokumen
    	if ($this->request->getPost('upload')) {
            $file = $this->M_Base->upload_file($this->request->getFiles()['document'], 'assets/files/');
            
            $users = $this->M_Base->data_where('users', 'id', $this->request->getPost('id'));
            
            if ($file) {
                // Update data pengguna dengan file yang diupload
                $this->M_Base->data_update('users', [
                    'file_signature' => $file,
                    'updated_at' => date('Y-m-d G:i:s')
                ], $this->request->getPost('id'));
                
                // Jika pengguna sudah memiliki file ttd sebelumnya, hapus file tersebut
                if ($users[0]['file_signature']) {
                    $filePath = 'assets/files/' . $users[0]['file_signature'];
                    
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                
                // Set pesan sukses dan redirect kembali
                $this->session->setFlashdata('success', 'Dokumen berhasil diupload.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                // Jika file tidak sesuai, set pesan error dan redirect kembali
                $this->session->setFlashdata('error', 'Dokumen tidak sesuai.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }
    	
        // Tampilkan view index dengan data yang telah disiapkan
        return view('Admin/Home/index', $data);
    }
    
    // Function untuk mengubah status ketersediaan fasilitas berdasarkan ID
    public function availability($id, $status) {
        
		$users = $this->M_Base->data_where('users', 'id', $id);
		
		// Jika pengguna ditemukan
		if (count($users) === 1) {
            // Update status ketersediaan pengguna
            $this->M_Base->data_update('users', [
                'availability' => $status,
                'updated_at' => date('Y-m-d G:i:s')
            ], $id);
            
            // Kirim email notifikasi berdasarkan status ketersediaan
            if ($status == 'Tersedia') {
                $email = \Config\Services::email();
                $email->setFrom('support@arull.app', 'PUSDAI | JAWA BARAT');
                $email->setTo('msyahrulma@gmail.com');
                $email->setSubject('INFAQ');
                $email->setMessage('<h1>Selamat Fasilitas yang Anda pilih saat ini sedang Tersedia.</h1>');
            } else if ($status == 'Tidak Tersedia') {
                $email = \Config\Services::email();
                $email->setFrom('support@pusdai.arull.app', 'PUSDAI | JAWA BARAT');
                $email->setTo('msyahrulma@gmail.com');
                $email->setSubject('INFAQ');
                $email->setMessage('<h1>Maaf, Fasilitas yang Anda pilih saat ini sedang Tidak Tersedia. Silahkan untuk memilih Fasilitas lain.</h1>');
            }
            
            // Set pesan sukses dan redirect ke halaman admin
            $this->session->setFlashdata('success', 'Status Ketersediaan Fasilitas berhasil diedit.');
            return redirect()->to(base_url() . '/admin');
    	} else {
    		// Jika pengguna tidak ditemukan, maka dialihkan ke page 404
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    	
    }
    
    // Function untuk mengubah status form berdasarkan ID
    public function form($id, $status) {
        
		$users = $this->M_Base->data_where('users', 'id', $id);
		
		// Jika pengguna ditemukan
		if (count($users) === 1) {
		    // Jika status form adalah 'Ditolak', set ketersediaan kembali ke 'Menunggu Formulir'
		    if ($status == 'Ditolak') {
                $this->M_Base->data_update('users', [
                    'availability' => 'Menunggu Formulir',
                    'form' => $status,
                    'updated_at' => date('Y-m-d G:i:s')
                ], $id);
		    } else {
		        // Jika status form bukan 'Ditolak', cukup update status form
                $this->M_Base->data_update('users', [
                    'form' => $status,
                    'updated_at' => date('Y-m-d G:i:s')
                ], $id);
		    }
            
            // Set pesan sukses dan redirect ke halaman admin
            $this->session->setFlashdata('success', 'Status Formulir berhasil diedit.');
            return redirect()->to(base_url() . '/admin');
    	} else {
    		// Jika pengguna tidak ditemukan, maka dialihkan ke page 404
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    	
    }
    
    // Function untuk mengubah status peminjaman berdasarkan ID
    public function status($id, $status) {
        
		$users = $this->M_Base->data_where('users', 'id', $id);
		
		// Jika pengguna ditemukan
		if (count($users) === 1) {
		    // Jika status peminjaman adalah 'Ditolak', set ketersediaan dan form kembali ke 'Menunggu'
		    if ($status == 'Ditolak') {
                $this->M_Base->data_update('users', [
                    'availability' => 'Menunggu Formulir',
                    'form' => 'Menunggu',
                    'status' => $status,
                    'updated_at' => date('Y-m-d G:i:s')
                ], $id);
		    } else {
		        // Jika status peminjaman bukan 'Ditolak', cukup update status peminjaman
                $this->M_Base->data_update('users', [
                    'status' => $status,
                    'updated_at' => date('Y-m-d G:i:s')
                ], $id);
		    }
            
            // Set pesan sukses dan redirect ke halaman admin
            $this->session->setFlashdata('success', 'Status Peminjaman berhasil diedit.');
            return redirect()->to(base_url() . '/admin');
    	} else {
    		// Jika pengguna tidak ditemukan, maka dialihkan ke page 404
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    	
    }
    
    // Function untuk menghapus pengguna berdasarkan ID
    public function delete_user($id) {
        
		$users = $this->M_Base->data_where('users', 'id', $id);
		
		// Jika pengguna ditemukan
		if (count($users) === 1) {
		    // Jika pengguna memiliki file, hapus file tersebut
            if ($users[0]['file']) {
                $filePath = 'assets/files/' . $users[0]['file'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            
            // Jika pengguna memiliki file ttd, hapus file tersebut
            if ($users[0]['file_signature']) {
                $filePath = 'assets/files/' . $users[0]['file_signature'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
		    
		    // Hapus data pengguna dari database
		    $this->M_Base->data_delete('users', $id);
            
            // Set pesan sukses dan redirect ke halaman admin
            $this->session->setFlashdata('success', 'User berhasil dihapus.');
            return redirect()->to(base_url() . '/admin');
    	} else {
    		// Jika pengguna tidak ditemukan, maka dialihkan ke page 404
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
        
    }
    
    // Function untuk halaman login admin
    public function login() {
        
        // Jika sudah login sebagai admin, redirect ke halaman admin
        if ($this->admin !== false) {
            return redirect()->to(base_url() . '/Admin');
        }
        
        // Jika ada permintaan POST untuk login
        if ($this->request->getPost('login')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            ];
            
            // Validasi input username dan password
            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username harus diisi.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password harus diisi.');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                // Periksa data admin berdasarkan username
                $admin = $this->M_Base->data_where('admin', 'username', $data_post['username']);

                if (count($admin) === 1) {
                    // Verifikasi password
                    if (password_verify($data_post['password'], $admin[0]['password'])) {
                        $this->session->set('admin', $admin[0]['username']);
                        $this->session->setFlashdata('success', 'Login berhasil.');
                        return redirect()->to(base_url() . '/Admin');
                    } else {
                        $this->session->setFlashdata('error', 'Username atau Password salah.');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username atau Password salah.');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }
        
        // Tampilkan view login admin
        return view('Admin/Home/login');
    }
    
    public function logout() {
        
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan Login dahulu.');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            if ($this->session->get('admin')) {
                $this->session->remove('admin');
                
                $this->session->setFlashdata('success', 'Logout berhasil.');
                return redirect()->to(base_url() . '/admin/login');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
        
    }
    
}