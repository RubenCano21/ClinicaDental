@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
    <h1>CITAS PROGRAMADAS</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="invoice p-3 mb-3">

                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="{{url('vendor/adminlte/dist/img/logo.jpeg')}}" alt="ClinicaDeltal" style="height: 100px; margin-right: 10px; border-radius: 50%">
                                Clinica Deltal <b>Rojas</b>
                                <small class="float-right"><b>Fecha:</b> {{ date('d/m/Y') }}</small>
                            </h4>
                        </div>

                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    De
                                </font></font><address>
                                <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Propietario: Dr.</font></font></strong><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        795 Folsom Ave, Suite 600 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        San Francisco, CA 94107 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Teléfono: (804) 123-5432 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Correo electrónico: </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">info@almasaeedstudio.com</font></font>
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    A
                                </font></font><address>
                                <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">John Doe</font></font></strong><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        795 Folsom Ave, Suite 600 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        San Francisco, CA 94107 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Teléfono: (555) 539-1037 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Correo electrónico: </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">john.doe@example.com</font></font>
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Factura #007612 </b><br>
                            <br>
                            <b><span style="vertical-align: inherit;">ID de pedido:</span></b> 4F3S8J <br>
                            <b><span style="vertical-align: inherit;">Vencimiento del pago:</span></b> 22/02/2014<br>
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
                                    <td>1</td>
                                    <td>Necesidad de velocidad IV</td>
                                    <td>247-925-726</td>
                                    <td>Biodiésel umami de Wes Anderson</td>
                                    <td>$50.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>DVD de monstruos</td>
                                    <td>735-845-642</td>
                                    <td>Terry Richardson helvetica despeinó al maestro del arte callejero</td>
                                    <td>$10.70</td>
                                </tr>
                                <tr>
                                    <td>1</td>
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
                            <a type="button" href="{{url('admin/pacientes')}}" >
                                <img src="{{url('img/credit/visa.png')}}" alt="Visa">
                            </a>
                            <a type="button">
                                <img  src="{{url('img/credit/mastercard.png')}}" alt="Tarjeta MasterCard">
                            </a>
                            <a type="button">
                                <img src="{{url('img/credit/paypal2.png')}}" alt="PayPal">
                            </a>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                                jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                        </div>

                        <div class="col-6">
                            <p class="lead">Monto acumulado  {{ date('d/m/Y') }}</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody><tr>
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
                                    </tbody></table>
                            </div>
                        </div>

                    </div>


                    <div class="row no-print">
                        <div class="col-12">
                            <a href="{{url('invoice-print.html')}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>Imprimir</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>Enviar pago</button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i>Generar PDF</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script data-cfasync="false" src="{{url('/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
@stop
