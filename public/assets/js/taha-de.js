$(document).ready(function(){
    // Render the PayPal button into #paypal-button-container
paypal.Buttons({
style: {
    layout: 'horizontal',
    size: 'small',
    color:  'blue',
    shape:  'pill',
    label:  'pay',
    height: 40,
    tagline: 'false'
},
// Set up the transaction
createOrder: function(data, actions) {
    return actions.order.create({
        purchase_units: [{
            amount: {
                value: $('#amount').val()
            },
        }]
    });
},

// Finalize the transaction
onApprove: function(data, actions) {
    return actions.order.capture().then(function(orderData) {
        // Successful capture! For demo purposes:
        // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var payments = orderData.purchase_units[0].payments.captures[0];
        var payer = orderData.payer;
        var shipping = orderData.purchase_units[0].shipping;
        // alert('Transaction '+ payments.status + ': ' + payments.id + '\n\nSee console for all available details');

        let transactionDetails = {
            name          : payer.name.given_name,
            email         : payer.email_address,
            uid           : $('#uid').val(),
            phone         : payer.phone.phone_number.national_number,
            address_line_1: shipping.address.address_line_1,
            admin_area_2  : shipping.address.admin_area_2,
            admin_area_1  : shipping.address.admin_area_1,
            postal_code   : shipping.address.postal_code,
            amount        : payments.amount.value,
            currency      : payments.amount.currency_code,
            transaction_id: payments.id,
            status        : payments.status
        }


        makePayPalPayment(transactionDetails)

        // Replace the above to show a success message within this page, e.g.
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '';
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
    });
}


}).render('#paypal-button-container');



function makePayPalPayment(transactionDetails){
    let base_url = window.location.origin
    $.ajax({
        url : base_url+"/make-paypal-payment", // Url of backend (can be python, php, etc..)
        type: "POST", // data type (can be get, post, put, delete)
        data : transactionDetails, // data in json format
          async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
        success: function(response, textStatus, jqXHR) {
            console.log(response);
            if(response.status == 'completed'){
                location.href = base_url+'/success';
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
        }

    });
}



});