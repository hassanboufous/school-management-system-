@extends('layouts.master')
@section('css')
    @notifyCss
@section('title')
    {{trans('students.name')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
       {{trans('students.name')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                تراجع الكل
            </button>
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr>
                        <th class="alert-info">#</th>
                        <th class="alert-info">{{trans('students.fullname')}}</th>
                        <th class="alert-danger">المرحلة الدراسية السابقة</th>
                        <th class="alert-danger">السنة الدراسية</th>
                        <th class="alert-danger">الصف الدراسي السابق</th>
                        <th class="alert-danger">القسم الدراسي السابق</th>
                        <th class="alert-success">المرحلة الدراسية الحالي</th>
                        <th class="alert-success">السنة الدراسية الحالية</th>
                        <th class="alert-success">الصف الدراسي الحالي</th>
                        <th class="alert-success">القسم الدراسي الحالي</th>
                        <th>{{trans('grades.processes')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$promotion->student->name }}</td>
                            <td>{{$promotion->fromGrade->name}}</td>
                            <td>{{$promotion->old_academic_year}}</td>
                            <td>{{$promotion->fromClassroom->class_name}}</td>
                            <td>{{$promotion->fromSection->section_name}}</td>
                                <td>{{$promotion->toGrade->name}}</td>
                            <td>{{$promotion->new_academic_year}}</td>
                            <td>{{$promotion->toClassroom->class_name}}</td>
                            <td>{{$promotion->toSection->section_name}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteOne{{$promotion->id}}">ارجاع الطالب</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">تخرج الطالب</button>
                            </td>
                        </tr>
    {{-------------------------- Canceling promotions ------------------------------------}}
                    @include('students.promotion.deleteAll')
                    @include('students.promotion.deleteOne')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @notifyJs
@endsection
