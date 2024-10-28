<?php  
// Pembuka tag PHP, menandakan bahwa kode yang mengikuti adalah kode PHP.

namespace App\Http\Controllers;
// Mendefinisikan ruang lingkup (namespace) untuk controller ini, agar tidak terjadi konflik dengan kelas lain yang mungkin memiliki nama yang sama. Controller ini berada dalam direktori App\Http\Controllers

use App\Models\Chirp;
//  Mengimpor model Chirp sehingga dapat digunakan dalam controller ini. Model ini merepresentasikan tabel chirps dalam basis data.

use Illuminate\Http\Request;
//  Mengimpor kelas Request dari Laravel, yang digunakan untuk menangani input dari permintaan HTTP.

class ChirpController extends Controller
//  Mendefinisikan kelas ChirpController, yang merupakan turunan dari kelas Controller di Laravel. Kelas ini mengelola logika untuk operasi CRUD (Create, Read, Update, Delete) terkait chirp.
{
    public function create()
    // Mendefinisikan metode create yang dapat diakses secara publik.
    {
        return view('chirps.create');
        // Mengarahkan pengguna ke tampilan chirps.create, yang berisi formulir untuk membuat chirp baru.
    }



public function index()
//  Mendefinisikan metode index untuk menampilkan semua chirp yang ada.
{
    $chirps = Chirp::all();
    //  Mengambil semua entri chirp dari basis data dan menyimpannya dalam variabel $chirps.


    return view('chirps.index', compact('chirps'));
    //  Mengarahkan pengguna ke tampilan chirps.index dan mengirimkan data $chirps untuk ditampilkan di tampilan.
}

    public function store(Request $request)
    // Mendefinisikan metode store untuk menyimpan chirp baru ke dalam basis data. Metode ini menerima objek Request yang berisi data dari formulir.
    {
        $request->validate([
            'body' => 'required|string|max:255',
            // Melakukan validasi pada data yang diterima, memastikan bahwa kolom body diisi, merupakan string, dan maksimal sepanjang 255 karakter.
        ]);

        Chirp::create([
            'body' => $request->body,
            // Membuat entri baru dalam tabel chirps dengan menggunakan data dari formulir. Dalam hal ini, hanya kolom body yang diisi.
        ]);

        return redirect()->route('chirps.index')->with('success', 'Chirp berhasil dibuat!😊👌');
        //  Mengarahkan kembali pengguna ke rute chirps.index dan mengirimkan pesan sukses ke sesi, yang dapat ditampilkan di tampilan
    }
  



    public function edit(Chirp $chirp)
    // Mendefinisikan metode edit untuk menampilkan formulir pengeditan chirp yang sudah ada. Metode ini menerima model Chirp yang diambil dari parameter rute.
{
    return view('chirps.edit', compact('chirp'));
    // Mengarahkan pengguna ke tampilan chirps.edit, dan mengirimkan objek $chirp untuk diisi dalam formulir.
}

public function update(Request $request, Chirp $chirp)
// Mendefinisikan metode update untuk memperbarui chirp yang sudah ada. Metode ini menerima objek Request dan model Chirp.
{
    $request->validate([
        'body' => 'required|string|max:255',
        // Melakukan validasi data yang diterima, memastikan bahwa kolom body diisi dan memenuhi syarat yang sama seperti pada metode store.
    ]);

    $chirp->update([
        'body' => $request->body,
        // Memperbarui data chirp yang sudah ada dengan nilai baru yang diterima dari formulir.
    ]);

    return redirect()->route('chirps.index')->with('success', 'Chirp berhasil diupdate!😊👌');
    // Mengarahkan kembali pengguna ke rute chirps.index dan mengirimkan pesan sukses tentang pengeditan chirp.
}

public function destroy(Chirp $chirp)
// Mendefinisikan metode destroy untuk menghapus chirp yang sudah ada. Metode ini menerima model Chirp.
{
    $chirp->delete(); 
    // Menghapus chirp dari basis data.


    return redirect()->route('chirps.index')->with('success', 'Chirp berhasil di dalate 😊👌');
    // Mengarahkan kembali pengguna ke rute chirps.index dan mengirimkan pesan sukses tentang penghapusan chirp.
}
}

