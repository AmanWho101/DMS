@extends('admin/layouts/default')

@section('title')
Employees
@parent
@stop
@section('content')
  @include('common.errors')
    <section class="content-header">
     <h1>Employees Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Employees</li>
         <li class="active">Edit Employee </li>
     </ol>
    </section>
    <section class="content">
    <div class="container">
      <div class="row">
             <div class="col-12">
              <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Employee
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($employee, ['route' => ['admin.employee.employees.update', collect($employee)->first() ], 'method' => 'patch']) !!}

                @include('admin.employee.employees.fields')

                {!! Form::close() !!}
                </div>
              </div>
           </div>
        </div>
    </div>
   </section>
 @stop
@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
