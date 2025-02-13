<?php
include 'config/connection.php';
$message = "";
$isTrue = null;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $loan_date = $_POST['loan_date'];
    $return_date = $_POST['return_date'];
    $fine = $_POST['fine'];

    if (empty($name) || empty($title) || empty($loan_date) || empty($return_date) || empty($fine)) {
        $isTrue = false;
    } else {
        $query = mysqli_query($conn, "INSERT INTO loans (name, title, loan_date, return_date, fine) VALUES ('$name', '$title', '$loan_date', '$return_date', '$fine')");

        if ($query == TRUE) {
            $message = "Successfully updated status.";
            $isTrue = TRUE;
            echo "
                    <script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'The status has been successfully updated.',
                            icon: 'success'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location.href = 'index.php?page=loans';
                            }
                        });
                    </script>";
        } else {
            $message = "Updating the status failed.";
            $isTrue = FALSE;
        }
    }
}
?>

<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-12 col-md-12 col-12 mb-4">
            <h3>Add Data</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=loans" class="btn btn-primary">Back</a>
        </div>
    </section>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="loan_date" class="form-label">Loan Date</label>
                            <input type="date" class="form-control" id="loan_date" placeholder="Loan Date" name="loan_date">
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Return Date</label>
                            <input type="date" class="form-control" id="year" placeholder="Return Date" name="return_date">
                        </div>
                        <div class="mb-3">
                            <label for="fine" class="form-label">Fine</label>
                            <input type="text" class="form-control" id="fine" placeholder="Fine" name="fine">
                        </div>
                            <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>