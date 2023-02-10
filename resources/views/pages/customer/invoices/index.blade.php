@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
   <h1>Invoices</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">Dashboard</a></li>
         <li class="breadcrumb-item active">Invoices</li>
      </ol>
   </nav>
</div>
<section class="section dashboard">
   <div class="row">
      <div class="col-12">
         <div class="card recent-sales overflow-auto">
            <div class="card-body">
               <h5 class="card-title">Recent Invoices</h5>
               <table class="table table-borderless datatable">
                  <thead>
                     <tr>
                        <th scope="col">Sku</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Layaway Plan</th>
                        <th scope="col">Grams</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ( $invoices as $invoice)
                        <tr>
                           <th>#{{ $invoice->sku }}</th>
                           <td>{{ $invoice->customer->name }}</td>
                           <td><a href="{{ route('customer.layaways.show', $invoice->layaway->id) }} " class="text-primary">{{ $invoice->layaway->sku }} </a></td>
                           <td>{{ $invoice->grams }}</td>
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
         </div>
      </div>
   </div>
</section>
@endsection



