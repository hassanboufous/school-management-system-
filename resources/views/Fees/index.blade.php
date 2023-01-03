
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


                {{-- <a href="{{route('teachers.create')}}" class="btn btn-success mb-3 px-3">{{trans('students.student.add')}}</a> --}}
                <h3 class="text-success text-center font-weight-bold">{{trans('accounts.school.fees') }}</h3>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>{{trans('accounts.fees.title')}}</th>
                        <th>{{trans('accounts.amount')}}</th>
                        <th>{{trans('grades.name')}}</th>
                        <th>{{trans('sections.class')}}</th>
                        <th>{{trans('students.year')}}</th>
                        <th>{{trans('grades.notes')}}</th>
                        <th>{{trans('grades.processes')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)

                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$fee->title}}</td>
                            <td>{{$fee->amount}} DH</td>
                            <td>{{$fee->grade->name}}</td>
                            <td>{{$fee->class->class_name}}</td>
                            <td>{{$fee->year}}</td>
                            <td>{{$fee->description}}</td>

                            <td class="d-flex justify-content-around">
                                <a href="{{route('fees.edit',$fee->id)}}" class="btn btn-sm btn-primary">{{trans('grades.edit')}}</a>

                                <form action="{{route('fees.destroy',$fee->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">{{trans('grades.delete')}}
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
