<?php
include('navbar.php');
?>
<div class="pagetitle">
      <h1>Monthly Expence</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Monthly Expence</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table  datatable">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Seq</th>
                    <th scope="col">Month</th>
                    <th scope="col">Expence</th>
                    <th scope="col">Income</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res = mysqli_query($conn,"SELECT SUM(income_amount) as income , YEAR(expence_date) as myear, MONTHNAME(expence_date) as mname,SUM(amount) as total FROM expence GROUP BY MONTHNAME(expence_date)");
                  foreach($res as $key => $row){
                    ?>
                    <tr>
                    <th scope="row">
                        <?=$key+1?>
                    </th>
                    <td><?=$row['mname']?> <?=$row['myear']?></td>
                    <td><h6 class="text-danger h5"><?=$row['total']?> &#8377</h6></td>
                    <td><h6 class="text-success h5"><?=$row['income']?> &#8377</h6></td>
                    </tr>
                    <?php
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