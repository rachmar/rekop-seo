@extends('layouts.dashboard')

@section('content')
<div class="pagetitle">
   <h1>Layaways</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">Dashboard</a></li>
         <li class="breadcrumb-item active">Layaways</li>
      </ol>
   </nav>
</div>
<section class="section contact dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($layaways as $layaway)
                    <div class="col-md-3">
                        <a href="{{ route('customer.layaways.show', $layaway->id) }}">
                            <div class="info-box card">
                                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle w-25">
                                <h3>{{ $layaway->metal->name }} - {{ $layaway->metal->code }}</h3>
                                <h6 class="text-dark">{{ $layaway->paidGrams() }} / {{ $layaway->grams }} Grams</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-3">
                    <a href="{{ route('customer.layaways.create') }}">
                        <div class="info-box card">
                            <img src="{{ asset('assets/img/plus_icon.png') }}" alt="Profile" class="rounded-circle w-25">
                            <h3>Add New Plan</h3>
                            <h6 class="text-dark">This will add a new layaway plan</h6>
                        </div>
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gold Graph</h5>
                            <div id="goldChart"></div>
                            <!-- <h5 class="card-title">Silver Graph<span>/ Weekly</span></h5>
                            <div id="silverChart"></div>
                            <h5 class="card-title">Platinum Graph<span>/ Weekly</span></h5>
                            <div id="platinumChart"></div>
                            <h5 class="card-title">Palladium Graph<span>/ Weekly</span></h5>
                            <div id="palladiumChart"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="graphFilter" tabindex="-1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Grams</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form id="cpa-form" action="" method="POST"  >
            <div class="modal-body"> 
               <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Start Date</label> 
                        <input type="date" id="start_date" class="form-control" max="@php echo Carbon\Carbon::now()->subDays(1)->format('Y-m-d'); @endphp">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date</label> 
                        <input type="date" id="end_date" class="form-control" max="@php echo Carbon\Carbon::now()->subDays(1)->format('Y-m-d'); @endphp">
                    </div>
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

