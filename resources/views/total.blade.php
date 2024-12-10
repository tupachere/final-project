<x-layout title="Dashboard" :breadcrumb="['Dashboard']">
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Total Anggota</h5>
                    <h1>{{ $total }}</h1>
                </div>
            </div>
        </div>
    </div>
</x-layout>
