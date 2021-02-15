@extends('master')
        @section('breadcrumb')
            <h3 class="page-title">لیست داشبورد</h3>
            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست داشبورد</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->
        @endsection
        
            @section("content")
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if($dashboards->total() > $dashboards->perPage())
                                <div class="card-header">{{$dashboards->links()}}</div>
                            @endif
                            <div class="content">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <tr>
                                    <th class="text-right" scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($dashboards as $dashboard)
                                         <tr>
                                            <td class="text-right">
                            <div class="col-md-12">
                                <form action="{{route('dashboard.destroy',$dashboard->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="{{route('dashboard.edit',$dashboard->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
        