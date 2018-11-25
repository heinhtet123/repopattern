@inject('user','Illuminate\Auth\Guard')
<?php 
    
    $user_name=$user->user()->name; 
    $user_role=$user->user()->role['id'];
    
?>
   
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('studentsportal.title') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('backend.partials.css')

    <style>
        .breadcrumb li a {
            color: #000;
        }

        .breadcrumb li a:hover {
            color: #505050;
        }
        .loader{
            
            
        }
        .span1{
            height: 100% !important;
            overflow-y: hidden;
        }
        div.previewing>img{
            margin-top:20px;
            margin-left: 15px;
            border: none;
            float:left;
        }
            
        div.tag-editor{
            height: auto;
            border: 1px solid #d2d6de !important;
            cursor: text;
            background-color: #FFF;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
           
        }


        span.post-tag{
            color:#39739d;
            background-color: #E1ECF4;
            border-color:transparent;
            padding: 7px;
            float: left;
            display: inline-block;
            border-spacing: 10px;



        }
        span.glyphicon{
                margin-left: 3px;
                margin-top: -2px;
                margin-bottom: -1px;
                vertical-align: middle;
                cursor: pointer;
        }

        .tag-editor .rendered-element{
            margin: 5px;
        }
        .tag-editor input{
            border: none !important;
            padding: 0 !important;

        }
        div.auto-suggestion{
            border: 1px solid #d2d6de;
            background-color: #FFF;
            position: relative;
            
        }
        
    .form-group .scrollable-menu {
            border: 1px solid #d2d6de;
            height: auto;
            max-height: 200px;
            overflow-x: hidden;
        }
    .form-group li.list-group-item{
        
            border:1px !important;
            border-radius: 0px !important;
        }

     
    .datepicker table tr td.disabled,
    .datepicker table tr td.disabled:hover {
      color: #b90000;
    }

        
    </style> 
    @yield('css')
    

</head>
<body class="hold-transition skin-red sidebar-mini" ng-app="students-App">
    <div class="wrapper">

        @include('backend.partials.nav')

        @include('backend.partials.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h4>
                    @yield('breadcrumbs')
                </h4>
            </section>
            
            <loading class="loading-spiner-holder"></loading>


            <section class="content panel-down">
                @yield('content')
            </section>

        </div>
        <!-- /.content-wrapper -->

        @include('backend.partials.footer')

    </div>
<!-- ./wrapper -->

@include('backend.partials.js')


@yield('js')

<!-- custom js functions -->
@yield('scripts')
<!-- ./custom js functions -->

</body>
</html>