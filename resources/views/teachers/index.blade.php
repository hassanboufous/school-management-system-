
@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
{{trans('teachers.name')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{trans('teachers.name')}}
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

                <a href="{{route('teachers.create')}}" class="btn btn-success">{{trans('teachers.teacher.add')}}</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                    <tr class="table-warning">
                        <th>#</th>
                        <th>{{ trans('teachers.teacher.name') }}</th>
                        <th>{{ trans('teachers.teacher.sex') }}</th>
                        <th>{{ trans('parents.father.phone') }}</th>
                        <th>{{ trans('teachers.teacher.specialize') }}</th>
                        <th>{{ trans('teachers.teacher.date') }}</th>
                        <th>{{ trans('grades.processes') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->genders->name}}</td>
                            <td>{{$teacher->phone}}</td>
                            <td>{{$teacher->specializations->name}}</td>
                            <td>{{$teacher->join_date}}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{route('teachers.edit',$teacher->id)}}" title="{{ trans('grades.edit')}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{route('teachers.destroy',$teacher->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" >
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
