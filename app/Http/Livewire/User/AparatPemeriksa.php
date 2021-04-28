<?php

namespace App\Http\Livewire\User;

use App\Models\DataTinjut;
use App\Models\FileTinjut;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\TemuanTinjut;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AparatPemeriksa extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $isOpenModal = 0;
    public $paginatedPerPages = 10;
    public $tinjut, $keterangan, $catatan;
    public $input_id, $searchTerm;
    public $photos = [];
    public $checkOpen = [];

    public function render()
    {
        $searchData = $this->searchTerm;
        $tinjutRef = TemuanTinjut::where('id', $this->input_id)->first();
        $tinjutDataRef = $tinjutRef->data ?? [];
        if (!count($this->checkOpen)) {
            foreach ($tinjutDataRef as $t) {
                $this->checkOpen[$t->id] = false;
            }
        }

        return view('livewire.user.aparat-pemeriksa', [
            'temuanTinjut' => $tinjutRef,
            'lists' => TemuanTinjut::when($searchData, function ($searchQuery) use ($searchData) {
                $searchQuery->where([
                    ['input_tahun', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['kode_rekomendasi', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['jenis_rekomendasi', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['uic_es1', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['uic_es2', 'like', '%' . $searchData . '%'],
                ]);
            })->paginate($this->paginatedPerPages),
        ]);
    }

    public function show($id)
    {
        $this->isOpen = true;
        $this->isOpenModal = false;
        $this->input_id = $id;
    }

    public function openModal()
    {
        $this->isOpen = false;
        $this->isOpenModal = true;
    }

    public function close()
    {
        $this->isOpen = false;
        $this->isOpenModal = false;
        $this->resetField();
    }

    public function resetField()
    {
        $this->reset(['tinjut', 'catatan', 'keterangan', 'input_id', 'photos', 'checkOpen']);
    }

    public function switchCheck($id)
    {
        $this->checkOpen[$id] = !$this->checkOpen[$id];
    }

    public function store()
    {
        $messages = [
            '*.required' => 'This column is required',
            '*.numeric' => 'This column is required to be filled in with number',
            '*.string' => 'This column is required to be filled in with letters',
        ];

        $this->validate([
            'tinjut' => 'required|string',
        ], $messages);

        // Insert or Update if Ok
        $data = DataTinjut::create([
            'tinjut' => $this->input_id,
            'uraian' => $this->tinjut,
            'keterangan' => $this->keterangan,
            'catatan' => $this->catatan,
            'created_by' => Auth::id()
        ]);

        $update = TemuanTinjut::where('id', $this->input_id)
            ->update([
                'updated_by' => Auth::id()
            ]);

        $id = $data->id;

        foreach ($this->photos as $photo) {
            $fileName = time() . '_' . $id . '_' . strtolower(preg_replace('/\s+/', '_', $photo->getClientOriginalName()));
            $photo->storeAs('tinjut', $fileName);

            FileTinjut::insert([
                'tinjut' => $id,
                'name' => $fileName,
                'created_by' => Auth::id(),
                'file' => env('APP_URL') . '/file/tinjut/' . $fileName,
            ]);
        }

        $this->close();
    }
}
