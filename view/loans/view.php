<?php
include 'config/connection.php';

$query = mysqli_query($conn, "SELECT * FROM loans");
?>

<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-6 col-md-12 col-12">
            <h3>Data Loans</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=loans-create" class="btn btn-primary float-end"> Add Data</a>
        </div>
    </section>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Loan Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Fine</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php if ($query->num_rows > 0) : ?>
                                <?php $i = 1;
                                while ($data = mysqli_fetch_assoc($query)) :?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['title'] ?></td>
                                        <td><?= $data['loan_date'] ?></td>
                                        <td><?= $data['return_date'] ?></td>
                                        <td>Rp <?= number_format($data['fine'], 0, ',', '.') ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?page=loans-update&loans_id=<?= $data['loans_id']?>" onclick="showColorPicker(event)">Edit</a>
                                            <a class=" btn btn-danger btn-sm" href="index.php?page=loans-delete&loans_id=<?= $data['loans_id'] ?>" onclick="confirmModal(event);">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function confirmModal(e) {
        e.preventDefault();
        const link = e.currentTarget.getAttribute('href');

        Swal.fire({
            title: "Are you sure?",
            text: "This action will permanently delete the data!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        });


    }
</script>