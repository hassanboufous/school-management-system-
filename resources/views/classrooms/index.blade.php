
@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
    {{ trans('classrooms.classroom.page.title') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('classrooms.classroom.page.title') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

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

    <button type="button" class="button x-small" data-toggle="modal"
                         data-target="#addClassModal">
        {{ trans('classrooms.add.class') }}
    </button>

        <button type="button" class="button x-small " id="btn_delete_all">
            {{ trans('classrooms.delete_checkbox') }}
        </button>
            <br><br>
{{-----------_____________ filter by class name__________ -------------------}}
                <form action="{{route('filterClasses')}}" method="POST" class="form">
                    @csrf
                    <select class="btn-warning" data-style="btn-info" name="grade_id" required
                            onchange="this.form.submit()" class="form-control">
                        <option value="" selected disabled >
                            {{ trans('classrooms.search_by_grade') }}
                        </option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>
                   <br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th>#</th>
                            <th>{{ trans('classrooms.class_name_ar') }}</th>
                            <th>{{ trans('classrooms.grade_name') }}</th>
                            <th>{{ trans('classrooms.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">


                        <?php $i = 0; ?>

                        @foreach ($classLists as $class)
                            <tr>
                                <?php $i++; ?>
                                <td><input type="checkbox"  value="{{$class->id}}" class="box1" ></td>
                                <td>{{ $i }}</td>
                                <td>{{ $class->class_name }}</td>
                                <td>{{ $class->grade->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $class->id }}"
                                        title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $class->id }}"
                                        title="{{ trans('grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_grade -->
                            <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classrooms.edit') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{route('classrooms.update',$class->id)}}" method="post">
                                               @method('patch')
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                               class="mr-sm-2">{{ trans('classrooms.class_name_ar') }}:</label>
                                                        <input id="name" type="text" name="name"
                                                               class="form-control"
                                                               value="{{ $class->getTranslation('class_name', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                               class="mr-sm-2">{{ trans('classrooms.name_class_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $class->getTranslation('class_name', 'en') }}"
                                                               name="name_en" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('classrooms.grade_name') }}
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="grade_id">
                                                        <option value="{{ $class->grade->id}}">
                                                            {{ $class->grade->name }}
                                                        </option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">
                                                                {{ $grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('classrooms.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_grade -->
                            <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('classes_trans.delete_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('classrooms.destroy',$class->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{ trans('classes_trans.Warning_grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $class->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
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
                </table>
            </div>
        </div>
    </div>
</div>


<!------------------------ add_modal_class ----Repeater-------------------------------------------------------->

    <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms.add.class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                 <form class="row mb-30" action="{{route('classrooms.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="classLists">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('classrooms.class_name_ar') }}:</label>
                                            <input class="form-control" type="text" name="name" id="name"  />
                                        </div>

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('classrooms.name_class_en') }}:</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>


                                       <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{ trans('classrooms.grade_name') }}:</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label  class="mr-sm-2">{{ trans('classrooms.processes') }}</label>
                                            <input  class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('classrooms.delete_row') }}" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classrooms.add_row') }}"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('classrooms.submit') }}</button>
                            </div>
                        </div>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- --------Delete all checked items (modal)---------------------------------------------------->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classrooms.delete') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('deleteCheckedItems')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        {{ trans('classrooms.warning_class') }}
                        <input class="text" type="text" id="delete_all_id" name="delete_all_id" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('classrooms.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('classrooms.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- row closed -->
    </div>
  </div>
</div>

@endsection
@section('js')

<script>
  function CheckAll(className, element) {
    var checkedItems = document.getElementsByClassName(className)
    var length = checkedItems.length
    if(element.checked){
        for(let i = 0; i < length ; i++){
           checkedItems[i].checked = true
        }
    }
    else{
        for(let i = 0; i < length ; i++){
           checkedItems[i].checked = false
        }
    }

  }

    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = [];
            $("#dataTable input[type=checkbox]").each(function() {
                if(this.checked)
                     selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>
@notifyJs

@endsection
