@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Lengkapi / Edit Biodata Peserta</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pesertas.update', $peserta->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    id="nama_lengkap" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $peserta->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nik" class="form-label">No. KTP / NIK (16 digit)</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    name="nik" value="{{ old('nik', $peserta->nik) }}" maxlength="16"
                                    placeholder="Masukkan 16 digit NIK" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $peserta->email) }}" readonly>
                                <small class="text-muted">Email terikat dengan akun login dan tidak dapat diubah.</small>
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}"
                                    maxlength="12" placeholder="Contoh: 081234567890" required>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="skema_id" class="form-label">Pilih Skema Sertifikasi</label>
                                <select class="form-control @error('skema_id') is-invalid @enderror" id="skema_id"
                                    name="skema_id" required>
                                    <option value="">-- Pilih Skema Sertifikasi --</option>
                                    @foreach ($skemas as $skema)
                                        <option value="{{ $skema->id }}"
                                            {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                                            {{ $skema->nama_skema }} ({{ $skema->kode_skema }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('skema_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Biodata</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('nama_lengkap').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
        });

        document.getElementById('no_hp').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 12) {
                this.value = this.value.slice(0, 12);
            }
        });
    </script>
@endsection
