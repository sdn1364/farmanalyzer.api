@extends('master')
            @section('breadcrumb')
                <h3 class="page-title">واکسن جدید</h3>
                <!-- begin::breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('vaccine_company.index')}}">لیست شرکت های واکسن</a></li>
                        <li class="breadcrumb-item active" aria-current="page">vaksina_company ویرایش</li>
                    </ol>
                </nav>
                <!-- end::breadcrumb -->
            @endsection
            
        @section('content')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('vaccine_company.update',$vaccine_company->id)}}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                @method('PUT')

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
        