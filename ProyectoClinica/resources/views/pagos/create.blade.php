@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>{{ isset($pago) ? 'Editar Pago' : 'Registrar Pago' }}</h1>
        <form action="{{ isset($pago) ? route('pagos.update', $pago->id) : route('pagos.store') }}" method="POST">
            @csrf
            @if(isset($pago))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="amount">Monto</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount', $pago->amount ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="payment_methods">Métodos de Pago</label>
                <div id="payment_methods_container">
                    @if(old('payment_methods') || isset($pago))
                        @foreach(old('payment_methods', $pago->payment_methods ?? []) as $index => $method)
                            <div class="payment_method">
                                <select name="payment_methods[{{ $index }}][method]" class="form-control">
                                    <option value="efectivo" {{ $method['method'] == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                                    <option value="tarjeta" {{ $method['method'] == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                </select>
                                <input type="text" name="payment_methods[{{ $index }}][details][number]" class="form-control" placeholder="Número de Tarjeta" value="{{ $method['details']['number'] ?? '' }}">
                                <input type="text" name="payment_methods[{{ $index }}][details][name]" class="form-control" placeholder="Nombre en Tarjeta" value="{{ $method['details']['name'] ?? '' }}">
                                <button type="button" class="btn btn-danger remove_payment_method">Eliminar</button>
                            </div>
                        @endforeach
                    @else
                        <div class="payment_method">
                            <select name="payment_methods[0][method]" class="form-control">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                            </select>
                            <input type="text" name="payment_methods[0][details][number]" class="form-control" placeholder="Número de Tarjeta">
                            <input type="text" name="payment_methods[0][details][name]" class="form-control" placeholder="Nombre en Tarjeta">
                            <button type="button" class="btn btn-danger remove_payment_method">Eliminar</button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-primary" id="add_payment_method">Agregar Método de Pago</button>
            </div>
            <div class="form-group">
                <label for="payment_date">Fecha de Pago</label>
                <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $pago->payment_date ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="status">Estado</label>
                <input type="text" name="status" class="form-control" value="{{ old('status', $pago->status ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($pago) ? 'Actualizar' : 'Guardar' }}</button>
        </form>
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


