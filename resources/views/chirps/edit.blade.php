<!-- resources/views/chirps/edit.blade.php -->

{{-- File ini menampilkan formulir untuk memperbarui teks chirp yang sudah ada. --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chirp</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            /* Mengatur jenis font untuk halaman */
            background-color: #f0f4f8; 
            /* Warna latar belakang untuk halaman */
            color: #333; 
            /* Warna teks untuk halaman */
            margin: 0; 
            /* Menghapus margin default */
            padding: 20px; 
            /* Padding di sekitar konten */
        }
        .container {
            max-width: 600px;
             /* Lebar maksimum kontainer */
            margin: 0 auto; 
            /* Mengatur kontainer agar berada di tengah */
            background: white;
             /* Warna latar belakang kontainer */
            border-radius: 8px; 
            /* Sudut melengkung pada kontainer */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
             /* Bayangan untuk efek kedalaman */
            padding: 20px; 
            /* Padding di dalam kontainer */
        }
        h1 {
            text-align: center; 
            /* Memusatkan teks judul */
            color: #4a90e2;
             /* Warna untuk judul */
        }
        textarea {
            width: 100%; 
            /* Lebar textarea 100% dari kontainer */
            padding: 10px; 
            /* Padding di dalam textarea */
            border: 1px solid #ccc; 
            /* Border abu-abu untuk textarea */
            border-radius: 4px;
             /* Sudut melengkung pada textarea */
            margin-bottom: 10px; 
            /* Spasi di bawah textarea */
        }
        button {
            background-color: #4CAF50; 
            /* Warna latar belakang untuk tombol */
            color: white;
             /* Warna teks tombol */
            border: none; 
            /* Menghapus border default pada tombol */
            border-radius: 4px; 
            /* Sudut melengkung pada tombol */
            padding: 10px 15px;
             /* Padding di dalam tombol */
            cursor: pointer; 
            /* Mengubah kursor saat hover di atas tombol */
            transition: background-color 0.3s;
             /* Transisi warna latar belakang tombol */
        }
        button:hover {
            background-color: #45a049; 
            /* Warna tombol saat hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Chirp</h1> <!-- Judul halaman untuk pengeditan chirp -->

    <form action="{{ route('chirps.update', $chirp) }}" method="POST">
         <!-- Form untuk mengedit chirp -->
        @csrf <!-- Token CSRF untuk keamanan -->
        @method('PUT') <!-- Mengindikasikan metode PUT untuk pengeditan -->
        <textarea name="body" rows="4">{{ $chirp->body }}</textarea> 
        <!-- Textarea untuk memasukkan isi chirp yang akan diedit -->
        <button type="submit">Update Chirp</button>
         <!-- Tombol untuk mengirimkan formulir -->
    </form>
</div>

</body>
</html>
