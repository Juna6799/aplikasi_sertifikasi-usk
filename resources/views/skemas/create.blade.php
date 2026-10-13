@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Skema Sertifikasi</div>

                <div class="card-body">
                    <form action="{{ route('skemas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode_skema" class="form-label">Kode Skema</label>
                            <input type="text" class="form-control @error('kode_skema') is-invalid @enderror" id="kode_skema" name="kode_skema" value="{{ old('kode_skema') }}" required>
                            @error('kode_skema')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_skema" class="form-label">Nama Skema</label>
                            <input type="text" class="form-control @error('nama_skema') is-invalid @enderror" id="nama_skema" name="nama_skema" value="{{ old('nama_skema') }}" required>
                            @error('nama_skema')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="KKNI" {{ old('jenis') == 'KKNI' ? 'selected' : '' }}>KKNI</option>
                                <option value="Okupasi" {{ old('jenis') == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                                <option value="Klaster" {{ old('jenis') == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('skemas.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection