@extends('layouts.master')
@section('css')
@notifyCss
@section('title')
{{trans('accounts.accounts')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('accounts.accounts')}}
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
                <div class="card-body h-100" style="background-color:rgb(211, 239, 244) ">
                    <h3 style="color: rgb(145, 21, 81);font-family: Cairo" class="text-center">
                        <i class="fa fa-money text-warning"></i> &nbsp;{{trans('accounts.fees.add')}}
                    </h3><br><br><br>
                        <form method="POST" action="{{route('fees.update',$fee->id)}}" class="text-primary">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('accounts.title.ar')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{$fee->getTranslation('title','ar')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('accounts.title.en')}} :
                                     <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_en"  value="{{$fee->getTranslation('title','en')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('accounts.amount')}} :
                                         <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="amount" value="{{$fee->amount}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="inputState">{{trans('students.grade')}} :
                                     <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id" required>
                                        <option selected value="{{$fee->grade->id}}">{{$fee->grade->name}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Classroom_id">{{trans('students.class')}} :
                                        <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id" required>
                                    <option selected value="{{$fee->class->id }}">{{$fee->class->class_name}}</option>

                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <label for="section_id">{{trans('students.year')}} :
                                        <span class="text-danger">*</span> </label>
                                    <?php $thisyear = date('Y'); ?>
                                    <select class="custom-select mr-sm-2" name="academic_year" required>
                                    <option selected value="{{$fee->year }}">{{$fee->year}}</option>
                                      <option value="{{$thisyear}}">{{$thisyear}}</option>
                                      <option value="{{$thisyear+1}}">{{$thisyear+1}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="description">{{trans('grades.notes')}} : </label><br>
                                    <textarea name="description" id="description" class="form-control" >{{$fee->description}}</textarea>
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
