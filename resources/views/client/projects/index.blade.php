@extends('layout.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Signal Wire Projects</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <a href="{{ route('client.projects.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
        <i class="link-icon" data-feather="plus"></i> Add New Project
    </a>
  </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Api</th>
                                <th>Capabilities</th>
                            </tr>
                        </thead>
                        <tbody>
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

