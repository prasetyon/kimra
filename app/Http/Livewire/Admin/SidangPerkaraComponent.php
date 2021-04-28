<?php

namespace App\Http\Livewire\Admin;

use App\Models\JenisSidang;
use App\Models\PerkaraHukum;
use App\Models\SidangPerkara;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SidangPerkaraComponent extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $paginatedPerPages = 10;
    public $input_id, $searchTerm;
    public $noST, $tanggalSidang, $susunanMajelis, $agendaSidang, $keteranganSidang, $jenisSidang, $idPerkara;

    // View
    public function render()
    {
        $searchData = $this->searchTerm;
        return view('livewire.admin.sidang-perkara-component', [
            'listSidang' => JenisSidang::all(),
            'listPerkara' => PerkaraHukum::all(),
            'lists' => SidangPerkara::when($searchData, function ($searchQuery) use ($searchData) {
                $searchQuery->where([
                    ['nomor_st', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['agenda', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['keterangan', 'like', '%' . $searchData . '%'],
                ]);
            })->orderBy('tanggal', 'desc')->paginate($this->paginatedPerPages),
        ]);
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->reset([
            'input_id', 'noST', 'tanggalSidang', 'susunanMajelis', 'agendaSidang', 'keteranganSidang', 'jenisSidang', 'idPerkara'
        ]);
    }

    // Open input form
    public function openModal()
    {
        $this->isOpen = true;
    }

    // Close input form
    public function closeModal()
    {
        $this->isOpen = false;
    }

    // Open input form and then reset input fields
    public function create()
    {
        $this->openModal();
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
            'noST' => 'required',
            'tanggalSidang' => 'required',
        ], $messages);

        // Insert or Update if Ok
        $data = SidangPerkara::updateOrCreate(['id' => $this->input_id], [
            'nomor_st' => $this->noST,
            'perkara' => $this->idPerkara,
            'tanggal' => $this->tanggalSidang,
            'agenda' => $this->agendaSidang,
            'keterangan' => $this->keteranganSidang,
            'majelis' => $this->susunanMajelis,
            'type' => $this->jenisSidang,
            'created_by' => Auth::id(),
        ]);

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
        $data = SidangPerkara::findOrFail($id);

        $this->input_id = $id;

        // Parse data from the $jenis variable
        $this->noST = $data->nomor_st;
        $this->agendaSidang = $data->agenda;
        $this->tanggalSidang = $data->tanggal;
        $this->keteranganSidang = $data->keterangan;
        $this->susunanMajelis = $data->majelis;
        $this->idPerkara = $data->perkara;
        $this->jenisSidang = $data->type;

        // Then input fields and show data
        $this->openModal();
    }

    // Delete data
    public function delete($id)
    {
        // Find existing photo
        $sql = SidangPerkara::where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }
}
