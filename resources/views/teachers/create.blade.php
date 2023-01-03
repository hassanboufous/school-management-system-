@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teachers.teacher.add')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('teachers.teacher.add')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

        <div class="col-xs-12">
            <div class="col-md-12 bg-white">
                <br>
               <form action="{{route('teachers.store')}}" method="POST">
                @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{trans('generals.email')}}</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{trans('generals.password')}}</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <br>
                        <br>

                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="title">{{trans('teachers.teacher.name')}}</label>
                            <input type="text" name="teacher_name" class="form-control">
                            @error('teacher_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{trans('teachers.teacher.name.en')}}</label>
                            <input type="text" name="teacher_name_en" class="form-control">
                            @error('teacher_name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col">
                            <label for="title">{{trans('teachers.teacher.date')}}</label>
                            <input type="text" name="teacher_date" class="form-control" id="datepicker-action"  data-date-format="yyyy-mm-dd"  >
                            @error('teacher_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="title">{{trans('parents.mother.phone')}}</label>
                            <input type="text" name="teacher_phone" class="form-control ">
                            @error('teacher_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <br> <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">{{trans('teachers.teacher.specialize')}}</label>
                            <select class="custom-select my-1 mr-sm-2" name="teacher_specialization">
                                <option selected>{{trans('messages.choose')}}...</option>
                                @foreach ($specializations as $specialization)
                                <option value="{{$specialization->id}}" >{{$specialization->name}}</option>
                                @endforeach
                            </select>
                            @error('teacher_specialization')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputState">{{trans('parents.mother.blood')}}</label>
                            <select class="custom-select my-1 mr-sm-2" name="teacher_gender">
                                <option selected>{{trans('messages.choose')}}...</option>
                                @foreach ($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                                @endforeach
                            </select>
                            @error('teacher_gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{trans('generals.address')}}</label>
                        <textarea class="form-control" name="teacher_address" id="exampleFormControlTextarea1"
                                rows="4"></textarea>
                        @error('teacher_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-info px-4">{{trans('messages.submit')}}</button>
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
    @livewireScripts
@endsection
