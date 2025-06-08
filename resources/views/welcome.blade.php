<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Selamat Datang - Mahar Seserahan Jambi</title>
    <link rel="stylesheet" href="{{ asset('anima/globalswelcome.css') }}" />
    <link rel="stylesheet" href="{{ asset('anima/welcome.css') }}" />
    <style>
        /* CSS tambahan untuk memastikan link tombol berfungsi tanpa mengubah gaya */
        .button-link {
            text-decoration: none; /* Menghapus garis bawah dari link */
            color: inherit; /* Mengambil warna teks dari elemen induk */
            display: inline-block; /* Memastikan link bisa diposisikan oleh CSS Anda */
        }
    </style>
</head>
<body>
    <div class="landing-page">
        <div class="div">
            <div class="overlap-group">
                <div class="rectangle"></div>
                <img class="vector" src="img/vector.svg" />
                <img class="shopaholics-shopper" src="{{ asset('anima/lendingavatar1.png') }}" />
                <img class="shopaholics-online" src="{{ asset('anima/lendingavatar2.png') }}" />
            </div>
            <div class="overlap">
                <div class="logo">
                    <div class="text-wrapper">WELCOME TO!</div>
                </div>
                <div class="div-wrapper">
                    <div class="text-wrapper-2">Mahar Seserahan Jambi</div>
                </div>
                <div class="logo-2">
                    <p class="p">platform pemesanan mahar online dengan desain ekslusif dan pelayanan terbaik</p>
                </div>
            </div>
            
            <!-- TOMBOL LOGIN FUNGSIONAL -->
            <!-- Ganti "/login" dengan URL atau route Laravel Anda -->
            <a href="/login" class="button-link">
                <div class="button"> <!-- Menggunakan div agar CSS asli tetap berlaku -->
                    <div class="group">
                        <div class="text-wrapper-3">LOGIN</div>
                    </div>
                </div>
            </a>
            
            <!-- TOMBOL DAFTAR FUNGSIONAL -->
            <!-- Ganti "/register" dengan URL atau route Laravel Anda -->
            <a href="/register" class="button-link">
                <div class="group-wrapper"> <!-- Menggunakan div agar CSS asli tetap berlaku -->
                    <div class="group">
                        <div class="text-wrapper-3">DAFTAR</div>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</body>
</html>
