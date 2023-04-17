@extends('layout.dashboard')

@section('content')
<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Capabilities</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($phones['data'] as $phone)
                                <tr>
                                    <th>
                                        <a href="{{ route('client.phone-trackings.show', $phone['id']) }}" >
                                            {{ $phone['name'] ?? formatPhoneNumber($phone['number']) }}
                                        </a>
                                        <br/>
                                        <small class="text-muted">{{ $phone['id'] }}</small>
                                    </th>
                                    <th> {{ formatPhoneNumber($phone['number'])  }} </th>
                                    <th> 
                                        @foreach ( $phone['capabilities'] as $capabilities )
                                            <span class="badge bg-success">{{ strtoupper($capabilities) }}</span>
                                        @endforeach
                                    </th>
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

@push('plugin-scripts')
@endpush

@push('scripts')
@endpush

