@extends('layout.dashboard')

@push('styles')
<style>
		.box {
			display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 10%;
            border: 1px solid black;
            margin: 10px;
            padding: 15px;
            font-size: 16px;
            color: #555;
            text-transform: uppercase;
            cursor: pointer;
		}
		.box input {
			width: 100%;
			padding: 5px;
			margin: 10px;
		}
		@media screen and (max-width: 600px) {
			.box {
				width: 80px;
				height: 80px;
				margin: 5px;
				font-size: 12px;
			}
			.box input {
				width: 70%;
				padding: 2px;
				margin: 2px;
				font-size: 10px;
			}
		}
	</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
   <h4 class="mb-3 mb-md-0"> <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i>&nbsp;{{ $phone['name'] ?? formatPhoneNumber($phone['number']) }}</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="activity"></i>
      View Phone Report & Graphs
    </button>
  </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <form class="forms-sample">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $phone['name'] ?? formatPhoneNumber($phone['number']) }}">
                    @error('name') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Timezone</label>
                    <select class="form-control" name="timezone">
                        @foreach ($timezones as $time => $zone)
                            <option >{{ $time }}</option>
                        @endforeach
                    </select>
                    @error('timezone') <label class="error invalid-feedback"> {{ $message }}</label>  @enderror
                </div>

                <button type="button" id="target" class="btn btn-success mb-3">Add Business Hours</button>

                <div class="mb-3">
                    <div class="accordion" id="businessHours">
                        
                    </div>
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
<script>

    var set = 1; 
    var accordion = document.querySelector('#businessHours');
    
    function addAccordionItem(content) {

        var newItem = `
            <div class="accordion-item">
            <h2 class="accordion-header" id="heading${set}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${set}" aria-expanded="false" aria-controls="collapse${set}">
                  Business Hours ( Set #${set} ) 
                </button>
            </h2>
            <div id="collapse${set}" class="accordion-collapse collapse" aria-labelledby="heading${set}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <h5>Schedule</h5>
                                <div class="box-container d-flex align-items-center justify-content-center">
                                    <div class="box" onclick="boxClicked('Monday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Monday
                                    </div>
                                    <div class="box" onclick="boxClicked('Tuesday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Tuesday
                                    </div>
                                    <div class="box" onclick="boxClicked('Wednesday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Wednesday
                                    </div>
                                    <div class="box" onclick="boxClicked('Thursday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Thursday
                                    </div>
                                    <div class="box" onclick="boxClicked('Friday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Friday
                                    </div>
                                    <div class="box" onclick="boxClicked('Saturday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Saturday
                                    </div>
                                    <div class="box" onclick="boxClicked('Sunday')">
                                        <input type="time"> 
                                        <input type="time">
                                        Sunday
                                    </div>
                                </div>
                                <hr/>
                                <h5>Call Flow</h5>
                                <div class="box-container d-flex align-items-center justify-content-center">
                                    <div class="box" onclick="boxClicked('Monday')">
                                        <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i> Ring Through
                                    </div>
                                    <div class="box" onclick="boxClicked('Tuesday')">
                                        <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i> Multi Ring
                                    </div>
                                    <div class="box" onclick="boxClicked('Wednesday')">
                                        <i class="btn-icon-prepend" data-feather="arrow-left-circle"></i> Round Robin
                                    </div>

                                    
                                </div>
                </div>
            </div>
            </div>
        `;
        accordion.innerHTML += newItem;
        set++;
    }

    
    $( "#target" ).click(function() {
        addAccordionItem('This is the fourth item\'s accordion body.');
    });

</script>
@endpush

