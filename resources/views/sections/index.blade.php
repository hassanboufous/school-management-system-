@extends('layouts.master')
@section('css')
 @notifyCss
@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}
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
                                    <a href="#" class="acd-heading "> {{$grade->name}}</a>
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
                                                                    <th>{{ trans('sections.process') }}</th>
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
                                                                            <td class="badge badge-success">  {{ trans('messages.active')}} </td>
                                                                             @else
                                                                            <td class="badge badge-danger"> {{ trans('messages.desactive')}}</td>
                                                                            @endif
                                                                        <td>
                                                                            <a href="#"
                                                                               class="btn btn-info btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#edit{{$sections_list->id}}">{{ trans('classrooms.edit') }}</a>
                                                                            <a href="#"
                                                                               class="btn btn-danger btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#delete{{$sections_list->id}}">{{ trans('classrooms.delete') }}</a>
                                                                        </td>
                                                                    </tr>

                                                            <!-----------------------Edit section ------------------------------------------>
                                                                 <div class="modal fade" id="edit{{$sections_list->id}}" tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections.section.edit') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form action="{{route('sections.update',$sections_list->section_name)}}"  method="POST">
                                                                                      @method('patch')
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="name"
                                                                                                       class="form-control"
                                                                                                       value="{{$sections_list->getTranslation('section_name','ar')}}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="name_en"
                                                                                                       class="form-control"
                                                                                                       value="{{$sections_list->getTranslation('section_name','en')}}">
                                                                                                <input id="id"
                                                                                                       type="hidden"
                                                                                                       name="id"
                                                                                                       class="form-control"
                                                                                                       value="{{$sections_list->id}}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('sections.garde') }}</label>
                                                                                            <select name="grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{$sections_list->grade->id}}" selected>
                                                                                                 {{$sections_list->grade->name}}
                                                                                                </option>
                                                                                                 @foreach ($grades_lists as $grade_list)
                                                                                                    <option
                                                                                                        value="{{ $grade_list->id }}">
                                                                                                        {{ $grade_list->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('sections.class') }}</label>
                                                                                            <select name="class_id" class="custom-select">
                                                                                                <option value="{{$sections_list->class->id}}" selected>
                                                                                                 {{$sections_list->class->class_name}}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">
                                                                                                @if ($sections_list->status == 1)
                                                                                                    <input  type="checkbox"  checked
                                                                                                            class="form-check-input"
                                                                                                            name="status"
                                                                                                            id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('sections.status') }}</label><br>

                                                                                                  <div class="col">
                                                                                                        <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                          @foreach($sections_list->teachers as $teacher)
                                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['name']}}</option>
                                                                                                            @endforeach

                                                                                                       @foreach($teachers as $teacher)
                                                                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                                                            @endforeach
                                                                                                      </select>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('classrooms.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                    <!------------------------------------------- delete_modal_Grade ----------------------------------------->
                                                                    <div class="modal fade" id="delete{{$sections_list->id}}" tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections.delete.section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('sections.destroy',$sections_list->id)}}"  method="post">
                                                                                        @method('DELETE')
                                                                                        @csrf
                                                                                        {{ trans('messages.delete.warning') }}
                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{$sections_list->id}}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                                                                            <button type="submit"
                                                                                              class="btn btn-danger">{{ trans('classrooms.delete') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

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

<!---------------------------------Add new section --------------------------------------->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('sections.add.section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('sections.store')}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="{{ trans('sections.section.ar.name') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="name_en" class="form-control"
                                                       placeholder="{{ trans('sections.section.en.name') }}">
                                            </div>

                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('sections.garde') }}</label>
                                            <select name="grade_id" class="custom-select"  >
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled>{{ trans('sections.select.grade') }}
                                                </option>
                                                @foreach ($grades_lists as $garde_list)
                                                    <option value="{{ $garde_list->id }}"> {{ $garde_list->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('sections.class') }}</label>
                                            <select name="class_id" class="custom-select">
                                                <option value="" selected
                                                        disabled>{{ trans('classrooms.add.class') }}
                                                </option>

                                            </select>
                                        </div><br>

                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('teachers.name') }}</label>
                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                               @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('classrooms.submit') }}</button>
                                </div>
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
