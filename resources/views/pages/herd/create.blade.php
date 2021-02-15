@extends('master')
@section('breadcrumb')
    <h3 class="page-title">گله جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('farm.index')}}">لیست مرغداری‌ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">گله جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('herd.store')}}" method="post" class="needs-validation" novalidate="">
                        @csrf

                        <div class="form-group">
                            <label for="">شماره گله</label>
                            <input type="text" name="herd_number" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">سن گله</label>
                                    <input type="text" class="form-control" name="age">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">تعداد جوجه</label>
                                    <input type="text" class="form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">مساحت سالن</label>
                            <input type="text" class="form-control" name="saloon_area">
                        </div>
                        <div class="form-group">
                            <label for="">ظرفیت سالن</label>
                            <input type="text" class="form-control" name="capacity">
                        </div>

                        <div class="form-group">
                            <label for="">نام مرغداری</label>
                            <select name="farm_id" class="form-control">
                                @foreach($farms as $farm)
                                    <option value="{{$farm->id}}">{{$farm->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">تاریخ شروع</label>
                            <input type="text" name="start_date" class=" date form-control text-left" dir="ltr" autocomplete="off">
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
    <!-- Clockpicker -->
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.min.css')}}">
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
    <script src="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js')}}"></script>
    <script src="{{asset('assets/js/examples/datepicker.js')}}"></script>
@endsection
