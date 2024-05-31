@extends('adminlte::page')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1>Perfil de Usuario</h1>
@stop

@section('content')
    
                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <div class="container ">
                        <!-- Profile Header -->
                        <div class="profile-header ">
                            <img src="img/perfil.svg" class="profile-image w-25 h-25" alt="Imagen de perfil">
                            
                            <h2 id="nombreUsuario">Nombre del Usuario</h2>
                            <p>correo@ejemplo.com</p>
                            <div>
                                <a href="{{ asset('pacientes/create') }}" type="sumit">Editar Perfil</a>
                            </div>
                            
                            <div class="profile-header">
                                <button  type="button" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#exampleModal">
                                    Cambiar Contraseña
                                </button>
                                <a href="{{ asset('update-password-form') }}" type="sumit">Cambiar Contraseña</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="text-center">
                                                <h3 class="h4 text-gray-900 mb-4">¿Olvidaste tu contraseña?</h3>
                                                <p class="mb-4">Lo entendemos. ¡Simplemente ingrese
                                                    su dirección de correo electrónico correcto
                                                    para restablecer su contraseña!</p>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-user"
                                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                                               placeholder="Ingrese su email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                               id="passwordAntigua" aria-describedby="emailHelp"
                                                               placeholder="Contraseña actual">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                               id="passwordNueva" aria-describedby="emailHelp"
                                                               placeholder="Nueva Contraseña">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                               id="passwordRepetir" aria-describedby="emailHelp"
                                                               placeholder="Confirmar Contraseña">
                                                    </div>
                                                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                                                        Cambiar contraseña
                                                    </a>
                                                </form>
                                                <hr>
                                                <div class="text-center">
                                                    <a class="small" href="registrar.html">Crear Cuenta</a>
                                                </div>
                                                <div class="text-center">
                                                    <a class="small" href="login.html">¿Ya tienes una cuenta? ¡Inicio!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="profile-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Información Personal</h4>
                                    <p><strong>Nombre:</strong> Juan Pérez</p>
                                    <p><strong>Fecha de Nacimiento:</strong> 01/01/1990</p>
                                    <p><strong>Teléfono:</strong> +123 456 7890</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Detalles Adicionales</h4>
                                    <p><strong>Dirección:</strong> Calle Falsa 123, Ciudad, País</p>
                                    <p><strong>Ocupación:</strong> Desarrollador de Software</p>
                                    <p><strong>Intereses:</strong> Programación, Música, Viajes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel ="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop