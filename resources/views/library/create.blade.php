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
                <div class="alert alert-success w-100">
                    <li>{{Session::get('success')}}</li>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger w-100">
                    <li>{{Session::get('error')}}</li>
                </div>
            @endif
        {{-- --------------------------------------------------------------------------------------- --}}
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body h-100" style="background-color:rgb(246, 244, 153);font-size:1.3rem ">
                    <h3 style="color: rgb(145, 21, 23);font-family: Cairo;" class="text-center">
                        <i class="fa fa-book text-warning"></i> &nbsp;{{trans('library.book.add')}}
                    </h3><br><br><br>
                        <form method="POST" action="{{route('library-books.store')}}" class="text-success" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('library.book.name.en')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_en">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputState">{{trans('library.book.name.ar')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_ar">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('students.grade')}} :
                                     <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id" required>
                                        <option selected disabled>{{trans('messages.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Classroom_id">{{trans('students.class')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id" required>

                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Classroom_id">{{trans('students.section')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="section_id" required >

                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                   <div class="form-group col-12">
                                    <label for="inputState">{{trans('library.book.file')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file_name" >
                                </div>
                            </div>

                            <br><br>
                            <div class="text-center">
                                <input type="submit" value="{{trans('messages.submit')}}" class="btn btn-info m-auto" style="width: 100px;font-size:16px;">
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
