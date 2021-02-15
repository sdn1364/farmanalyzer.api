<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CreateViews extends Command
{
    protected $folderName;
    protected $path;
    protected $singleName;
    protected $modelName;
    protected $tableName;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new views based on controllers';

    public function handle()
    {
        $controllers = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('controller', $action)) {
                if ($action['namespace'] === 'App\Http\Controllers') {
                    $controllerPath = explode('@', $action['controller'])[0];
                    $controllers[] = explode('\\', $controllerPath)[3];
                }
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
            }
        }
        $uniqueResults = array_unique($controllers);
        array_splice($uniqueResults, count($uniqueResults) - 1, 1);
        foreach ($uniqueResults as $argument) {
            $extName = Str::replaceFirst('Controller', '', $argument);
            dump($extName);
            $this->singleName = Str::singular($extName);
            $this->folderName = Str::snake($this->singleName);
            $this->tableName = Str::of($extName)->lower();
            $views_path = app()->resourcePath('views');
            $this->path = $views_path . '/pages/' . $this->folderName;

            if (!is_dir($this->path)) {
                mkdir($this->path, 0777, true);
            }

            $this->info('Folder ' . $this->folderName . ' created');
            $this->createIndex();
            $this->info('Index file generated for ' . $this->folderName);
            $this->createCreate();
            $this->info('Create file generated for ' . $this->folderName);
            $this->createEdit();
            $this->info('Edit file generated for ' . $this->folderName);
        }

    }

    public function createIndex()
    {
        $content = $this->extended() .
            $this->breadCrumb('index') .
            $this->content();

        if (File::exists($this->path . '/index.blade.php')) {
            File::delete($this->path . '/index.blade.php');
            File::put($this->path . '/index.blade.php', $content);

        } else {
            File::put($this->path . '/index.blade.php', $content);
        }
    }

    public function createCreate()
    {
        $content = $this->extended() .
            $this->breadCrumb('create') .
            $this->createForm();

        if (File::exists($this->path . '/create.blade.php')) {
            File::delete($this->path . '/create.blade.php');
            File::put($this->path . '/create.blade.php', $content);
        } else {
            File::put($this->path . '/create.blade.php', $content);
        }
    }

    public function createEdit()
    {
        $content = $this->extended() .
            $this->breadCrumb('edit') .
            $this->editForm();

        if (File::exists($this->path . '/edit.blade.php')) {
            File::delete($this->path . '/edit.blade.php');
            File::put($this->path . '/edit.blade.php', $content);
        } else {
            File::put($this->path . '/edit.blade.php', $content);
        }
    }

    public function extended()
    {
        return "@extends('master')";
    }

    public function breadCrumb($type = null)
    {
        if ($type == 'index') {
            return '
        @section(\'breadcrumb\')
            <h3 class="page-title">' . GoogleTranslate::trans(Str::plural($this->folderName) . ' list', 'fa', 'en') . '</h3>
            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">' . GoogleTranslate::trans(Str::plural($this->folderName) . ' list', 'fa', 'en') . '</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->
        @endsection
        ';
        }
        if ($type == 'create') {
            return '
            @section(\'breadcrumb\')
                <h3 class="page-title">' . GoogleTranslate::trans('new ' . $this->folderName, 'fa', 'en') . '</h3>
                <!-- begin::breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route(\'' . $this->folderName . '.index\')}}">' . GoogleTranslate::trans(Str::plural($this->folderName) . ' list', 'fa', 'en') . '</a></li>
                        <li class="breadcrumb-item active" aria-current="page">' . GoogleTranslate::trans('new ' . $this->folderName, 'fa', 'en') . '</li>
                    </ol>
                </nav>
                <!-- end::breadcrumb -->
            @endsection
            ';
        }
        if ($type == 'edit') {
            return '
            @section(\'breadcrumb\')
                <h3 class="page-title">' . GoogleTranslate::trans('new ' . $this->folderName, 'fa', 'en') . '</h3>
                <!-- begin::breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route(\'' . $this->folderName . '.index\')}}">' . GoogleTranslate::trans(Str::plural($this->folderName) . ' list', 'fa', 'en') . '</a></li>
                        <li class="breadcrumb-item active" aria-current="page">' . GoogleTranslate::trans($this->folderName . ' edit', 'fa', 'en') . '</li>
                    </ol>
                </nav>
                <!-- end::breadcrumb -->
            @endsection
            ';
        }
    }

    public function content()
    {
        return '
            @section("content")
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if($' . Str::plural($this->folderName) . '->total() > $' . Str::plural($this->folderName) . '->perPage())
                                <div class="card-header">{{$' . Str::plural($this->folderName) . '->links()}}</div>
                            @endif
                            <div class="content">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <tr>
                                    ' . $this->tableHeader() . '
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($' . Str::plural($this->folderName) . ' as $' . $this->folderName . ')
                                         <tr>
                                            ' . $this->tableBody() . '
                                         </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
        ';
    }

    public function tableHeader()
    {
        $columns = Schema::getColumnListing($this->tableName);

        $header = '';
        foreach ($columns as $cl) {
            if ($cl === 'id') {
                $header .= '<th scope="col">#</th>';
            } elseif ($cl === 'created_at') {
                $header .= '<th scope="col">تاریخ ایجاد</th>';
            } elseif ($cl === 'updated_at') {
                $header .= '<th scope="col">تاریخ ویرایش</th>';
            } else {
                if (Str::is('*_id', $cl)) {
                    $header .= '<th scope="col">' . GoogleTranslate::trans(Str::replaceFirst('_id', '', $cl), 'fa', 'en') . '</th>';

                } else {
                    $header .= '<th scope="col">' . GoogleTranslate::trans($cl, 'fa', 'en') . '</th>';
                }
            }
        }
        return $header . '<th class="text-right" scope="col"></th>';
    }


    public function tableBody()
    {
        $columns = Schema::getColumnListing($this->tableName);

        $body = '';
        foreach ($columns as $cl) {
            if($cl === 'id'){
                $body .= '<th scope="row">{{$loop->iteration + (($'.Str::plural($this->folderName).'->currentPage()-1) * $'.Str::plural($this->folderName).'->perPage())}}</th>';
            }elseif (Schema::getColumnType($this->tableName, $cl) === 'datetime') {
                $body .= '<td>{{jdate($' . $this->folderName . '->' . $cl . ')->format(\'y/m/d\')}}</td>';
            } elseif (Schema::getColumnType($this->tableName, $cl) === 'string') {
                $body .= '<th scope="col">{{' . '$' . $this->folderName . '->' . $cl . '}}</th>';
            } elseif (Schema::getColumnType($this->tableName, $cl) === 'date') {
                $body .= '<td>{{jdate($' . $this->folderName . '->' . $cl . ')->format(\'y/m/d\')}}</td>';
            } else {
                if (Str::is('*_id', $cl)) {
                    $body .= '<th scope="col">{{' . '$' . $this->folderName . '->' . Str::replaceFirst('_id', '', $cl) . '->name}}</th>';
                } else {
                    $body .= '<th scope="col">{{' . '$' . $this->folderName . '->' . $cl . '}}</th>';
                }
            }
        }
        return $body . '<td class="text-right">
                            <div class="col-md-12">
                                <form action="{{route(\'' . $this->folderName . '.destroy\',$' . $this->folderName . '->id)}}" method="post">
                                    @method(\'delete\')
                                    @csrf
                                    <a href="{{route(\'' . $this->folderName . '.edit\',$' . $this->folderName . '->id)}}" class="btn btn-sm  btn-outline-secondary btn-square">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary btn-square">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>';
    }

    public function createForm()
    {
        return '
        @section(\'content\')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route(\'' . $this->folderName . '.store\')}}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                ' .
            $this->generateForm('create')
            . '
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section(\'scripts\')
            <script>
                //  Form Validation
                window.addEventListener(\'load\', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName(\'needs-validation\');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener(\'submit\', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add(\'was-validated\');
                        }, false);
                    });
                }, false);
            </script>
        @endsection
        ';
    }

    public function editForm()
    {
        return '
        @section(\'content\')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route(\'' . $this->folderName . '.update\',$' . $this->folderName . '->id)}}" method="post" class="needs-validation" novalidate="">
                                @csrf
                                @method(\'PUT\')

                                ' .
            $this->generateForm('edit')
            . '
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section(\'scripts\')
            <script>
                //  Form Validation
                window.addEventListener(\'load\', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName(\'needs-validation\');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener(\'submit\', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add(\'was-validated\');
                        }, false);
                    });
                }, false);
            </script>
        @endsection
        ';
    }

    private function generateForm($type = null)
    {
        $columns = Schema::getColumnListing($this->tableName);
        if ($type == 'create') {
            $body = '';
            foreach ($columns as $cl) {
                if($cl === 'id' || $cl === 'created_at' || $cl ==='updated_at'){
                    $body .= '';
                }else{
                    if(Str::is('*_id', $cl)){
                        $body .= '
                        <div class="form-group">
                            <label for="">' . GoogleTranslate::trans(Str::replaceFirst('_id', '', $cl), 'fa', 'en') . '</label>
                            <select name="' . $cl . '" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                                @foreach($'.Str::plural(Str::replaceFirst('_id', '', $cl)).' as $'.Str::replaceFirst('_id', '', $cl).')
                                    <option value="{{$'.Str::replaceFirst('_id', '', $cl).'->id}}">{{$'.Str::replaceFirst('_id', '', $cl).'->name}}</option>
                                @endforeach
                            </select>
                        </div>';
                    }elseif($cl === 'gender'){
                        $body.= '<div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="female">
                                            <label class="custom-control-label" for="customRadioInline1">مرد</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="female">
                                            <label class="custom-control-label" for="customRadioInline2">زن</label>
                                        </div>
                                </div>';
                    }else{
                        $body .= '
                        <div class="form-group">
                            <label for="">' . GoogleTranslate::trans($cl, 'fa', 'en') . '</label>
                            <input type="text" name="' . $cl . '" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>';
                    }

                }
            }
            return $body . '<div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" value="ذخیره"/>
                            </div>';
        }
        if ($type == 'edit') {
            $body = '';
            foreach ($columns as $cl) {
                if($cl === 'id' || $cl === 'created_at' || $cl ==='updated_at'){
                    $body .= '';
                }else{
                    if(Str::is('*_id', $cl)){
                        $body .= '
                        <div class="form-group">
                            <label for="">' . GoogleTranslate::trans(Str::replaceFirst('_id', '', $cl), 'fa', 'en') . '</label>
                            <select name="' . $cl . '" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                                @foreach($'.Str::plural(Str::replaceFirst('_id', '', $cl)).' as $'.Str::replaceFirst('_id', '', $cl).')
                                    <option value="{{$'.Str::replaceFirst('_id', '', $cl).'->id}}">{{$'.Str::replaceFirst('_id', '', $cl).'->name}}</option>
                                @endforeach
                            </select>
                        </div>';
                    }elseif($cl === 'gender'){
                        $body.= '<div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="female">
                                            <label class="custom-control-label" for="customRadioInline1">مرد</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="female">
                                            <label class="custom-control-label" for="customRadioInline2">زن</label>
                                        </div>
                                </div>';
                    }else{
                        $body .= '
                        <div class="form-group">
                            <label for="">' . GoogleTranslate::trans($cl, 'fa', 'en') . '</label>
                            <input type="text" name="' . $cl . '" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$'.$this->folderName.'->'. $cl .'}}">
                        </div>';
                    }
                }
            }
            return $body . '<div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" value="ذخیره"/>
                            </div>';
        }
    }

}
