@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>Facturación</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="{{ asset('vendor/adminlte/dist/img/logo.jpeg') }}" alt="ClinicaDeltal" style="height: 100px; margin-right: 10px; border-radius: 50%">
                                Clinica Deltal Rojas
                                <small class="float-right"><b>Fecha:</b> {{ date('d/m/Y') }}</small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Propietario: Dr. Carlos Rojas</strong><br>
                                C/totai #55, B/30 de agosto<br>
                                Av. Moscu 6to anillo<br>
                                Teléfono: 75462341<br>
                                Correo electrónico: info@clinicadeltal.com
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Cliente: John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Teléfono: (555) 539-1037<br>
                                Correo electrónico: john.doe@example.com
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">

                                <b>Factura #546345</b><br>

                            <br>
                            <b>ID de pedido:</b> 4F3S8J<br>
                            <b>Vencimiento del pago:</b> 22/02/2014<br>
                            <b>Cuenta:</b> 968-34567
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Fecha</th>
                                    <th>Tipo de Servicio</th>
                                    <th>Descripción</th>
                                    <th>Total parcial</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Obligaciones</td>
                                    <td>455-981-221</td>
                                    <td>El snort testosterona trofeo guantes de conducir guapo</td>
                                    <td>$64.50</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Necesidad de velocidad IV</td>
                                    <td>247-925-726</td>
                                    <td>Biodiésel umami de Wes Anderson</td>
                                    <td>$50.00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>DVD de monstruos</td>
                                    <td>735-845-642</td>
                                    <td>Terry Richardson helvetica despeinó al maestro del arte callejero</td>
                                    <td>$10.70</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Rayo azul para adultos</td>
                                    <td>422-568-642</td>
                                    <td>Tipografía lomo despeinada</td>
                                    <td>$25.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <p class="lead">Métodos de pago:</p>
                            <a href="#" type="button">
                                <img src="{{ asset('img/credit/visa.png') }}" alt="Visa">
                            </a>
                            <a href="#" type="button">
                                <img src="{{ asset('img/credit/mastercard.png') }}" alt="Tarjeta MasterCard">
                            </a>
                            <a href="{{ route('paypal.create') }}" type="button">
                                <img src="{{ asset('img/credit/paypal2.png') }}" alt="PayPal">
                            </a>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                                jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="lead">Resumen del total a la fecha {{ date('d/m/Y') }}</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th style="width:50%">Total parcial:</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Descuento (9,3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Envío:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="#" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</a>
                            <a href="{{ route('facturas.download') }}" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generar PDF</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Enviar pago</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script data-cfasync="false" src="{{url('/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
@stop
