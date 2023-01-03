@extends('layouts.master')
@section('css')
@livewireStyles
@notifyCss
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
        <div class="card card-statistics h-100 mx-auto bg-light" style="width: 80%">
            <div class="card-title">
                <h4 class="text-center text-info mt-3">{{trans('students.student.info')}}</h4>
            </div>
            <div class="card-body"  style="font-family: 'Cairo', sans-serif;font-size:16px;">
                <hr >
                <div class="row text-center" >
                    <div class="col-4">
                        <label for="email">{{trans('generals.email')}} : </label>
                        <span id="email">{{$student->email}}</span>
                    </div>
                    <div class="col-4">
                        <label for="email">{{trans('students.student.name')}} : </label>
                        <span id="email">{{$student->name}}</span>
                    </div>
                    <div class="col-4">
                          <label for="email">{{trans('students.born')}} : </label>
                        <span id="email">{{$student->birth_date}}</span>
                    </div>
                </div>
                <hr >
                <div class="row text-center">
                    <div class="col-4">
                        <label for="email">{{trans('students.year')}} : </label>
                        <span id="email">{{$student->academic_year}}</span>
                    </div>
                    <div class="col-4">
                        <label for="parent">{{trans('students.parent')}} : </label>
                        <span id="parent">{{$student->parent->father_name }}</span>
                    </div>
                    <div class="col-4">
                          <label for="email">{{trans('students.grade')}} : </label>
                        <span id="email">{{$student->grade->name}}</span>
                    </div>
                </div>
                <hr >
                <button id="btn-details" class="btn btn-primary d-flex mx-auto"> {{trans('generals.show.attach')}}</button>
                <hr >
                {{-- ---------------Attachment-------------------------------------------------- --}}
                <div class="collapse" id="details">
                    <div class="row">
                        <table class="table table-responsive table-success border-1">
                            <thead>
                                <tr>
                                    <th>{{trans('students.attach.name')}} </th>
                                    <th>{{trans('students.attach.date')}}</th>
                                    <th>{{trans('grades.processes')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attachmets as $attachmet)
                                    <tr>
                                        <td>{{$attachmet->filename}}</td>
                                        <td>{{$attachmet->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{route('downloadAttachment',$attachmet->id)}}"><i class="fa fa-download"></i></a>
                                            <a href="{{route('showAttachment',$attachmet->id)}}"><i class="fa fa-eye"></i></a>
                                            <form action="{{route('deleteAttachment',$attachmet->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fa fa-trush">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('StdAttachment')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <span class="text-danger">{{trans('parents.attachments')}} </span> :
                                <input type="hidden" name="id" value="{{$student->id}}"><br>
                                <input type="hidden" name="name" value="{{$student->getTranslation('name','en')}}"><br>
                                <input type="file" name="photos[]" accept="image/*" multiple><br>
                                <button type="submit" class="btn btn-success mt-3">{{trans('messages.submit')}}</button>
                            </form>
                        </div>
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
@notifyJs
<script>
    $('#btn-details').on('click',function(){
         $('#details').toggle('collapse')
    });
</script>
@endsection
