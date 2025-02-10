<?php

include "config/connection.php";
$query = mysqli_query($conn, "SELECT * FROM members");


?>

<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-6 col-md-12 col-12">
            <h3>Data Members</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=members-create" class="btn btn-primary float-end"> Add Member</a>
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
                                    <th scope="col">NIK</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                                <?php if ($query->num_rows > 0) : ?>
                                    <?php $i = 1;
                                    while ($data = mysqli_fetch_assoc($query)) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['nik'] ?></td>
                                            <td><?= $data['address'] ?></td>
                                            <td><?= $data['phone'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="index.php?page=members-update&members_id=<?= $data['members_id'] ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm" href="index.php?page=members-delete&members_id=<?= $data['members_id'] ?>" onclick="confirmModal(event);">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                                <?php endif ?>
                            </tbody>
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


