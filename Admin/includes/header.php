 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Expense Mgmt System-Dashboard</title>
     <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <!-- font Awesome -->
     <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <!-- Ionicons -->
     <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
     <!-- Morris chart -->
     <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
     <!-- jvectormap -->
     <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
     <!-- fullCalendar -->
     <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
     <!-- Daterange picker -->
     <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
     <!-- bootstrap wysihtml5 - text editor -->
     <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
     <!-- Theme style -->
     <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
 </head>

 <header class="header">
     <a href="index.html" class="logo">
         <!-- Add the class icon to your logo image or logo icon to add the margining -->
         Expense System
     </a>
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top" role="navigation">
         <!-- Sidebar toggle button-->
         <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </a>
         <div class="navbar-right">
             <ul class="nav navbar-nav">

                 <li class="dropdown user user-menu">


                     <span><a href="includes/logout.php">logout</a> <i class="caret"></i></span>
                     </a>

                 </li>
             </ul>
         </div>
     </nav>
 </header>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="js/bootstrap.min.js" type="text/javascript"></script>
 <!-- DATA TABES SCRIPT -->
 <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
 <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <!-- AdminLTE App -->
 <script src="js/AdminLTE/app.js" type="text/javascript"></script>
 <script type="text/javascript">
     $(function() {
         $("#example1").dataTable();
         $('#example2').dataTable({
             "bPaginate": true,
             "bLengthChange": false,
             "bFilter": false,
             "bSort": true,
             "bInfo": true,
             "bAutoWidth": false
         });
     });
 </script>