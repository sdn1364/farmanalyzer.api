@extends('master')
@section('breadcrumb')
    <h3 class="page-title">اعلان جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('notification.index')}}">لیست اعلان ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">اعلان جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('notification.store')}}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="">کاربر</label>
                            <select name="user_id" id="" class="form-control" >
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">متن پیام</label>
                            <textarea name="message" id="" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">اولویت</label>
                            <select name="priority" id="" class="form-control">
                                <option value="usual">معمولی</option>
                                <option value="urgent">ضروری</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="ذخیره"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //  Form Validation
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    </script>
@endsection
