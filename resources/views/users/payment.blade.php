<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-xl shadow-md p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Konfirmasi Pembayaran</h2>
        <p class="text-gray-600 mb-6">
            Klik tombol di bawah untuk melanjutkan ke proses pembayaran melalui Midtrans.
        </p>

        <button 
            id="pay-button"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold py-3 rounded-lg shadow-md transition duration-200"
        >
            Bayar Sekarang
        </button>

        <p class="mt-6 text-sm text-gray-500">
            Anda akan diarahkan ke halaman pembayaran Midtrans.
        </p>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('users.order-success') }}";
                },
                onPending: function(result){
                    window.location.href = "{{ route('users.order-success') }}";
                },
                onError: function(result){
                    alert("Terjadi kesalahan saat pembayaran.");
                },
                onClose: function(){
                    alert("Anda menutup popup pembayaran tanpa menyelesaikan transaksi.");
                }
            });
        });
    </script>
</body>
</html>
