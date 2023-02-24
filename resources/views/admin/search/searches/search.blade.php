@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Custom Data Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/scroller.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-slider/css/bootstrap-slider.min.css') }}" />
    <link href="{{ asset('vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/tables.css') }}" />
    <style>
        .tooltip.tooltip-main {
            margin-top: -40px;
        }
        .slider-handle:hover .tooltip{
            opacity: 1;
        }
        .slider-horizontal .slider-handle:hover .slider-horizontal .tooltip.show{
            opacity:1;
        }
        .opacity-0{
            opacity: 0;
        }
        label.btn{
            padding-left: 0;
            padding-right: 14px;
        }

    </style>
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
                <!--section starts-->
                <h1>Custom Data Tables</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">DataTables</a>
                    </li>
                    <li class="active">Custom Data Tables</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content pr-3 pl-3">
                <div class="form-group">

                </div>
                
                <div class="row my-3">
                        <div class="col-lg-12">
                            <div class="card filterable">
                                <div class="card-header bg-primary text-white  clearfix" >
                                    <div class="float-left">
                                        <div class="caption my-2">
                                            <i class="livicon" data-name="camera" data-size="16" data-loop="true"
                                               data-c="#fff" data-hc="white"></i>
                                            Document Management System
                                        </div>
                                    </div>
                                    <div class="float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary tag default_color" id="buttonMale2">
                                            <input type="radio" name="tags" class="opacity-0" value="button1" id="buttonMale2" autocomplete="off" data-value="male"> Male
                                        </label>
                                        <label class="btn btn-secondary tag default_color" id="buttonFemale2">
                                            <input type="radio" name="tags" class="opacity-0" value="button2" id="buttonFemale2" autocomplete="off" data-value="female"> Female
                                        </label>
                                        <label class="btn btn-secondary tag default_color" id="buttonAll2">
                                            <input type="radio" name="tags" class="opacity-0" value="button3" id="buttonAll2" autocomplete="off" data-value="all"> All
                                        </label>
                                    </div>

                                </div>
                                <div class="row paddng my-2">
                                    {{-- <div class="col-md-4">
                                        <label class="control-label">ID Range :</label><br>
                                        <div> <b class="margin_right15">{{$min_id}}</b>
                                            <input id="id_range2" type="text" data-slider-id='id_range' class="slider form-control" dusk="slide_range" data-slider-handle="square" value="" data-slider-min="{{$min_id}}" data-slider-max="{{$max_id}}" data-slider-step="1" data-slider-value="[{{$min_id}},{{$max_id}}]"/> <b style="margin-left: 15px;">@if(!empty($max_count)){{$max_id}} @else 10 @endif</b>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-4">
                                        <label class="control-label mar150">Age :</label><br>
                                        <label class="radio-inline">
                                            &nbsp;<input type="radio" class="custom-radio2" name="radioAge[]" id="custom_radio_one" value="34" dusk="radio21">&nbsp; Below 35</label>
                                        <label class="radio-inline">
                                            <input type="radio" class="custom-radio2" name="radioAge[]" id="custom_radio_two" value="49" dusk="radio22">&nbsp;Below 50</label>
                                        <label class="radio-inline">
                                            <input type="radio" class="custom-radio2" name="radioAge[]" id="custom_radio_three" value="100" dusk="radio23">&nbsp; Above 50</label>
                                        <label class="radio-inline">
                                            <input type="radio" checked class="custom-radio2" name="radioAge[]"
                                                   id="radio_four" value="all" dusk="radio24">&nbsp; All</label>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">Job :</label>
                                        {!! Form::select('professions', $professions, null,['class' => 'form-control', 'id' => 'professions2', 'placeholder' => 'Please Select One...']) !!}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-lg table-responsive-md table-responsive-sm">
                                    <table class="table table-striped width100" id="table5" >
                                        <thead>
                                        <tr class="filters">
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User E-mail</th>
                                            <th>Job</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>File Name</th>
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
                <!-- row-->
            </section>
            <!-- content -->
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap4.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.scroller.js') }}" ></script>
    <script src="{{ asset('vendors/bootstrap-slider/js/bootstrap-slider.js') }}" ></script>
    {{--<script src="http://seiyria.com/bootstrap-slider/dependencies/js/highlight.min.js"></script>--}}
    <script src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
     <script>

        $('input[type="radio"].custom-radio').iCheck({
            radioClass: 'iradio_flat-blue',
            increaseArea: '20%'
        });
        $('input[type="radio"].custom-radio2').iCheck({
            radioClass: 'iradio_flat-blue',
            increaseArea: '20%'
        });
        
        $(function() {
            var jobButton,ageRadio,idSlider,professionSelect;
            var jobButton2,ageRadio2,idSlider2,professionSelect2;
           
            $('#id_range2').bootstrapSlider()
                    .on('slideStop', function(ev){

                        idSlider2 = $(this).bootstrapSlider('getValue');
                        table5.draw();
                    });

            $('.custom-radio2').on('ifChanged', function(event){
                ageRadio2 =  $(this).val();
                table5.draw();
            });
            $('#professions2').click(function () {
                professionSelect2 = $(this).val();
                table5.draw();
            });

            $('#buttonMale2').click(function () {
                jobButton2='male';
                table5.draw();
            });
            $('#buttonFemale2').click(function () {
                jobButton2='female';
                table5.draw();
            });

            $('#buttonAll2').click(function () {
                jobButton2= null;
                table5.draw();
            });

            var table5 = $('#table5').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! URL::to('admin/search/searches/totalData') !!}',
                    data: function (d) {
                        d.ageRadio2=ageRadio2;
                        d.idSlider2=idSlider2;
                        d.professionSelect2 = professionSelect2;
                        d.jobButton2=jobButton2;
                    }
                //     ,
                // success:function($data){
                //     console.log($data);
                // }
                }
                ,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'fullname', name: 'firstname' },
                    { data: 'lastname', name: 'lastname' },
                    { data: 'email', name: 'email' },
                    { data: 'job', name: 'job' },
                    { data: 'age', name: 'age' },
                    { data: 'gender', name: 'gender' },
                    {data: 'file_name', name: 'file_name'}
                ]
            });
//             var allData = table5.data();
// for (var i = 0; i < allData.length; i++) {
//   var rowData = allData[i];
//   for (var j = 0; j < rowData.length; j++) {
//     console.log("row " + (i+1) + " col " + (j+1) + ": " + rowData[j]);
//   }
// }
// Without JQuery
//            var slider = new Slider("#ex8", {
//
//            });
        });
        $(document).ready(function() {
            $(".tooltip").addClass('tooltip-top').removeClass('top');
            $(".slider").on("mouseenter mouseleave", function() {
                $(this).find(".tooltip.tooltip-main").toggleClass("show").removeClass("in");
            });
//        $(".slider-track + .tooltip").toggleClass('show').toggleClass('in');
//

        });

    </script> 
@stop
