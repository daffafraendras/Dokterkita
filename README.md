# Dokterkita
Sistem Konsultasi Telememdicine

# Main menu
Head
charset=UTF-8: Mendukung karakter bahasa Indonesia
viewport meta: Desain responsif mobile-first
Tailwind CSS CDN: Semua styling utility classes
Plugin aktif: forms, typography, aspect-ratio
FontAwesome 6.4: Ikon (hamburger, video, login, arrow)

Navigasi
fixed w-full z-50 top-0: Navbar selalu terlihat (sticky)
backdrop-blur-md: Efek kaca buram modern
bg-white/95: Transparansi halus
Responsif
Logo clickable: Dapat kembali ke mainmenu.html

Latar BElakang
relative overflow-hidden: Container dengan clipping
Double absolute inset-0: 2 lapisan background
Layer 1: Gradasi biru transparan
Layer 2: Gambar latar.jpg dengan opacity-10
z-10 pada konten: Memastikan teks di atas background

Hero
Tipografi responsif: 4xl(32px) → 8xl(128px)
bg-gradient-to-r + bg-clip-text: Teks bergradasi pelangi
drop-shadow-2xl: Bayangan teks untuk kedalaman
2 Tombol CTA:
   - Utama: "Konsultasi Sekarang" (gradient + scale hover)
   - Kedua: "Sudah Punya Akun" (border + fill hover)
flex-col sm:flex-row: Responsif stacking

Javascript
DOMContentLoaded: Tunggu HTML fully loaded
Toggle class 'hidden': Show/hide menu (Tailwind utility)
Event delegation: Semua link di menu auto tutup menu

# Register
CSS
::before pseudo-element membuat Latar belakang fullscreen
fixed + background-attachment: fixed: Efek parallax
opacity 0.08: Halus tidak mengganggu bacaan
z-index: -1: ditempatkan di belakang semua elemen

Tombol kembali
<a href="index.html" class="fixed top-6 left-6 z-50 bg-white/90 backdrop-blur-sm p-3 rounded-2xl shadow-lg hover:shadow-xl...">
    <i class="fas fa-arrow-left text-gray-700 text-xl"></i>
</a>
fixed top-6 left-6 z-50 agar posisi selalu terlihat
Glass button bg-white/90 + backdrop-blur-sm
Hover shadow-xl Interaktif yang halus

Form
<div class="max-w-md w-full space-y-8 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-10 border border-white/50">
<form class="space-y-6" id="registerForm">
Glassmorphism
   - bg-white/90 + backdrop-blur-xl + border-white/50
   - rounded-3xl + shadow-2xl: Modern card
6 Field input:
   1. Nama Lengkap (fa-user)
   2. Email (fa-envelope)  
   3. Telepon (fa-phone)
   4. Password (fa-lock + toggle)
   5. Konfirmasi Password
   6. Syarat & Ketentuan (checkbox)
space-y-6: Jarak antar field agar konsisten

Toggle
relative parent + absolute child: Posisi tombol tepat
pr-12 pada input: Ruang untuk ikon toggle
Toggle dan field password sekaligus
Icon switch: fa-eye → fa-eye-slash

JavaScript
Form validation: Password match + minimal 8 karakter
UI Feedback: Spinner loading + tombol disabled
Simulasi API: Delay 2 detik realistis
localStorage persistence: userName + loggedIn status
Redirect otomatis ke mainmenu

# Login
Backgorund
<div class="fixed inset-0 bg-cover bg-center bg-no-repeat opacity-10" 
     style="background-image: url('latar.jpg');">
Inline CSS: Background gambar langsung
fixed inset-0: Fullscreen coverage
bg-cover bg-center: Responsif image scaling
opacity-10: Efek overlay halus

FormLogin
<form class="mt-8 space-y-6" id="loginForm">
    <div class="space-y-4">
        <!-- Email + Password fields -->
    </div>
    <div class="flex items-center justify-between">
        <!-- Remember Me + Forgot Password -->
    </div>
Form  2 field utama
space-y-4/6: Spasi konsisten
justify-between: Layout di tengah
Input styling: backdrop-blur-sm + focus:ring-2

Animasi tombol submit
<button type="submit" class="group relative w-full flex justify-center py-3 px-4...">
    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
        <i class="fas fa-sign-in-alt group-hover:animate-pulse"></i>
    </span>
    Masuk
</button>
group-hover:animate-pulse: Ikon berdenyut saat hover dengan kursor
absolute positioning: Ikon kiri tombol
Transform combo: shadow-xl→2xl + hover:-translate-y-0.5
focus:ring-2: Aksesibilitas keyboard

Javascript
Password visibility toggle
Login sederhana: Tanpa validasi (demo)
localStorage: Menyimpann status login
Redirect langsung ke mainmenu
