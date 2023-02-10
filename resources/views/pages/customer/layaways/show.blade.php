@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
   <h1>
        <a class="nav-link"   href="{{ route('customer.layaways.index') }}">
            <i class="bi bi-arrow-left-short"></i> View Layaway Plan Details
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
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body ">
               <h5 class="card-title">Layaway #{{ $layaway->sku }}</h5>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Customer ID</th>
                           <th scope="col">Layaway ID</th>
                           <th scope="col">Customer Name</th>
                           <th scope="col">Customer Email</th>
                           <th scope="col">Layaway Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>#{{ Auth::user()->id }}</td>
                           <td>{{ $layaway->sku }}</td>
                           <td>{{ Auth::user()->name }}</td>
                           <td>{{ Auth::user()->email }}</td>
                           <td>
                              @switch($layaway->status)
                                 @case('PENDING')
                                    <span class="badge bg-warning">{{ $layaway->status }}</span>
                                 @break
                                 @case('COMPLETED')
                                    <span class="badge bg-success">{{ $layaway->status }}</span>
                                 @break
                                 @case('REJECTED')
                                    <span class="badge bg-danger">{{ $layaway->status }}</span>
                                 @break
                              @endswitch
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Metal</th>
                           <th scope="col">Paid Grams</th>
                           <th scope="col">Total Grams</th>
                           <th scope="col">Maturity Date</th>
                           <th scope="col">Recurring Payment</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>{{ $layaway->metal->name }} - {{ $layaway->metal->code }}</td>
                           <td>{{ $layaway->paidGrams() }} grams</td>
                           <td>{{ $layaway->grams }} grams</td>
                           <td>{{ $layaway->maturity_date }}</td>
                           <td>{{ $layaway->recurring_payment }}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="filter filter-button">
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGrams"><i class="bi bi-plus"></i> Add Grams</button>
            </div>
            <div class="card-body">
               <h5 class="card-title">Layaway Breakdowns </h5>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Invoice ID</th>
                           <th scope="col">Grams</th>
                           <th scope="col">Price Paid</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                           <td>{{ $invoice->sku }}</td>
                           <td>{{ $invoice->grams }} grams</td>
                           <td>£{{ $invoice->price }}</td>
                           <td>
                              @switch($invoice->status)
                                 @case('PENDING')
                                    <span class="badge bg-warning">{{ $invoice->status }}</span>
                                 @break
                                 @case('COMPLETED')
                                    <span class="badge bg-success">{{ $invoice->status }}</span>
                                 @break
                                 @case('REJECTED')
                                    <span class="badge bg-danger">{{ $invoice->status }}</span>
                                 @break
                              @endswitch
                           </td>
</tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="modal fade" id="addGrams" tabindex="-1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Grams</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('customer.layaways.update', $layaway->id) }}" method="POST"  >
            @csrf
            @method('PUT')
            <div class="modal-body"> 
               <div class="col-md-12">
                     <label class="form-label">Your remaining grams</label> 
                     <input type="number" class="form-control" value="{{ $layaway->remainingGrams() }}" name="grams" step=".01" min="1" max="{{ $layaway->grams }}">
               </div>
            </div>
            <div class="modal-footer"> 
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="bi bi-cross"></i>Close</button> 
               <button type="submit" class="btn btn-success"><i class="bi bi-plus"></i> Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection



