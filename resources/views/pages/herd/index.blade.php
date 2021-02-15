@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست گله‌ها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست گله‌ها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($herds->total() > $herds->perPage())
                    <div class="card-header">{{$herds->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">شماره گله</th>
                            <th scope="col">مرغداری</th>
                            <th scope="col">تاریخ شروع</th>
                            <th scope="col">سن گله</th>
                            <th scope="col">تعداد جوجه</th>
                            <th scope="col">مساحت سالن</th>
                            <th scope="col">ظرفیت سالن</th>
                            <th scope="col">تراکم جوجه(مترمربع)</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($herds as $herd)
                            <tr>
                                <td scope="row">{{$loop->iteration + (($herds->currentPage()-1) * $herds->perPage())}}</td>
                                <td>{{$herd->herd_number}}</td>
                                <td>{{$herd->farm->name}}</td>
                                <td>{{$herd->start_date}}</td>
                                <td>{{$herd->age}}</td>
                                <td>{{$herd->quantity}}</td>
                                <td>{{$herd->saloon_area}}</td>
                                <td>{{$herd->capacity}}</td>
                                <td>{{$herd->quantity/$herd->saloon_area}}</td>
                                <td>{{jdate($herd->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($herd->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('herd.destroy',$herd->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('analysisPage',[$herd->farm_id,$herd->id])}}" class="btn btn-sm  btn-outline-secondary btn-square">
                                                <i class="fas fa-th"></i>
                                            </a>
                                            <a href="{{route('herd.edit',$herd->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
