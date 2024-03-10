<?php

// Include connect.php
include "connect.php";

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT DATE_FORMAT(reading_time, '%H:%i:%s') AS time, value1, value2 FROM SensorData ORDER BY id DESC LIMIT 15";
$result = mysqli_query($conn, $sql);

// เตรียมข้อมูลสำหรับกราฟ
$time = array();
$value1 = array();
$value2 = array();
while ($row = mysqli_fetch_assoc($result)) {
  $time[] = $row["time"];
  $value1[] = $row["value1"];
  $value2[] = $row["value2"];
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>กราฟเส้นแสดงค่า Sensor1 และ Sensor2</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
</head>
<style>
    .container{
        
    }
  .chart1{
    border: 1px solid black;
    width: 400px;
    height:200px;
  }
  .chart2{
    margin-top:10px;
    border: 1px solid black;
    width: 400px;
    height:200px;
  }
</style>
<body>
  <h1>แสดงกราฟเส้นแสดงค่า Sensor1 และ Sensor2</h1>
  <div class="container">
  <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <div class="chart1">
                  <canvas id="myChart1"></canvas>
                  </div>
              </div>
            </div>

    </div>
    <div class="chart2">
      <canvas id="myChart2"></canvas>
    </div>
  </div>
  <script>
    // กราฟ Sensor1
    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var myChart1 = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($time); ?>,
        datasets: [{
          label: 'ค่า Sensor1',
          data: <?php echo json_encode($value1); ?>,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    // กราฟ Sensor2
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($time); ?>,
        datasets: [{
          label: 'ค่า Sensor2',
          data: <?php echo json_encode($value2); ?>,
          backgroundColor: 'rgba(0, 99, 132, 0.2)',
          borderColor: 'rgba(0, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>
