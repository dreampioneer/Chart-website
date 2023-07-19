<?php
if($_SESSION['auth_result'] != "true") {
        Redirect('./login.php');
    }
 $name2 =pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);
 $mysql =new MySQL();
 $mysql->init_conn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo ucfirst($name2); ?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">-->
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link href="../assets/css/datatables.min.css" rel="stylesheet">
  <link href="../assets/css/jquery-ui.min.css" rel="stylesheet">
  <link href="../assets/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css' rel='stylesheet' />

    <link href="../assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="../assets/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.datetimepicker.min.css"/>

  <style>
    .form-control { padding-left: 10px; }
    button.btn.btn-primary.toglbtn.active {
    color: #ffffff;
    background-color: #0c7cd5;
    border-color: #0b75c9;
    }

    .fa-pencil-alt{
    cursor: pointer;
    }
    .other-btns {
    position: absolute !important;
    right: 50px;
}
    button.btn.btn-secondary {
    color: #fff;
    background-color: #9c27b0;
    border-color: #9c27b0;
    box-shadow: 0 2px 2px 0 rgb(156 39 176 / 14%), 0 3px 1px -2px rgb(156 39 176 / 20%), 0 1px 5px 0 rgb(156 39 176 / 12%);
    }
    button.btn.btn-secondary span {
    color: #fff;

    }
    .btn-group button {
      margin-left: 5px !important;
    }
    .btn-group button:hover {
    background: #0c7cd5 !important;
}
  </style>

</head>
