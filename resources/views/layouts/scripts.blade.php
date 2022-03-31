<!-- jQuery -->
<script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

<!-- Perfect Scrollbar -->
<script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

<!-- DOM Factory -->
<script src="{{asset('assets/vendor/dom-factory.js')}}"></script>

<!-- MDK -->
<script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

<!-- App JS -->
<script src="{{asset('assets/js/app.js')}}"></script>

<!-- Preloader -->
<script src="{{asset('assets/js/preloader.js')}}"></script>

<!-- Global Settings -->
<script src="{{asset('assets/js/settings.js')}}"></script>

<script src="https://apis.google.com/js/api.js" type="text/javascript"></script>

<script>
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
                        value: '88.44'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }


    }).render('#paypal-button-container');
</script>

@stack('js')
