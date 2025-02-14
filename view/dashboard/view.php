<?php
include 'config/connection.php';

// Ambil total member
$query_members = mysqli_query($conn, "SELECT COUNT(*) AS total_member FROM members");
$data_members = mysqli_fetch_assoc($query_members);

// Ambil total books
$query_books = mysqli_query($conn, "SELECT COUNT(*) AS total_books FROM books");
$data_books = mysqli_fetch_assoc($query_books);

// Ambil total loans
$query_loans = mysqli_query($conn, "SELECT SUM(CAST(fine AS DECIMAL(10,2))) AS total_fine FROM loans");
$data_loans = mysqli_fetch_assoc($query_loans);
?>

<!-- Tambahkan FontAwesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
  .card-custom {
    border-radius: 12px;
    transition: 0.3s;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }
  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
  }
  .stats-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    color: white;
  }
  .purple { background-color: #6f42c1; }
  .blue { background-color: #007bff; }
  .red { background-color: #dc3545; }
</style>

<div class="page-heading mb-4">
  <h3>📊 Dashboard Overview</h3>
  <p class="text-muted">Statistik terbaru dari sistem perpustakaan</p>
</div>

<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-9">
      <div class="row">
        
        <!-- Members Total -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card card-custom">
            <div class="card-body d-flex align-items-center">
              <div class="stats-icon purple me-3">
                <i class="fas fa-users fa-lg"></i>
              </div>
              <div>
                <h6 class="text-muted">Total Members</h6>
                <h5 class="fw-bold"><?= number_format($data_members['total_member']) ?></h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Books Total -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card card-custom">
            <div class="card-body d-flex align-items-center">
              <div class="stats-icon blue me-3">
                <i class="fas fa-book fa-lg"></i>
              </div>
              <div>
                <h6 class="text-muted">Total Books</h6>
                <h5 class="fw-bold"><?= number_format($data_books['total_books']) ?></h5>
              </div>
            </div>
          </div>
        </div>

        <!-- Loans Total -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card card-custom">
            <div class="card-body d-flex align-items-center">
              <div class="stats-icon red me-3">
                <i class="fas fa-hand-holding-usd fa-lg"></i>
              </div>
              <div>
                <h6 class="text-muted">Total Fines</h6>
                <h5 class="fw-bold">Rp <?= number_format($data_loans['total_fine'], 0, ',', '.') ?></h5>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
