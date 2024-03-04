@extends('layout.adminLTE')
@section('content')
    <div class="container-fluid">
        <div class="alert alert-success text-justify-end">
            <?php $ethiopian_date = new Andegna\DateTime(); ?>
            <h4>System Date :
                <?= date('l, F d, Y') . ' [ ' . $ethiopian_date->format('l, F d, Y') . '] ' ?>
            </h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{ count(App\Models\Court::all()) }}</h3>
                        <p>{{ __('Court') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="admin/court" class="small-box-footer">{{ __('More info') }} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ count(App\Models\CaseModel::all()) }}</h3>
                        <p>{{ __('Cases') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="case" class="small-box-footer">{{ __('More info') }}<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count(App\Models\CourtStaff::all()) }}</h3>
                        <p>{{ __('Court Staff') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                    <a href="admin/courtstaff" class="small-box-footer">{{ __('More info') }} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>@php
                            echo count(App\Models\Party::getClients());
                        @endphp</h3>
                        <p>{{ __('Clients Participated so far') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="admin/party" class="small-box-footer">{{ __('More info') }} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-3 col-6">

                {{-- <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\CaseModel::getTodayRegisteredCases() }}</h3>
                        <p>Total Cases registered today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\event::getTodayEvent() }}</h3>
                        <p>Total Today Event</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
    <div>
        <div class="col-12 table-responsive">
            @include('case.partials._dashboard2')
        </div>
    </div>
@stop
@section('js')
    <script></script>
@stop
