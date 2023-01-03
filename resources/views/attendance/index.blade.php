@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('attendance.attend') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('sections.add.section') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($grades as $grade)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading bg-info"> {{$grade->name}}</a>
                                    <div class="acd-des">
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('sections.name') }}</th>
                                                                    <th>{{ trans('sections.class') }}</th>
                                                                    <th>{{ trans('sections.status') }}</th>
                                                                    <th>{{ trans('grades.processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($grade->sections as $sections_list)
                                                                    <tr style="font-family: 'Cairo', sans-serif;">
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $sections_list->section_name }}</td>
                                                                        <td>{{ $sections_list->class->class_name }}</td>

                                                                            @if ($sections_list->status == 1)
                                                                            <td class="badge badge-success mt-2">  {{ trans('messages.active')}} </td>
                                                                             @else
                                                                            <td class="badge badge-danger mt-2"> {{ trans('messages.desactive')}}</td>
                                                                            @endif
                                                                        <td>

                                                                            <a href="{{route('attendance.show',$sections_list->id)}}" class="btn bg-light text-info" >{{ trans('students.names.list') }}</a>
                                                                        </td>
                                                                    </tr>
                                                                 @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach
                                </div>
                        </div>
                    </div>

            </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
            <script>
                $(document).ready(function () {
                    $('select[name="grade_id"]').on('change', function () {
                        var grade_id = $(this).val();
                        if (grade_id) {
                            $.ajax({ //fetching grades based on selected section
                                url: "{{ URL::to('sections') }}/" + grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                    $('select[name="class_id"]').append('<option value="' + value.id + '">' + value.class_name.ar + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });

            </script>

@endsection
