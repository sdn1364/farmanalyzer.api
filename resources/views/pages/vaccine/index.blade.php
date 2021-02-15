@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست واکسن ها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست واکسن ها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($vaccines->total() > $vaccines->perPage())
                    <div class="card-header">{{$vaccines->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">دسته‌بندی واکسن</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vaccines as $vaccine)
                            <tr>
                                <td scope="row">{{$loop->iteration + (($vaccines->currentPage()-1) * $vaccines->perPage())}}</td>
                                <td scope="col">{{$vaccine->name}}</td>
                                <td scope="col">{{$vaccine->vaccine_category->name}}</td>
                                <td>{{jdate($vaccine->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($vaccine->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('vaccine.destroy',$vaccine->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('vaccine.edit',$vaccine->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
                @if($vaccines->total() > $vaccines->perPage())
                    <div class="card-footer">{{$vaccines->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
