 <div class="scrollbar side-menu-bg" >
                <ul class="nav navbar-nav side-menu h-100" style="background-color:rgb(22, 4, 42);">
                    {{-- <!-- menu title -->
                    <li class="mt-10 mb-10 text-info pl-4 fw-bold text-center">&nbsp;{{trans('generals.application.name')}} &nbsp;</li>
                    <!-- menu item Dashboard--> --}}


                    <li class="text-center mt-4 mb-4" style="color:rgb(185, 176, 49)">
                      <i class="fa fa-user"></i>
                       <b >{{auth()->user()->name}}
                        </b>
                    </li>
                     <!-- students-->
                    <li>
                       <a href="{{route('teacher.students.index')}}" target="_blank">
                           <span style="font-size: 1.3rem;color:antiquewhite" >  <i class="fa fa-users mr-4"></i>{{trans('students.name')}}</span>
                       </a>
                    </li>


                    <!-- Teacher reports-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#report-icon">
                            <div class="pull-left" >
                               <span class="right-nav-text"  style="font-size: 1.3rem;color:antiquewhite"> <i class="fa fa-book"></i>التقارير</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="report-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a target="_blank" href="{{route('teacher.students.show')}}" style="font-size: 1.1rem;color:rgb(206, 203, 199)" >تقارير الحضور والغياب </a> </li>
                            <li> <a target="_blank" href="{{route('attendance.index')}}" style="font-size: 1.1rem;color:rgb(210, 208, 205)" >تقارير  الامتحانات </a> </li>
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
                    {{-- <li>
                        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('settings.setting')}} </span></a>
                    </li> --}}



                </ul>
            </div>
