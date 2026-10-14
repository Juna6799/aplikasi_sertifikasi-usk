@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Skema Sertifikasi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Kode Skema</th>
                    <td>{{ $skema->kode_skema }}</td>
                </tr>
                <tr>
                    <th>Nama Skema</th>
                    <td>{{ $skema->nama_skema }}</td>
                </tr>
                <tr>
                    <th>Jenis Skema</th>
                    <td>{{ $skema->jenis }}</td>
                </tr>
            </table>

            <a href="{{ route('skemas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
