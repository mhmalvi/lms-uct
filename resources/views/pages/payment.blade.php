@extends('layouts.guest')
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

@push('css')
    <style>
        .custom-check-label {
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .custom-check:checked~label {
            background-color: red;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="alert alert-info" role="alert">
            <h5 class="alert-heading">Well done!</h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tortor sapien, 
                fermentum et dignissim et, ornare sit amet odio.
            </p>
            <hr>
            <p class="mb-0">
                Pellentesque tortor sapien, fermentum et dignissim et, ornare sit amet odio.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-check-inline w-100">
                    <input class="form-check-input d-none custom-check" onchange="showPaymentMethod('paypal')" 
                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label form-check-style w-100 custom-check-label" for="inlineRadio1">PayPal</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline w-100">
                    <input class="form-check-input d-none custom-check" onchange="showPaymentMethod('bank')" 
                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label form-check-style w-100 custom-check-label" for="inlineRadio2">Bank</label>
                </div>
            </div>
        </div>
        <div class="row mt-4" id="gusti_shoho_hide_hobi">
            <div class="col-md-12">
                <div id="paypal">
                    <h3>Pay with paypal</h3>
                    <input type="hidden" id="uid" value="{{$token}}">
                    <input type="hidden" id="amount" value="{{$courseFee}}" readonly required>
                    <input type="number"  placeholder="You are paying ${{$courseFee}}" class="form-control" value="You are paying ${{$courseFee}}" readonly>
                    <div class="my-3" id="paypal-button-container"></div> 
                </div>
                <div id="bank">
                    <h3>Pay with bank</h3> 
                    <form  id="bankPayment" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="uid" value="{{$token}}">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentSlip">Please attach the image of bank reicpt</label>
                            <input type="file" name="paymentSlip" id="paymentSlip" class="form-control">
                        </div>
                        <button type="submit"  class="btn btn-md btn-success w-100">Submit</button>
                    </form>
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
                $('#paypal').fadeIn("slow");
                $('#bank').hide();
                $('#gusti_shoho_hide_hobi').fadeIn("slow");
            }
            if(payment == 'bank'){
                $('#paypal').hide();
                $('#bank').fadeIn("slow");
                $('#gusti_shoho_hide_hobi').fadeIn("slow");
            }
        }

        $(document).ready(function(){
            $("#bankPayment").submit(function(e) {
                e.preventDefault();
                let base_url = window.location.origin;
                let formData = new FormData($('#bankPayment')[0]);
                $.ajax({
                    url : base_url+"/make-bank-payment", // Url of backend (can be python, php, etc..)
                    type: "POST", // data type (can be get, post, put, delete)
                    data : formData, // data in json format
                    // async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
                    processData: false,
                    contentType: false,
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
            });
        });
    </script>  
@endpush



  <!-- Include the PayPal JavaScript SDK -->


