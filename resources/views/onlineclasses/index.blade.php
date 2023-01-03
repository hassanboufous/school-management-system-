@extends('layouts.master')
@section('css')
@livewireStyles
@notifyCss
@section('title')
   {{trans('subjects.subjects')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
 <span style="color: #1a0a67;fornt-size:18px;font-weight:bold;">{{trans('subjects.subjects')}}</span>
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

                <a style="display:block; width:20%;margin:auto;font-size:1.1rem" href="{{route('online-courses.create')}}" class="btn btn-light text-primary">{{trans('zoom.session.add')}}</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                    <tr class="table-success text-primary">
                        <th>#</th>
                        <th>{{ trans('sections.garde') }}</th>
                        <th>{{ trans('students.class') }}</th>
                        <th>{{ trans('students.section') }}</th>
                        <th>{{ trans('subjects.subjects.teacher') }}</th>
                        <th>{{ trans('zoom.session.title') }}</th>
                        <th>{{ trans('zoom.session.start') }}</th>
                        <th>{{ trans('zoom.session.time') }}</th>
                        <th>{{ trans('zoom.session.link') }}</th>
                        <th>{{ trans('grades.processes') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($online_classes as $$online_classe)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$$online_classes->name}}</td>
                                <td>{{$$online_classes->name}}</td>
                                <td>{{$$online_classes->name}}</td>
                                <td>{{$$online_classes->grade->name}}</td>
                                <td>{{$$online_classes->class->class_name}}</td>
                                <td>{{$$online_classes->teacher->name}}</td>
                                <td>
                                    <a href="{{route('subjects.edit',$$online_classes->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="#deleteModal{{$$online_classes->id}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            {{-- ----------start delete modal ---------- --}}
                            <div class="modal fade" id="deleteModal{{$$online_classes->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grades.delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('subjects.destroy')}}" method="post">
                                              @method('DELETE')
                                                @csrf
                                                {{ trans('grades.warning_grade') }}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grades.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('grades.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               {{-- ----------end delete modal ---------- --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>
  </div>
</div>


<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@notifyJs
@endsection
