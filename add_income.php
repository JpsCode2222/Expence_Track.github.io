<?php
include('navbar.php');
?>
<div class="pagetitle">
      <h1>Add Income</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Income</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-12">
            <!-- Floating Labels Form -->
            <form Method="POST" action="save_income.php" class="row g-3">
                <div class="col-5">
                  <div class="form-floating">
                    <input type="text" name="amount" class="form-control" id="floatingAmount" placeholder="Amount">
                    <label for="floatingAmount">Amount</label>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-floating">
                    <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" id="floatingDate" placeholder="Date">
                    <label for="floatingDate">Date</label>
                  </div>
                </div>
                <div class="col-10">
                <div class="text-center">
                  <button type="submit" onclick="confirm('are you sure')" class="btn btn-primary">Add</button>
                </div>
                </div>
              </form><!-- End floating Labels Form -->
        </div>
      </div>
    </section>
<?php
include('footer.php');
?>