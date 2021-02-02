<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Completed Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('build/404/') ?>style.css">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>vendors/fontawesome5/css/all.min.css" rel="stylesheet">  
    <style>
        body{
            background-color: #ffffff;
        }
        a.more-link{
            background-color: transparent;
            font-size: 16px;
        }
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<br><br>
<h1>You Completed login</h1>
<p class="zoom-area">You can Logout or next. <br><i><?=$this->session->userdata('username')?></i></p>
<section class="error-container">
  <span>-</span>
  <span><span class="screen-reader-text"></span></span>
  <span>-</span>
</section>
<div class="link-container">
  <a href="<?= base_url('auth/logout') ?>" class="more-link"><i class="fa fa-arrow-left"></i> Logout</a>
  <a href="<?= base_url('auth/page') ?>" class="more-link">Go Page <i class="fa fa-arrow-right"></i> </a>
</div>
<!-- partial -->
  
</body>
</html>
