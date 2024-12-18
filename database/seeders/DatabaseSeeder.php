<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class,]);

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('admin');
        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=> 'Secretaria',
            'apellidos'=> '1',
            'ci'=> '785874521',
            'celular'=> '958748825',
            'fecha_nacimiento'=> '10/10/1998',
            'direccion'=> 'zona miraflores',
            'user_id' => '2'
        ]);

        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');
        Doctor::create([
            'nombres'=>'Doctor1',
            'apellidos'=>'Yor',
            'telefono'=>'97745824',
            'licencia_medica'=>'11745874',
            'especialidad'=>'PEDIATRIA',
            'user_id'=>'3',
        ]);
        
        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');
        Doctor::create([
            'nombres'=>'Doctor2',
            'apellidos'=>'Martin',
            'telefono'=>'97777824',
            'licencia_medica'=>'11744474',
            'especialidad'=>'ODONTOLOGIA',
            'user_id'=>'4',
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('doctor');
        Doctor::create([
            'nombres'=>'Doctor3',
            'apellidos'=>'Valdez',
            'telefono'=>'97782124',
            'licencia_medica'=>'12955874',
            'especialidad'=>'FISIOTERAPIA',
            'user_id'=>'5',
        ]);

        Consultorio::create([
            'nombre'=>'PEDIATRIA',
            'ubicacion'=>'1-1A',
            'capacidad'=>'10',
            'telefono'=>'',
            'especialidad'=>'PEDIATRIA',
            'estado'=>'ACTIVO',
        ]);
        Consultorio::create([
            'nombre'=>'FISIOTERAPIA',
            'ubicacion'=>'1-5A',
            'capacidad'=>'10',
            'telefono'=>'145232547',
            'especialidad'=>'FISIOTERAPIA',
            'estado'=>'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'=>'ODONTOLOGIA',
            'ubicacion'=>'2-3B',
            'capacidad'=>'3',
            'telefono'=>'118745365',
            'especialidad'=>'ODONTOLOGIA',
            'estado'=>'ACTIVO',
        ]);


        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('paciente'); 

        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('12345678')
        ])->assignRole('usuario'); 
        
        $this->call([Pacienteseeder::class,]);
    }
}
