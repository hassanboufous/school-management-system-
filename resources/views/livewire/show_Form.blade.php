@extends('layouts.master')
@section('css')

@section('title')
    {{trans('parents.patern.add')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('parents.patern.add')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <livewire:add-parent />
                    </div>
                </div>
            </div>
        </div>
<!-- row closed -->
    </div>
  </div>
</div>
@endsection
@section('js')
    @livewireScripts
@endsection
