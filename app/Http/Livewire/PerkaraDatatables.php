<?php

namespace App\Http\Livewire;

use App\Models\PerkaraHukum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PerkaraDatatables extends LivewireDatatable
{
    public $model = PerkaraHukum::class;

    public function builder()
    {
        return PerkaraHukum::query()
            ->where('user', Auth::id());
    }

    public function columns()
    {
        return [
            NumberColumn::name('nomor_perkara')
                ->label('NO')
                ->searchable(),

            Column::name('domisili')
                ->label('Domisili'),

            // Column::name('nomor_surat_kuasa')
            //     ->label('No. Surat Kuasa'),

            Column::name('pihak_memanggil')
                ->label('Pihak Memanggil'),

            Column::name('pihak_terpanggil')
                ->label('Pihak Terpanggil')
                ->filterable(),

            // Column::name('pokok_perkara')
            //     ->label('Pokok Perkara')
            //     ->filterable(),

            // Column::name('objek_tuntutan')
            //     ->label('Objek Tuntutan')
            //     ->filterable(),

            DateColumn::name('created_at')
                ->label('Creation Date')
                ->sortBy('created_at'),
        ];
    }
}
