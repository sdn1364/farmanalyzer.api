@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست کارشناسان</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کارشناسان</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($experts->total() > $experts->perPage())
                    <div class="card-header">{{$experts->links()}}</div>
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
                        @foreach($experts as $expert)
                            <tr>
                                <th scope="row">{{$loop->iteration + (($experts->currentPage()-1) * $experts->perPage())}}</th>
                                <th scope="col">{{$expert->name}}</th>
                                <th scope="col">{{$expert->surname}}</th>
{{--                                <td>{{jdate($expert->birthday)->format('y/m/d')}}</td>--}}
                                <td>{{$expert->birthday}}</td>
                                <th scope="col">{{$expert->education}}</th>
                                <th scope="col">{{$expert->gender == 'male'?'مرد':'زن'}}</th>
                                <th scope="col">{{$expert->work_experience}}</th>
                                <th scope="col">{{$expert->phone_number}}</th>
                                <td>{{jdate($expert->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($expert->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('expert.destroy',$expert->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('expert.edit',$expert->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
