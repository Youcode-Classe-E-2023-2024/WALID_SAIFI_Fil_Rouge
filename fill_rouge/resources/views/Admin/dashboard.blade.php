@extends('Admin.layout')

@section('content')

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body dashboard-tabs p-0">
                                <ul class="nav nav-tabs px-4" role="tablist">
                                </ul>
                                <div class="tab-content py-0 px-0">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="d-flex flex-wrap justify-content-xl-between">
                                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Start date</small>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <h5 class="mb-0 d-inline-block">26 Jul 2024</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Revenue</small>
                                                    <h5 class="me-2 mb-0">$00000</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Total views</small>
                                                    <h5 class="me-2 mb-0">0000000000</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Downloads</small>
                                                    <h5 class="me-2 mb-0">0000000</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Flagged</small>
                                                    <h5 class="me-2 mb-0">3497843</h5>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">



                            <div class="content-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Bar chart</h4>
                                                <canvas id="barChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Pie chart</h4>
                                                <canvas id="pieChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    </div>
                            
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
