 <div class="scrollbar side-menu-bg" >
                <ul class="nav navbar-nav side-menu h-100" style="background-color:rgb(22, 4, 42);">
                    {{-- <!-- menu title -->
                    <li class="mt-10 mb-10 text-info pl-4 fw-bold text-center">&nbsp;{{trans('generals.application.name')}} &nbsp;</li>
                    <!-- menu item Dashboard--> --}}
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i>
                                <span class="right-nav-text">{{trans('main-sidebar.home')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fa fa-university"></i><span
                                    class="right-nav-text">{{trans('main-sidebar.Grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">{{trans('main-sidebar.Grades_list')}}</a></li>

                        </ul>

                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i>
                                <span class="right-nav-text">{{trans('main-sidebar.classrooms')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('classrooms.index')}}">{{trans('main-sidebar.classroom.list')}}</a></li>
                        </ul>
                    </li>

                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fa fa-table"></i></i><span
                                    class="right-nav-text">{{trans('sections.sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('sections.index')}}">{{trans('sections.section.list')}}</a></li>
                        </ul>
                    </li>

                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fa fa-users"></i>{{trans('students.name')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('students.students.info')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{route('students.create')}}">{{trans('students.student.add')}}</a></li>
                                    <li> <a href="{{route('students.index')}}">{{trans('students.names.list')}}</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#promotion">{{trans('students.management')}} <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="promotion" class="collapse">
                                     <li> <a href="{{route('promotions.index')}}">{{trans('students.promotion')}}</a></li>
                                    <li> <a href="{{route('promotions.create')}}">{{trans('students.promotion.details')}}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#graduated">{{trans('students.graduated')}} <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="graduated" class="collapse">
                                    <li> <a href="{{route('graduations.create')}}">{{trans('students.student.add')}}</a></li>
                                    <li> <a href="{{route('graduations.index')}}">{{trans('students.names.list')}}</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                        <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fa fa-user"></i><span
                                    class="right-nav-text">{{trans('parents.patern.name')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            {{-- <li> <a href="{{url('add-parent')}}">{{trans('main-sidebar.add-parent')}}</a> </li> --}}
                            <li> <a href="{{url('add-parent')}}">{{trans('parents.patern.list')}}</a> </li>
                        </ul>

                    </li>


                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fa fa-users"></i></i><span
                                    class="right-nav-text">{{trans('teachers.name')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('teachers.index')}}">{{trans('teachers.names.list')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text">{{trans('accounts.accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">{{trans('accounts.school.fees')}}</a> </li>
                            <li> <a href="{{route('fees.create')}}">{{trans('accounts.fees.add')}}</a> </li>

                        </ul>
                    </li>

                    <!-- Attendance-->
                 <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-users-class"></i><span class="right-nav-text">{{trans('attendance.attend')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendance.index')}}">{{trans('sections.section.list')}} </a> </li>
                        </ul>
                    </li>

                    <!-- Subjects-->
                   <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('subjects.subjects')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">{{trans('subjects.subjects.list')}}</a> </li>
                        </ul>
                    </li>

              <!-- Quizzes-->
                   <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-icon">
                            <div class="pull-left"><i class="fas fa-spell-check"></i><span class="right-nav-text">{{trans('quizze.quizzes')}} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('quizzes.index')}}">{{trans('quizze.quizzes.list')}} </a> </li>
                            <li> <a href="{{route('questions.index')}}">{{trans('quizze.questions.list')}} </a> </li>

                        </ul>
                    </li>

                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fad fa-books"></i><span class="right-nav-text">{{trans('main-sidebar.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('library-books.index')}}">{{trans('main-sidebar.library.books')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Online classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i></i><span class="right-nav-text">{{trans('zoom.zoom.session')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('online-courses.index')}}">{{trans('zoom.zoom.session')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('settings.setting')}} </span></a>
                    </li>

                    <!-- Users-->
                    <li>
                         <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fa fa-users"></i><span class="right-nav-text">{{trans('users.users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="#">font Awesome</a> </li>

                        </ul>
                    </li>

                </ul>
            </div>
