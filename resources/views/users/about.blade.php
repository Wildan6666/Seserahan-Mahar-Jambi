<x-app-layout>
    <!-- AOS Library for Animation on Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init();
        });
    </script>

    <div class="bg-slate-50 py-12 px-6 sm:px-12">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
            <!-- Gambar Founder -->
            <div data-aos="fade-right">
                <img src="{{ asset('anima/premium_photo-1661631042724-aac5bc753fa9.avif') }}" alt="Founder" class="rounded-2xl shadow-lg w-full h-auto object-cover" />
            </div>

            <!-- Konten Tentang Kami -->
            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Mahar Jambi</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Mahar Jambi berdiri sejak 2019 sebagai penyedia jasa pembuatan mahar dan seserahan untuk acara lamaran dan pernikahan. Kami mengutamakan desain custom dan kualitas dekorasi terbaik.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Pelanggan dapat memesan secara online maupun datang langsung ke lokasi yang telah terdaftar di Google Maps. Kami juga aktif membagikan katalog melalui Instagram dan WhatsApp.
                </p>
            </div>
        </div>

        <!-- Galeri Produk Mini -->
        <div class="max-w-6xl mx-auto mt-20" data-aos="fade-up">
            <h3 class="text-2xl font-semibold text-center mb-6">Contoh Desain Mahar</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach([
                    '1749407972_93aec16a3c74fe71bae91b150923521a.jpg',
                    '1749408092.jpg',
                    '1748660722_MAHAR KAYU AESTHETIC MAHAR NIKAH KEKINIAN MAHAR PERNIKAHAN RUSTIC.jpeg'
                ] as $img)
                    <div class="rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                        <img src="{{ asset('images/products/' . $img) }}" alt="Mahar" class="w-full h-56 object-cover">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Testimoni -->
        <div class="max-w-4xl mx-auto mt-20" data-aos="zoom-in">
            <h3 class="text-2xl font-semibold text-center mb-4">Apa Kata Pelanggan?</h3>
            <div x-data="{ index: 0, testimonials: [
                { name: 'Rani', text: 'Pelayanan sangat ramah dan hasilnya melebihi ekspektasi!' },
                { name: 'Doni', text: 'Mahar-nya unik dan cantik banget, pengiriman juga aman.' },
                { name: 'Intan', text: 'Saya bisa request warna dan tema, hasilnya benar-benar personal.' }
            ] }" class="bg-white rounded-lg shadow-md p-6 text-center relative">
                <blockquote class="text-lg italic text-gray-700" x-text="testimonials[index].text"></blockquote>
                <p class="mt-4 font-semibold text-green-600" x-text="testimonials[index].name"></p>
                <div class="absolute top-1/2 -translate-y-1/2 left-4 cursor-pointer" @click="index = (index - 1 + testimonials.length) % testimonials.length">⬅️</div>
                <div class="absolute top-1/2 -translate-y-1/2 right-4 cursor-pointer" @click="index = (index + 1) % testimonials.length">➡️</div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="max-w-6xl mx-auto mt-20" data-aos="fade-up">
            <h3 class="text-2xl font-semibold text-center mb-4">Lokasi Kami</h3>
            <p class="text-center text-gray-600 mb-6">Silakan kunjungi toko kami langsung di lokasi berikut ini:</p>
            <div class="rounded-xl overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3988.1888382953516!2d103.67054367496632!3d-1.6375728983472078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMzgnMTUuMyJTIDEwM8KwNDAnMjMuMiJF!5e0!3m2!1sid!2sid!4v1749307511214!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- CTA / Ajakan -->
        <div class="mt-20 text-center" data-aos="fade-up">
            <h4 class="text-xl font-bold text-gray-800 mb-2">Siap Buat Mahar Impianmu?</h4>
            <p class="text-gray-600 mb-4">Klik tombol di bawah untuk mulai konsultasi dan pemesanan.</p>
            <a href="/katalog" class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition">
                Lihat Katalog
            </a>
        </div>
    </div>
</x-app-layout>
