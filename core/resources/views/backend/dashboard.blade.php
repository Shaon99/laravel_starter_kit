@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-danger card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Registered Users') }} <i
                                        class="fas fa-users float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-info card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Active Users') }} <i
                                        class="fas fa-user-tie float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-success card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Deactived Users') }} <i
                                        class="fas fa-user-times float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-primary card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Membership Users') }} <i
                                        class="fas fa-users float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-warning card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Payment Recieve') }} <i
                                        class="fas fa-dollar-sign float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-danger card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Pending Payment') }} <i
                                        class="fas fa-spinner fa-spin float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-success card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Memberships') }} <i
                                        class="fas fa-fire float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-info card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Active Memberships') }} <i
                                        class="fas fa-fire float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-primary card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute"
                                    alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Autometic Gateways') }} <i
                                        class="fas fa-dungeon float-right"></i>
                                </h4>
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Payment Recieve By Month') }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Sales Membership') }}</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart4"></canvas>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-12  col-lg-12 col-12 all-users-table">
                        <div class="card-header bg-gradient-primary">
                            <h5 class="text-white">{{ __('Latest Users') }}</h5>
                        </div>
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>{{ __('Sl') }}</th>
                                                <th>{{ __('Full Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>

                                            </tr>

                                        </thead>

                                        {{-- <tbody>

                                            @forelse($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->fullname }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>

                                                        @if ($user->status)
                                                            <span
                                                                class='badge bg-gradient-success text-white'>{{ __('Active') }}</span>
                                                        @else
                                                            <span
                                                                class='badge bg-gradient-danger text-white'>{{ __('Inactive') }}</span>
                                                        @endif

                                                    </td>

                                                    <td>

                                                        <a href="{{ route('admin.user.details', $user) }}"
                                                            class="btn btn-primary"><i class="fa fa-pen"></i></a>


                                                    </td>


                                                </tr>
                                            @empty

                                                <tr>

                                                    <td class="text-center" colspan="100%">
                                                        {{ __('No Data Found') }}
                                                    </td>

                                                </tr>
                                            @endforelse
                                        </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12  col-lg-12 col-12 all-users-table">
                        <div class="card-header bg-gradient-danger">
                            <h5 class="text-white">{{ __('Latest Payments') }}</h5>
                        </div>
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>{{ __('Sl') }}</th>
                                                <th>{{ __('Full Name') }}</th>
                                                <th>{{ __('Membership') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                                <th>{{ __('Final Amount') }}</th>
                                                <th>{{ __('Payment Type') }}</th>

                                            </tr>

                                        </thead>

                                        {{-- <tbody>

                                            @forelse($latestPayments as $payment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payment->user->fullname }}</td>
                                                    <td>{{ $payment->membership->name }}</td>
                                                    <td>{{ @$general->site_currency . ' ' . number_format($payment->amount, 2) }}
                                                    </td>
                                                    <td>{{ @$general->site_currency . ' ' . number_format($payment->final_amount, 2) }}
                                                    </td>

                                                    <td>

                                                        @if ($payment->payment_type == 1)
                                                            <span
                                                                class="badge bg-gradient-success text-white">{{ __('Autometic') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-gradient-primary text-white">{{ __('Manual') }}</span>
                                                        @endif
                                                        </i></a>


                                                    </td>


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="100%">
                                                        {{ __('No Data Found') }}
                                                    </td>

                                                </tr>
                                            @endforelse
                                        </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('asset/admin/js/chart.min.js') }}"></script>
{{-- 
    <script>
        'use strict'

        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Total Amount Recieve',
                    data: @json($totalAmount),
                    borderWidth: 2,
                    backgroundColor: 'rgb(151, 90, 242)',
                    borderColor: 'rgb(151, 90, 242)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });

        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: @json($amount),
                    backgroundColor: [
                        '#8022dd',
                        '#63ed7a',
                        '#ffa426',
                        '#fc544b',
                        '#6777ef',
                    ],
                }],
                labels: @json($membershipsName),
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script> --}}
@endpush
