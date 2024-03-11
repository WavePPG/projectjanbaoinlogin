<?php

// Include connect.php
include "connect.php";

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT DATE_FORMAT(reading_time, '%H:%i:%s') AS time, value1, value2 ,value3 FROM SensorData ORDER BY id DESC LIMIT 15";
$result = mysqli_query($conn, $sql);

// เตรียมข้อมูลสำหรับกราฟ
$time = array();
$value1 = array();
$value2 = array();
$value3 = array();
while ($row = mysqli_fetch_assoc($result)) {
  $time[] = $row["time"];
  $value1[] = $row["value1"];
  $value2[] = $row["value2"];
  $value3[] = $row["value3"];
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);
// ประมวลผลหาค่าเฉลี่ย

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <link id="pagestyle" href="dashboard.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>

<style>
  html, body {
  overflow-x: hidden; /* ป้องกันการเลื่อนซ้ายขวาในทิศทางแนวนอน */
  overflow-y: auto; /* อนุญาตให้เลื่อนแนวตั้ง */
}
</style>

<body class="g-sidenav-show  bg-gray-200">
<?php include "nav.php"?>
<div class="row">
<div class="col-lg-6 mt-4 mb-3">
  <div class="card z-index-2">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
      <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
        <div class="chart">
          <canvas id="chart-line-tasks2" class="chart-canvas" style="width: 100%; height: 300px;"></canvas>
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
        <div class="table-responsive" style="height: 300px; overflow-y: auto;">
          <table class="table table-flush align-middle mb-0">
            <thead class="thead-light ">
              <tr>
                <th scope="col" style="color: white;">Time</th>
                <th scope="col" style="color: white;">Temperature</th>
                <th scope="col" style="color: white;">Moisture</th>
                <th scope="col" style="color: white;">Distance</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < count($time); $i++) { ?>
                <tr>
                  <td style="color: white;"><?php echo $time[$i]; ?></td>
                  <td style="text-align: center; color: white;"><?php echo $value1[$i]; ?></td>
                  <td style="text-align: center; color: white;"><?php echo $value2[$i]; ?></td>
                  <td style="text-align: center; color: white;"><?php echo $value3[$i]; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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
</div>

  </div>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                <h4 class="mb-0">$53k</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                <h4 class="mb-0">2,300</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0">$103,430</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
      </div>




      

      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Daily Sales </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Completed Tasks</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Chart scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "line",
    data: {
      labels: <?php echo json_encode($time); ?>,
      datasets: [{
        label: "Temperature",
        data: <?php echo json_encode($value1); ?>, // Your data here
        backgroundColor: "rgba(255, 255, 255, .8)",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 1
      }]
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

  var ctx2 = document.getElementById("chart-line").getContext("2d");

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: <?php echo json_encode($time); ?>,
      datasets: [{
        label: "Moisture",
        data: <?php echo json_encode($value2); ?>, // Your data here
        backgroundColor: "rgba(255, 255, 255, .8)",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 1
      }]
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

  var ctx2 = document.getElementById("chart-line-tasks").getContext("2d");

new Chart(ctx2, {
  type: "line",
  data: {
    labels: <?php echo json_encode($time); ?>,
    datasets: [{
      label: "distance",
      data: <?php echo json_encode($value3); ?>, // Your data here
      backgroundColor: "rgba(255, 255, 255, .8)",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 1
    }]
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
<script>
const ctx = document.getElementById("chart-line-tasks3").getContext("2d");

const myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Value 1", "Value 2", "Value 3"],
    datasets: [
      {
        label: "Latest Date",
        data: <?php echo json_encode([$average_value1[end(array_keys($average_value1))], $average_value2[end(array_keys($average_value2))], $average_value3[end(array_keys($average_value3))]]) ?>,
        backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)"],
        borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(75, 192, 192, 1)"],
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
<script>
    // เตรียมข้อมูลสำหรับกราฟ
    var time = <?php echo json_encode($time); ?>;
    var value1 = <?php echo json_encode($value1); ?>;
    var value2 = <?php echo json_encode($value2); ?>;
    var value3 = <?php echo json_encode($value3); ?>;

    // สร้างกราฟด้วย Chart.js
    var ctx = document.getElementById('chart-line-tasks2').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: time,
        datasets: [{
          label: 'Temperature',
          data: value1,
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        },
        {
          label: 'Moisture',
          data: value2,
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'distance',
          data: value3,
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
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
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->

</html>