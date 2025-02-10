<?php
include 'config/connection.php';
$isTrue = null;

if (isset($_GET['loans_id'])) {
    $id = $_GET['loans_id'];
    $query = mysqli_query($conn, "SELECT * FROM loans WHERE loans_id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if (isset($_POST['submit'])) {
        $returned = $_POST['returned'];

        if (empty($returned)) {
            $isTrue = false;
        } else {
            $query = mysqli_query($conn, "UPDATE loans SET returned = '$returned' WHERE loans_id = '$id'");

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
}
?>

