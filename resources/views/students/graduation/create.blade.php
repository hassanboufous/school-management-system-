@extends('layouts.master')
@section('css')
@notifyCss
@section('title')

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body h-100">
                    <h3 style="color: rgb(208, 10, 26);font-family: Cairo" class="text-center">
                        <i class="fa fa-university text-warning"></i> &nbsp;{{trans('students.graduated')}}
                    </h3><br><br><br>
                        <form method="post" action="{{route('graduations.store')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">{{trans('students.grade')}}</label>
                                    <select class="custom-select mr-sm-2" name="grade_id" required>
                                        <option selected disabled>{{trans('messages.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="Classroom_id">{{trans('students.class')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id" required>

                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="section_id">{{trans('students.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id" required>

                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="text-center">
                                <input type="submit" value="{{trans('messages.submit')}}" class="btn btn-primary m-auto" style="width: 100px;font-size:16px;">
                            </div>
                        </form>
                        </div>
                    </div>
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
