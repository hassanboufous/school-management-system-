@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
   {{trans('settings.setting')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('settings.setting')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100" style="font-size: 1.5rem">
            <div class="card-body">
                <table class="table">
                    <form action="{{route('settings.update',$settings['school_name'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <tr>
                            <td>{{trans('settings.school.name')}}</td>
                            <td><input type="text" name="school_name" value="{{$settings['school_name']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.title')}}</td>
                            <td><input type="text" name="school_title" value="{{$settings['school_title']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.address')}}</td>
                            <td><input type="text" name="address" value="{{$settings['address']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.email')}}</td>
                            <td><input type="text" name="school_email" value="{{$settings['school_email']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.phone')}}</td>
                            <td><input type="text" name="phone" value="{{$settings['phone']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.current.year')}}</td>
                            <td><input type="text" name="current_season" value="{{$settings['current_season']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.semister.one')}}</td>
                            <td><input type="text" name="end_first_term" value="{{$settings['end_first_term']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.semister.two')}}</td>
                            <td><input type="text" name="end_second_term" value="{{$settings['end_second_term']}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>{{trans('settings.school.logo')}}</td>
                            <td><input type="file" name="logo"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="{{trans('messages.submit')}}" class="btn btn-primary  mx-50 pl-5 pr-5 mt-4" style="font-size: 1.3rem">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@notifyJs
@endsection
