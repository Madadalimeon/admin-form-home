<?php
include("./include/header.php");
include("./config/config.php");
include("./Backend/delete.php");
?>
<a href="department_add.php" class="btn btn-danger text-white offset-11 ">Employees Department</a>
<div class="container-fluid ">
  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Employees Department table</h5>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <?php
                $dem_employees = "SELECT dempartment_id, dempartment_name FROM dempartment";
                $print_data = $conn->query($dem_employees);
                ?>
                <tr>
                  <th>ID</th>
                  <th>department</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($print_data->num_rows > 0) {
                  while ($row = $print_data->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $row['dempartment_id']; ?></td>
                      <td><?php echo $row['dempartment_name']; ?></td>
                      <td>

                        <a href="./department_updata.php?id=<?php echo $row['dempartment_id']; ?>">
                          <i class="fa-solid fa-pen"></i>
                        </a>


                        <a href="./department/department_Delete.php?id=<?php echo $row['dempartment_id']; ?>">
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