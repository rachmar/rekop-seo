@extends('layout.dashboard')

@section('content')
<div class="row">
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total Calls</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $calls['summary']['total_calls'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Total Charge</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">${{ round($calls['summary']['charge'], 2) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Num of Inbound Calls</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $calls['summary']['inbound'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Num of Outbound Calls</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $calls['summary']['outbound'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Completed Calls</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $calls['summary']['call_completed'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-xl-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">No Answer Calls</h6>
                </div>
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $calls['summary']['call_no_answer'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Call Inquiries</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>From ( Phone Number )</th>
                                <th>To ( Phone Number )</th>
                                <th>Direction</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Source</th>
                                <th>Charge</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calls['data'] as $call)
                                <tr>
                                    <th> {{ $call['id'] }} </th>
                                    <th> {{ $call['from'] }} </th>
                                    <th> {{ $call['to'] }} </th>
                                    <th> {{ $call['direction'] }} </th>
                                    <th> {{ $call['status'] }} </th>
                                    <th> {{ $call['duration'] }} </th>
                                    <th> {{ $call['source'] }} </th>
                                    <th> {{ $call['charge'] }} </th>
                                    <th> {{ $call['created_at'] }} </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
