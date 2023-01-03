<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main-sidebar.dashboard')}}
@stop
<head>
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
                        <h3 class="mb-3 text-center" style="font-family: 'Cairo', sans-serif"><i class="fas fa-cogs text-danger"></i> &nbsp; {{trans('generals.dashboard.teacher')}}</h3>
                    </div>
                </div>
            </div>

<!-------------- widgets --------------------------------------------->
            <div class="row" style="font-size: 1.4rem">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
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
                                    <h4>{{$teacher_students_num}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="{{route('teacher.students.index')}}" target="_blank" rel="noopener noreferrer" >{{trans('generals.data.show')}}</a>
                            </p>
                        </div>
                    </div>
                </div>

               <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body table-primary">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('sections.sections.num')}}</p>
                                    <h4>{{$sections_num }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                              <a href="{{route('teacher.sections')}}" target="_blank" rel="noopener noreferrer">{{trans('generals.data.show')}}</a>
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


            <livewire:calendar />

            {{-- <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">Best Selling Items</h5>
                            <ul class="list-unstyled">
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/01.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Car dealer <span class="float-right text-danger">
                                                    8,561</span> </h6>
                                            <p>Automotive WordPress Theme </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative clearfix">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/02.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Webster <span class="float-right text-warning">
                                                    6,213</span> </h6>
                                            <p>Multi-purpose HTML5 Template </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/03.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">The corps <span class="float-right text-success">
                                                    2,926</span> </h6>
                                            <p> Multi-Purpose WordPress Theme </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="position-relative clearfix">
                                            <img class="img-fluid mr-15 avatar-small" src="images/item/04.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">Sam martin <span
                                                    class="float-right text-warning">6,213 </span></h6>
                                            <p>Personal vCard Resume WordPress Theme </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card h-100">
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                    all</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Site Visits Growth </h5>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="text-danger">Income</h6>
                                    <p class="text-danger">+584</p>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-info">Outcome</h6>
                                    <p class="text-info">-255</p>
                                </div>
                            </div>
                            <div id="morris-line" style="height: 320px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="p-4 text-center bg" style="background: url(images/bg/01.jpg);">
                            <h5 class="mb-70 text-white position-relative">Michael Bean </h5>
                            <div class="btn-group info-drop">
                                <button type="button" class="dropdown-toggle-split text-white" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i> Add
                                        task</a>
                                    <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i>
                                        Edit Profile</a>
                                    <a class="dropdown-item" href="#"><i class="text-success ti-user"></i> View
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="text-secondary ti-info"></i>
                                        Contact Info</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center position-relative">
                            <div class="avatar-top">
                                <img class="img-fluid w-25 rounded-circle " src="images/team/13.jpg" alt="">
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-30">
                                    <b>Files Saved</b>
                                    <h4 class="text-success mt-10">1582</h4>
                                </div>
                                <div class="col-sm-4 mt-30">
                                    <b>Memory Used </b>
                                    <h4 class="text-danger mt-10">58GB</h4>
                                </div>
                                <div class="col-sm-4 mt-30">
                                    <b>Spent Money</b>
                                    <h4 class="text-warning mt-10">352,6$</h4>
                                </div>
                            </div>
                            <div class="divider mt-20"></div>
                            <p class="mt-30">17504 Carlton Cuevas Rd, Gulfport, MS, 39503</p>
                            <p class="mt-10">michael@webmin.com</p>
                            <div class="social-icons color-icon mt-20">
                                <ul>
                                    <li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="social-github"><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li class="social-youtube"><a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="calendar-main mb-30">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-12 sm-mb-30">
                                <a href="#" data-toggle="modal" data-target="#add-category"
                                    class="btn btn-primary btn-block m-t-20">
                                    <i class="fa fa-plus pr-2"></i> Create New
                                </a>
                                <div id="external-events" class="m-t-20">
                                    <br>
                                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                    <div class="external-event bg-success fc-event">
                                        <i class="fa fa-circle mr-2 vertical-middle"></i>New Theme Release
                                    </div>
                                    <div class="external-event bg-info fc-event">
                                        <i class="fa fa-circle mr-2 vertical-middle"></i>My Event
                                    </div>
                                    <div class="external-event bg-warning fc-event">
                                        <i class="fa fa-circle mr-2 vertical-middle"></i>Meet manager
                                    </div>
                                    <div class="external-event bg-danger fc-event">
                                        <i class="fa fa-circle mr-2 vertical-middle"></i>Create New theme
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="calendar"></div>
                        <div class="modal" tabindex="-1" role="dialog" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body p-20"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event">Create
                                            event</button>
                                        <button type="button" class="btn btn-danger delete-event"
                                            data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Add Category -->
                        <div class="modal" tabindex="-1" role="dialog" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add a category</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body p-20">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Category Name</label>
                                                    <input class="form-control form-white" placeholder="Enter name"
                                                        type="text" name="category-name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Choose Category Color</label>
                                                    <select class="form-control form-white"
                                                        data-placeholder="Choose a color..." name="category-color">
                                                        <option value="success">Success</option>
                                                        <option value="danger">Danger</option>
                                                        <option value="info">Info</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="warning">Warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-category"
                                            data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--=================================
 wrapper -->

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

</body>

</html>
