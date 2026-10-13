@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Manajemen Skema Sertifikasi</span>

            {{-- Tombol Tambah Skema hanya muncul untuk Admin --}}
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('skemas.create') }}" class="btn btn-primary btn-sm">Tambah Skema</a>
            @endif
        </div>

        <div class="card-body">
            <!-- Form Search -->
            <form action="{{ route('skemas.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode atau nama skema..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    @if(request('search'))
                    <a href="{{ route('skemas.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Skema</th>
                            <th>Nama Skema</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skemas as $key => $skema)
                        <tr>
                            <td>{{ $skemas->firstItem() ? $skemas->firstItem() + $key : $key + 1 }}</td>
                            <td>{{ $skema->kode_skema }}</td>
                            <td>{{ $skema->nama_skema }}</td>
                            <td>{{ $skema->jenis }}</td>
                            <td>
                                {{-- Tombol Edit & Hapus hanya muncul untuk Admin --}}
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <a href="{{ route('skemas.edit', $skema->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('skemas.destroy', $skema->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                            <td colspan="5" class="text-center">Data skema tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination jika pakai paginate -->
            {{ $skemas->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
