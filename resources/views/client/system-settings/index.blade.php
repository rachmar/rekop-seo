@extends('layout.dashboard')

@section('content')
<div class="row">
   <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Profile Setting</h6>
            <form class="forms-sample">
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Username" value="Client Client">
               </div>
               <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Email" value="client@client.com">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Signal Wire Setting</h6>
            <form class="forms-sample">
               <div class="mb-3">
                  <label class="form-label">Space Url</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Username" value="riztheseowiz.signalwire.com">
               </div>
               <div class="mb-3">
                  <label class="form-label">Project ID</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Username" value="341c89fe-24f0-4265-8c1f-ba993b277d0c">
               </div>
               <div class="mb-3">
                  <label class="form-label">API Token</label>
                  <input type="text" class="form-control" autocomplete="off" placeholder="Username" value="PT5815ba2ad1fdb4cbfd59c5a5fe5c308b721d373231757abc">
               </div>
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

