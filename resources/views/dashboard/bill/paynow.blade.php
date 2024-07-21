<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Bill Detail</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <nav class="navbar navbar-light">
                <div class="container d-block d-flex">
                    <h4 class="card-title">Detail Bill</h4>
                    <a class="navbar-brand">
                        {{-- <img src="{{ asset('assets/img/logo-kos.svg') }}"> --}}
                    </a>
                </div>
            </nav>
            {{-- endt logo and back --}}
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <span class="form-control border-1 border-primary">{{ $bill->name }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <span class="form-control border-1 border-primary">{{ $bill->month }} -
                        {{ $bill->year }}</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <span class="form-control border-1 border-primary">{{ $bill->total_price }}</span>
                </div>

                {{-- pay now button --}}
                <div class="mb-3">
                    <a id="pay-button" class="btn btn-primary">Pay Now</a>
                </div>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

</body>

</html>
