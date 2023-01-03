<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed" style="font-size: 1.8rem ; font-weight:bold">
            @if (auth('web')->check())
                @include('layouts.sidebar.admin')
            @endif
            @if (auth('student')->check())
                @include('layouts.sidebar.student')
            @endif
             @if (Auth::guard('teacher')->check())
                @include('layouts.sidebar.teacher')
            @endif
            @if (Auth::guard('parent')->check())
                @include('layouts.sidebar.parent')
            @endif
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
