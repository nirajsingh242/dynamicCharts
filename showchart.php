<?php
    session_start();
    if(!isset($_GET["grno"])) exit();
    $grno = $_GET["grno"];
    $connection = mysqli_connect("localhost","root","","projectmanagement");
    $query_string = "SELECT * FROM `students` WHERE `grno` = $grno";
    $tuple = array("Communication","Planning","Modeling","Development");
    
    $res = mysqli_query($connection,$query_string);
    
    $row = mysqli_fetch_assoc($res);
    $name = $row["name"];
$ActualTuple = array($row["Communication"],$row["Planning"],$row["Modeling"],$row["Development"]);
	
	echo $row['Planning'];
	
?>

<!DOCTYPE html>


<html>

<head>
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
  </script>
  <style>
    html,
    body {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
    }
    
    #myChart {
      height: 100%;
      width: 100%;
      min-height: 150px;
    }
    
    .zc-ref {
      display: none;
    }
  </style>
</head>

<body>
  <div id="myChart"><a class="zc-ref" href="https://www.zingchart.com"></a></div>
  <script>
    var myConfig = {
      type: 'bar',
	   "title": {
    "text": "X-axis grades ,Y-axis phases",
    "fontSize": 22
  },
  "subtitle": {
    "text": "<?php echo"'Grade for student: $name'"; ?>"
  },
      scaleY: {
        values: ["D", "C", "B", "A"]
      },
      scaleX: {
        values: ["Communication", "Planning", "Modeling", "Developement"]
      },
      series: [{
        values: ["<?php echo $row["Communication"] ?>", "<?php echo $row["Planning"] ?>","<?php echo $row["Modeling"]?>", "<?php echo $row["Development"]?>"]
      }]
    };

    zingchart.render({
      id: 'myChart',
      data: myConfig,
      height: '100%',
      width: '100%'
    });
  </script>
</body>

</html>