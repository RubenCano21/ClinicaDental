@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Realizar Pago</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="container mt-5">
                            <h2>Realizar Pago con PayPal</h2>
                            <form action="{{ route('paypal.create') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Monto:</label>
                                    <input type="number" class="form-control" id="amount" name="amount" min="1" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Pagar con PayPal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="paypal-button-container"></div>
@endsection

@section('js')
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function (data, actions){
              return actions.order.create({
                  purchase_units: [{
                      amount: {
                          value:100
                      }
                  }]
              })  ;
            },

        }).render('#paypal-button-container')
    </script>
    <script
        src="{{url('https://www.paypal.com/sdk/js?client-id=AcV3SxdzXJ7cEcEMlvu5hAP_hkgqob3oKnUlzfszOOyGmnfFuC3xWKhCqM-jNrisA3TcH84mZ3mMHyny&currency=BO')}}" data-sdk-integration-source="developer-studio"
    ></script>
@endsection
