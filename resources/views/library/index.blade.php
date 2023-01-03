@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
    {{trans('library.name')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('library.name')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <a href="{{route('library-books.create')}}" class="btn btn-secondary mb-4 mx-auto">{{trans('library.book.add')}}</a>
    <div class="col-md-12 mb-30">
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
        <div class="card card-statistics h-100">

            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>#</th>
                        <th>{{trans('library.book.name')}}</th>
                        <th>{{trans('teachers.name')}}</th>
                        <th>{{trans('grades.name')}}</th>
                        <th>{{trans('sections.class')}}</th>
                        <th>{{trans('sections.name')}}</th>
                        <th>{{trans('classrooms.processes')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>1</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->teacher->name}}</td>
                        <td>{{$book->grade->name}}</td>
                        <td>{{$book->class->class_name}}</td>
                        <td>{{$book->section->section_name}}</td>
                        <td class="d-flex">
                            <a href="{{route('book.download',$book->id)}}" class="btn btn-warning"><i class="fa fa-download"></i></a>
                            <a href="{{route('library-books.edit',$book->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            {{-- <a href="{{route('library-books.destroy',$book->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a> --}}
                              <a href="#deleteModal{{$book->id}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            {{-- ----------start delete modal ---------- --}}
                            <div class="modal fade" id="deleteModal{{$book->id}}" tabindex="-1" role="dialog"
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
                                            <form action="{{route('library-books.destroy',$book->id)}}" method="post">
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
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">{{trans('messages.empty')}}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@notifyJs
@endsection
