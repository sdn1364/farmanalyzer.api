@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست کشاورزان</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کشاورزان</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($farmers->total() > $farmers->perPage())
                    <div class="card-header">{{$farmers->links()}}</div>
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
                            <th scope="col">شهر</th>
                            <th scope="col">استان</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($farmers as $farmer)
                            <tr>
                                <th scope="row">{{$loop->iteration + (($farmers->currentPage()-1) * $farmers->perPage())}}</th>
                                <th scope="col">{{$farmer->name}}</th>
                                <th scope="col">{{$farmer->surname}}</th>
{{--                                <td>{{jdate($farmer->birthday)->format('y/m/d')}}</td>--}}
                                <td>{{$farmer->birthday}}</td>
                                <th scope="col">{{$farmer->education}}</th>
                                <th scope="col">{{$farmer->gender}}</th>
                                <th scope="col">{{$farmer->work_experience}}</th>
                                <th scope="col">{{$farmer->city->name}}</th>
                                <th scope="col">{{$farmer->province->name}}</th>
                                <td>{{jdate($farmer->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($farmer->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('farmer.destroy',$farmer->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('farmer.edit',$farmer->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
