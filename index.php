<?php
include('navbar.php');
?>
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-lg-3 col-md-4 col-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="monthly_expence.php">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Expence <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $amt = 00;
                      $date = date('Y-m-d');
                      $total=mysqli_query($conn,"SELECT * FROM expence WHERE expence_date = '$date'");
                      foreach($total as $row){
                        $amt = $amt + $row['amount'];
                      }
                      ?>
                      <h6><?=$amt?>.00</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- Sales Card -->
             <div class="col-lg-3 col-md-4 col-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                <a href="add_expence.php">
                  <h5 class="card-title">Add Expence</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="text-danger bi bi-plus-circle-fill"></i>
                     
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-lg-3 col-md-4 col-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                <a href="add_income.php">
                  <h5 class="card-title">Add Income</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" text-success bi bi-plus-circle-fill"></i>
                     
                    </div>
                  </div>
                </a>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Expences <span>| Today</span></h5>

                   <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Seq</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">More</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($conn,"SELECT * FROM expence ORDER BY expence_id DESC LIMIT 5 ");
                  $i = 1;
                  foreach($res as $key => $row){
                    if($row['vendor_name'] != ""){
                    ?>
                    <tr>
                    <th scope="row">
                        <?=$i?>
                    </th>
                    <td><?=$row['vendor_name']?></td>
                    <td><?=$row['amount']?>&#8377</td>
                    <td><?=$row['expence_date']?></td>
                    <td>
                    <!-- Vertically centered Modal -->
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['expence_id']?>">
                        View
                      </button>
                      <div class="modal fade" id="<?=$row['expence_id']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <?php
                              ?>
                              <h5 class="modal-title"><?=$row['expence_date']?> | <?=$row['expence_time']?>  </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <h3><?=$row['vendor_name']?> -: <span class="text-danger"><?=$row['amount']?>&#8377</span></h3>
                            <?=$row['details']?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div><!-- End Vertically centered Modal-->
                    </td>
                    </tr>
                    <?php
                    $i++;
                    }
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
    <?php
    include('footer.php');
    ?>

  