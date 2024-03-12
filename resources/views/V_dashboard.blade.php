    @extends('template.main')

    @section('content')
        <!-- section title -->
        <section class="container title-container">
            <article class="row">
                <div class="col">
                    <h2>{{ $title }}</h2>
                </div>
            </article>
        </section>
        <!-- end section title -->
        <!-- section main content -->
        <section class="container container-content">
            <!-- row card dashboard -->
            <article class="row d-flex justify-content-center align-items-center flex-wrap">
                <div class="col-md-6 d-flex justify-content-center align-items-center col-xl-3 mt-3">
                    <div class="d-card shadow-card d-flex justify-content-center align-items-center flex-column">
                        <h4>Instruktur</h4>
                        <h1>25</h1>
                        <i class="fa-solid fa-layer-group icon-card"></i>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center col-xl-3 mt-3">
                    <div class="d-card shadow-card d-flex justify-content-center align-items-center flex-column">
                        <h4>Siswa</h4>
                        <h1>3</h1>
                        <i class="fa-solid fa-user icon-card"></i>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center col-xl-3 mt-3">
                    <div class="d-card shadow-card d-flex justify-content-center align-items-center flex-column">
                        <h4>Jurusan</h4>
                        <h1>11</h1>
                        <i class="fa-solid fa-city icon-card"></i>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center col-xl-3 mt-3">
                    <div class="d-card shadow-card d-flex justify-content-center align-items-center flex-column">
                        <h4>Sekolah</h4>
                        <h1>{{ $sekolah }}</h1>
                        <i class="fa-solid fa-box icon-card"></i>
                    </div>
                </div>
            </article>
            <!-- end row card -->
            <!-- chart row -->
            <article class="row mt-5">
                <div class="col-lg-8 mb-3">
                    <div class="chart-card d-flex justify-content-center shadow-card chart-rect mb-3 p-4">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="chart-card d-flex justify-content-center shadow-card chart-rect p-4">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="chart-card shadow-card p-4">
                        <canvas id="doughnutChart" class="mb-4"></canvas>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </article>
            <!-- end chart row -->
        </section>
        <!-- end section main content -->
    @endsection
