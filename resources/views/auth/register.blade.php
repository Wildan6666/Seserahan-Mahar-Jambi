<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Daftar Akun - Mahar Seserahan Jambi</title>
    <link rel="stylesheet" href="{{ asset('anima/register.css') }}" />
    <link rel="stylesheet" href="{{ asset('anima/globalsregister.css') }}" />
    <style>
        .input-field {
            appearance: none; -webkit-appearance: none; -moz-appearance: none;
            width: 100%; height: 100%; background-color: transparent;
            border: none; padding: 0 10px; margin: 0; box-sizing: border-box;
            font-family: "Poppins-Regular", Helvetica; font-weight: 400;
            color: #000000; font-size: 14px;
        }
        .input-field:focus { outline: none; }
        .input-error-message {
            color: #dc3545; font-size: 12px; font-family: "Poppins-Regular", Helvetica;
            position: absolute; bottom: -20px; left: 0; width: 100%;
        }
    </style>
</head>
<body>
    <div class="sign-up">
        <div class="overlap-wrapper">
            <div class="overlap">
                <div class="rectangle"></div>
                <img class="vector" src="img/vector.svg" />
                <img class="group" src="{{ asset('anima/loginavatar.png') }}" />
                <div class="div"></div>
                <div class="text"><div class="text-wrapper">Sign Up</div></div>
                <div class="logo"><div class="text-wrapper-2">Mahar Seserahan Jambi</div></div>

                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="name-field">
                        <div class="group-2">
                            <div class="overlap-group">
                                <input type="text" name="name" class="input-field" placeholder="masukkan nama anda" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="text-wrapper-4">Nama Lengkap</div>
                            @error('name')
                                <div class="input-error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="email-field">
                        <div class="group-2">
                            <div class="overlap-group">
                                <input type="email" name="email" class="input-field" placeholder="masukkan email anda" value="{{ old('email') }}" required>
                            </div>
                            <div class="text-wrapper-4">Email</div>
                            @error('email')
                                <div class="input-error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="password-field">
                        <div class="group-2">
                           <div class="overlap-group">
                                <input type="password" name="password" class="input-field" placeholder="buat password" required>
                           </div>
                            <div class="text-wrapper-4">Password</div>
                            @error('password')
                                <div class="input-error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="verify-password-field">
                        <div class="group-2">
                            <div class="overlap-group">
                                <input type="password" name="password_confirmation" class="input-field" placeholder="verifikasi password" required>
                            </div>
                            <div class="text-wrapper-4">Verify Password</div>
                        </div>
                    </div>
                </form>

                <div id="submit-button" class="button">
                    <div class="text-wrapper-6">SIGN UP</div>
                </div>

                <div class="sign-in">
                    <p class="already-have-an">
                        <span class="span">Already have an account? </span>
                        <a href="{{ route('login') }}" class="text-wrapper-7">Sign In</a>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.getElementById('submit-button');
            const registerForm = document.getElementById('register-form');

            if (submitButton && registerForm) {
                submitButton.addEventListener('click', function() {
                    registerForm.submit();
                });
            }
        });
    </script>
</body>
</html>