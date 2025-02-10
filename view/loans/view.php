<?php
include 'config/connection.php';

$query = mysqli_query($conn, "SELECT * FROM loans");

if(isset($_GET['loans_id'])) {
    $id = $_GET['loans_id'];

    if(isset($_POST['submit'])) {
        $returned = $_POST['returned'];

        if(!empty($returned)) {
            $query = mysqli_query($conn, "UPDATE loans SET returned = '$returned' WHERE loans_id = '$id'");
        }
    }
}

?>

<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-6 col-md-12 col-12">
            <h3>Data Loans</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="#" class="btn btn-primary float-end"> Add Data</a>
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
                                    <th scope="col">Returned</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php if ($query->num_rows > 0) : ?>
                                <?php $i = 1;
                                while ($data = mysqli_fetch_assoc($query)) :
                                    $bookQuery = mysqli_query($conn, "SELECT title FROM books WHERE books_id = " . $data['book_id']);
                                    $book = mysqli_fetch_assoc($bookQuery);
                                    $memberQuery = mysqli_query($conn, "SELECT name FROM members WHERE members_id = " . $data['member_id']);
                                    $member = mysqli_fetch_assoc($memberQuery);
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $member['name'] ?></td>
                                        <td><?= $book['title'] ?></td>
                                        <td><?= $data['loan_date'] ?></td>
                                        <td><?= $data['return_date'] ?></td>
                                        <td>Rp <?= $data['fine'] ?></td>
                                        <td>
                                            <?php if ($data['returned']) : ?>
                                                <span class="badge bg-success">Returned!</span>
                                            <?php else : ?>
                                                <span class="badge bg-danger">Not Returned Yet</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?page=loans&loans_id=<?= $data['loans_id']?>" onclick="showColorPicker(event)">Edit</a>
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

<script>
        async function showColorPicker(event) {
            event.preventDefault(); // Mencegah link berpindah halaman

            const inputOptions = new Promise((resolve) => {
                setTimeout(() => {
                    resolve({
                        "yes": "Returned!",
                        "no": "Not Returned Yet!"
                    });
                }, 1000);
            });

            const { value: color } = await Swal.fire({
                title: "Select Status",
                input: "radio",
                inputOptions,
                inputValidator: (value) => {
                    if (!value) {
                        return "You need to choose something!";
                    }
                }
            });

            if (color) {
                Swal.fire({
                    html: `You selected: $returned`
                });
            }
        }
    </script>