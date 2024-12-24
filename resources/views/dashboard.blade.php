<x-layout title="Dashboard">
    <div class="dashboard-container py-4">
        <div class="dashboard-row">
            <!-- Total Anggota -->
            <div class="dashboard-col-xl-4 dashboard-col-md-6 mb-4">
                <a href="{{ url('/anggota') }}" class="dashboard-card bg-primary text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Total Anggota</h5>
                        <h1>{{ $total }}</h1>
                    </div>
                </a>
            </div>

            <!-- Total Kas -->
            <div class="dashboard-col-xl-4 dashboard-col-md-6 mb-4">
                <a href="{{ url('/kas') }}" class="dashboard-card bg-success text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Total Kas</h5>
                        <h1>Rp {{ number_format($jumlah, 0, ',', '.') }}</h1>
                    </div>
                </a>
            </div>

            <!-- Total Pemasukan -->
            <div class="dashboard-col-xl-4 dashboard-col-md-6 mb-4">
                <a href="{{ url('/pemasukan') }}" class="dashboard-card bg-warning text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Total Pemasukan</h5>
                        <h1>Rp {{ number_format($jumlahPemasukan, 0, ',', '.') }}</h1>
                    </div>
                </a>
            </div>

            <!-- Total Pengeluaran -->
            <div class="dashboard-col-xl-4 dashboard-col-md-6 mb-4">
                <a href="{{ url('/pengeluaran') }}" class="dashboard-card bg-danger text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Total Pengeluaran</h5>
                        <h1>Rp {{ number_format($jumlahPengeluaran, 0, ',', '.') }}</h1>
                    </div>
                </a>
            </div>

            <!-- Grand Total -->
            <div class="dashboard-col-xl-6 dashboard-col-md-6 mb-4">
                <div class="dashboard-card bg-info text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Grand Total (Kas + Pemasukan - Pengeluaran)</h5>
                        <h1>Rp {{ number_format($grand_total, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="dashboard-col-xl-6 dashboard-col-md-6 mb-4">
                <a href="{{ url('/charts/area') }}" class="dashboard-card bg-dark text-white shadow">
                    <div class="dashboard-card-body text-center">
                        <h5>Chart</h5>
                        <img src="{{ url('/images/chart.png') }}" alt="Area Chart" class="img-fluid mt-3" style="max-width: 100px;">
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-layout>
