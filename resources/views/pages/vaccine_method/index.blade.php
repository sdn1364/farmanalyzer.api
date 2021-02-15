@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست متد‌های واکسیناسیون</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست متد‌های واکسیناسیون</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($vaccine_methods->total() > $vaccine_methods->perPage())
                    <div class="card-header">{{$vaccine_methods->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ ویرایش</th>
                                <th class="text-right" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vaccine_methods as $vaccine_method)
                            <tr>
                                <td>{{$loop->iteration + (($vaccine_methods->currentPage()-1) * $vaccine_methods->perPage())}}</td>
                                <td>{{$vaccine_method->name}}</td>
                                <td>{{jdate($vaccine_method->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($vaccine_method->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('vaccine_method.destroy',$vaccine_method->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('vaccine_method.edit',$vaccine_method->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
                @if($vaccine_methods->total() > $vaccine_methods->perPage())
                    <div class="card-footer">{{$vaccine_methods->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
