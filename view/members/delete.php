<?php
include 'config/connection.php';

$id = isset($_GET['members_id']) ? $_GET['members_id'] : '';

$query = mysqli_query($conn, "DELETE FROM members WHERE members_id = '$id'");
?>

<script>
    Swal.fire({
        title: "Success!",
        text: "The data has been successfully deleted.",
        icon: "success"

    }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = 'index.php?page=members';
  }
});
</script>

