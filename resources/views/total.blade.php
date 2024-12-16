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
        </div>
    </div>
</x-layout>
