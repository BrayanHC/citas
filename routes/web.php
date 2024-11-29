<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Rutas administrador
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para el admin-usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'uptade'])->name('admin.usuarios.uptade')->middleware('auth');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

//Rutas para el admin-secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretaria.update')->middleware('auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth');


//Rutas para el admin-pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth');

//Rutas para el admin-consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth');
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth');
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth');
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth');
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth');
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth');
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware('auth');
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth');

//Rutas para el admin-doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth');
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth');
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth');
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth');
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth');
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth');
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware('auth');
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth');
