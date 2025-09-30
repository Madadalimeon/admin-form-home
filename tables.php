<?php
include("./include/header.php");
include("./config/config.php");
include("./Backend/delete.php");
?>
<a href="add_Employees.php" class="btn btn-danger text-white offset-11 ">Add Employees</a>
<div class="container-fluid ">
  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Employees Table</h5>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <?php
                // get a value from mysql database to show in table
                $sql_employees = "SELECT employees_id, first_name,last_name,email,mobile_no,dob,date_of_joining,position FROM employees";
                $print_data = $conn->query($sql_employees);
                ?>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>DOB</th>                  
                  <th>Position</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($print_data->num_rows > 0) {
                  while ($row = $print_data->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $row['employees_id']; ?></td>
                      <td><?php echo $row['first_name']; echo $row['last_name']; ?></td>                     
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['mobile_no']; ?></td>
                      <td><?php echo $row['dob']; ?></td>                      
                      <td><?php echo $row['position']; ?></td>
                      <td>

                        <a href="updata.php?id=<?php echo $row['employees_id']; ?>">
                          <i class="fa-solid fa-pen"></i>
                        </a>


                        <a href="./Backend/delete.php?id=<?php echo $row['employees_id']; ?>">
                          <i class="fa-solid fa-trash "></i>
                        </a>
                      </td>

                    </tr>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='15' class='text-center'>No employees found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->

</div>
<!-- End container-fluid-->

</div><!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
<?php
include("./include/footer.php")
?>