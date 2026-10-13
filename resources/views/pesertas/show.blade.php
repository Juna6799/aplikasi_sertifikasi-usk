@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Detail Data Peserta Sertifikasi</span>
            <a href="{{ route('pesertas.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 25%;">Nama Lengkap</th>
                    <td>{{ $peserta->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>No. KTP / NIK</th>
                    <td>{{ $peserta->nik }}</td>
                </tr>
                <tr>
                    <th>Skema Sertifikasi</th>
                    {{-- Pastikan relasi skema sudah ada di Model Peserta --}}
                    <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $peserta->email }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $peserta->no_hp }}</td>
                </tr>
            </table>

            <div class="mt-3">
                @if(auth()->user()->isAdmin() || auth()->user()->email === $peserta->email)
                    <a href="{{ route('pesertas.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit Data</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
