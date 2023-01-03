<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main-sidebar.dashboard')}}
@stop
<head>
    @livewireStyles
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper table-info">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-12 mb-4" >
                        <h3 class="mb-3 text-center" style="font-family: 'Cairo', sans-serif"><i class="fas fa-cogs text-danger"></i> &nbsp; {{trans('generals.dashboard.admin')}}</h3>
                    </div>
                </div>
            </div>

<!-------------- widgets --------------------------------------------->
            <div class="row" style="font-size: 1.4rem">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body table-success">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">عدد الطلاب</p>
                                    <h4>{{App\Models\Student::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="{{route('students.index')}}" target="_blank" rel="noopener noreferrer" >{{trans('generals.data.show')}}</a>
                            </p>
                        </div>
                    </div>
                </div>

               <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body table-primary">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('users.users')}}</p>
                                    <h4>{{App\Models\User::all()->count() + App\Models\Teacher::all()->count() + App\Models\MyParent::all()->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                              <a href="{{route('parent.add')}}" target="_blank" rel="noopener noreferrer">{{trans('generals.data.show')}}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body table-warning">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        {{-- <i class="fa fa-shopping-cart " ></i> --}}
                                        <i class="fas fa-chalkboard-teacher highlight-icon text-success" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">عدد الأساتدة</p>
                                    <h4>{{App\Models\Teacher::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="{{route('students.index')}}" target="_blank" rel="noopener noreferrer" >{{trans('generals.data.show')}}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body table-success">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('parents.patern.name')}}</p>
                                    <h4>{{App\Models\MyParent::all()->count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                              <a href="{{route('parent.add')}}" target="_blank" rel="noopener noreferrer">{{trans('generals.data.show')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
{{-- ---------------------------------------------------------------------------------------------------------- --}}
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100 mb-5">
                        <div class="card-body mb-5">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h3 class="card-title text-danger font-weight-bold p-3"> {{trans('generals.updated.last')}}</h3>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom" style="font-size: 1.2rem">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="months-tab" data-toggle="tab"
                                                    href="#months" role="tab" aria-controls="months"
                                                    aria-selected="true"> {{trans('accounts.fees.student')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="teacher-tab" data-toggle="tab"
                                                    href="#teacher" role="tab" aria-controls="teachers"
                                                    aria-selected="true">{{trans('teachers.name')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="parent-tab" data-toggle="tab" href="#parent"
                                                    role="tab" aria-controls="parent" aria-selected="false">{{trans('parents.patern.name')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="months" role="tabpanel"
                                        aria-labelledby="months-tab">
                                         <div class="table-responsive">
                                            <table  class="table table-success mt-3 table-hover table-sm table-bordered p-0" data-page-length="50"
                                                style="text-align: center;font-size: 1.2rem">
                                                <thead>
                                                <tr class="bg-primary text-white">
                                                    <th>#</th>
                                                    <th>{{ trans('students.fullname') }}</th>
                                                    <th>{{ trans('generals.email') }}</th>
                                                    <th>{{ trans('students.parent') }}</th>
                                                    <th>{{ trans('sections.garde') }}</th>
                                                    <th>{{ trans('students.class') }}</th>
                                                    <th>{{ trans('students.section') }}</th>
                                                    <th>{{ trans('students.year') }}</th>
                                                    <th>{{ trans('generals.created.at') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(App\Models\Student::latest()->paginate(5) as $student)
                                                    <tr >
                                                        <td>{{ $loop->index +1 }}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->parent->father_name }}</td>
                                                        <td>{{$student->grade->name}}</td>
                                                        <td>{{$student->class->class_name }}</td>
                                                        <td>{{$student->section->section_name}}</td>
                                                        <td>{{$student->academic_year}}</td>
                                                        <td>{{$student->created_at->diffForHumans()}}</td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9">{{trans('messages.empty')}}</td>
                                                        </tr>
                                                    @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="parent" role="tabpanel"
                                        aria-labelledby="parent-tab">
                                        <div class="table-responsive">
                                            <table class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                                style="text-align: center;font-size: 1.2rem">
                                                <thead>
                                                <tr class="bg-danger text-white">
                                                    <th>#</th>
                                                    <th>{{ trans('parents.father.email') }}</th>
                                                    <th>{{ trans('parents.father.name.ar') }}</th>
                                                    <th>{{ trans('parents.father.nationality') }}</th>
                                                    <th>{{ trans('parents.father.identity') }}</th>
                                                    <th>{{ trans('parents.father.phone') }}</th>
                                                    <th>{{ trans('parents.father.job.ar') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0; ?>
                                                @forelse (App\Models\MyParent::latest()->paginate(5) as $parent)
                                                    <tr class="bg-light">
                                                        <?php $i++; ?>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $parent->email }}</td>
                                                        <td>{{ $parent->father_name }}</td>
                                                        <td>{{ $parent->nationality->name }}</td>
                                                        <td>{{ $parent->father_identity }}</td>
                                                        <td>{{ $parent->father_phone }}</td>
                                                        <td>{{ $parent->father_job }}</td>
                                                    </tr>
                                                 @empty
                                                    <tr>
                                                        <td colspan="9" class="alert-danger">{{trans('messages.empty')}}</td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teacher" role="tabpanel"
                                        aria-labelledby="teacher-tab">
                                         <div class="table-responsive">
                                            <table  class="table table-info mt-3 table-hover table-sm table-bordered p-0" data-page-length="50"
                                                 style="text-align: center;font-size: 1.2rem">

                                                <thead>
                                                <tr class="table-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('teachers.teacher.name') }}</th>
                                                    <th>{{ trans('teachers.teacher.sex') }}</th>
                                                    <th>{{ trans('parents.father.phone') }}</th>
                                                    <th>{{ trans('teachers.teacher.specialize') }}</th>
                                                    <th>{{ trans('teachers.teacher.date') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse (App\Models\Teacher::latest()->paginate(5) as $teacher)
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$teacher->name}}</td>
                                                        <td>{{$teacher->genders->name}}</td>
                                                        <td>{{$teacher->phone}}</td>
                                                        <td>{{$teacher->specializations->name}}</td>
                                                        <td>{{$teacher->join_date}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="6" >{{trans('messages.empty')}}</td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{-- -----------------------------    Events calendar    ------------------------------------- --}}
             <livewire:calendar />





            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
 @livewireScripts
@stack('scripts')
</body>

</html>
