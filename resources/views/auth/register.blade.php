@extends('layout.auth')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
   <div class="row w-100 mx-0 auth-page">
      <div class="col-md-8 col-xl-6 mx-auto">
         <div class="card">
            <div class="row">
               <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">
                  </div>
               </div>
               <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                     <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                     <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                     <form method="POST" class="forms-sample" action="{{ route('register') }}" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name">
                            @error('name') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                         </div>
                        <div class="mb-3">
                           <label class="form-label">Email address</label>
                           <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                           @error('email') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-label">Password</label>
                           <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                           @error('password') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Confirmation</label>
                            <input type="password"  name="password_confirmation" class="form-control" placeholder="Password">
                         </div>
                        <div class="form-check mb-3">
                           <input type="checkbox" class="form-check-input">
                           <label class="form-check-label">
                                Remember me
                           </label>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                        </div>
                        <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
