@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
{{trans('quizze.quizzes')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('quizze.quizzes')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    <div class="row" >
           {{-- --------------------------------------------------------------------------------------- --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
        {{-- --------------------------------------------------------------------------------------- --}}
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body h-100" style="background-color:rgb(248, 196, 196) ;font-size:1.3rem">

                        <form method="POST" action="{{route('quizzes.update',$quizze->id)}}" class="text-primary">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('quizze.quizze.name.ar')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_ar" value="{{$quizze->getTranslation('name','ar')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('quizze.quizze.name.en')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_en" value="{{$quizze->getTranslation('name','en')}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('teachers.name')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="teacher_id" required>
                                        <option selected value="{{$quizze->teacher_id}}">{{$quizze->teacher->name}}</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('subjects.subjects.name')}} :
                                     <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="subject_id" required>
                                        <option selected value="{{$quizze->subject_id}}">{{$quizze->subject->name}}</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('students.grade')}} :
                                     <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id" required>
                                        <option selected value="{{$quizze->grade_id}}">{{$quizze->grade->name}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Classroom_id">{{trans('students.class')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id" required >
                                        <option selected value="{{$quizze->classroom_id}}">{{$quizze->class->class_name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Classroom_id">{{trans('students.section')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="section_id" required >
                                        <option selected value="{{$quizze->section_id}}">{{$quizze->section->section_name}}</option>
                                    </select>
                                </div>

                            </div>

                            <br><br>
                            <div class="text-center">
                                <input type="submit" value="{{trans('messages.submit')}}" class="btn btn-danger m-auto" style="width: 100px;font-size:16px;">
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
