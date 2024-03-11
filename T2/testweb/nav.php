<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="dashboard.css" rel="stylesheet" />
</head>
<style>
  .navbar-nav a.active {
    color: #ffffff; /* สีของตัวหนังสือเมื่อเมนูถูกเลือก */
    background-color: #FF3399; /* สีพื้นหลังของเมนูเมื่อถูกเลือก */
  }
</style>

<body class="g-sidenav-show bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="ll.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Auto Surway Car</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="virtual-reality.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="rtl.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="notifications.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="sign-in.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="sign-up.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    <script>
  // เมื่อเว็บโหลดเสร็จสิ้น
  window.addEventListener('DOMContentLoaded', (event) => {
    var currentLocation = window.location.href; // ดึง URL ปัจจุบัน

    // เลือกลิงก์ทั้งหมดภายใน Navbar
    var navLinks = document.querySelectorAll('.navbar-nav a');

    // วนลูปผ่านทุกลิงก์
    navLinks.forEach(function(navLink) {
      // ถ้า href ของลิงก์เท่ากับ URL ปัจจุบัน
      if (navLink.href === currentLocation) {
        navLink.style.color = '#ffffff'; // เปลี่ยนสีของตัวหนังสือเป็นสีขาว
        navLink.style.backgroundColor = '#FF0099'; // เปลี่ยนสีพื้นหลังของลิงก์เป็นสีชมพู
      }

      // เพิ่มอีเวนต์คลิก
      navLink.addEventListener('click', function(event) {
        // กำหนดให้ทุกลิงก์ใน Navbar ไม่มีการเปลี่ยนสีก่อนที่จะเปลี่ยนสีของลิงก์ที่ถูกคลิก
        navLinks.forEach(function(link) {
          link.style.color = ''; // เปลี่ยนสีของตัวหนังสือเป็นสีดำ (ค่า default)
          link.style.backgroundColor = ''; // เปลี่ยนสีพื้นหลังของลิงก์กลับเป็นสีโปร่งใส (ค่า default)
        });
      });
    });
  });
</script>




  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        </nav>
