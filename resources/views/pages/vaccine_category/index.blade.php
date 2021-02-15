@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست دسته های واکسن</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست دسته های واکسن</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($vaccine_categories->total() > $vaccine_categories->perPage())
                    <div class="card-header">{{$vaccine_categories->links()}}</div>
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
                        @foreach($vaccine_categories as $vaccine_category)
                            <tr>
                                <td>{{$loop->iteration + (($vaccine_categories->currentPage()-1) * $vaccine_categories->perPage())}}</td>
                                <td>{{$vaccine_category->name}}</td>
                                <td>{{jdate($vaccine_category->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($vaccine_category->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('vaccine_category.destroy',$vaccine_category->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('vaccine_category.edit',$vaccine_category->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
