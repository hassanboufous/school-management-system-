@extends('layouts.master')
@section('css')
@livewireStyles
@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    empty
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

    <div  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

                 <form class="row mb-30" action="" method="POST"  style="font-family: 'Cairo', sans-serif;">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="classLists">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{trans('students.student.name')}}:</label>
                                            <input class="custom-input " type="text" name="name" id="name" value="{{$student->name}}" />
                                        </div>

                                        <div class="col">
                                            <label for="fee"
                                                class="mr-sm-2">{{trans('accounts.fees.title')}} :</label>
                                            <select class="custom-select mr-sm-2" name="fees-type" >
                                                <option selected  disabled>{{trans('messages.choose')}}...</option>
                                                @foreach ($fees as $fee)
                                                <option value="{{$fee->id}}">{{$fee->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{trans('accounts.amount')}} :</label>
                                            <select class="form-control"  name="" >
                                                <option value=""></option>
                                            </select>
                                        </div>


                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">test:</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                        <option value=""></option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{trans('grades.processes')}}:</label>
                                            <input id="name_en" class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{trans('grades.delete')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value=""/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">close</button>
                                <button type="submit"
                                    class="btn btn-success">{{trans('grades.submit')}}</button>
                            </div>
                        </div>
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
@livewireScripts
@endsection
