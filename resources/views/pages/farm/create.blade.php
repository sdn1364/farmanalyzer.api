@extends('master')
@section('breadcrumb')
    <h3 class="page-title">مرغداری جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('farm.index')}}">لیست مرغداری‌ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">مرغداری جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('farm.store')}}" method="post" class="needs-validation" novalidate="">
                        @csrf

                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">مزرعه دار</label>
                            <select name="farmer_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @foreach($farmers as $farmer)
                                    <option value="{{$farmer->id}}">{{$farmer->name.' '.$farmer->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">روز تولد</label>
                            <input type="text" name="birthday" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">شماره تلفن</label>
                            <input type="text" name="phone_number" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">پست الکترونیک</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">نوع</label>
                            <input type="text" name="type" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">استان</label>
                            <select name="province_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">شهر</label>
                            <select name="city_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">نشانی</label>
                            <input type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">لوکیشن</label>
                            <input type="text" name="gmap" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">کارگران</label>
                            <select multiple="multiple" size="10" name="selectedWorkers[]" class="form-control">
                                @foreach($workers as $worker)
                                    <option value="{{$worker->id}}">{{$worker->name.' '.$worker->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">کارشناس</label>
                            <select name="expert_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                @foreach($experts as $expert)
                                    <option value="{{$expert->id}}">{{$expert->name. ' ' . $expert->surname}}</option>
                                @endforeach
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
@section('styles')
    <link rel="stylesheet" href="{{asset('vendors/dual-list/bootstrap-duallistbox.min.css')}}">
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
    <script src="{{asset('vendors/dual-list/jquery.bootstrap-duallistbox.js')}}"></script>
    <script>
        var demo1 = $('select[name="selectedWorkers[]"]').bootstrapDualListbox();
    </script>
@endsection
