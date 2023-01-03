@extends('layouts.master')
@section('css')
    @notifyCss
@section('title')
    {{trans('students.promotion')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.promotion')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

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

                    <h6 style="color: red;font-family: Cairo">{{trans('students.promotion.old')}}</h6><br>

                    <form method="post" action="{{route('promotions.store')}}">
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('messages.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{trans('students.promotion.new')}}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.grade')}}</label>
                                <select class="custom-select mr-sm-2" name="new_grade_id" >
                                    <option selected disabled>{{trans('messages.choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('students.class')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="new_classroom_id" >

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{trans('students.section')}} </label>
                                <select class="custom-select mr-sm-2" name="new_section_id" >

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="new_academic_year">
                                        <option selected disabled>{{trans('messages.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
</div>
</div>
@endsection
@section('js')
@notifyJs

<script>
    $(document).ready(function(){
     // Get classrooms names based on selected grade
        $('select[name="new_grade_id"]').on('change', function(){
            var gradeId = $(this).val();
            if(gradeId) {
                $.ajax({
                    url:"{{URL::to('ajax-classes')}}/" + gradeId,
                    type: "GET",
                    dataType: "json",
                    success : function(data) {
                        $('select[name="new_classroom_id"]').empty()
                         $('select[name="new_section_id"]').empty();
                        $('select[name="new_classroom_id"]').append(
                            '<option selected disabled >{{trans('messages.choose')}}...</option>');
                        $.each(data,function(key,value) {
                            $('select[name="new_classroom_id"]').append(
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
            $('select[name="new_classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('ajax-section') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="new_section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="new_section_id"]').append('<option value="' + key + '">' + value + '</option>');
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
