<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrationsExport implements FromCollection
{
    /**
     * Devuelve la colección de registros que se exportarán.
     */
    public function collection()
    {
        return Registration::all();
    }
}
