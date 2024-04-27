<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PanelController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        return view('panel/index');
    }

    public function lembaga()
    {
        return view('panel/lembaga', [
            'data' => $this->db->table('blog')->where('category', 'lembaga')->get()->getResultArray()
        ]);
    }

    public function lembaga_insert()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Lembaga'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        // dd($this->request->getFile('file'));

        $file = $this->request->getFile('file')->getRandomName();

        if (!$this->request->getFile('file')->hasMoved()) {
            $this->request->getFile('file')->move('uploads', $file);
        }

        $this->db->table('blog')->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $file,
            'category' => 'lembaga'
        ]);

        return redirect()->to(base_url('OperatorPanel/Lembaga'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function lembaga_update()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getFile('file')->isValid()) {
            $rules['file'] = [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Lembaga'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => 'lembaga'
        ]);

        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file')->getRandomName();
            $this->request->getFile('file')->move('uploads', $file);

            $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
                'image' => $file
            ]);
        }

        return redirect()->to(base_url('OperatorPanel/Lembaga'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function lembaga_delete($id)
    {
        $this->db->table('blog')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Lembaga'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function layanan()
    {
        return view('panel/layanan', [
            'data' => $this->db->table('blog')->where('category', 'layanan')->get()->getResultArray()
        ]);
    }

    public function layanan_insert()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Layanan'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file')->getRandomName();

        if (!$this->request->getFile('file')->hasMoved()) {
            $this->request->getFile('file')->move('uploads', $file);
        }

        $this->db->table('blog')->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $file,
            'category' => 'layanan'
        ]);

        return redirect()->to(base_url('OperatorPanel/Layanan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function layanan_update()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getFile('file')->isValid()) {
            $rules['file'] = [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Layanan'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => 'layanan'
        ]);

        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file')->getRandomName();
            $this->request->getFile('file')->move('uploads', $file);

            $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
                'image' => $file
            ]);
        }

        return redirect()->to(base_url('OperatorPanel/Layanan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function layanan_delete($id)
    {
        $this->db->table('blog')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Layanan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function inventaris()
    {
        return view('panel/inventaris', [
            'data' => $this->db->table('blog')->where('category', 'inventaris')->get()->getResultArray()
        ]);
    }

    public function inventaris_insert()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Inventaris'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file')->getRandomName();

        if (!$this->request->getFile('file')->hasMoved()) {
            $this->request->getFile('file')->move('uploads', $file);
        }

        $this->db->table('blog')->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $file,
            'category' => 'inventaris'
        ]);

        return redirect()->to(base_url('OperatorPanel/Inventaris'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function inventaris_update()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getFile('file')->isValid()) {
            $rules['file'] = [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Inventaris'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => 'inventaris'
        ]);

        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file')->getRandomName();
            $this->request->getFile('file')->move('uploads', $file);

            $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
                'image' => $file
            ]);
        }

        return redirect()->to(base_url('OperatorPanel/Inventaris'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function inventaris_delete($id)
    {
        $this->db->table('blog')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Inventaris'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function tausiyah()
    {
        return view('panel/tausiyah', [
            'data' => $this->db->table('blog')->where('category', 'tausiyah')->get()->getResultArray()
        ]);
    }

    public function tausiyah_insert()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Tauisyah'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file')->getRandomName();

        if (!$this->request->getFile('file')->hasMoved()) {
            $this->request->getFile('file')->move('uploads', $file);
        }

        $this->db->table('blog')->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $file,
            'category' => 'tausiyah'
        ]);

        return redirect()->to(base_url('OperatorPanel/Tausiyah'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function tausiyah_update()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getFile('file')->isValid()) {
            $rules['file'] = [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Tausiyah'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => 'lembaga'
        ]);

        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file')->getRandomName();
            $this->request->getFile('file')->move('uploads', $file);

            $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
                'image' => $file
            ]);
        }

        return redirect()->to(base_url('OperatorPanel/Tausiyah'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function tausiyah_delete($id)
    {
        $this->db->table('blog')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Tausiyah'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function agenda()
    {
        return view('panel/agenda', [
            'data' => $this->db->table('blog')->where('category', 'agenda')->get()->getResultArray()
        ]);
    }

    public function agenda_insert()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Agenda'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file')->getRandomName();

        if (!$this->request->getFile('file')->hasMoved()) {
            $this->request->getFile('file')->move('uploads', $file);
        }

        $this->db->table('blog')->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $file,
            'category' => 'agenda'
        ]);

        return redirect()->to(base_url('OperatorPanel/Agenda'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function agenda_update()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten tidak boleh kosong'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getFile('file')->isValid()) {
            $rules['file'] = [
                'rules' => 'uploaded[file]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Agenda'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category' => 'lembaga'
        ]);

        if ($this->request->getFile('file')->isValid()) {
            $file = $this->request->getFile('file')->getRandomName();
            $this->request->getFile('file')->move('uploads', $file);

            $this->db->table('blog')->where('id', $this->request->getPost('id'))->update([
                'image' => $file
            ]);
        }

        return redirect()->to(base_url('OperatorPanel/Agenda'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function agenda_delete($id)
    {
        $this->db->table('blog')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Agenda'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function infaq()
    {
        return view('panel/infaq', [
            'data' => $this->db->table('keuangan')->get()->getResultArray()
        ]);
    }

    public function keuangan($type = 'pemasukan')
    {
        return view('panel/infaq', [
            'data' => $this->db->table('keuangan')->where('jenis', lcfirst($type))->orderBy('tanggal', 'DESC')->get()->getResultArray()
        ]);
    }

    public function infaq_insert()
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                    'max_length' => 'Keterangan tidak boleh lebih dari 255 karakter'
                ]
            ],
            'nominal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal tidak boleh kosong'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis tidak boleh kosong'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Keuangan'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('keuangan')->insert([
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jenis' => $this->request->getPost('jenis'),
        ]);

        return redirect()->to(base_url('OperatorPanel/Keuangan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function infaq_update()
    {
        $rules = [
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ],
            'nominal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal tidak boleh kosong'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                    'max_length' => 'Keterangan tidak boleh lebih dari 255 karakter'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Keuangan'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('keuangan')->where('id', $this->request->getPost('id'))->update([
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jenis' => $this->request->getPost('jenis'),
        ]);

        return redirect()->to(base_url('OperatorPanel/Keuangan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diubah');
    }

    public function infaq_delete($id)
    {
        $this->db->table('infaq')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Keuangan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function corousel()
    {
        return view('panel/corousel', [
            'data' => $this->db->table('corousel')->get()->getResultArray()
        ]);
    }

    public function corousel_insert()
    {
        $rules = [
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2024]|is_image[image]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'File yang diupload tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Corousel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');

        $imageName = $image->getRandomName();

        $image->move('uploads/', $imageName);

        $this->db->table('corousel')->insert([
            'image' => $imageName
        ]);

        return redirect()->to(base_url('OperatorPanel/Corousel'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function corousel_delete($id)
    {
        $this->db->table('corousel')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Corousel'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function rekening_masjid()
    {
        return view('panel/rekening', [
            'data' => $this->db->table('rekening_masjid')->get()->getResultArray()
        ]);
    }

    public function rekening_insert()
    {
        $rules = [
            'nama_bank' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                    'max_length' => 'Nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'kode_bank' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Kode Bank tidak boleh kosong',
                    'max_length' => 'Kode Bank tidak boleh lebih dari 10 karakter'
                ]
            ],
            'nomor_rekening' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Nomor Rekening tidak boleh kosong',
                    'max_length' => 'Nomor Rekening tidak boleh lebih dari 50 karakter'
                ]
            ],
            'atas_nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Atas Nama tidak boleh kosong',
                    'max_length' => 'Atas Nama tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/RekeningMasjid'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('rekening_masjid')->insert([
            'nama_bank' => $this->request->getPost('nama_bank'),
            'kode_bank' => $this->request->getPost('kode_bank'),
            'nomor_rekening' => $this->request->getPost('nomor_rekening'),
            'atas_nama' => $this->request->getPost('atas_nama')
        ]);

        return redirect()->to(base_url('OperatorPanel/RekeningMasjid'))->with('type-status', 'success')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function rekening_update()
    {
        $rules = [
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID tidak boleh kosong'
                ]
            ],
            'nama_bank' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                    'max_length' => 'Nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'kode_bank' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Kode Bank tidak boleh kosong',
                    'max_length' => 'Kode Bank tidak boleh lebih dari 10 karakter'
                ]
            ],
            'nomor_rekening' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Nomor Rekening tidak boleh kosong',
                    'max_length' => 'Nomor Rekening tidak boleh lebih dari 50 karakter'
                ]
            ],
            'atas_nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Atas Nama tidak boleh kosong',
                    'max_length' => 'Atas Nama tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/RekeningMasjid'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('rekening_masjid')->where('id', $this->request->getPost('id'))->update([
            'nama_bank' => $this->request->getPost('nama_bank'),
            'kode_bank' => $this->request->getPost('kode_bank'),
            'nomor_rekening' => $this->request->getPost('nomor_rekening'),
            'atas_nama' => $this->request->getPost('atas_nama')
        ]);

        return redirect()->to(base_url('OperatorPanel/RekeningMasjid'))->with('type-status', 'success')
            ->with('message', 'Data berhasil diupdate');
    }

    public function rekening_delete($id)
    {
        $this->db->table('rekening_masjid')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/RekeningMasjid'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function laporan()
    {
        return view('panel/laporan', [
            'data' => $this->db->table('laporan')->orderBy('month', 'DESC')->get()->getResultArray(),
        ]);
    }

    public function laporan_proses()
    {
        $rules = [
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Bulan tidak boleh kosong'
                ]
            ],
            'action' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib memilih aksi'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel/Laporan'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        if ($this->request->getPost('action') == 'save' || $this->request->getPost('action') == 'both') {

            $this->db->table('laporan')->insert([
                'month' => $this->request->getPost('tanggal')
            ]);
        }

        if ($this->request->getPost('action') == 'download' || $this->request->getPost('action') == 'both') {
            return redirect()->to(base_url('OperatorPanel/Laporan/' . $this->request->getPost('tanggal')));
        }

        return redirect()->to(base_url('OperatorPanel/Laporan'))->with('type-status', 'success')->with('message', 'Berhasil menyimpan');
    }

    public function laporan_detail($month)
    {
        return view('panel/render_laporan', [
            'data' => $this->db->table('keuangan')->like('tanggal', $month, 'after')->get()->getResultArray()
        ]);
    }

    public function laporan_delete($id)
    {
        $this->db->table('laporan')->where('id', $id)->delete();
        return redirect()->to(base_url('OperatorPanel/Laporan'))->with('type-status', 'success')
            ->with('message', 'Data berhasil dihapus');
    }

    public function settings_save()
    {
        $rules = [
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong',
                ]
            ],
            'kontak' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Kontak tidak boleh kosong',
                    'max_length' => 'Kontak tidak boleh lebih dari 20 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email tidak valid'
                ]
            ],
            'trailling_text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Trailling Text tidak boleh kosong',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OperatorPanel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('settings')->where('id', 1)->update([
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'trailling_text' => $this->request->getPost('trailling_text'),
        ]);

        return redirect()->to(base_url('OperatorPanel'))->with('type-status', 'success')->with('message', 'Berhasil menyimpan');
    }
}
