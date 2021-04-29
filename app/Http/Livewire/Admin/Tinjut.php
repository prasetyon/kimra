<?php

namespace App\Http\Livewire\Admin;

use App\Models\AparatPemeriksa;
use App\Models\DataTinjut;
use App\Models\FileTinjut;
use App\Models\JenisPemeriksaanTinjut;
use App\Models\JenisStatusAksi;
use App\Models\TemuanTinjut;
use App\Models\UnitDJA;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Tinjut extends Component
{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $isTimeline = 0;
    public $paginatedPerPages = 10;
    public $input_id, $searchTerm, $input_tahun, $input_uic_es3, $input_uic_es2, $input_uic_es1, $input_nomor_temuan, $input_judul;
    public $input_jenis_pemeriksaan, $input_kode_rekomendasi, $input_uraian_rekomendasi, $input_uraian_rencana, $input_target;
    public $input_aparat_pemeriksa, $input_aparat_pemeriksa_lainnya;
    public $input_status_uic, $input_status_apk, $input_forum_bpk, $input_status_bpk, $input_approval, $input_tinjut;
    public $photos = [];

    // View
    public function render()
    {
        $searchData = $this->searchTerm;
        return view('livewire.admin.tinjut', [
            // Lists
            'temuanTinjut' => TemuanTinjut::where('id', $this->input_id)->first(),
            'listData' => DataTinjut::where('tinjut', $this->input_id)->get(),
            'listTypes' => JenisPemeriksaanTinjut::orderBy('name')->get(),
            'listActionTypes' => JenisStatusAksi::all(),
            'listAparat' => AparatPemeriksa::all(),
            'listEs1' => UnitDJA::select('es1')->distinct()->get(),
            'listEs2' => UnitDJA::select('es2')->where('es1', $this->input_uic_es1)->distinct()->get(),
            'lists' => TemuanTinjut::when($searchData, function ($searchQuery) use ($searchData) {
                $searchQuery->where([
                    ['input_tahun', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['kode_rekomendasi', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['jenis_rekomendasi', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['uic_es3', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['uic_es2', 'like', '%' . $searchData . '%'],
                ]);
            })->paginate($this->paginatedPerPages),
        ]);
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->reset([
            'input_id', 'input_tahun', 'input_uic_es3', 'input_uic_es2', 'input_uic_es1', 'input_nomor_temuan', 'input_judul',
            'input_jenis_pemeriksaan', 'input_kode_rekomendasi', 'input_uraian_rekomendasi', 'input_target', 'input_aparat_pemeriksa',
            'input_status_uic', 'input_status_apk', 'input_forum_bpk', 'input_status_bpk', 'input_approval', 'input_aparat_pemeriksa_lainnya'
        ]);
    }

    // Open input form
    public function openModal()
    {
        $this->isOpen = true;
        $this->isTimeline = false;
    }

    // Open input form
    public function openTimeline($id)
    {
        $this->input_id = $id;
        $this->isTimeline = true;
        $this->isOpen = false;
    }

    // Close input form
    public function closeModal()
    {
        $this->isOpen = false;
        $this->isTimeline = false;
        $this->resetInputFields();
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
            'input_tahun' => 'required|size:4',
            'input_uic_es2' => 'required|string',
            'input_uic_es1' => 'required|string',
            'input_nomor_temuan' => 'required|string',
            'input_judul' => 'required|string',
            'input_kode_rekomendasi' => 'required|string',
            'input_jenis_pemeriksaan' => 'required',
            'input_aparat_pemeriksa' => 'required',
        ], $messages);

        // Insert or Update if Ok
        $data = TemuanTinjut::updateOrCreate(['id' => $this->input_id], [
            'tahun' => $this->input_tahun,
            'uic_es3' => $this->input_uic_es3,
            'uic_es2' => $this->input_uic_es2,
            'uic_es1' => $this->input_uic_es1,
            'nomor_temuan' => $this->input_nomor_temuan,
            'judul' => $this->input_judul,
            'kode_rekomendasi' => $this->input_kode_rekomendasi,
            'jenis_pemeriksaan' => $this->input_jenis_pemeriksaan,
            'uraian_rekomendasi' => $this->input_uraian_rekomendasi,
            'aparat_pemeriksa' => $this->input_aparat_pemeriksa,
            'aparat_pemeriksa_lainnya' => $this->input_aparat_pemeriksa_lainnya,
            'target' => $this->input_target,
            'status_uic' => $this->input_status_uic,
            'status_apk' => $this->input_status_apk,
            'forum_bpk' => $this->input_forum_bpk,
            'status_bpk' => $this->input_status_bpk,
            'approval' => $this->input_approval,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        // $id = (!$this->input_id) ? $data->id : $this->input_id;

        // foreach ($this->photos as $photo) {
        //     $fileName = time() . '_' . $id . '_' . strtolower(preg_replace('/\s+/', '_', $photo->getClientOriginalName()));
        //     $photo->storeAs('tinjut', $fileName);

        //     FileTinjut::insert([
        //         'tinjut' => $id,
        //         'name' => $fileName,
        //         'created_by' => Auth::id(),
        //         'file' => env('APP_URL') . '/file/tinjut/' . $fileName,
        //     ]);
        // }

        // Show an alert
        $this->alert('success', $this->input_id ? 'Data berhasil diperbarui' : 'Data berhasil disimpan');

        // Close input form, we're going back to the list
        $this->closeModal();

        // Reset input fields for next input
        $this->resetInputFields();
    }

    // Approve data
    public function approve($id, $status)
    {
        TemuanTinjut::where('id', $id)->update(['status' => 1]);

        // Show an alert
        $this->alert('success', 'Data berhasil diapprove');
    }

    // Parse data to input form
    public function edit($id)
    {
        // Find data from the $id
        $data = TemuanTinjut::findOrFail($id);

        // Parse data from the $data variable
        $this->input_id = $id;
        $this->input_tahun = $data->tahun;
        $this->input_uic_es3 = $data->uic_es3;
        $this->input_uic_es2 = $data->uic_es2;
        $this->input_uic_es1 = $data->uic_es1;
        $this->input_nomor_temuan = $data->nomor_temuan;
        $this->input_judul = $data->judul;
        $this->input_kode_rekomendasi = $data->kode_rekomendasi;
        $this->input_jenis_pemeriksaan = $data->jenis_pemeriksaan;
        $this->input_uraian_rekomendasi = $data->uraian_rekomendasi;
        $this->input_aparat_pemeriksa = $data->aparat_pemeriksa;
        $this->input_aparat_pemeriksa_lainnya = $data->aparat_pemeriksa_lainnya;
        $this->input_target = $data->target;
        $this->input_status_uic = $data->status_uic;
        $this->input_status_apk = $data->status_apk;
        $this->input_forum_bpk = $data->forum_bpk;
        $this->input_status_bpk = $data->status_bpk;
        $this->input_approval = $data->approval;

        // Then input fields and show data
        $this->openModal();
    }

    // Delete data
    public function delete($id)
    {
        // Find existing photo
        $sql = TemuanTinjut::where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }

    public function deleteData($id)
    {
        // Find existing photo
        $sql = DataTinjut::where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }

    public function deleteFile($id)
    {
        // Find existing photo
        $sql = FileTinjut::select('file')->where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Then delete it
        unlink(storage_path('app/tinjut/' . substr(str_replace(env('APP_URL') . '/file/tinjut', "", $sql->file), 1)));

        // Show an alert
        $this->alert('warning', 'Data berhasil dihapus');
    }
}
