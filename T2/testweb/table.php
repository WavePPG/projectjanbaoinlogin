<?php

// Include connect.php
include "connect.php";

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT DATE_FORMAT(reading_time, '%Y-%m-%d') AS date, value1, value2 ,value3 FROM SensorData ORDER BY id DESC LIMIT 15";
$result = mysqli_query($conn, $sql);

// เตรียมข้อมูลสำหรับกราฟ
$date = array();
$value1 = array();
$value2 = array();
$value3 = array();
while ($row = mysqli_fetch_assoc($result)) {
  $date[] = $row["date"];
  $value1[] = $row["value1"];
  $value2[] = $row["value2"];
  $value3[] = $row["value3"];
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);

// ประมวลผลหาค่าเฉลี่ย
$date_array = array();
$average_value1 = array();
$average_value2 = array();
$average_value3 = array();

for ($i = 0; $i < count($date); $i++) {
  $date_key = $date[$i];
  if (!isset($date_array[$date_key])) {
    $date_array[$date_key] = 0;
    $average_value1[$date_key] = 0;
    $average_value2[$date_key] = 0;
    $average_value3[$date_key] = 0;
  }

  $date_array[$date_key]++;
  $average_value1[$date_key] += $value1[$i];
  $average_value2[$date_key] += $value2[$i];
  $average_value3[$date_key] += $value3[$i];
}

foreach ($date_array as $date => $count) {
  $average_value1[$date] /= $count;
  $average_value2[$date] /= $count;
  $average_value3[$date] /= $count;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barchart แสดงค่าเฉลี่ย</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
</head>
<style>
  
</style> 
<body>
<?php include "nav.php"?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 mt-4 mb-3 ">
      <div class="card z-index-2">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-line-tasks3" class="chart-canvas" style="width: 100%; height: 300px;"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0">Completed Tasks</h6>
          <p class="text-sm">Last Campaign Performance</p>
          <hr class="dark horizontal">
          <div class="d-flex">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm">just updated</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mt-4 mb-3">
    <div class="card z-index-2">
  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
      <div class="table-responsive">
        <table class="table table-flush align-middle mb-0">
          <thead class="thead-light">
            <tr>
              <th style="color: white;" scope="col">Date</th>
              <th style="color: white;" scope="col">Temperature</th>
              <th style="color: white;" scope="col">Moisture</th>
              <th style="color: white;" scope="col">Distance</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // เริ่มต้นตัวนับที่ 0
            $count = 0;
            // วนลูปเฉพาะ 5 วันล่าสุด
            foreach (array_slice($date_array, 0, 7, true) as $date => $count) {
            ?>
              <tr>
                <td style="color: white;"><?php echo $date; ?></td>
                <td style="text-align: center; color: white;"><?php echo round($average_value1[$date], 2); ?></td>
                <td style="text-align: center; color: white;"><?php echo round($average_value2[$date], 2); ?></td>
                <td style="text-align: center; color: white;"><?php echo round($average_value3[$date], 2); ?></td>
              </tr>
            <?php
              // เพิ่มค่าตัวนับ
              $count++;
            }
            ?>
          </tbody>
        </table>
      </div>
      
    </div>
    <div class="card-body">
      <h6 class="mb-0">Completed Tasks</h6>
      <p class="text-sm">Last Campaign Performance</p>

  </div>
  </div>
</div>
</div>

</div>
</body>
</html>

<script>
const ctx = document.getElementById("chart-line-tasks3").getContext("2d");

const myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      <?php 
        // วนลูปเพื่อแสดงวันที่
        foreach ($date_array as $date => $count) {
          echo "'".date('Y-m-d', strtotime($date))."', ";
        }
      ?>
    ],
    datasets: [
      {
        label: "Temperature",
        data: <?php echo json_encode(array_values($average_value1)) ?>,
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1
      },
      {
        label: "Moisture",
        data: <?php echo json_encode(array_values($average_value2)) ?>,
        backgroundColor: "rgba(54, 162, 235, 0.2)",
        borderColor: "rgba(54, 162, 235, 1)",
        borderWidth: 1
      },
      {
        label: "Distance",
        data: <?php echo json_encode(array_values($average_value3)) ?>,
        backgroundColor: "rgba(255, 206, 86, 0.2)",
        borderColor: "rgba(255, 206, 86, 1)",
        borderWidth: 1
      },
    ],
  },
  options: {
    scales: {
      x: {
        ticks: {
          color: 'white' // เปลี่ยนสีของตัวหนังสือบนแกน x เป็นสีขาว
        }
      },
      y: {
        beginAtZero: true,
        ticks: {
          color: 'white' // เปลี่ยนสีของตัวเลขบนแกน Y เป็นสีขาว
        }
      }
    },
    
    plugins: {
      legend: {
        labels: {
          color: 'white' // เปลี่ยนสีของตัวหนังสือใน legend เป็นสีขาว
        }
      }
    }
  }
});
</script>
</body>
</html>
