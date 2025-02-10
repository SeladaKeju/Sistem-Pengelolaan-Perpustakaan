<?php
include 'config/connection.php';

$id = isset($_GET['books_id']) ? $_GET['books_id'] : '';

$query = mysqli_query($conn, "DELETE FROM books WHERE books_id = '$id'");
?>

<script>
    Swal.fire({
        title: "Success!",
        text: "The data has been successfully deleted.",
        icon: "success"

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?page=books';
        }
    });
</script>