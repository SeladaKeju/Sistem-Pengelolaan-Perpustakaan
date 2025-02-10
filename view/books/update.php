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
            <h3>Update Books</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=books" class="btn btn-primary">Back</a>
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
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?= $data['title'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="<?= $data['author'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher" value="<?= $data['publisher'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" class="form-control" id="year" placeholder="Year" name="year" value="<?= $data['year'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="form-label">Page</label>
                            <input type="text" class="form-control" id="page" placeholder="page" name="page" value="<?= $data['page'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="" selected>Choose Status</option>
                                <option value="available">Available</option>
                                <option value="inactive">Not Available</option>
                            </select>
                        </div>    
                            <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>