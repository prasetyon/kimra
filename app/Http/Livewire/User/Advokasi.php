<?php

namespace App\Http\Livewire\User;

use App\Models\FilePerkara;
use App\Models\JenisPerkara;
use App\Models\PerkaraHukum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Advokasi extends Component
{
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    public $openSubmit = false;
    public $openDetail = false;
    public $searchTerm;
    public $paginatedPerPages = 5;
    public $noSurat, $domisili, $posisiDJA, $perihalPerkara, $pihakPenggugat, $pihakTergugat, $type;
    public $photos = [];

    public function render()
    {
        $searchData = $this->searchTerm;

        return view('livewire.user.advokasi', [
            'listTypes' => JenisPerkara::orderBy('name')->get(),
            'lists' => PerkaraHukum::query()
                ->where('user', Auth::id())
                ->when($searchData, function ($searchQuery) use ($searchData) {
                    $searchQuery->where([
                        ['nomor_perkara', 'like', '%' . $searchData . '%']
                    ])->orWhere([
                        ['pihak_terpanggil', 'like', '%' . $searchData . '%'],
                    ])->orWhere([
                        ['pihak_memanggil', 'like', '%' . $searchData . '%'],
                    ])->orWhere([
                        ['pokok_perkara', 'like', '%' . $searchData . '%'],
                    ]);
                })->paginate($this->paginatedPerPages)
        ]);
    }

    public function resetForm()
    {
        $this->reset([
            'noSurat', 'domisili', 'posisiDJA',
            'perihalPerkara', 'pihakPenggugat', 'pihakTergugat',
            'type'
        ]);
    }

    public function switchMode()
    {
        $this->openSubmit = !$this->openSubmit;
    }

    public function show()
    {
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
            'noSurat' => 'required',
            'domisili' => 'required',
            'posisiDJA' => 'required',
            'perihalPerkara' => 'required',
            'pihakPenggugat' => 'required',
            'pihakTergugat' => 'required',
            'photos.*' => 'file|max:2048',
        ], $messages);


        // Insert or Update if Ok
        $data = PerkaraHukum::create([
            'nomor_perkara' => $this->noSurat,
            'domisili' => $this->domisili,
            'type' => $this->type,
            'pihak_memanggil' => $this->pihakPenggugat,
            'pihak_terpanggil' => $this->pihakTergugat,
            'pokok_perkara' => $this->perihalPerkara,
            'posisi_dja' => $this->posisiDJA,
            'user' => Auth::id(),
            'created_by' => Auth::id(),
        ]);

        $id = $data->id;

        foreach ($this->photos as $photo) {
            $fileName = time() . '_' . $id . '_' . strtolower(preg_replace('/\s+/', '_', $photo->getClientOriginalName()));
            $photo->storeAs('advokasi', $fileName);

            FilePerkara::insert([
                'perkara' => $id,
                'name' => $fileName,
                'created_by' => Auth::id(),
                'file' => env('APP_URL') . '/advokasi/' . $fileName,
            ]);
        }

        // Show an alert
        $this->alert('success', 'Data berhasil disimpan');
        $this->switchMode();
        $this->resetForm();
    }
}
