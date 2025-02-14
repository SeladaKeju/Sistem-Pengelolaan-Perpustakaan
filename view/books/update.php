<?php
include 'config/connection.php';
$message = "";
$isTrue = null;

if(isset($_GET['books_id'])) {
    $id = $_GET['books_id'];
    $query = mysqli_query($conn, "SELECT * FROM books WHERE books_id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $year = $_POST['year'];
        $page = $_POST['page'];
        $status = $_POST['status'];

        if(empty($title) || empty($author) || empty($publisher) || empty($year) || empty($page) || empty($status)) {
            $isTrue = false;
        } else {
            $query = mysqli_query($conn, "UPDATE books SET title = '$title', author = '$author', publisher = '$publisher', year = '$year', page = '$page', status = '$status' WHERE books_id = '$id'");

            if($query == TRUE) {
                $message = "Successfully updated data.";
                $isTrue = TRUE;
                echo "
                    <script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'The data has been successfully updated.',
                            icon: 'success'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location.href = 'index.php?page=books';
                            }
                        });
                    </script>";
            } else {
                $message = "Updating the data failed.";
                $isTrue = FALSE;
            }
        }
    }
}

?>
<div class="page-heading">
    <section class="row align-items-center">
        <div class="lg-12 col-md-12 col-12 mb-4">
            <h3>Update Book</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=books" class="btn btn-outline-primary">Back</a>
        </div>
    </section>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Book Title" name="title" value="<?= $data['title'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" placeholder="Enter Author's Name" name="author" value="<?= $data['author'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" placeholder="Enter Publisher Name" name="publisher" value="<?= $data['publisher'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" placeholder="Enter Year" name="year" value="<?= $data['year'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="form-label">Page Count</label>
                            <input type="number" class="form-control" id="page" placeholder="Enter Number of Pages" name="page" value="<?= $data['page'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="available" <?= $data['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                                <option value="inactive" <?= $data['status'] == 'inactive' ? 'selected' : '' ?>>Not Available</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* General styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
    }

    .page-heading h3 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    /* Button Style */
    .btn-outline-primary {
        color: #007bff;
        border: 1px solid #007bff;
        padding: 8px 20px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
    }

    .form-select {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: scale(1.05);
    }

    .mt-4 {
        margin-top: 20px;
    }
</style>
