<?php
include('includes/header.php'); 
session_start();
include('includes/navbar.php'); 
include('includes/scripts.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/cd.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Project description </label>
                <input type="text" name="description" class="form-control" placeholder="Enter project description">
            </div>
            <div class="form-group">
                <label>Starting time</label>
                <input type="date" name="start" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Ending time</label>
                <input type="date" name="end" class="form-control" placeholder=" ">
            </div>
            <div class="form-group">
                <label>Executor</label>
                <select name="executor" id="" class="form-control" placeholder="executor">
                    <?php
                      $inc = "SELECT * FROM t_user ORDER BY U_names ASC";
                      $ex = mysqli_query(mysqli_connect("localhost", "root", "", "civictech"), $inc);
                      if($ex)
                      {
                        while($raum = mysqli_fetch_array($ex))
                        {

                        
                        echo("<option value=". $raum['U_id'].">".$raum['U_names']."</option>" );
                        }
                      }
                      else
                      {
                        ?>
                        <option value="null" disabled>Null</option>
                        <?php
                      }
                    ?>
                </select>
                
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">System Projects
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New Projects
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Des ription</th>
            <th> Start Date </th>
            <th>End Date </th>
            
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
              <?php
                $sq = "SELECT * FROM t_project";
                $sql = mysqli_query(mysqli_connect("localhost","root","","civicTech"), $sq);
                if($sql){
                  while ($rr = mysqli_fetch_array($sql)) {
                    # code...
                    //echo("salut");
                  
                  

                 
              ?>
          <tr>
            <td> <?php echo($rr['pro_id']);
              $dr = $rr['pro_id'];?> </td>
            <td>  <?php echo($rr['pro_description']);?> </td>
            <td>  <?php echo($rr['pro_startdate']);?> </td>
            <td>  <?php echo($rr['pro_endate']);?> </td>
           
            <td>
              
                <form action="includes/edit.php?id=<?php echo($va)?>" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
           
            <td>
                <form action="includes/deleteproj.php?ig=<?php echo($dr)?>" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
           

          </tr>
          <?php
          // 
            }
                      
          }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>