@extends('layouts.master')
@section('css')
@livewireStyles
@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    empty
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
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="table-responsive mt-15">
                <table class="table center-aligned-table mb-3 table-success">
                    <thead>
                        <tr class="bg-danger text-white">
                            <th>#</th>
                            <th>{{trans('students.grade')}}</th>
                            <th>{{trans('students.section')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections  as $section)
                            <tr>
                                <td>{{$loop->index}}</td>
                                <td>{{$section->grade->name}}</td>
                                <td>{{$section->section_name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@livewireScripts
@endsection
