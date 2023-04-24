<!DOCTYPE html>
<html>

<head>
    <title>PayPal Payments Standard Example</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AY6bFReVUVISpKrLF1_LaVgud8umuLQr7lvOLjus3soqaTf_fZgZwTQE5hyUZ4Xw7I-u_9CcTL1QPZpJ&currency=USD"></script>
</head>

<body>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>