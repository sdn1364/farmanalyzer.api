@extends('master')
@section('breadcrumb')
    <h3 class="page-title">ویرایش گله</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('herd.index')}}">لیست گله‌ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش گله</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('herd.update',$herd->id)}}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="">شماره گله</label>
                            <input type="text" name="herd_number" id="" class="form-control" placeholder="" aria-describedby="helpId" required="" value="{{$herd->herd_number}}">
                        </div>
                        <div class="form-group">
                            <label for="">سن گله</label>
                            <input type="text" class="form-control" name="age" value="{{$herd->age}}">
                        </div>
                        <div class="form-group">
                            <label for="">تهداد جوجه</label>
                            <input type="text" class="form-control" name="quantity" value="{{$herd->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="">مساحت سالن</label>
                            <input type="text" class="form-control" name="saloon_area" value="{{$herd->saloon_area}}">
                        </div>
                        <div class="form-group">
                            <label for="">ظرفیت سالن</label>
                            <input type="text" class="form-control" name="capacity" value="{{$herd->capacity}}">
                        </div>
                        <div class="form-group">
                            <label for="">مرغداری</label>
                            <select name="farm_id" class="form-control">
                                @foreach($farms as $farm)
                                    <option {{$herd->farm_id == $farm->id? 'selected':null}} value="{{$farm->id}}">{{$farm->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">تاریخ شروع</label>
                            <input type="text" name="start_date" class=" date form-control text-left" dir="ltr" autocomplete="off"  value="{{$herd->start_date}}">
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
