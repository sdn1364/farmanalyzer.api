@extends('master')
@section('breadcrumb')
    <h3 class="page-title">{{$farm->name}}</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$farm->name}}</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>نام مرغداری: {{$farm->name}}</h3>
                    <div class="row">
                        @foreach($herds as $herd)
                            <div class="col col-md-3">
                                <a href="{{route('analysisPage',[$farm->id,$herd->id])}}" class="btn btn-default">گله شماره {{$herd->herd_number}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
