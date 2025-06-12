<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Login - Mahar Seserahan Jambi</title>
    <!-- Link ke file CSS Anda. Pastikan path-nya sudah benar. -->
    <link rel="stylesheet" href="{{ asset('anima/globalslogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('anima/login.css') }}" />
    <style>
        /* CSS tambahan untuk memastikan input berfungsi di dalam div */
        .input-field {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            padding: 0;
            margin: 0;
            font-family: "Poppins-Regular", Helvetica;
            font-weight: 400;
            color: #000000;
            font-size: 14px;
            letter-spacing: 0;
            line-height: normal;
            padding-left: 10px;
            box-sizing: border-box; 
        }
        
        .input-field:focus {
            outline: none;
        }

        .input-field::placeholder {
            color: #888; 
        }

        .text-wrapper-3, .text-wrapper-8 {
            cursor: pointer;
            z-index: 5; 
            position: relative; 
        }

        /* === CSS UNTUK POPUP NOTIFIKASI === */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
            display: none; /* Disembunyikan secara default */
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Pastikan popup di atas elemen lain */
        }

        .popup-box {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            text-align: center;
            font-family: "Poppins-Regular", Helvetica;
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        
        .popup-overlay.show {
            display: flex;
        }

        .popup-overlay.show .popup-box {
            transform: scale(1);
            opacity: 1;
        }

        .popup-box h3 {
            margin-top: 0;
            font-family: "Poppins-SemiBold", Helvetica;
            color: #d9534f; /* Warna merah untuk error */
            font-size: 24px;
        }

        .popup-box p {
            color: #333;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .popup-close-btn {
            background-color: #f2af3f;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-family: "Poppins-SemiBold", Helvetica;
            font-size: 16px;
            transition: background-color 0.2s;
        }

        .popup-close-btn:hover {
            background-color: #e09d2e;
        }

        /* === PERBAIKAN CSS UNTUK PESAN ERROR VALIDASI INPUT === */
        .input-error-message {
            color: #d9534f; /* Warna merah yang konsisten */
            font-family: "Poppins-Regular", Helvetica;
            font-size: 13px;
            position: absolute;
            /* Memposisikan error tepat di bawah container induknya (.email atau .password) */
            top: 100%; 
            margin-top: 3px; /* Memberi jarak kecil dari bawah */
            left: 2px;
            width: 100%; /* Memastikan lebar pesan tidak meluber */
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="overlap-wrapper">
            <div class="overlap">
                <!-- ELEMEN VISUAL ASLI (TIDAK DIUBAH) -->
                <div class="rectangle"></div>
                <img class="vector" src="img/vector.svg" />
                <img class="group" src="{{ asset('anima/loginavatar.png') }}" />
                <div class="div"></div>
                <div class="text">
                    <div class="text-wrapper">Welcome back !!!</div>
                    <div class="text-wrapper-2">Sign in</div>
                    <p class="i-don-t-have-an">
                        <span class="span">I don’t have an account ? </span>
                        <a href="/register" class="text-wrapper-3">Sign up</a>
                    </p>
                </div>
                <div class="logo">
                    <div class="text-wrapper-4">Mahar Seserahan Jambi</div>
                </div>

                <!-- FORMULIR FUNGSIONAL -->
                <form method="POST" action="/login">
                    @csrf 
                    <div class="email">
                        <div class="group-2">
                            <div class="overlap-group">
                                <input type="email" name="email" class="input-field" placeholder="Masukkan Email Anda" required value="{{ old('email') }}"/>
                            </div>
                            <div class="text-wrapper-6">Email</div>
                        </div>
                        <!-- Pesan error validasi untuk email (kecuali error kredensial) -->
                        @error('email')
                            @if ($message !== 'These credentials do not match our records.')
                                <div class="input-error-message">{{ $message }}</div>
                            @endif
                        @enderror
                    </div>
                    <div class="password">
                        <div class="div-wrapper">
                            <input type="password" name="password" class="input-field" placeholder="**************" required />
                        </div>
                        <div class="text-wrapper-6">Password</div>
                        <a href="/forgot-password" class="text-wrapper-8">Forgot Password ?</a>
                        <!-- Pesan error validasi untuk password -->
                        @error('password')
                             <div class="input-error-message">{{ $message }}</div>
                        @enderror
                        <!-- Pesan error khusus jika kredensial tidak cocok -->
                        @error('email')
                            @if ($message === 'These credentials do not match our records.')
                                <div class="input-error-message">email atau password yang anda masukkan salah</div>
                            @endif
                        @enderror
                    </div>
                    <button type="submit" class="button">
                        <div class="group-3">
                            <div class="sing-in">SIGN IN</div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- === HTML UNTUK POPUP NOTIFIKASI === -->
    @if(session('error'))
    <div id="errorPopup" class="popup-overlay show">
        <div class="popup-box">
            <h3>Login Gagal</h3>
            <p>{{ session('error') }}</p>
            <button id="closePopupBtn" class="popup-close-btn">Coba Lagi</button>
        </div>
    </div>
    @endif
    
    <!-- === JAVASCRIPT UNTUK MENGONTROL POPUP === -->
    <script>
        const errorPopup = document.getElementById('errorPopup');
        if (errorPopup) {
            const closeBtn = document.getElementById('closePopupBtn');
            function closePopup() {
                errorPopup.classList.remove('show');
            }
            closeBtn.addEventListener('click', closePopup);
            errorPopup.addEventListener('click', function(event) {
                if (event.target === errorPopup) {
                    closePopup();
                }
            });
        }
    </script>
</body>
</html>
