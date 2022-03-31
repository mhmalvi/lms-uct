@extends('layouts.guest')
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 mt-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" onchange="showPaymentMethod('paypal')" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">PayPal</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" onchange="showPaymentMethod('bank')" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Bank</label>
              </div>
        </div>
    </div>
    <div class="row mt-4" id="gusti_shoho_hide_hobi">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div id="paypal">
                        <h3>Make Payment</h3>
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-5">
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-3" id="paypal-button-container"></div> 
                           
                        </div>
                    </div>
                    <div id="bank">
                         <h3>Bank Payment</h3> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#paypal').hide();
    $('#bank').hide();
    $('#gusti_shoho_hide_hobi').hide();

    let showPaymentMethod = (payment) =>{

        if(payment == 'paypal'){

            $('#paypal').show();
            $('#bank').hide();
            $('#gusti_shoho_hide_hobi').show();
        }

        if(payment == 'bank'){

            $('#paypal').hide();
            $('#bank').show();
            $('#gusti_shoho_hide_hobi').show();
        }

    }
</script>  
@endpush

  <!-- Include the PayPal JavaScript SDK -->


