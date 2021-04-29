<?php

namespace App\Http\Livewire\User;

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
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    public $openSubmit = false;
    public $openTimeline = false;
    public $openDetail = false;
    public $searchTerm;
    public $paginatedPerPages = 5;
    public $judul, $tanggal, $laporan, $type;
    public $aduan_id, $tanggapan;
    public $photos = [];

    public function render()
    {
        $searchData = $this->searchTerm;

        return view('livewire.user.pengaduan', [
            'listTypes' => JenisAduan::orderBy('name')->get(),
            'selectedAduan' => Aduan::where('id', $this->aduan_id)->first(),
            'lists' => Aduan::query()
                ->where('created_by', Auth::id())
                ->when($searchData, function ($searchQuery) use ($searchData) {
                    $searchQuery->where([
                        ['judul', 'like', '%' . $searchData . '%']
                    ]);
                })->paginate($this->paginatedPerPages)
        ]);
    }

    public function resetForm()
    {
        $this->reset([
            'judul', 'tanggal', 'laporan', 'type',
            'tanggapan'
        ]);
    }

    public function switchMode()
    {
        $this->openSubmit = !$this->openSubmit;
        $this->openTimeline = false;

        $this->resetForm();
    }

    public function openTimeline($id)
    {
        $this->aduan_id = $id;
        $this->openSubmit = true;
        $this->openTimeline = true;
    }

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
            'laporan' => 'required',
            'type' => 'required',
            'photos.*' => 'file|max:2048',
        ], $messages);


        // Insert or Update if Ok
        $data = Aduan::create([
            'judul' => $this->judul,
            'tanggal' => $this->tanggal,
            'type' => $this->type,
            'laporan' => $this->laporan,
            'status' => 'Diterima',
            'created_by' => Auth::id(),
        ]);

        $id = $data->id;

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

        // Show an alert
        $this->alert('success', 'Data berhasil disimpan');
        $this->switchMode();
        $this->resetForm();
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
        $this->alert('success', 'Data berhasil disimpan');

        // Reset input fields for next input
        $this->resetForm();
    }
}
