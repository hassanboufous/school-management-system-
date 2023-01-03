@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
{{trans('quizze.questions.list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('quizze.questions.list')}}
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
                <div class="card-body h-100" style="background-color:rgb(235, 196, 248) ;font-size:1.3rem">
                    <h3 style="color: rgb(11, 47, 15);font-family: Cairo" class="text-center">
                        <i class="text-warning"></i> &nbsp;{{trans('quizze.quizze.question')}}
                    </h3><br><br><br>
                        <form method="POST" action="{{route('questions.update')}}" class="text-primary">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="inputState">{{trans('quizze.question.name')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{$question->name}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputState">{{trans('quizze.question.answer')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="answer" value="{{$question->answer}}">
                                </div>
                                <div class="form-group col-12">
                                   <label for="inputState">{{trans('quizze.question.answer.right')}} :
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="right_answer" value="{{$question->right_answer}}">
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{trans('quizze.quizzes')}} :
                                     <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="quizze_id" required >
                                        <option selected value="{{$question->quizze_id}}" >{{$question->quizze->name}}</option>
                                        <option disabled>{{trans('messages.choose')}}...</option>
                                        @foreach($quizzes as $quizze)
                                            <option value="{{$quizze->id}}">{{$quizze->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="Classroom_id">{{trans('quizze.question.score')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="score" required >
                                        <option selected value="{{$question->score}}" >{{$question->score}}</option>
                                        <option disabled>{{trans('messages.choose')}}...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
