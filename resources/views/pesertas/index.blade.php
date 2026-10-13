@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Manajemen Peserta Sertifikasi</span>

            {{-- Tombol Tambah Peserta hanya muncul untuk Admin --}}
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('pesertas.create') }}" class="btn btn-primary btn-sm">Tambah Peserta</a>
            @endif
        </div>

        <div class="card-body">
            <!-- Form Search -->
            <form action="{{ route('pesertas.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau No. KTP / NIK..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    @if(request('search'))
                    <a href="{{ route('pesertas.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>No. KTP / NIK</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesertas as $key => $peserta)
                        <tr>
                            <td>{{ $pesertas->firstItem() ? $pesertas->firstItem() + $key : $key + 1 }}</td>
                            <td>{{ $peserta->nama_lengkap }}</td>
                            <td>{{ $peserta->nik }}</td>
                            <td>{{ $peserta->email }}</td>
                            <td>{{ $peserta->no_hp }}</td>
                            <td>
                                {{-- Tombol Edit & Hapus hanya muncul untuk Admin --}}
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <a href="{{ route('pesertas.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pesertas.destroy', $peserta->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @else
                                    <span class="text-muted">Hanya Lihat</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data peserta tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination jika pakai paginate -->
            {{ $pesertas->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
