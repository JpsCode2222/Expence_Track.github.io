<?php
include('conn.php');
extract($_GET);
$res=mysqli_query($conn,"SELECT * FROM expence WHERE expence_id = $id");
$data = mysqli_fetch_assoc($res);
include('navbar.php');
?>
<div class="pagetitle">
      <h1>Edit Expence</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Expence</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-12">
            <!-- Floating Labels Form -->
            <form Method="POST" action="save_expence.php" class="row g-3">
                <div class="col-5">
                  <div class="form-floating">
                    <input type="text" name="amount" value="<?=$data['amount']?>" class="form-control" id="floatingAmount" placeholder="Amount">
                    <label for="floatingAmount">Amount</label>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-floating">
                    <input type="date" name="date" value="<?=$data['expence_date']?>" class="form-control" id="floatingDate" placeholder="Date">
                    <label for="floatingDate">Date</label>
                  </div>
                </div>
                <div class="col-10">
                  <div class="form-floating">
                    <input type="text" name="vendor" value="<?=$data['vendor_name']?>" class="form-control" id="floatingVender" placeholder="Vendor Name">
                    <input type="hidden" name="exp_id" value="<?=$data['expence_id']?>">
                    <label for="floatingVender">Vendor Name</label>
                  </div>
                </div>
                <div class="col-10">
                  <div class="form-floating">
                    <textarea class="form-control" name="details" placeholder="Details" id="floatingTextarea" style="height: 100px;"><?=$data['details']?></textarea>
                    <label for="floatingTextarea">Details</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" onclick="confirm('Are you sure!')" class="btn btn-primary">Update</button>
                </div>
              </form><!-- End floating Labels Form -->
        </div>
      </div>
    </section>
<?php
include('footer.php');
?>