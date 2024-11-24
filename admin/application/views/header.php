<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      body {
        margin: 0;
        display: flex;
        min-height: 100vh;
        background-color: #f0f8f0; 
      }

      .sidebar {
        width: 250px;
        background-color: #93d56b; 
        color: #fff;
        flex-shrink: 0;
        height: 100vh;
        position: sticky;
        top: 0;
        padding: 15px;
      }

      .sidebar .nav-link {
        color: #fff; 
        padding: 10px 15px;
        text-decoration: none;
        border-bottom: 1px solid #fff; 
        display: block;
      }

      .sidebar .nav-link:hover {
        background-color: #76b85c;
        color: #fff;
      }

      .sidebar .nav-link.active {
        background-color: #519f3a; 
        color: #fff;
      }

      .content {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
        overflow-y: auto;
      }

    
      footer {
        background-color: #93d56b; 
        color: white;
        text-align: center;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <h4 class="text-center mb-3">KuKos</h4>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?php echo base_url("home") ?>" class="nav-link active">Home</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url("slider") ?>" class="nav-link">Slider</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url("member") ?>" class="nav-link">Member</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url("akun") ?>" class="nav-link">
            <?php echo $this->session->userdata("nama") ?>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
        </li>
      </ul>
    </div>

   