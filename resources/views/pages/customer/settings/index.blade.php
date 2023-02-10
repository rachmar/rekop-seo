@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
   <h1>Settings</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">Dashboard</a></li>
         <li class="breadcrumb-item active">Settings</li>
      </ol>
   </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Account Settings</h5>
                    <form action="{{ route('customer.layaways.store') }}" method="POST"  class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Full Name </label> 
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" >
                            <div class="invalid-feedback"> @error('name') {{ $message }}  @enderror</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label> 
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="name" >
                            <div class="invalid-feedback"> @error('name') {{ $message }}  @enderror</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



