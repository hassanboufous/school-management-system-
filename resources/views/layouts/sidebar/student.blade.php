 <div class="scrollbar side-menu-bg" >
    <ul class="nav navbar-nav side-menu h-100" style="background-color:rgb(22, 4, 42);">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i>
                    <span class="right-nav-text">{{trans('main-sidebar.home')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
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
                 <li> <a target="_blank" href="{{route('library-books.index')}}">{{trans('main-sidebar.library.books')}}</a> </li>
             </ul>
         </li>
    </ul>
</div>
