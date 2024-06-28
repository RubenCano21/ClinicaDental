@extends('adminlte::page')

@section('title', 'Registrar-Pagos')

@section('content')
    <div class="container">
        <h1>Crear Pago</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pagos.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="user_id">Usuario</label>
                                        <select name="user_id" id="user_id" class="form-control rounded-pill">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo_pago_id">Tipo de Pago</label>
                                        <select name="tipo_pago_id" id="tipo_pago_id" class="form-control rounded-pill">
                                            @foreach($tipoPagos as $tipoPago)
                                                <option value="{{ $tipoPago->id }}">{{ $tipoPago->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="plan_pago_id">Plan de Pago</label>
                                        <select name="plan_pago_id" id="plan_pago_id" class="form-control rounded-pill">
                                            @foreach($planPagos as $planPago)
                                                <option value="{{ $planPago->id }}">{{ $planPago->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cita_id">Cita</label>
                                        <select name="cita_id" id="cita_id" class="form-control rounded-pill">
                                            @foreach($citas as $cita)
                                                <option value="{{ $cita->id }}">Cita #{{ $cita->nro }} - {{ $cita->fecha }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control rounded-pill">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto">Monto</label>
                                        <input type="text" name="monto" id="monto" class="form-control rounded-pill">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" id="estado" class="form-control rounded-pill">
                                            <option value="pendiente">PENDIENTE</option>
                                            <option value="cancelado">CANCELADO</option>
                                            <option value="mora">MORA</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{url('/pagos')}}" class="btn btn-secondary rounded-pill">Cancelar</a>
                                    <button type="submit" class="btn btn-primary rounded-pill">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let paymentMethodsContainer = document.getElementById('payment_methods_container');
            let addPaymentMethodButton = document.getElementById('add_payment_method');

            addPaymentMethodButton.addEventListener('click', function () {
                let index = paymentMethodsContainer.children.length;
                let paymentMethodDiv = document.createElement('div');
                paymentMethodDiv.classList.add('payment_method');

                paymentMethodDiv.innerHTML = `
                <select name="payment_methods[${index}][method]" class="form-control">
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                </select>
                <input type="text" name="payment_methods[${index}][details][number]" class="form-control" placeholder="Número de Tarjeta">
                <input type="text" name="payment_methods[${index}][details][name]" class="form-control" placeholder="Nombre en Tarjeta">
                <button type="button" class="btn btn-danger remove_payment_method">Eliminar</button>
            `;

                paymentMethodsContainer.appendChild(paymentMethodDiv);

                paymentMethodDiv.querySelector('.remove_payment_method').addEventListener('click', function () {
                    paymentMethodDiv.remove();
                });
            });

            document.querySelectorAll('.remove_payment_method').forEach(button => {
                button.addEventListener('click', function () {
                    button.closest('.payment_method').remove();
                });
            });
        });
    </script>
@endsection


