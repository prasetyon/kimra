<?php

namespace App\Http\Livewire;

// Load Livewire trait
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

// Load Model
use App\Models\JenisPerkara;

class JenisPerkaraComponent extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $paginatedPerPages = 10;
    public $input_id, $searchTerm, $input_type, $input_name;

    // View
    public function render()
    {
        $searchData = $this->searchTerm;
        return view('livewire.jenis-perkara-component', [
            // Lists
            'lists' => JenisPerkara::when($searchData, function ($searchQuery) use ($searchData) {
                $searchQuery->where([
                    ['type', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['name', 'like', '%' . $searchData . '%'],
                ]);
            })->paginate($this->paginatedPerPages),

            'bases' => JenisPerkara::select('type')->distinct()->get()
        ]);
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->reset([
            'input_id', 'input_type', 'input_name'
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
        ];

        $this->validate([
            'input_type' => 'required',
            'input_name' => 'required|string',
        ], $messages);

        // Insert or Update if Ok
        JenisPerkara::updateOrCreate(['id' => $this->input_id], [
            'type' => $this->input_type,
            'name' => $this->input_name,
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
        $data = JenisPerkara::findOrFail($id);

        // Parse data from the $data variable
        $this->input_id = $id;
        $this->input_type = $data->type;
        $this->input_name = $data->name;

        // Then input fields and show data
        $this->openModal();
    }

    // Delete data
    public function delete($id)
    {
        // Find existing photo
        $sql = JenisPerkara::where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }
}
