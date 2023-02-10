@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
   <h1>
        <a class="nav-link"  href="{{ route('customer.layaways.index') }}">
            <i class="bi bi-arrow-left-short"></i> Create New Layaway Plan 
        </a>   
    </h1>
    <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">Dashboard</a></li>
         <li class="breadcrumb-item active">Layaways</li>
      </ol>
   </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Layaway Plan</h5>
                    <form action="{{ route('customer.layaways.store') }}" method="POST"  class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">
                                Metals <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="The metal that you want to make the plan"></i>
                            </label> 
                            <select class="form-select" name="metal_id">
                                <option value="">Please select an option</option>
                                @foreach ($metals as $metal)
                                    <option value="{{$metal->id}}"  {{ (old('metal_id') == $metal->id ) ? 'selected':'' }} >{{$metal->name}} - {{$metal->code}} |  £{{$metal->price}} </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"> @error('metal_id') {{ $message }}  @enderror</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">
                                Grams <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="How many grams do you want to the plan?"></i>
                            </label> 
                            <input type="number" class="form-control" value="{{ old('grams') }}" name="grams" step=".01">
                            <div class="invalid-feedback"> @error('grams') {{ $message }}  @enderror</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">
                                Maturity Date <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="The end date of your plan"></i>
                            </label> 
                            <input type="date" class="form-control" value="{{ old('maturity_date') }}" name="maturity_date">
                            <div class="invalid-feedback"> @error('maturity_date') {{ $message }}  @enderror</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">
                                Recurring Payments <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="How many payments do you want to make?"></i>
                            </label> 
                            <select class="form-select" name="recurring_payment">
                                <option value="">Please select an option</option>
                                <option value="2" {{ (old('recurring_payment') == 2) ? 'selected':'' }} >2</option>
                                <option value="4" {{ (old('recurring_payment') == 4 ) ? 'selected':'' }}>4</option>
                                <option value="6" {{ (old('recurring_payment') == 6 ) ? 'selected':'' }}>6</option>
                                <option value="8" {{ (old('recurring_payment') == 8) ? 'selected':'' }} >8</option>
                                <option value="10" {{ (old('recurring_payment') == 10 ) ? 'selected':'' }} >10</option>
                            </select>
                            <div class="invalid-feedback"> @error('recurring_payment') {{ $message }}  @enderror</div>
                        </div>
                        <div class="text-center"> 
                            <button type="submit" class="btn btn-success"><i class="bi bi-plus"></i> Get This Breakdown</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



