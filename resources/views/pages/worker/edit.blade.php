@extends('master')
@section('breadcrumb')
    <h3 class="page-title">کارگر جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('worker.index')}}">لیست کارگران</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کارگر</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('worker.update',$worker->id)}}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">نام خانوادگی</label>
                            <input type="text" name="surname" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->surname}}">
                        </div>
                        <div class="form-group">
                            <label for="">روز تولد</label>
                            <input type="text" name="birthday" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->birthday}}">
                        </div>
                        <div class="form-group">
                            <label for="">تحصیلات</label>
                            <input type="text" name="education" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->education}}">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="male">
                                <label class="custom-control-label" for="customRadioInline1">مرد</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="female">
                                <label class="custom-control-label" for="customRadioInline2">زن</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">تجربه کاری</label>
                            <input type="text" name="work_experience" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->work_experience}}">
                        </div>
                        <div class="form-group">
                            <label for="">شماره تلفن</label>
                            <input type="text" name="phone_number" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$worker->phone_number}}">
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

@section('styles')
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js')}}"></script>
    <script src="{{asset('vendors/datepicker/daterangepicker.js')}}"></script>
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
    <script>
        $(document).ready(function () {
            $('input[name="birthday"]').datepicker({
                dateFormat: "yy/mm/dd",
                showOtherMonths: true,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "c-60",
                showButtonPanel: true
            });
        });
    </script>
@endsection
