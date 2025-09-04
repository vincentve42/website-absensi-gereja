<?php

namespace App\Filament\Resources\AcaraResource\Pages;

use App\Filament\Resources\AcaraResource;
use App\Models\AbensiAcara;
use App\Models\Acara;
use App\Models\Jemaat;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAcara extends CreateRecord
{
    protected static string $resource = AcaraResource::class;

    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $jemaat = Jemaat::all();
        $acara_berapa = Acara::count() + 1;
        foreach($jemaat as $jemaats)
        {
            $absensi = new AbensiAcara;
            $absensi->Jemaat()->associate($jemaats);
            $absensi->acara_id = $acara_berapa;
            $absensi->save();
            
        }
        $tanggal_format = new Carbon($data['tanggal_acara']);
        $data['nama_acara'] = $data['nama_acara'] . ' ' . $tanggal_format->toFormattedDateString();

        return $data;
        
    }
}
