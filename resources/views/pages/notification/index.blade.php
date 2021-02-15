@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست اعلان ها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست اعلان ها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($notifications->total() > $notifications->perPage())
                    <div class="card-header">{{$notifications->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th space="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">پیام</th>
                                <th scope="col">کاربر</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ ویرایش</th>
                                <th class="text-right" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td scope="row">{{$loop->iteration + (($notifications->currentPage()-1) * $notifications->perPage())}}</td>
                                <td>{{$notification->title}}</td>
                                <td>{{$notification->message}}</td>
                                <td>{{$notification->user->name}}</td>
                                <td>{{jdate($notification->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($notification->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('notification.destroy',$notification->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('notification.edit',$notification->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
