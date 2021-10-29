
<?php
include('includes/header.php'); 
//include('../includes/head.php'); 
include('includes/navbar.php'); 
include_once('includes/scripts.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="tables.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php  
                      $vqr = "SELECT COUNT(U_id)'Count' FROM T_user";
                      sql($vqr);
                      if(sql($vqr))
                      {
                        $row = mysqli_fetch_array(sql($vqr));
                        echo("<h4> ".$row['Count']. " </h4>");

                      }



                     ?>
               

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Admin Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                  $svqr = "SELECT COUNT('L_id')'admin' FROM t_login WHERE UT_id= 6 ";
                  sql($svqr);
                  if(sql($svqr))
                  {
                      $r = mysqli_fetch_array(sql($svqr));
                      echo($r['admin']);
                  }
                  else
                  {
                    echo("0");
                  }
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Projects </div>
              <div class="row no-gutters align-items-center">
                  <?php
                      $v = "SELECT count(Pro_id)'id' FROM t_project";
                      $wql = sql($v);
                      if(sql($v))
                      {
                        $ro = mysqli_fetch_array(sql($v));
                        echo("<div class='col-auto'><div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'>".$ro['id']."</div> </div>");
                      }
                  ?>
                
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Expenses </div>
              <?php 
                $e = "SELECT SUM(Exp_amount)'sum' from t_expense";
                sql($e);
                if(sql($e))
                {
                  $rr = mysqli_fetch_array(sql($e));
                  if(!empty($rr) && $rr != '')
                  {

                  
                ?>

              <div class="h5 mb-0 font-weight-bold text-gray-800">Rwf <?php echo("". $rr['sum']);?> </div>
              <?php
                }else
                {
                  echo("no expenses Yet");
                }}?>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollars fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
//include('../css/main.min.css');
//include('../includes/footer.php');
include('includes/footer.php');
?>