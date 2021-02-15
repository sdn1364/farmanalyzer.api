@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست آنالیز</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست آنالیز</li>
            <li class="breadcrumb-item active" aria-current="page">{{$farm->name}}</li>
            <li class="breadcrumb-item active" aria-current="page">گله شماره {{$herd->herd_number}}</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">سن گله</th>
                            <th scope="col">تلفات</th>
                            <th scope="col">باقی‌مانده</th>
                            <th scope="col">درصد تلفات</th>
                            <th scope="col">دمای سالن</th>
                            <th scope="col">رطوبت</th>
                            <th scope="col">روشنایی</th>
                            <th scope="col">خاموشی</th>
                            <th scope="col">کل دان مصرفی <small>کیلو</small></th>
                            <th scope="col"><span>دان مصرفی هر سره</span><small>(گرم)</small></th>
                            <th scope="col">میانگین وزن زنده</th>
                            <th scope="col">ضریب تبدیل</th>
                            <th scope="col">نوع واکسن</th>
                            <th scope="col">روش واکسیناسیون</th>
                            <th scope="col">شرکت تولید‌کننده</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($analysises as $analysis)
                            <tr class="{{$analysis->date == date('Y-m-d')? 'bg-warning':''}} ">
                                <td>{{$analysis->current_age}}</td>
                                <td>{{$analysis->loss}}</td>
                                <td>{{$herd->quantity - $analysis->loss}}</td>
                                <td>{{($herd->quantity - $analysis->loss)*100}}</td>
                                <td>{{$analysis->temprature}}</td>
                                <td>{{$analysis->humidity}}</td>
                                <td>{{$analysis->light_on}}</td>
                                <td>{{$analysis->light_off}}</td>
                                <td>{{$analysis->food}}</td>
                                <td>{{($analysis->food/$herd->quantity - $analysis->loss)*1000}}</td>
                                <td>{{$analysis->weight}}</td>
                                <td>{{$analysis->weight && (($analysis->food/$herd->quantity - $analysis->loss)*1000)/$analysis->weight}}</td>
                                <td>{{$analysis->vaccine['name']}}</td>
                                <td>{{$analysis->vaccine_method['name']}}</td>
                                <td>{{$analysis->vaccine_company['name']}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <a href="{{route('analysisEditPage',$analysis->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
                                            <i class="fas fa-edit"></i>
                                        </a>
{{--                                        <form action="{{route('analysis.destroy',$analysis->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('analysis.edit',$analysis->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                                                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-square">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </button>
                                        </form>--}}
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
