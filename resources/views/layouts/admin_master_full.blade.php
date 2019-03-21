@extends('layouts.admin_master')
@section('main_content')
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b style="color:red">X</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b style="color:red">X</b>Body</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="fa fa-envelope-o"></i>--}}
                    {{--<span class="label label-success">4</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                    {{--<li class="header">ـــــ</li>--}}
                    {{--<li>--}}
                    {{--<!-- inner menu: contains the actual data -->--}}
                    {{--<ul class="menu">--}}
                    {{--<li><!-- start message -->--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_______________________--}}
                    {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                    {{--</h4>--}}
                    {{--<p>_________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<!-- end message -->--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--Siarco--}}
                    {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                    {{--</h4>--}}
                    {{--<p>_______</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--______--}}
                    {{--<small><i class="fa fa-clock-o"></i> Today</small>--}}
                    {{--</h4>--}}
                    {{--<p>_______</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_________--}}
                    {{--<small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
                    {{--</h4>--}}
                    {{--<p>____________________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_____________--}}
                    {{--<small><i class="fa fa-clock-o"></i> 2 days</small>--}}
                    {{--</h4>--}}
                    {{--<p>_________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="footer"><a href="#">________</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Notifications: style can be found in dropdown.less -->
                    {{--<li class="dropdown notifications-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="fa fa-bell-o"></i>--}}
                    {{--<span class="label label-warning">10</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                    {{--<li class="header">_________</li>--}}
                    {{--<li>--}}
                    {{--<!-- inner menu: contains the actual data -->--}}
                    {{--<ul class="menu">--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-users text-aqua"></i> _________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-warning text-yellow"></i> __________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-users text-red"></i> ____________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-shopping-cart text-green"></i> __________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-user text-red"></i> ___________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="footer"><a href="#">View all</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/images/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"> {{Auth::guard('admin')->user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::guard('admin')->user()->name}}
                                        <small>مدیر</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">

                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">ویرایش</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{Route('admin.logout')}}" class="btn btn-default btn-flat">خروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::guard('admin')->user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header text-center"> منوی اصلی</li>
                    <!--dashbord menu-->
                    <li class="@if($current_route_name=='admin' ) active @endif"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span>داشبورد</span></a></li>
                    <!--website menu-->
                    <li class="@if(strpos($current_route_name, 'admin.')===6 ||strpos($current_route_name, 'admin.')===6||strpos($current_route_name, 'admin.')===6 || strpos($current_route_name, 'admin.setting')!==false || strpos($current_route_name, 'admin.admin.')===0) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>وبسایت</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
{{--
<li class="@if(strpos($current_route_name, 'page.')===6) active @endif"><a href="{{route('admin.page.index')}}"><i class="fa fa-image"></i>صفحات</a></li>

                            <li class="@if(strpos($current_route_name, 'menu.')===6) active @endif"><a href="{{route('admin.menu.index')}}"><i class="fa fa-bars"></i>منو</a></li>
                            <li class="@if(strpos($current_route_name, 'slider.')===6) active @endif"><a href="{{route('admin.slider.index')}}"><i class="fa fa-sliders"></i>اسلایدر</a></li>
<li class="@if(strpos($current_route_name, 'post.')===6) active @endif"><a href="{{route('admin.post.index')}}"><i class="fa fa-sticky-note"></i>نوشته ها</a></li>
--}}
                            <li class="@if(strpos($current_route_name, 'admin.admin.')===0) active @endif"><a href="{{route('admin.admin.index')}}"><i class="fa fa-users"></i>کاربران ادمین</a></li>
                            <li class="@if(strpos($current_route_name, 'admin.slider.')===0) active @endif"><a href="{{route('admin.slider.index')}}"><i class="fa fa-sliders"></i>اسلایدر</a></li>
                            <li class="@if(strpos($current_route_name, 'admin.slider.')===0) active @endif"><a href="{{route('admin.slider.index')}}"><i class="fa fa-sliders"></i>تبلیغات</a></li>
                            <li class="@if(strpos($current_route_name, 'admin.menu.')===0) active @endif"><a href="{{route('admin.menu.index')}}"><i class="fa fa-bars"></i>منوی سایت</a></li>
                            <li class="@if(strpos($current_route_name, 'admin.setting')===0) active @endif"><a href="{{route('admin.setting')}}"><i class="fa fa-bars"></i>تنظیمات سایت</a></li>


                        </ul>
                    </li>

                    <li class="@if(strpos($current_route_name, 'article.')===6  || strpos($current_route_name, 'article_category.')===6)active @endif treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>مدیریت پست ها</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'article.create')===6) active @endif"><a href="{{route('admin.article.create')}}"><i class="fa fa-tags"></i>افزودن پست جدید</a></li>
                            <li class="@if(strpos($current_route_name, 'article_category.index')===6) active @endif"><a href="{{route('admin.article_category.index')}}"><i class="fa fa-circle-o"></i>دسته بندی</a></li>
                            <li class="@if(strpos($current_route_name, 'article.index')===6 && strpos($current_route_name, 'article.edit')!==14) active @endif"><a href="{{route('admin.article.index')}}"><i class="fa fa-sticky-note"></i> کلیه پست ها</a></li>


                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'page.')===6)active @endif treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>مدیریت صفحات </span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'page.create')===6) active @endif"><a href="{{route('admin.page.create')}}"><i class="fa fa-tags"></i>افزودن صفحه جدید</a></li>
                            <li class="@if(strpos($current_route_name, 'page.index')===6) active @endif"><a href="{{route('admin.page.index')}}"><i class="fa fa-sticky-note"></i> کلیه صفحات</a></li>
                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'branches.')===6)active @endif treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>مدیریت شعبات </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'branches.create')===6) active @endif"><a href="{{route('admin.branches.create')}}"><i class="fa fa-tags"></i>افزودن شعبه جدید</a></li>
                            <li class="@if(strpos($current_route_name, 'branches.index')===6) active @endif"><a href="{{route('admin.branches.index')}}"><i class="fa fa-sticky-note"></i> کلیه شعبات</a></li>
                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'report.')===6 || strpos($current_route_name, 'product.reservess')===6 || strpos($current_route_name, 'reserves.change')===6 )active @endif treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>گزارشات</span>
                            <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'report.users')===6) active @endif"><a href="{{route('admin.report.users')}}"><i class="fa fa-user"></i>کاربران سایت</a></li>
                            <li class="@if(strpos($current_route_name, 'report.branchuser')===6) active @endif"><a href="{{route('admin.report.branchuser',1)}}"><i class="fa fa-user"></i>کاربران شعبات</a></li>
                            <li class="@if(strpos($current_route_name, 'report.reserves')===6) active @endif"><a href="{{route('admin.report.reserves')}}"><i class="fa fa-user"></i>رزرو های شعبات</a></li>
                            <li class="@if(strpos($current_route_name, 'report.site-reserves')===6) active @endif"><a href="{{route('admin.report.site-reserves')}}"><small class="label pull-right bg-red" style="float: left !important;" >{{$reserve_count}}</small><i class="fa fa-user"></i>رزرو های کاربران سایت</a></li>
                            <li class="@if(strpos($current_route_name, 'product.reservess')===6 || strpos($current_route_name, 'reserves.change')===6) active @endif"><a href="{{route('admin.product.reservess')}}"><small class="label pull-right bg-red" style="float: left !important;" >{{$product_count}}</small><i class="fa fa-user"></i>محصولات رزرو شده</a></li>

                            {{--                            <li class="@if(strpos($current_route_name, 'order.reserves')===6 && strpos($current_route_name, 'reserves')!==14) active @endif"><a href=""><i class="fa fa-sticky-note"></i> پاسخ ها</a></li>
                                                        <li class="@if(strpos($current_route_name, 'article')===6 && strpos($current_route_name, 'category')!==14) active @endif"><a href="{{route('admin.comment.index')}}"><i class="fa fa-sticky-note"></i>نظرات</a></li>--}}

                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'product.index')===6 ||strpos($current_route_name, 'category.')===6||strpos($current_route_name, 'attribute-group.')===6 ||strpos($current_route_name, 'attribute.')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i> <span>فروشگاه</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'category.')===6) active @endif"><a href="{{route('admin.category.index')}}"><i class="fa fa-th"></i>دسته بندی</a></li>
                            <li class="@if(strpos($current_route_name, 'product.')===6) active @endif"><a href="{{route('admin.product.index')}}"><i class="fa fa-product-hunt"></i>کالاها</a></li>
                            <li class="@if(strpos($current_route_name, 'attribute-group.')===6) active @endif"><a href="{{route('admin.attribute-group.index')}}"><i class="fa fa-object-group"></i>گروه های خصوصیت</a></li>
                            <li class="@if(strpos($current_route_name, 'attribute.')===6) active @endif"><a href="{{route('admin.attribute.index')}}"><i class="fa fa-object-ungroup "></i>خصوصیت ها</a></li>


                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'gallery.')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i> <span>گالری</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'gallery.create')===6) active @endif"><a href="{{route('admin.gallery.create')}}"><i class="fa fa-plus"></i>افزودن گالری</a></li>
                            <li class="@if(strpos($current_route_name, 'gallery.index')===6) active @endif"><a href="{{route('admin.gallery.index')}}"><i class="fa fa-th"></i>کلیه گالری ها</a></li>
                        </ul>
                    </li>

                    <li class="@if(strpos($current_route_name, 'ads.index')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i> <span>تبلیغات</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'ads.')===6) active @endif"><a href="{{route('admin.ads.index')}}"><i class="fa fa-th"></i>کلیه تبلیغات</a></li>
                        </ul>
                    </li>

                    <li class="@if(strpos($current_route_name, 'message.index')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i> <span>پیام ها</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'message.')===6) active @endif"><a href="{{route('admin.message.index')}}"><i class="fa fa-th"></i>کلیه پیام ها</a></li>
                        </ul>
                    </li>

                    <li class="@if(strpos($current_route_name, 'interview')===6 || strpos($current_route_name, 'interviewCategory')) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i> <span>مصاحبه ها</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'interview.')===6) active @endif"><a href="{{route('admin.interviewCategory.index')}}"><i class="fa fa-th"></i>دسته بندی مصاحبه ها</a></li>
                            <li class="@if(strpos($current_route_name, 'interview.')===6) active @endif"><a href="{{route('admin.interview.create')}}"><i class="fa fa-th"></i>مصاحبه جدید</a></li>
                            <li class="@if(strpos($current_route_name, 'interview.')===6) active @endif"><a href="{{route('admin.interview.index')}}"><i class="fa fa-th"></i>کلیه مصاحبه ها</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                @include('admin.partials.flash_message')

            </section>

            <!-- Content Header (Page header) -->
         @yield('content-header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b> Version </b> 1.0.0
            </div>
            <strong>&nbsp;&nbsp; Copyright &copy; 2017-2018  <a href="#">  xBody </a> </strong>  All rights reserved &nbsp;&nbsp;
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab" ><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="max-height: 510px;">
                <!-- Home tab content -->
                <div class="tab-pane fade in active" id="control-sidebar-home-tab">


                       <form action="{{route('admin.config')}}" method="POST">
                           {{csrf_field()}}

                           <div class="form-group">
                           <label  for="site-name">
                               نام سایت
                           </label>
                               <input type="text" name="config_site_name" id="config_site_name" value="{{ \Setting::get('site_name')}}" class="form-control">

                           </div>
{{--
                           <div class="form-group">
                               <label  for="site-name">
                                   اسلایدر صفحه اصلی
                               </label>
                               <select  name="config_slider" id="config_slider"  class="form-control">
                                   <option value="0">انتخاب</option>
                                    @foreach(\App\Slider::all() as $slider)
                                       <option value="{{$slider->id}}" @if(\Setting::get('config_slider')==$slider->id) selected @endif>{{ $slider->name }}</option>

                                   @endforeach

                               </select>

                           </div>
--}}
{{--
                           <div class="form-group">
                               <label  for="site-name">
                                   اسلایدر بلاگ
                               </label>
                               <select  name="config_slider_blog" id="config_slider"  class="form-control">
                                   <option value="0">انتخاب</option>
                                   @foreach(\App\Slider::all() as $slider)
                                       <option value="{{$slider->id}}" @if(\Setting::get('config_slider_blog')==$slider->id) selected @endif>{{ $slider->name }}</option>

                                   @endforeach

                               </select>

                           </div>
--}}

{{--
<div class="form-group">

<label  for="site-name">

نمایش باکس ها

</label>

<select  name="config_boxes" id="config_boxes"  class="form-control">

<option value="0">عدم نمایش</option>
--}}
{{--

@foreach(\App\Menu::all() as $menu)

@if($menu->parent_id==0)

<option value="{{$menu->id}}" @if(\Setting::get('config_boxes')==$menu->id) selected @endif>{{ $menu->name }}</option>

@endif

@endforeach
--}}{{--



</select>


</div>
--}}
                   {{--        <div class="form-group">
                               <label  for="site-name">
                                  شماره تماس 1
                               </label>
                               <input type="text" name="config_tel1" id="config_tel1" value="{{\Setting::get('site_tel1')}}" class="form-control">

                           </div>

                           <div class="form-group">
                               <label  for="site-name">
                                   شماره تماس 2
                               </label>
                               <input type="text" name="config_tel2" id="config_tel2" value="{{\Setting::get('site_tel2')}}" class="form-control">

                           </div>

                           <div class="form-group">
                               <label  for="site-name">
                                  آدرس
                               </label>
                               <textarea  name="config_address" id="config_address"  class="form-control">{{\Setting::get('site_address')}}</textarea>

                           </div>
                           <label for="shop_state">وضعیت فروشگاه</label>
                           <div class="form-group">
                           <!-- Rounded switch -->

                           <label class="switch">
                               <input id="shop_state" name="shop_state" type="checkbox" @if(\Setting::get('shop_state')==1) checked @endif>
                               <span class="slider round"></span>
                           </label>
                           </div>--}}
                           <button type="submit" class="btn btn-success">ذخیره</button>


                       </form>



                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    شبکه های اجتماعی
{{--
                    <form  action="{{route('admin.socials')}}" method="post">
                      {{csrf_field()}}
                        @php
                        $srow=0;
                        @endphp
                        <div id="social_content">
                        @foreach($socials as $social)
                            <div class="social">

                            <input type="text" name="socials[{{$srow}}][name]"  value="{{$social->name}}" placeholder="نام" class="form-control">
                            <input type="text" name="socials[{{$srow}}][url]" placeholder="لینک"  value="{{$social->url}}" class="form-control">
                            <div class="ImageManager">
                                <img src="{{route('media',$social->image_id)}}" class="imageManagerImage" width="60" style="padding: 5px;" height="60"><br>
                                <button class="fileManager btn btn-xs btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس</button>
                                <button class="btn btn-xs btn-primary" onclick="$(this).closest('.social').remove();" type="Button" data-multi="false">حذف</button>
                                <input class="inputFile" name="socials[{{$srow}}][image_id]" value="{{$social->image_id}}" type="hidden">
                            </div>
                            <hr>
                            </div>
                            @php
                                $srow++;
                            @endphp
                        @endforeach
                        </div>

                        <button type="submit" class="btn btn-success">ذخیره</button>
                        <button  type="button" onclick="add_social_row();" class="btn btn-success">افزودن</button>
                    </form>
--}}
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->


        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
@stop

