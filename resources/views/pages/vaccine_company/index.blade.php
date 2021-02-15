@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست شرکت های واکسن</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست شرکت های واکسن</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($vaccine_companies->total() > $vaccine_companies->perPage())
                    <div class="card-header">{{$vaccine_companies->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vaccine_companies as $vaccine_company)
                            <tr>
                                <td>{{$loop->iteration + (($vaccine_companies->currentPage()-1) * $vaccine_companies->perPage())}}</td>
                                <td>{{$vaccine_company->name}}</td>
                                <td>{{jdate($vaccine_company->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($vaccine_company->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('vaccine_company.destroy',$vaccine_company->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('vaccine_company.edit',$vaccine_company->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
                @if($vaccine_companies->total() > $vaccine_companies->perPage())
                    <div class="card-footer">{{$vaccine_companies->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
