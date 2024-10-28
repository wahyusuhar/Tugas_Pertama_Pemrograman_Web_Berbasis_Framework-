<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Chirps</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Menggunakan Font Awesome untuk ikon -->
    <style>
        body {
            font-family: Arial, sans-serif; /* Mengatur jenis font untuk halaman */
            background-color: #f0f4f8; /* Warna latar belakang */
            color: #333;/* Warna teks */
            margin: 0; /* Menghapus margin default */
            padding: 20px;/* Padding di sekitar konten */
        }
        .container {
            max-width: 600px; /* Lebar maksimum kontainer */
            margin: 160px auto; /* Mengatur kontainer agar berada di tengah */
            background: white; /* Latar belakang putih untuk daftar chirps */
            border-radius: 8px; /* Sudut melengkung pada kontainer */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek kedalaman */
            padding: 20px; /* Padding di dalam kontainer */
        }
        h1 {
            text-align: center; /* Memusatkan teks judul */
            color: #4a90e2; /* Warna judul */
        }
        .chirp {
            background: #e7f3fe;  /* Latar belakang untuk setiap chirp */
            border-left: 5px solid #4a90e2;  /* Garis tepi kiri untuk mempertegas setiap chirp */
            padding: 10px; /* Padding dalam setiap chirp */
            margin-bottom: 15px; /* Spasi antar chirp */
            border-radius: 5px; /* Sudut melengkung pada setiap chirp */
            position: relative; /* Untuk posisi tombol delete */
        }
        .chirp small {
            display: block; /* Menampilkan tanggal pada baris baru */
            font-size: 12px; /* Ukuran font untuk tanggal */
            color: #777; /* Warna teks untuk tanggal */
        }
        .delete-btn {
            position: absolute;/* Posisi tombol delete */
            top: 10px; /* Jarak dari atas */
            right: 10px; /* Jarak dari kanan */
            background-color: #e74c3c; /* Warna tombol delete */
            color: white; /* Warna teks tombol */
            border: none; /* Tanpa border */
            border-radius: 4px; /* Sudut melengkung pada tombol */
            padding: 5px 10px; /* Padding dalam tombol */
            cursor: pointer; /* Kursor tangan saat hover */
            transition: background-color 0.3s;/* Transisi warna tombol */
        }
        .delete-btn:hover {
            background-color: #c0392b; /* Warna tombol saat hover */
        }
        /* Gaya untuk tombol edit */
        .edit-btn {
            background-color: #3498db; /* Warna tombol edit */
            color: white;  /* Warna teks tombol */
            border: none; /* Tanpa border */
            border-radius: 4px;/* Sudut melengkung pada tombol */
            padding: 5px 10px; /* Padding dalam tombol */
            cursor: pointer; /* Kursor tangan saat hover */
            transition: background-color 0.3s;/* Transisi warna tombol */
            margin-right: 10px; /* Spasi antara tombol edit dan delete */
        }
        .edit-btn:hover {
            background-color: #2980b9; /* Warna tombol saat hover */
        }
        /* Gaya untuk pop-up */
        .popup {
            display: none;  /* Sembunyikan pop-up secara default */
            background-color: #4CAF50; /* Warna latar belakang pop-up */
            color: white; /* Warna teks pop-up */
            padding: 15px 25px;/* Padding dalam pop-up */
            border-radius: 5px; /* Sudut melengkung pada pop-up */
            margin-top: 20px; /* Spasi atas untuk pop-up */
            text-align: center; /* Rata tengah untuk teks dalam pop-up */
        }
        /* Gaya untuk tombol create */
        .create-btn {
            display: block;  /* Menampilkan tombol sebagai blok */
            margin: 0 auto 20px;/* Margin bawah untuk spasi */
            padding: 10px 15px; /* Padding dalam tombol */
            background-color: #4CAF50;/* Warna tombol untuk membuat chirp baru */
            color: white; /* Warna teks tombol */
            border-bottom: none;
            border: none;/* Tanpa border */
            border-radius: 4px;/* Sudut melengkung pada tombol */
            cursor: pointer;/* Kursor tangan saat hover */
            text-align: center; /* Rata tengah untuk teks dalam tombol */
            transition: background-color 0.3s; /* Transisi warna tombol */
            width: 200px; /* Lebar tombol */
        }
        .create-btn:hover {
            background-color: #08d813; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Chirps</h1>  <!-- Judul halaman untuk daftar chirps -->
 <!-- Tombol untuk membuat chirp baru -->
    <a href="{{ route('chirps.create') }}">
        <button class="create-btn">Buat Chirp Baru</button>
    </a>

    @if($chirps->isEmpty()) 
    <!-- Memeriksa apakah tidak ada chirp yang tersedia -->
        <p>Tidak ada chirp yang tersedia 🙏❌🚫</p> 
        <!-- Pesan jika tidak ada chirp -->
    @else
        @foreach ($chirps as $chirp)
         <!-- Iterasi melalui setiap chirp -->
            <div class="chirp">
                <p>{{ $chirp->body }}</p> 
                <!-- Menampilkan isi chirp -->
                <small>Dikirim pada {{ $chirp->created_at->format('j F Y, g:i a') }}</small> 
                <!-- Menampilkan tanggal pengiriman chirp -->

                <!-- Tombol Edit -->
                <a href="{{ route('chirps.edit', $chirp->id) }}">
                    <button class="edit-btn">Edit</button> 
                    <!-- Tombol untuk mengedit chirp -->
                </a>
                
                <!-- Tombol Delete -->
                <form action="{{ route('chirps.destroy', $chirp->id) }}" method="POST" style="display: inline;"> 
                    <!-- Form untuk menghapus chirp -->
                    @csrf <!-- Token CSRF untuk keamanan -->
                    @method('DELETE') <!-- Mengindikasikan metode DELETE untuk penghapusan -->
                    <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus chirp ini?');">Hapus</button>
                     <!-- Tombol untuk menghapus chirp -->
                </form>
            </div>
        @endforeach
    @endif
</div>

<!-- Pop-up Pesan Sukses di Bawah Kontainer -->
<div class="popup" id="successPopup">
    {{ session('success') }} 
    <!-- Tampilkan pesan sukses dari session -->
</div>

<script>
    // Fungsi untuk menampilkan pop-up
    function showPopup() {
        const popup = document.getElementById('successPopup');
        popup.style.display = 'block'; // Tampilkan pop-up

        setTimeout(() => {
            popup.style.display = 'none'; 
            // Sembunyikan pop-up setelah 3 detik
        }, 3000); 
        // Durasi 3 detik
    }

    // Memeriksa apakah ada pesan sukses di session dan menampilkannya
    @if(session('success')) <!-- Jika ada pesan sukses dalam session -->
        window.onload = showPopup(); 
        // Panggil fungsi saat halaman dimuat
    @endif
</script>

</body>
</html>

{{-- File ini akan menampilkan daftar semua chirps yang ada. Ini adalah langkah awal untuk membuat tampilan sederhana. --}}
{{-- Kode ini akan menampilkan setiap chirp di halaman index, termasuk teks chirp dan tanggal pembuatan. --}}
