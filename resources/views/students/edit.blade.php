@extends('layouts.master')
@section('css')
    @notifyCss
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

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
                    <div class="alert alert-success" id="success-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" id="alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ Session::get('error') }}
                    </div>
                @endif


                <form  action="{{route('students.update',$student->id)}}"  method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.student.info')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.student.name')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control" value="{{ $student->getTranslation('name','ar') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('students.student.name.en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" type="text" value="{{ $student->getTranslation('name','en') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('generals.email')}} : </label>
                                    <input type="email"  name="email" class="form-control" value="{{$student->email}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('generals.password')}} :</label>
                                    <input  type="password" name="password" class="form-control" value="{{$student->password}}" >
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('students.born')}}  :</label>
                                    <input class="form-control" type="text" value="{{$student->birth_date}}"  id="datepicker-action" name="birth_date" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('parents.father.blood')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_type_id">
                                        <option selected value="{{ $student->bloodType->id }}">{{ $student->bloodType->name }}</option>
                                        @foreach($bloodTypes as $blood_type)
                                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students.parent')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected value="{{$student->parent->id}}">{{$student->parent->father_name }}</option>
                                       @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('students.gender')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected value="{{$student->gender->id}}">{{$student->gender->name}}</option>
                                       @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>


                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students.student.school.info')}}</h6><br>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('grades.add_grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected value="{{$student->grade->id}}">{{$student->grade->name}}</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="classroom_id">{{trans('students.class')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option selected value="{{$student->class->id}}">{{$student->class->class_name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option selected value="{{$student->section->id}}">{{$student->section->section_name}}</option>
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('students.year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                      <option selected value="{{$student->academic_year}}">{{$student->academic_year}}</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <hr>
                    <div class="col">
                        <div class="form-group">
                            <label for="file" class="font-weight-bold">{{trans('parents.attachments')}} : <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right px-3" type="submit">{{trans('messages.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@notifyJs
<script>
    $(document).ready(function(){
     // Get classrooms names based on selected grade
        $('select[name="grade_id"]').on('change', function(){
            var gradeId = $(this).val();
            if(gradeId) {
                $.ajax({
                    url:"{{URL::to('ajax-classes')}}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success : function(data) {
                        $('select[name="classroom_id"]').empty()
                         $('select[name="section_id"]').empty();
                        $('select[name="classroom_id"]').append(
                            '<option selected disabled >{{trans('messages.choose')}}...</option>');
                        $.each(data,function(key,value) {
                            $('select[name="classroom_id"]').append(
                                '<option value="'+key+'">'+value+'</option>'
                            )
                            //console.log(data)
                        })
                    }
                });
            }
        })
    });
</script>
<script>
   $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('ajax-section') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script>

@endsection
