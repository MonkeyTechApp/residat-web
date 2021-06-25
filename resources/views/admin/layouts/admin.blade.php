@extends('layouts.app')

@section('body_class','nav-md')
@include('admin.layouts.flash-messages')
@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin.sections.navigation')
                @include('admin.sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('title')</h1>
                    </div>
                    @if(Breadcrumbs::exists())
                        <div class="title_right">
                            <div class="pull-right">
                                {!! Breadcrumbs::render() !!}
                            </div>
                        </div>
                    @endif
                </div>
                @yield('content')
            </div>

            <footer>
                @include('admin.sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{ Html::style(mix('assets/admin/css/admin.css')) }}
    <!-- Datatables -->
    <link href="../assets/admin/datatable/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

{{--    {{ Html::style(mix('assets/admin/datatable/datatables.net-bs/css/dataTables.bootstrap.min.css')) }}--}}
{{--    {{ Html::style(mix('assets/admin/datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')) }}--}}
{{--    {{ Html::style(mix('assets/admin/datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')) }}--}}
{{--    {{ Html::style(mix('assets/admin/datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')) }}--}}
{{--    {{ Html::style(mix('assets/admin/datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')) }}--}}
@endsection

@section('scripts')
    {{ Html::script(mix('assets/admin/js/admin.js')) }}


    <!-- Datatables -->
    <script src="../assets/admin/datatable/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/admin/datatable/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/admin/datatable/jszip/dist/jszip.min.js"></script>
    <script src="../assets/admin/datatable/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/admin/datatable/pdfmake/build/vfs_fonts.js"></script>

@endsection
