<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'Apellidos',
            'Celular',
            'Email',
            'Cedula',
            'Fecha cumpleaños',
            'Direccion',
            'Ciudad',
            'Forma de pago',
            'Fecha de registro'
        ];
    }
    public function collection()
    {
         $clientes = \App\Models\User::join('ciudads as ciudades', 'ciudades.id', '=', 'users.id_ciudad', 'left outer' )
            ->select('users.id','users.name', 'users.apellidos',  'users.celular','users.email', 'users.cedula', 'users.birthday', 'users.direccion', 'ciudades.nombre', 'users.forma_pago', 'users.created_at')
            ->where('rol_id', 2)
            ->get();
         return $clientes;

    }
}