<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/task/public/admin/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/task/public/admin/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include ('header.php')?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php include('sidbar.php')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php view($data[0]['path'], count($data[0]['child_datas']) ? $data[0]['child_datas'] : null); ?>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include ('footer.php')?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/task/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/task/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/task/public/admin/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/task/public/admin/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="/task/public/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="/task/public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/task/public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/task/public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="/task/public/admin/plugins/chartjs-old/Chart.min.js"></script>

<script src="/task/public/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/task/public/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- PAGE SCRIPTS -->
<script src="/task/public/admin/js/pages/dashboard2.js"></script>
<style>
    #example1_filter, #example1_paginate {
        float: right;
    }
</style>
<script>
    $(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "order": [[ 0, 'desc' ]],
            "info": true,
            "autoWidth": true,
            "iDisplayLength": 3,
            "lengthMenu": [[3], [3, "All"]]
        });
    });
</script>
</body>
</html>