@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
{{trans('main-sidebar.grades_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{trans('main-sidebar.Grades_list')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
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

    <a href="#exampleModal" data-toggle="modal" class="btn btn-success mb-3">{{trans('grades.add_grade')}}</a>
</div>

<div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead class="table-info">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('grades.name') }}</th>
                            <th>{{ trans('grades.notes') }}</th>
                            <th>{{ trans('grades.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($grades as $grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$grade->id}}"
                                        title="{{ trans('grades.edit') }}"><i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{$grade->id}}"
                                        title="{{ trans('grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

<!----------------------------------- edit_modal_grade ------------------------------------------>
                         <div class="modal fade" id="editModal{{$grade->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grades.edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <!----------form ----------->
                                            <form action="{{route('grades.update',$grade->name)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $grade->getTranslation('name','ar')}}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $grade->getTranslation('name','en')}}"
                                                            name="name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('grades.notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $grade->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grades.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('grades.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

        <!------------- delete_modal_grade ---------------------------------------->
                            <div class="modal fade" id="deleteModal{{$grade->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grades.delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('grades.destroy',$grade->name)}}" method="post">
                                              @method('DELETE')
                                                @csrf
                                                {{ trans('grades.warning_grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $grade->id }}">
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
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!------------------------------ add_grade_modal ------------------------------------------------------>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('grades.add_grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{route('grades.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('grades.notes') }} :</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('grades.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('grades.submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>


    {{-- <x:notify-messages /> --}}
    {{-- @include('notify::messages') --}}

<!-- row closed -->
@endsection
@section('js')
@notifyJs
@endsection
