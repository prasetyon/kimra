<?php

namespace App\Http\Livewire\Admin;

use App\Models\Aduan;
use App\Models\FileAduan;
use App\Models\JenisAduan;
use App\Models\TanggapanAduan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Pengaduan extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $isKajianHukum = 0;
    public $isSidang = 0;
    public $isTimeline = 0;
    public $paginatedPerPages = 5;
    public $judul, $tanggal, $type, $laporan, $status, $createdAt;
    public $aduan, $tanggapan;
    public $photos = [];
    public $input_id, $searchTerm, $input_file, $user, $aduan_id;

    // View
    public function render()
    {
        $searchData = $this->searchTerm;
        return view('livewire.admin.pengaduan', [
            'loggedUser' => Auth::user(),
            'selectedAduan' => Aduan::where('id', $this->aduan_id)->first(),
            'listTypes' => JenisAduan::orderBy('name')->get(),
            'listFiles' => FileAduan::where('aduan', $this->input_id)->orderBy('name')->get(),
            'lists' => Aduan::when($searchData, function ($searchQuery) use ($searchData) {
                $searchQuery->where([
                    ['judul', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['laporan', 'like', '%' . $searchData . '%'],
                ]);
            })->paginate($this->paginatedPerPages)
        ]);
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->reset([
            'judul', 'tanggal', 'type',
            'laporan', 'tanggapan', 'aduan',
            'aduan_id', 'input_id', 'status',
            'createdAt'
        ]);
    }

    // Open input form
    public function openModal()
    {
        $this->isOpen = true;
        $this->isSidang = false;
        $this->isTimeline = false;
    }

    public function openSidang($id)
    {
        $this->aduan_id = $id;
        $this->isSidang = true;
        $this->isOpen = false;
        $this->isTimeline = false;
    }

    public function openTimeline($id)
    {
        $this->aduan_id = $id;
        $this->isTimeline = true;
        $this->isSidang = false;
        $this->isOpen = false;
    }

    // Close input form
    public function closeModal()
    {
        $this->isOpen = false;
        $this->isSidang = false;
        $this->isTimeline = false;

        $this->resetInputFields();
    }

    // Open input form and then reset input fields
    public function create()
    {
        $this->openModal();
        $this->resetInputFields();
    }

    // Approve data
    public function approve($id, $status)
    {
        if (stripos($status, 'Diterima') !== false)
            Aduan::where('id', $id)->update(['status' => 'On Progress']);
        else if (stripos($status, 'On Progress') !== false)
            Aduan::where('id', $id)->update(['status' => 'Selesai']);

        // Show an alert
        $this->alert('success', 'Data berhasil diapprove');
    }

    // Save data
    public function storeSidang()
    {
        $messages = [
            '*.required' => 'This column is required',
            '*.numeric' => 'This column is required to be filled in with number',
            '*.string' => 'This column is required to be filled in with letters',
            '*.file' => 'This column must be a file',
            '*.max:2048' => 'File can not be more than 2.048 kb',
        ];

        $this->validate([
            'tanggapan' => 'required',
        ], $messages);

        // Insert or Update if Ok
        $data = TanggapanAduan::create([
            'aduan' => $this->aduan_id,
            'tanggapan' => $this->tanggapan,
            'created_by' => Auth::id(),
        ]);

        $id = $data->id;

        foreach ($this->photos as $photo) {
            $fileName = time() . '_' . $id . '_' . strtolower(preg_replace('/\s+/', '_', $photo->getClientOriginalName()));
            $photo->storeAs('aduan', $fileName);

            FileAduan::insert([
                'aduan' => $id,
                'name' => $fileName,
                'created_by' => Auth::id(),
                'file' => env('APP_URL') . '/file/aduan/' . $fileName,
            ]);
        }

        // Show an alert
        $this->alert('success', $this->input_id ? 'Data berhasil diperbarui' : 'Data berhasil disimpan');

        // Close input form, we're going back to the list
        $this->closeModal();

        // Reset input fields for next input
        $this->resetInputFields();
    }

    // Save data
    public function store()
    {
        $messages = [
            '*.required' => 'This column is required',
            '*.numeric' => 'This column is required to be filled in with number',
            '*.string' => 'This column is required to be filled in with letters',
            '*.file' => 'This column must be a file',
            '*.max:2048' => 'File can not be more than 2.048 kb',
        ];

        $this->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'type' => 'required',
            'laporan' => 'required',
        ], $messages);

        $this->status = (!$this->input_id) ? 'Diterima' : $this->status;

        // Insert or Update if Ok
        $data = Aduan::updateOrCreate(['id' => $this->input_id], [
            'judul' => $this->judul,
            'tanggal' => $this->tanggal,
            'type' => $this->type,
            'laporan' => $this->laporan,
            'status' => $this->status,
            'created_by' => Auth::id(),
        ]);

        $id = (!$this->input_id) ? $data->id : $this->input_id;

        if (!$this->input_id) {
            $dataSidang = TanggapanAduan::create([
                'aduan' => $id,
                'tanggapan' => $this->laporan,
                'created_by' => Auth::id(),
            ]);

            $id = $dataSidang->id;

            foreach ($this->photos as $photo) {
                $fileName = time() . '_' . $id . '_' . strtolower(preg_replace('/\s+/', '_', $photo->getClientOriginalName()));
                $photo->storeAs('aduan', $fileName);

                FileAduan::insert([
                    'aduan' => $id,
                    'name' => $fileName,
                    'created_by' => Auth::id(),
                    'file' => env('APP_URL') . '/file/aduan/' . $fileName,
                ]);
            }
        }

        // Show an alert
        $this->alert('success', $this->input_id ? 'Data berhasil diperbarui' : 'Data berhasil disimpan');

        // Close input form, we're going back to the list
        $this->closeModal();

        // Reset input fields for next input
        $this->resetInputFields();
    }

    // Parse data to input form
    public function edit($id)
    {
        // Find data from the $id
        $data = Aduan::findOrFail($id);

        $this->input_id = $id;

        // Parse data from the $jenis variable
        $this->judul = $data->judul;
        $this->tanggal = $data->tanggal;
        $this->type = $data->type;
        $this->laporan = $data->laporan;
        $this->status = $data->status;

        // Then input fields and show data
        $this->openModal();
    }


    // Parse data to input form
    public function editSidang($id)
    {
        // Find data from the $id
        $data = TanggapanAduan::findOrFail($id);

        $this->input_id = $id;

        // Parse data from the $jenis variable
        $this->aduan = $data->aduan;
        $this->tanggapan = $data->tanggapan;

        // Then input fields and show data
        $this->openSidang($this->aduan_id);
    }

    // Delete data
    public function delete($id)
    {
        // Find existing photo
        $sql = Aduan::where('id', $id)->firstOrFail();
        $sql->find($id)->delete();

        $tanggapan = TanggapanAduan::where('aduan', $id)->get();
        foreach ($tanggapan as $t) {
            $file = FileAduan::where('aduan', $t->id)->get();
            foreach ($file as $f) {
                unlink(storage_path('app/aduan/' . substr(str_replace(env('APP_URL') . '/file/aduan', "", $f->file), 1)));
            }
            $file = FileAduan::where('aduan', $t->id)->delete();
        }
        $tanggapan = TanggapanAduan::where('aduan', $id)->delete();

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }

    public function deleteFile($id)
    {
        // Find existing photo
        $sql = FileAduan::select('file')->where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Then delete it
        unlink(storage_path('app/aduan/' . substr(str_replace(env('APP_URL') . '/file/aduan', "", $sql->file), 1)));

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }
}
