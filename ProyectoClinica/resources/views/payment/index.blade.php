@extends('adminlte::page')

@section('content')
    <script
        src="{{url('https://www.paypal.com/sdk/js?client-id=AcV3SxdzXJ7cEcEMlvu5hAP_hkgqob3oKnUlzfszOOyGmnfFuC3xWKhCqM-jNrisA3TcH84mZ3mMHyny&currency=BO')}}" data-sdk-integration-source="developer-studio"
    ></script>
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
@endsection
