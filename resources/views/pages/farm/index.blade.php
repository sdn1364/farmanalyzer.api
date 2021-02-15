@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست مزارع</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست مزارع</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($farms->total() > $farms->perPage())
                    <div class="card-header">{{$farms->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">مزرعه دار</th>
                            <th scope="col">روز تولد</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">پست الکترونیک</th>
                            <th scope="col">نوع</th>
                            <th scope="col">استان</th>
                            <th scope="col">شهر</th>
                            <th scope="col">نشانی</th>
                            <th scope="col">کارگر</th>
                            <th scope="col">کارشناسان</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($farms as $farm)
                            <tr>
                                <th scope="row">{{$loop->iteration + (($farms->currentPage()-1) * $farms->perPage())}}</th>
                                <th scope="col"><a href="{{route('farm.show',$farm->id)}}">{{$farm->name}}</a></th>
                                <th scope="col">{{$farm->name . ' ' . $farm->surname}}</th>
                                {{--                                <td>{{jdate($farm->birthday)->format('y/m/d')}}</td>--}}
                                <td>{{$farm->birthday}}</td>
                                <th scope="col">{{$farm->phone_number}}</th>
                                <th scope="col">{{$farm->email}}</th>
                                <th scope="col">{{$farm->type}}</th>
                                <th scope="col">{{$farm->province->name}}</th>
                                <th scope="col">{{$farm->city->name}}</th>
                                <th scope="col">{{$farm->address}}</th>
                                <th scope="col">{{count((array)unserialize($farm->worker)) ?? ''}}</th>
                                <th scope="col">{{$farm->expert->name . ' ' . $farm->expert->surname}}</th>
                                <td>{{jdate($farm->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($farm->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('farm.destroy',$farm->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="" class="btn btn-sm  btn-outline-secondary btn-square" data-toggle="modal" data-target="#exampleModalCenter" onclick="getHerds({{$farm->id}})">
                                                <i class="fas fa-farm"></i>
                                            </a>
                                            <a href="{{route('farm.edit',$farm->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">گله‌های مرغداری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        function getHerds(farmId) {
            axios.get('api/v1/farmHerds/' + farmId).then(
                res => {
                    let herds = res.data;

                    $('.modal-body').append(
                        herds.map((herd ) => {
                            console.log(herd.id);
                            return '<a href="herd/' + herd.id + '" class="btn btn-default">گله شماره ' + herd.herd_number + '</a>'

                        })
                    )
                }
            )
        }
        $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
            $('.modal-body').empty()
        })
    </script>
@stop
