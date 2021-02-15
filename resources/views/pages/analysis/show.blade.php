@extends('master')
@section('breadcrumb')
    <h3 class="page-title">گله {{$herd->herd_number}}</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$farm->name}}</li>
            <li class="breadcrumb-item active" aria-current="page">گله {{$herd->herd_number}}</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table" id="dataTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">سن گله</th>
                        <th scope="col">تلفات</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">تاریخ ویرایش</th>
                        <th class="text-right" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($analysises as $analysis)
                        <tr>
                            <td scope="row">{{$loop->iteration + (($analysises->currentPage()-1) * $analysises->perPage())}}</td>
                            <td>{{$analysis->current_age}}</td>
                            <td>{{jdate($analysis->created_at)->format('y/m/d')}}</td>
                            <td>{{jdate($analysis->updated_at)->format('y/m/d')}}</td>
                            <td class="text-right">
                                <div class="col-md-12">
                                    <form action="{{route('farm.destroy',$analysis->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('farm.edit',$analysis->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-square">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
