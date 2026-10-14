@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Detail Data Peserta</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Lengkap</th>
                            <td>{{ $peserta->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>No. KTP / NIK</th>
                            <td>{{ $peserta->nik ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $peserta->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $peserta->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Skema Sertifikasi</th>
                            <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Status Verifikasi</th>
                            <td>
                                @if(isset($peserta->status) && $peserta->status == 'Terverifikasi')
                                    <span class="badge bg-success">Terverifikasi</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Kembali</a>

                        @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->email === $peserta->email))
                            <a href="{{ route('pesertas.edit', $peserta->id) }}" class="btn btn-warning">Edit Biodata</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
