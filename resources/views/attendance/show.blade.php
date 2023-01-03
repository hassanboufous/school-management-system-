
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <li>{{Session::get('success')}}</li>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        <li>{{Session::get('error')}}</li>
                    </div>
                @endif

                <h3 class="text-danger font-wieght-bold"> {{trans('messages.todayDate')}} : {{date('Y-m-d')}}</h3>
            <div class="table-responsive" >
                <form action="{{route('attendance.store')}}" method="POST">
                    @csrf
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center" >
                        <thead>
                        <tr class="table-info">
                            <th>#</th>
                            <th>{{ trans('students.fullname') }}</th>
                            <th>{{ trans('generals.email') }}</th>
                            <th>{{ trans('students.parent') }}</th>
                            <th>{{ trans('sections.garde') }}</th>
                            <th>{{ trans('students.class') }}</th>
                            <th>{{ trans('students.section') }}</th>
                            <th>{{ trans('grades.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->parent->father_name }}</td>
                                <td>{{$student->grade->name}}</td>
                                <td>{{$student->class->class_name }}</td>
                                <td>{{$student->section->section_name}}</td>
                                <td >
                                    @if (isset($student->attendances()->where('attendence_date',date('Y-m-d'))->first()->student_id))
                                    <label class="text-success" for="present{{$student->id}}">{{trans('attendance.present')}}</label>
                                        <input type="radio" name="attendances[{{$student->id}}]" id="present{{$student->id}}" disabled
                                            {{$student->attendances()->first()->attendence_status == 1 ? 'checked':''}} value="present">

                                        <label class="text-danger" for="absent{{$student->id}}">{{trans('attendance.absent')}}</label>
                                        <input type="radio" name="attendances[{{$student->id}}]" id="absent{{$student->id}}" disabled
                                            {{$student->attendances()->first()->attendence_status == 0 ? 'checked':''}} value="absent">

                                    @else
                                        <label class="text-success" for="present{{$student->id}}">{{trans('attendance.present')}}</label>
                                        <input type="radio" name="attendances[{{$student->id}}]" id="present{{$student->id}}" value="present">

                                        <label class="text-danger" for="absent{{$student->id}}">{{trans('attendance.absent')}}</label>
                                        <input type="radio" name="attendances[{{$student->id}}]" id="absent{{$student->id}}" value="absent">

                                    @endif
                                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                    <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                    <input type="hidden" name="classroom_id" value="{{ $student->class_id }}">
                                    <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <input type="submit" value="{{trans('messages.submit')}}" class="btn btn-info">
                </form>
            </div>
        </div>
     </div>
   </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@notifyJs
@endsection
