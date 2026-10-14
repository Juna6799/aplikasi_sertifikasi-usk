@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (!auth()->user()->isAdmin())
                    <div class="alert alert-primary mb-4">
                        <h4 class="alert-heading">Selamat Datang, {{ auth()->user()->name }}!</h4>
                        <p class="mb-0">Berikut informasi data diri peserta Anda dan daftar skema sertifikasi yang
                            tersedia.</p>
                    </div>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Diri Peserta</h5>

                            @if (isset($pesertaSaya) && (empty($pesertaSaya->nik) || empty($pesertaSaya->no_hp)))
                                <a href="{{ route('pesertas.edit', $pesertaSaya->id) }}"
                                    class="btn btn-warning btn-sm">Lengkapi Biodata Anda</a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if (isset($pesertaSaya))
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Nama Lengkap</th>
                                        <td>{{ $pesertaSaya->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. KTP / NIK</th>
                                        <td>{{ $pesertaSaya->nik ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $pesertaSaya->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. HP</th>
                                        <td>{{ $pesertaSaya->no_hp ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Skema Pilihan</th>
                                        <td>{{ $pesertaSaya->skema->nama_skema ?? '-' }}</td>
                                    </tr>
                                </table>
                            @else
                                <div class="alert alert-warning mb-0">
                                    Data peserta Anda belum tersedia.
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Daftar Skema Sertifikasi Tersedia</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Skema</th>
                                            <th>Kode Skema</th>
                                            <th>Jenis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($skemas as $index => $skema)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $skema->nama_skema }}</td>
                                                <td>{{ $skema->kode_skema ?? '-' }}</td>
                                                <td>{{ $skema->jenis ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada skema tersedia.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-primary mb-4">
                        <h4 class="alert-heading">Welcome to the Certification App</h4>
                        <p class="mb-0">Manage certification schema and participant data easily through the left
                            navigation panel.</p>
                    </div>


                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card p-3 border-primary">
                                <h6 class="text-muted">TOTAL CERTIFICATION SCHEMES</h6>
                                <h2>{{ $totalSkema }}</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-3 border-success">
                                <h6 class="text-muted">TOTAL PARTICIPANTS REGISTERED</h6>
                                <h2>{{ $totalPeserta }}</h2>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">5 Newest Registered Participants</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>No. KTP / NIK</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesertaTerbaru as $index => $p)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $p->nama_lengkap }}</td>
                                                <td>{{ $p->nik ?? '-' }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->no_hp ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
