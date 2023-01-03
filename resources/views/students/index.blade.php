
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
            <div class="container">
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

                <a href="{{route('teachers.create')}}" class="btn btn-success mb-3 px-3">{{trans('students.student.add')}}</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                    <tr class="table-info">
                        <th>#</th>
                        <th>{{ trans('students.fullname') }}</th>
                        <th>{{ trans('generals.email') }}</th>
                        <th>{{ trans('students.parent') }}</th>
                        <th>{{ trans('sections.garde') }}</th>
                        <th>{{ trans('students.class') }}</th>
                        <th>{{ trans('students.section') }}</th>
                        <th>{{ trans('students.year') }}</th>
                        <th>{{ trans('accounts.school.invoices') }}</th>
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
                            <td>{{$student->academic_year}}</td>
                            <td style="font-size: 28px;cursor: pointer;">
                                <a href="{{route('studente-fees',$student->id)}}">
                                    <i class="fa fa-money text-warning" title="{{ trans('accounts.school.invoices') }}" ></i>
                                </a>
                            </td>
                            <td class="d-flex justify-content-around">
                                <a href="{{route('students.edit',$student->id)}}"
                                        class="btn btn-primary btn-sm mt-2"><i class="fa fa-edit"></i></a>
                                <a href="{{route('students.show',$student->id)}}"
                                        class="btn btn-warning btn-sm mt-2"><i class="fa fa-eye"></i></a>
                                <form action="{{route('students.destroy',$student->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm mt-2" >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