@section('script')
<script>

    // document.addEventListener("DOMContentLoaded", () => {



        function renderGoldGraph(dates, values){
            new ApexCharts(document.querySelector("#goldChart"), {
                series: [{
                    name: 'Gold',
                    data: values,
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: true,
                        offsetX: 0,
                        offsetY: 0,
                        tools: {
                            download: '<i class="bi bi-cloud-download-fill"></i>',
                            zoom: '',
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: false,
                            selection: false,
                            customIcons: [{
                                icon: '<i class="bi bi-gear-fill"></i>',
                                index: 1,
                                title: 'tooltip of the icon',
                                class: 'custom-icon',
                                click: function (chart, options, e) {
                                    $('#graphFilter').modal('show');
                                }
                            }]
                        },
                        export: {
                            csv: {
                                filename: undefined,
                                columnDelimiter: ',',
                                headerCategory: 'Dates',
                                headerValue: 'Price',
                                dateFormatter(timestamp) {
                                    return new Date(timestamp).toDateString()
                                }
                            },
                            svg: {
                                filename: undefined,
                            },
                            png: {
                                filename: undefined,
                            }
                        },
                    },
                    
                },
                markers: {
                    size: 4
                },
                colors: ['#658864', '#8EA7E9', '#F48484', '#301E67'],
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    type: 'datetime',
                    categories: dates
                },
                tooltip: {
                    x: {
                        format: 'yyyy/dd/MM'
                    },
                }
            }).render();
        }

        function ajaxGoldGraph(metal = '', start_date = '', end_date = ''){
            $.ajax({
                url: `{{ route('customer.graphs.index') }}?metal=${metal}&start_date=${start_date}&end_date=${end_date}`,
                type: "GET",
                success: function(resp){
                    var response = JSON.parse(resp);
                    renderGoldGraph(response.dates, response.values)

                    new ApexCharts.exec('#goldChart', 'updateOptions', {
                        xaxis: {
                            type: 'datetime',
                            categories: response.dates
                        }
                    }, false, true);


                    new ApexCharts.exec('#goldChart', 'updateSeries', [{
                        data: response.values
                    }], true);
                }
            });
        }

        $("#cpa-form").submit(function(e){
            e.preventDefault();
            var start_date = $('#start_date').val() || '';
            var end_date = $('#end_date').val() || '';
            ajaxGoldGraph('XAU', start_date, end_date);
        });

        ajaxGoldGraph();

        // 

        // new ApexCharts(document.querySelector("#silverChart"), {
        //     series: [{
        //         name: 'Silver',
        //         data: [18.51, 18.24, 18.45, 19.15, 19.21, 18.41, 19.56],
        //     }],
        //     chart: {
        //             height: 350,
        //             type: 'area',
        //             toolbar: {
        //                 show: true,
        //                 offsetX: 0,
        //                 offsetY: 0,
        //                 tools: {
        //                     download: '<i class="bi bi-cloud-download-fill"></i>',
        //                     zoom: '',
        //                     zoomin: false,
        //                     zoomout: false,
        //                     pan: false,
        //                     reset: false,
        //                     selection: false,
        //                     customIcons: [{
        //                         icon: '<i class="bi bi-gear-fill"></i>',
        //                         index: 1,
        //                         title: 'tooltip of the icon',
        //                         class: 'custom-icon',
        //                         click: function (chart, options, e) {
        //                             console.log("clicked custom-icon")
        //                             $('#addGrams').modal('show');
        //                         }
        //                     }]
        //                 },
        //                 export: {
        //                     csv: {
        //                         filename: undefined,
        //                         columnDelimiter: ',',
        //                         headerCategory: 'Dates',
        //                         headerValue: 'Price',
        //                         dateFormatter(timestamp) {
        //                             return new Date(timestamp).toDateString()
        //                         }
        //                     },
        //                     svg: {
        //                         filename: undefined,
        //                     },
        //                     png: {
        //                         filename: undefined,
        //                     }
        //                 },
        //             },
                    
        //          } ,
        //     markers: {
        //         size: 4
        //     },
        //     colors: ['#8EA7E9'],
        //     stroke: {
        //         curve: 'smooth',
        //         width: 2
        //     },
        //     xaxis: {
        //         type: 'datetime',
        //         categories: [
        //             "2023-01-22T00:00:00.000Z",
        //             "2023-01-23T00:00:00.000Z",
        //             "2023-01-24T00:00:00.000Z",
        //             "2023-01-25T00:00:00.000Z",
        //             "2023-01-26T00:00:00.000Z",
        //             "2023-01-27T00:00:00.000Z",
        //             "2023-01-28T00:00:00.000Z",
        //         ]
        //     },
        //     tooltip: {
        //         x: {
        //             format: 'dd/MM/yy'
        //         },
        //     }
        // }).render();

    //     new ApexCharts(document.querySelector("#platinumChart"), {
    //         series: [{
    //             name: 'Platinum',
    //             data: [827.24, 827.26, 824.45, 817.25, 825.54, 827.44, 827.25],
    //         }],
    //         chart: {
    //             height: 350,
    //             type: 'area',
    //             toolbar: {
    //                 show: false
    //             },
    //         },
    //         markers: {
    //             size: 4
    //         },
    //         colors: ['#F48484'],
    //         stroke: {
    //             curve: 'smooth',
    //             width: 2
    //         },
    //         xaxis: {
    //             type: 'datetime',
    //             categories: [
    //                 "2023-01-22T00:00:00.000Z",
    //                 "2023-01-23T00:00:00.000Z",
    //                 "2023-01-24T00:00:00.000Z",
    //                 "2023-01-25T00:00:00.000Z",
    //                 "2023-01-26T00:00:00.000Z",
    //                 "2023-01-27T00:00:00.000Z",
    //                 "2023-01-28T00:00:00.000Z",
    //             ]
    //         },
    //         tooltip: {
    //             x: {
    //                 format: 'dd/MM/yy'
    //             },
    //         }
    //     }).render();

    //     new ApexCharts(document.querySelector("#palladiumChart"), {
    //         series: [{
    //             name: 'Silver',
    //             data: [1361.51, 1353.28, 1343.45, 1333.15, 1353.11, 1323.51, 1362.56],
    //         }],
    //         chart: {
    //             height: 350,
    //             type: 'area',
    //             toolbar: {
    //                 show: false
    //             },
    //         },
    //         markers: {
    //             size: 4
    //         },
    //         colors: ['#301E67'],
    //         stroke: {
    //             curve: 'smooth',
    //             width: 2
    //         },
    //         xaxis: {
    //             type: 'datetime',
    //             categories: [
    //                 "2023-01-22T00:00:00.000Z",
    //                 "2023-01-23T00:00:00.000Z",
    //                 "2023-01-24T00:00:00.000Z",
    //                 "2023-01-25T00:00:00.000Z",
    //                 "2023-01-26T00:00:00.000Z",
    //                 "2023-01-27T00:00:00.000Z",
    //                 "2023-01-28T00:00:00.000Z",
    //             ]
    //         },
    //         tooltip: {
    //             x: {
    //                 format: 'dd/MM/yy'
    //             },
    //         }
    //     }).render();
    // });
</script>
@endsection


