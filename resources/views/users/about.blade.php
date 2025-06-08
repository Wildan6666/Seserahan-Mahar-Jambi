<x-app-layout>
    {{-- CSS Kustom dan link untuk Halaman Ini diletakkan di slot header --}}
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('anima/globals.css') }}" />
        <link rel="stylesheet" href="{{ asset('anima/styleguide.css') }}" />
        <link rel="stylesheet" href="{{ asset('anima/style.css') }}" />
        <style>
          iframe {
            border-radius: 10px;
            width: 100%;
            height: 350px;
            border: 0;
          }
        </style>
    </x-slot>

    {{-- Menghapus div pembungkus dari layout default agar konten Anda tidak terpotong --}}
    {{-- Konten utama halaman sekarang mengambil lebar penuh sesuai CSS Anda --}}
    <div class="about-us">
        <div class="div">
    
            <!-- Tentang Kami -->
            <div class="group-4">
                <img class="p" src="{{ asset('anima/gambarcwe.png') }}" />
                <p class="text-wrapper-8">
                    Mahar Seserahan Jambi adalah usaha yang saya bangun sejak tahun 2019, dengan fokus pada layanan pembuatan
                    box hantaran untuk acara lamaran dan pernikahan. Saya menyediakan berbagai pilihan desain yang dapat
                    disesuaikan dengan kebutuhan pelanggan, mulai dari model box hingga dekorasi bunga hias. Semua pesanan dapat
                    dibuat secara personal sesuai keinginan, baik dari segi warna, maupun tema yang diinginkan.
                </p>
            </div>
            <div class="text-wrapper-9">Tentang Kami</div>
    
            <!-- Deskripsi Tambahan -->
            <div class="overlap">
                <img class="image" src="{{ asset('anima/image37.png') }}" />
                <p class="untuk-memudahkan">
                    Untuk memudahkan pelanggan, saya juga memanfaatkan media sosial seperti Instagram, WhatsApp, dan
                    Facebook sebagai platform promosi dan katalog online. Di sini, pelanggan bisa melihat pilihan produk yang
                    tersedia tanpa harus datang langsung. Namun, jika ingin berkunjung, lokasi usaha saya sudah terdaftar di
                    Google Maps untuk mempermudah akses.
                </p>
            </div>
    
            <!-- Google Maps -->
            <div class="text-wrapper-10">Kunjungi Kami di</div>
            <div class="overlap-group-wrapper">
                <div class="overlap-group">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3988.1888382953516!2d103.67054367496632!3d-1.6375728983472078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMzgnMTUuMyJTIDEwM8KwNDAnMjMuMiJF!5e0!3m2!1sid!2sid!4v1749307511214!5m2!1sid!2sid"
                        width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
    
            <!-- Footer -->
            <div class="footer">
                <div class="frame-wrapper">
                    <div class="frame-2">
                        <div class="frame-3">
                            <div class="icon-brand-wrapper">
                                <img class="icon-brand" src="{{ asset('anima/msjlogo.png') }}" />
                            </div>
                            <p class="all-right-reserved">
                                <span class="span">All right reserved by</span>
                                <span class="text-wrapper-6"> SESERAHAN MAHAR JAMBI </span>
                                <span class="span">2025.</span>
                            </p>
                        </div>
                        <div class="frame-4">
                            <div class="frame-5">
                                <a href="https://wa.me/62821367047864">
                                    <img class="img-2" src="{{ asset('anima/whatsapplogo.png') }}" alt="Hubungi kami di WhatsApp" />
                                <!-- </a>
                                <a href="https://www.instagram.com/maharseserahanjambi.id">
                                    <img class="img-2" src="{{ asset('anima/instagramlogo.png') }}" alt="Kunjungi Instagram kami" />
                                </a> -->
                                 <a href="https://www.instagram.com/maharseserahanjambi.id">
                                    <img class="img-2" src="{{ asset('anima/instagramlogo.png') }}" alt="Kunjungi Instagram kami" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</x-app-layout>
