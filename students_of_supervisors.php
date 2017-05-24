<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <!-- -->

    <!-- Location picker -->
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="locationpicker/dist/locationpicker.jquery.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmEd7tHANl5Ych8IQkupxVNOBWfLZk5tw" type="text/javascript"></script>

        <title>Supervisor</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                     <a class="navbar-brand" href="">IITMS (Interactive Industrial Training Management System)</a>
                   
                    
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Log Out <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="itpdocs.html"><i class="fa fa-fw fa-dashboard"></i> Documentions</a>
                        </li>
                        <li>
                            <a href="view_all_student.php "><i class="fa fa-fw fa-bar-chart-o"></i> View All Student</a>
                        </li>
                        <li class="">
                            <a href="students_of_supervisors.php "><i class="fa fa-fw fa-table"></i> View All Student Locations</a>
                        </li>
                        <li class="">
                            <a href="mmuSupEV.php "><i class="fa fa-fw fa-table"></i> MMU Supervisor Evaluation</a>
                        </li>

                       
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                           
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                   
<?php
 $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }

  $user_id = $_SESSION['supervisor_id'];

  $query = mysql_query("SELECT * FROM student_supervisor ss INNER JOIN users u INNER JOIN company_registration cr ON ss.student_id=u.id AND u.user_id = cr.student_id  WHERE ss.supervisor_id='$user_id'");

 
?>
 
<div class="container">
 <h3 align = "left" >View Students Locations</h3>
<br>

<div id="map" style="width: 500px; height: 400px;"></div>
 
  <script type="text/javascript">

  var lat , lon;


  function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d.toFixed(2);
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}


var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;

  lat = crd.latitude;
  lon = crd.longitude;

  console.log('Your current position is:');
  console.log(`Latitude : ${crd.latitude}`);
  console.log(`Longitude: ${crd.longitude}`);
  console.log(`More or less ${crd.accuracy} meters.`);
};

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
};

navigator.geolocation.getCurrentPosition(success, error, options);    

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(3.146703, 101.692075),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
<?php 
  if($query){
    if(mysql_num_rows($query)>0){
      while ($row = mysql_fetch_array($query)) {
        ?>
marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $row['latitude']?>, <?php echo $row['longitude']?>),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<?php echo $row['student_name']?> \n'+ getDistanceFromLatLonInKm(lat,lon,<?php echo $row['latitude']?>,<?php echo $row['longitude']?>)+"km");
          infowindow.open(map, marker);
        }
      })(marker, i));
        <?php
      }
    }
  }
?>

    
  </script>
   </div>

                
                    

                                

                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>

 



