<?php

namespace App\Http\Livewire\User;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\TemuanTinjut;
use Livewire\Component;

class AparatPemeriksa extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $paginatedPerPages = 10;
    public $input_id, $searchTerm;

    public function render()
    {
        $searchData = $this->searchTerm;
        return view('livewire.user.aparat-pemeriksa', [
            'temuanTinjut' => TemuanTinjut::where('id', $this->input_id)->first(),
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
        $this->input_id = $id;
    }
}
