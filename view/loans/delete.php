<?php
include 'config/connection.php';

$id = isset($_GET['loans_id']) ? $_GET['loans_id'] : '';

$query = mysqli_query($conn, "DELETE FROM loans WHERE loans_id = '$id'");
?>

<script>
    Swal.fire({
        title: "Success!",
        text: "The data has been successfully deleted.",
        icon: "success"

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?page=loans';
        }
    });
</script>