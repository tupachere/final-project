<x-layout title="Dashboard" :breadcrumb="['Dashboard']">
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="dashboard-col-xl-4 dashboard-col-md-6">
                <div class="dashboard-card bg-primary text-black mb-4">
                    <div class="dashboard-card-body">
                        <h5>Total Anggota</h5>
                        <h1>{{ $total }}</h1>
                    </div>
                </div>
            </div>

            {{-- <div class="dashboard-col-xl-4 dashboard-col-md-6">
                <div class="dashboard-card bg-success text-black mb-4">
                    <div class="dashboard-card-body">
                        <h5>Total Kas</h5>
                        <h1>Rp {{ number_format($jumlah, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>

            <div class="dashboard-col-xl-4 dashboard-col-md-6">
                <div class="dashboard-card bg-warning text-black mb-4">
                    <div class="dashboard-card-body">
                        <h5>Total Pemasukan</h5>
                        <h1>Rp {{ number_format($jumlah, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>

            <div class="dashboard-col-xl-4 dashboard-col-md-6">
                <div class="dashboard-card bg-info text-black mb-4">
                    <div class="dashboard-card-body">
                        <h5>Grand Total (Kas + Pemasukan)</h5>
                        <h1>Rp {{ number_format($grand_total, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-layout>
