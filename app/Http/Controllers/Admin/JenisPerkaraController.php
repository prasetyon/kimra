<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPerkara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisPerkaraController extends Controller
{
    public function index()
    {
        //
        $data['jenis'] = JenisPerkara::orderBy('created_at', 'desc')->get();

        return view('admin.web.jenisperkara')
            ->with('data', $data)
            ->with('menu', 'jenisperkara')
            ->with('title', 'Jenis Perkara');
    }

    public function store(Request $request)
    {
        $data = new JenisPerkara();
        $data->type = $request->type;
        $data->name = $request->name;
        $data->save();

        $message = 'Jenis Perkara berhasil ditambahkan';

        return redirect()->back()->with('alert-success', $message);
    }

    public function update(Request $request, $id)
    {
        $data = JenisPerkara::where('id', $id)
            ->update([
                'type' => $request->type,
                'name' => $request->name,
            ]);

        $message = 'Jenis Perkara berhasil diperbarui';
        return redirect()->back()->with('alert-success', $message);
    }

    public function destroy($id)
    {
        JenisPerkara::where('id', $id)->delete();

        return redirect()->back()->with('alert-success', 'Jenis Perkara berhasil dihapus');
    }
}
