<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirmPassword'];

    if ($password !== $confirm) {
        echo "<script>alert('❌ Password tidak cocok!');</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('❌ Password minimal 8 karakter!');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (fullname, email, phone, password) VALUES ('$fullName', '$email', '$phone', '$hashed_password')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['userName'] = $fullName;
            echo "<script>
                    alert('✅ Pendaftaran berhasil! Selamat datang, $fullName!');
                    window.location.href = 'mainmenu.php';
                  </script>";
        } else {
            echo "<script>alert('❌ Email sudah terdaftar atau terjadi kesalahan!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - DokterKita</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('latar.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.08;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
    <!-- Back Button -->
    <a href="mainmenu.php" class="fixed top-6 left-6 z-50 bg-white/90 backdrop-blur-sm p-3 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
        <i class="fas fa-arrow-left text-gray-700 text-xl"></i>
    </a>

    <div class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-10 border border-white/50">
            <!-- Logo -->
            <div class="text-center mb-8">
                <img src="logo.png" alt="DokterKita" class="h-20 w-48 mx-auto mb-6 object-contain">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Daftar Akun
                </h2>
            </div>

            <form class="space-y-6" method="POST" action="">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-user text-blue-500 mr-2"></i>Nama Lengkap
                    </label>
                    <input id="fullName" name="fullName" type="text" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/80 backdrop-blur-sm transition-all duration-200 placeholder-gray-500"
                           placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-envelope text-blue-500 mr-2"></i>Email
                    </label>
                    <input id="email" name="email" type="email" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/80 backdrop-blur-sm transition-all duration-200 placeholder-gray-500"
                           placeholder="example@email.com">
                </div>

                <!-- Telepon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-phone text-blue-500 mr-2"></i>No. Telepon
                    </label>
                    <input id="phone" name="phone" type="tel" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/80 backdrop-blur-sm transition-all duration-200 placeholder-gray-500"
                           placeholder="081234567890">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-lock text-blue-500 mr-2"></i>Password
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/80 backdrop-blur-sm transition-all duration-200 placeholder-gray-500"
                               placeholder="Minimal 8 karakter">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-lock text-blue-500 mr-2"></i>Konfirmasi Password
                    </label>
                    <input id="confirmPassword" name="confirmPassword" type="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/80 backdrop-blur-sm transition-all duration-200 placeholder-gray-500"
                           placeholder="Ulangi password">
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 text-sm text-gray-700">
                        Saya setuju dengan <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Syarat & Ketentuan</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-gray-600 mb-4">Sudah punya akun?</p>
                <a href="login.php" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk Sekarang
                </a>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                confirmPassword.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                confirmPassword.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>