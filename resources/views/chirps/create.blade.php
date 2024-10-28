<!-- resources/views/chirps/create.blade.php -->
{{-- File ini membuat formulir sederhana yang mengirimkan data body ke rute chirps.store untuk menyimpan chirp yang baru dibuat. --}}
<!DOCTYPE html> 
<!-- Menentukan bahwa ini adalah dokumen HTML5 -->
<html lang="id">
     <!-- Menetapkan bahasa dokumen ke Bahasa Indonesia -->
<head>
    <meta charset="UTF-8"> 
    <!-- Mengatur karakter encoding ke UTF-8 untuk mendukung berbagai karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Mengatur tampilan responsif di perangkat mobile -->
    <title>Buat Chirp</title> 
    <!-- Judul halaman yang ditampilkan di tab browser -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <!-- Mengimpor Font Awesome untuk ikon -->
    <style>
        body {
            font-family: Arial, sans-serif; 
            /* Mengatur jenis font untuk halaman */
            background-color: #f0f4f8; 
            /* Mengatur warna latar belakang halaman */
            color: #333; 
            /* Mengatur warna teks di halaman */
            margin: 0; 
            /* Menghapus margin default pada body */
            padding: 20px;
             /* Menambahkan padding di sekitar konten */
        }
        .container {
            max-width: 700px;
             /* Mengatur lebar maksimum kontainer menjadi 600 piksel */
            margin: 0 auto; /* Mengatur kontainer agar berada di tengah halaman */
            background: white;
            /* Mengatur latar belakang kontainer menjadi putih */
            border-radius: 8px; 
            /* Mengatur sudut kontainer menjadi melengkung */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
             /* Menambahkan bayangan untuk efek kedalaman */
            padding: 20px;
             /* Menambahkan padding di dalam kontainer */
        }
        h1 {
            text-align: center; 
            /* Memusatkan teks judul */
            color: #4a90e2;
             /* Mengatur warna teks judul */
        }
        textarea {
            width: 97%;
             /* Mengatur lebar textarea menjadi 100% dari kontainer */
            padding: 10px; 
            /* Menambahkan padding di dalam textarea */
            border: 1px solid #ccc;
             /* Mengatur border textarea dengan warna abu-abu */
            border-radius: 4px;
             /* Mengatur sudut textarea menjadi melengkung */
            resize: none; 
            /* Menonaktifkan kemampuan pengguna untuk mengubah ukuran textarea */
            margin-bottom: 10px;
            /* Menambahkan spasi di bawah textarea */
            font-size: 16px; 
            /* Mengatur ukuran font di dalam textarea */
        }
        button {
            background-color: #4a90e2;
             /* Mengatur warna latar belakang tombol */
            color: white;
            /* Mengatur warna teks tombol menjadi putih */
            border: none;
             /* Menghapus border tombol */
            border-radius: 4px; 
            /* Mengatur sudut tombol menjadi melengkung */
            padding: 10px 15px;
             /* Menambahkan padding di dalam tombol */
            cursor: pointer;
             /* Mengubah kursor menjadi tangan saat hover di tombol */
            font-size: 16px; 
            /* Mengatur ukuran font di dalam tombol */
            transition: background-color 0.3s; 
            /* Menambahkan efek transisi pada perubahan warna latar belakang tombol */
            width: 100%;
             /* Mengatur lebar tombol menjadi 100% dari kontainer */
             text-decoration: none;
        }
        button:hover {
            background-color: #357ABD;
             /* Mengatur warna tombol saat mouse hover */
        }
    </style>
</head>
<body>

<div class="container"> 
    <!-- Kontainer untuk formulir -->
    <h1>Buat Chirp</h1> 
    <!-- Judul halaman untuk membuat chirp -->

    <form action="{{ route('chirps.store') }}" method="POST">
         <!-- Form untuk mengirim data chirp ke rute chirps.store -->
        @csrf <!-- Menambahkan token CSRF untuk keamanan -->
        <textarea name="body" rows="4" placeholder="Apa yang ada di pikiranmu?" required></textarea>
         <!-- Textarea untuk input chirp dengan placeholder dan pengaturan wajib diisi -->
        <button type="submit">Kirim Chirp <i class="fas fa-paper-plane"></i></button>
        <!-- Tombol untuk mengirim chirp dengan ikon pesawat kertas -->
    </form>
</div>

</body>
</html>


