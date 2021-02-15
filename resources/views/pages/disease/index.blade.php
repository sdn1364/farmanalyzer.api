@extends('master')
        @section('breadcrumb')
            <h3 class="page-title">لیست بیماری ها</h3>
            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست بیماری ها</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->
        @endsection
        
            @section("content")
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if($diseases->total() > $diseases->perPage())
                                <div class="card-header">{{$diseases->links()}}</div>
                            @endif
                            <div class="content">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <tr>
                                    <th scope="col">#</th><th scope="col">نام</th><th scope="col">تاریخ ایجاد</th><th scope="col">تاریخ ویرایش</th><th class="text-right" scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($diseases as $disease)
                                         <tr>
                                            <th scope="row">{{$loop->iteration + (($diseases->currentPage()-1) * $diseases->perPage())}}</th><th scope="col">{{$disease->name}}</th><td>{{jdate($disease->created_at)->format('y/m/d')}}</td><td>{{jdate($disease->updated_at)->format('y/m/d')}}</td><td class="text-right">
                            <div class="col-md-12">
                                <form action="{{route('disease.destroy',$disease->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="{{route('disease.edit',$disease->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
        