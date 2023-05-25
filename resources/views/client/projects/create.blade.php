@extends('layout.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Signal Wire Project <small> /  Add New Project</small></h4>
  </div>
</div>

<div class="row">
   <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('client.projects.store') }}" method="POST">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label class="form-label">Space Url</label>
                        <input type="text" name="space_url" class="form-control @error('space_url') is-invalid @enderror">
                        @error('space_url') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label class="form-label">Project Token</label>
                        <input type="text" name="project_token" class="form-control @error('project_token') is-invalid @enderror">
                        @error('project_token') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label class="form-label">Access Token</label>
                        <input type="text" name="access_token" class="form-control @error('access_token') is-invalid @enderror">
                        @error('access_token') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                     </div>
                  </div>
               </div>
                <a href="{{ route('client.projects.index') }}"  class="btn btn-secondary submit">Back</a>
                <button type="submit" class="btn btn-primary submit">Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('scripts')
@endpush

