@extends('master')
@section('breadcrumb')
    <h3 class="page-title">لیست کاربرها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کاربرها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($users->total() > $users->perPage())
                    <div class="card-header">{{$users->links()}}</div>
                @endif
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">نام</th>
                            <th scope="col">پست الکترونیک</th>
                            <th scope="col">کلمه عبور</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration + (($users->currentPage()-1) * $users->perPage())}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{route('reset_password_form',$user->id)}}">تغییر کلمه عبور</a></td>
                                <td>{{jdate($user->created_at)->format('y/m/d')}}</td>
                                <td>{{jdate($user->updated_at)->format('y/m/d')}}</td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="{{route('notification.destroy',$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('notification.edit',$user->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
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
