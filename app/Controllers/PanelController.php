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
            'data' => $this->db->table('keuangan')->where('jenis', lcfirst($type))->get()->getResultArray()
        ]);
    }

    public function infaq_insert()
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required|max_lenght[255]',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                    'max_lenght' => 'Keterangan tidak boleh lebih dari 255 karakter'
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
                'rules' => 'required|max_lenght[255]',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong',
                    'max_lenght' => 'Keterangan tidak boleh lebih dari 255 karakter'
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
}
