<?php
    include 'config/connection.php';
    $query = mysqli_query($conn, "SELECT * FROM books");

?>


<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-6 col-md-12 col-12">
            <h3>List Book</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=books-create" class="btn btn-primary float-end"> Add Books</a>
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Page</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php if ($query->num_rows > 0) : ?>
                                <?php $i = 1;
                                while ($data = mysqli_fetch_assoc($query)) : ?>
                                    <tr>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $data['title'] ?></td>
                                        <td><?= $data['author'] ?></td>
                                        <td><?= $data['publisher'] ?></td>
                                        <td><?= $data['year'] ?></td>
                                        <td><?= $data['page'] ?></td>
                                        <td>
                                            <?php if ($data['status']) : ?>
                                                <span class="badge bg-success">Available</span>
                                            <?php else : ?>
                                                <span class="badge bg-danger">Not Available</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?page=books-update&books_id=<?= $data['books_id'] ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="index.php?page=books-delete&books_id=<?= $data['books_id'] ?>" onclick="confirmModal(event);">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endif ?>
                            <tbody>
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