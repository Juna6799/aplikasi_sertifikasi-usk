@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-white font-weight-bold">Tambah Peserta Baru</div>
        <div class="card-body">
            <form action="{{ route('pesertas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">No. KTP / NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $peserta->nik ?? '') }}" maxlength="16" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>

                <div class="mb-3">
                    <label for="skema_id" class="form-label">Skema Sertifikasi</label>
                    <select name="skema_id" id="skema_id" class="form-control" required>
                        <option value="">-- Pilih Skema Sertifikasi --</option>
                        @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}">{{ $skema->nama_skema }} ({{ $skema->kode_skema }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $peserta->no_hp ?? '') }}" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
