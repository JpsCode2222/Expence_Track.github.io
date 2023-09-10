<?php
include('navbar.php');
?>
<div class="pagetitle">
      <h1>All History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">All History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Edit</th>
                    <th scope="col">Seq</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">More</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($conn,"SELECT * FROM expence ORDER BY expence_id DESC");
                  $i = 1;
                  foreach($res as $key => $row){
                    if($row['vendor_name'] != ""){
                    ?>
                    <tr>
                    <th scope="col">
                    <a href="edit_expence.php?id=<?=$row['expence_id']?>"><i class="bi bi-vector-pen text-success"></i></a>
                    <a href="delete_expence.php?id=<?=$row['expence_id']?>"><i class="bi bi-trash text-danger"></i></a>
                    </th>
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

        </div>
      </div>
    </section>
<?php
include('footer.php');
?>