@extends('layout.layout')
@section('title', 'Tambah Surat')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Surat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('/dashboard/surat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan Surat:</label>
                            <input type="text" name="ringkasan" class="form-control" id="ringkasan" required>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_surat">jenis surat:</label>
                            {{-- <select name="id_jenis_surat" id="id_jenis_surat">
                                @foreach($jenisSuratOptions as $option)
                                    <option value="{{ $option->id_jenis_surat }}">{{ $option->nama_jenis_surat }}</option>
                                @endforeach
                            </select> --}}
                            <input type="integer" name="id_jenis_surat" class="form-control" id="id_jenis_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat:</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Surat:</label>
                            <input type="file" name="foto" class="form-control-file" id="foto" accept="image/*">
                        </div>
                        <!-- Tambahkan input lain sesuai kebutuhan -->

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('/dashboard/surat') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
