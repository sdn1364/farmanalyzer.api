@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست کارگران</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کارگران</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($workers->total() > $workers->perPage())
                    <div class="card-header">{{$workers->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">روز تولد</th>
                            <th scope="col">تحصیلات</th>
                            <th scope="col">جنسیت</th>
                            <th scope="col">تجربه کاری</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $worker)
                            <tr>
                                <th scope="row">{{$loop->iteration + (($workers->currentPage()-1) * $workers->perPage())}}</th>
                                <th scope="col">{{$worker->name}}</th>
                                <th scope="col">{{$worker->surname}}</th>
{{--                                <td>{{jdate($worker->birthday)->format('y/m/d')}}</td>--}}
                                <td>{{$worker->birthday}}</td>
                                <th scope="col">{{$worker->education}}</th>
                                <th scope="col">{{$worker->gender}}</th>
                                <th scope="col">{{$worker->work_experience}}</th>
                                <th scope="col">{{$worker->phone_number}}</th>
                                <td>{{jdate($worker->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($worker->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('worker.destroy',$worker->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('worker.edit',$worker->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
    </div>
@endsection
