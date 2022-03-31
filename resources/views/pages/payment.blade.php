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
                        <input type="hidden" id="uid" value="{{request()->uid}}">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-5">
                                <input type="number" id="amount" placeholder="Enter amount" class="form-control">
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-3" id="paypal-button-container"></div> 
                           
                        </div>
                    </div>
                    <div id="bank">
                         <h3>Bank Payment</h3> 
                         <div class="col-md-12 col-lg-12 col-sm-12">
                             <form  id="bankPayment">
                                <input type="hidden" name="uid" value="{{request()->uid}}">
                                 <div class="form-group">
                                     <label for=""></label>
                                     <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                 <div class="form-group">
                                     <label for=""></label>
                                     <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                 <div class="form-group">
                                     <label for=""></label>
                                     <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                                    </div>
                                 <div class="form-group">
                                     <label for=""></label>
                                     <input type="text" name="bank_account" class="form-control" placeholder="Enter Bank Account">
                                    </div>
                                 <div class="form-group">
                                     <label for=""></label>
                                     <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID">
                                    </div>
                                <button type="button" onclick="makeBankPayment()" class="btn btn-md btn-success float-right">Make Payment</button>
                             </form>
                         </div>

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

    let makeBankPayment = () =>{
        let formData = $('#bankPayment').serialize();
        let base_url = window.location.origin
    $.ajax({
        url : base_url+"/make-bank-payment", // Url of backend (can be python, php, etc..)
        type: "POST", // data type (can be get, post, put, delete)
        data : formData, // data in json format
        async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
        success: function(response, textStatus, jqXHR) {
            console.log(response);
            if(response.status == 'completed'){
                location.href = base_url+'/success/'+response.uid;
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
        }

    });
        
    }
</script>  
@endpush



  <!-- Include the PayPal JavaScript SDK -->


