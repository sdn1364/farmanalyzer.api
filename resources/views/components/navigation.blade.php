@php
    use Illuminate\Support\Facades\Config;
$menus = Config::get('menu');
@endphp
<!-- begin::navigation -->
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            @foreach($menus as $menu)
                <li class="{{Str::contains($menu['link'],request()->segment(1)) ? 'active': ''}}" data-toggle="tooltip" title="{{$menu['title']}}">
                    <a href="#navigation{{Str::ucfirst($menu['name'])}}">
                        <i class="icon {{$menu['icon']}}"></i>
                        {{--<span class="badge badge-light">2</span>--}}
                    </a>
                </li>
            @endforeach
        </ul>
        <ul>
            <li data-toggle="tooltip" title="نوتیفیکیشن" class="{{request()->segment(1) === 'notification' ? 'active': ''}}">
                <a href="#navigation-notification">
                    <i class="icon fad fa-envelope"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#navigation-users">
                    <i class="icon fad fa-user"></i>
                </a>
            </li>
{{--            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon fad fa-cog"></i>
                </a>
            </li>--}}
            <li data-toggle="tooltip" title="خروج">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="icon fad fa-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">

        @foreach($menus as $menu)
            <ul id="navigation{{Str::ucfirst($menu['name'])}}" class="{{Str::contains($menu['link'],request()->segment(1)) ? 'navigation-active': ''}}">
                    @foreach($menu['body'] as $mb)
                        @if($mb['type'] === 'title')
                            @if($loop->first)
                                <li class="navigation-divider">{{$menu['title']}}</li>
                            @else
                                <li class="navigation-divider">{{$mb['name']}}</li>
                            @endif
                        @endif
                        @if($mb['type'] === 'link')
                            <li><a class="{{request()->segment(1) == $mb['title'] ? 'active': ''}}" href="{{$mb['link']}}">{{$mb['name']}}</a></li>
                        @endif
                        @if($mb['type'] === 'sub')
                            <li class="{{request()->segment(1) == $mb['title'] ? 'open': ''}}">
                                <a href="#">{{$mb['name']}}</a>
                                <ul>
                                    @foreach($mb['submenu'] as $mbs)
                                        <li><a class="{{request()->path() == $mbs['title'] ? 'active': ''}}" href="{{route($mbs['link'])}}">{{$mbs['name']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
            </ul>

        @endforeach
        <ul id="navigation-notification" class="{{request()->segment(1) === 'notification' ? 'navigation-active': ''}}">
            <li class="navigation-divider">نوتیفیکیشن</li>
            <li class="{{request()->segment(1) == 'users' ? 'open': ''}}">
                <a class="{{request()->segment(1) == 'user' ? 'open': ''}}" href="#">نوتیفیکیشن‌ها</a>
                <ul>
                    <li><a class="{{request()->path() == '/notification/' ? 'active': ''}}" href="{{route('notification.index')}}">لیست پیام‌ها</a></li>
                    <li><a class="{{request()->path() == '/notification/create' ? 'active': ''}}" href="{{route('notification.create')}}">پیام جدید</a></li>
                </ul>
            </li>
        </ul>

        <ul id="navigation-users" class="{{request()->segment(1) === 'user' ? 'navigation-active': ''}}" >
            <li class="navigation-divider">کاربران</li>
            <li class="{{request()->segment(1) == 'user' ? 'open': ''}}">
                <a href="#">کابران</a>
                <ul>
                    <li><a class="{{request()->path() == '/user/' ? 'active': ''}}" href="{{route('user.index')}}">لیست کاربران</a></li>
                    <li><a class="{{request()->path() == '/user/create' ? 'active': ''}}" href="{{route('user.create')}}">کاربر جدید</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(1) == 'users' ? 'open': ''}}">
                <a href="#">دسترسی‌ها</a>
                <ul>
                    <li><a class="" href="">لیست دسترسی‌ها</a></li>
                    <li><a class="" href="">دسترسی جدید</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end::navigation -->
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
