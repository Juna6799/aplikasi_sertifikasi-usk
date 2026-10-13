@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- TAMBAHAN 1: Kata Sambutan (Welcome Banner) -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card bg-primary text-white shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="font-weight-bold">Welcome to the Certification App</h4>
                    <p class="mb-0">Manage certification schema and participant data easily through the left navigation panel.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card Total Skema -->
        <div class="col-md-6 mb-3">
            <div class="card border-primary shadow-sm h-100 py-2">
                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Certification Schemes</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalSkema ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Total Peserta -->
        <div class="col-md-6 mb-3">
            <div class="card border-success shadow-sm h-100 py-2">
                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Participants Registered</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalPeserta ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMBAHAN 2: Tabel Peserta Terbaru -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold py-3">
                    <i class="fas fa-users mr-1"></i> 5 Newest Registered Participants
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0">
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
                                @forelse($pesertaTerbaru ?? [] as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">There is no registered participant data yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection