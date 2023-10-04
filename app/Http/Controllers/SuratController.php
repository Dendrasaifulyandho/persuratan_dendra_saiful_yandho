<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat; // Pastikan Anda mengganti ini sesuai dengan model Surat yang Anda gunakan

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all(); // Mengambil semua data surat dari model Surat

        return view('surat.index', compact('surat'));
    }

    public function tambah()
    {
        // Tampilkan form untuk menambahkan surat
        return view('surat.tambah');
    }

    // public function store(Request $request)
    // {
    //    // Validasi data yang diterima dari form
    //    $request->validate([
    // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    // 'ringkasan' => 'required',
    // 'id_jenis_surat' => 'required|integer',
    // 'tanggal_surat' => 'required',
    // // tambahkan validasi lain sesuai kebutuhan
    // ]);
    

    // // Set fallback value untuk id_jenis_surat jika tidak ada yang dipilih
    // //$request->merge(['id_jenis_surat' => $request->input('id_jenis_surat', 1)]);

    // // Periksa apakah jenis surat valid
    // // $jenisSuratExists = surat::where('id_jenis_surat', $request->id_jenis_surat)->exists();
    // // if (!$jenisSuratExists) {
    // //     return redirect('/dashboard/surat/tambah')->with('error', 'Jenis surat tidak valid');
    // // }

    // // Simpan file foto ke direktori yang sesuai di dalam storage
    // if ($request->hasFile('foto')) {
    //     $file = $request->file('foto');
    //     $fileName = time() . '_' . $file->getClientOriginalName();
    //     $file->storeAs('public/foto-surat', $fileName); // Simpan foto di dalam direktori 'public/foto-surat'

    //     // Simpan data surat ke database
    //     $surat = new Surat;
    //     $surat->foto = 'storage/foto-surat/' . $fileName;
    //     $surat->ringkasan = $request->ringkasan;
    //     $surat->id_jenis_surat = $request->id_jenis_surat;
    //     $surat->tanggal_surat = $request->tanggal_surat;
    //     $surat->id_user = auth()->id(); // contoh penggunaan id_user, sesuaikan dengan struktur tabel Anda
    //     $surat->save();
        
        
    //     \Log::info('Data surat berhasil disimpan: ' . $surat);

    //     return redirect('/dashboard/surat')->with('success', 'Surat berhasil ditambahkan');
    // } else {
    //     return redirect('/dashboard/surat/tambah')->with('error', 'Foto surat wajib diunggah');

    // }
    // }


    public function store(Request $request)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'ringkasan' => 'required',
        'id_jenis_surat' => 'required|integer',
        'tanggal_surat' => 'required',
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    // Periksa apakah file foto telah diunggah
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto-surat', $fileName); // Simpan foto di dalam direktori 'public/foto-surat'

        // Simpan data surat ke database
        $surat = new Surat;
        $surat->foto = 'storage/foto-surat/' . $fileName; // Simpan path ke database
        $surat->ringkasan = $request->ringkasan;
        $surat->id_jenis_surat = $request->id_jenis_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->save();

        // Redirect dengan pesan sukses
        return redirect('/dashboard/surat')->with('success', 'Surat berhasil ditambahkan');
    } else {
        // Redirect dengan pesan error jika file foto tidak diunggah
        return redirect('/dashboard/surat/tambah')->with('error', 'Foto surat tidak valid');
    }
}



    public function edit($id)
    {
        $surat = Surat::find($id);

        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'foto' => 'required',
        //     'ringkasan' => 'required',
        //     'tanggal_surat' => 'required',
        //     // tambahkan validasi lain sesuai kebutuhan
        // ]);

        // $surat = Surat::find($id);
        // $surat->foto = $request->foto;
        // $surat->ringkasan = $request->ringkasan;
        // $surat->tanggal_surat = $request->tanggal_surat;
        // // tambahkan atribut lain sesuai kebutuhan

        // $surat->save();

        // return redirect('/dashboard/surat')->with('success', 'Surat berhasil diperbarui');



        // $request->validate([
        //     'ringkasan' => 'required',
        //     'tanggal_surat' => 'required',
        //     // tambahkan validasi lain sesuai kebutuhan
        // ]);
    
        // $surat = Surat::find($id);
        // $surat->ringkasan = $request->ringkasan;
        // $surat->tanggal_surat = $request->tanggal_surat;
    
        // // Periksa apakah ada file gambar yang diunggah
        // if ($request->hasFile('foto')) {
        //     // Lakukan pengolahan gambar di sini dan simpan ke direktori
        //     $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
        //     $request->file('foto')->storeAs('public/foto-surat', $fileName);
        
        //     // // Hapus gambar lama jika diperlukan
        //     // if (file_exists(public_path($surat->foto))) {
        //     //     unlink(public_path($surat->foto));
        //     // }
        
        //     // Update path gambar yang disimpan di database
        //     $surat->foto = 'storage/foto-surat/' . $fileName;
        // }
        
    
        // $surat->save();
    
        // return redirect('/dashboard/surat')->with('success', 'Surat berhasil diperbarui');
        



    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'ringkasan' => 'required',
        'id_jenis_surat' => 'required',
        'tanggal_surat' => 'required',
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    $surat = Surat::find($id);

    // Hapus gambar lama jika ada
    if ($request->hasFile('foto') && file_exists(public_path($surat->foto))) {
        unlink(public_path($surat->foto));
    }

    // Simpan gambar baru jika diunggah
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto-surat', $fileName);
        $surat->foto = 'storage/foto-surat/' . $fileName;
    }

    // Update data surat lainnya
    $surat->ringkasan = $request->ringkasan;
    $surat->id_jenis_surat = $request->id_jenis_surat;
    $surat->tanggal_surat = $request->tanggal_surat;
    // tambahkan atribut lain sesuai kebutuhan
    $surat->save();

    return redirect('/dashboard/surat')->with('success', 'Surat berhasil diperbarui');
}



    // public function destroy(Surat $surat, Request $request)
    // {
    public function destroy($id)
    {
        // $surat = Surat::find($id);
        // if (!$surat) {
        //     return redirect('/dashboard/surat')->with('error', 'Surat tidak ditemukan');
        // }
            
        // // Periksa apakah file foto ada dan hapus jika ada
        // $fileFoto = public_path($surat->foto);
        // if (file_exists($fileFoto)) {
        //     unlink($fileFoto); // Hapus file foto
        // }
            
        // $surat->delete();
            
        // return redirect('/dashboard/surat')->with('success', 'Surat berhasil dihapus');

        $surat = Surat::find($id);

        //\Log::info('Menghapus surat dengan ID: ' . $id);

        if (!$surat) {
            return response()->json(['success' => false, 'message' => 'Surat tidak ditemukan']);
        }

        // Hapus file foto jika ada
        if (file_exists(public_path($surat->foto))) {
            unlink(public_path($surat->foto));
        }

        // Hapus surat dari database
        $surat->delete();

        return response()->json(['success' => true, 'message' => 'Surat berhasil dihapus']);

    }
                

}
