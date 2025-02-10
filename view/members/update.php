<?php
    include 'config/connection.php';
    $message = "";
    $isTrue = null;

    if(isset($_GET['members_id'])){
        $id = $_GET['members_id'];
        $query = mysqli_query($conn, "SELECT * FROM members WHERE members_id = '$id'");
        $data = mysqli_fetch_assoc($query);

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $nik = $_POST['nik'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            if(empty($name) || empty($nik) || empty($address) || empty($phone) || empty($email)){
                $isTrue = false;
            }else{
                $query = mysqli_query($conn, "UPDATE members SET name = '$name', nik = '$nik', address = '$address', phone = '$phone', email = '$email' WHERE members_id = '$id'");

                if($query == TRUE){
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
                                window.location.href = 'index.php?page=members';
                            }
                        });
                    </script>";
                }else{
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
            <h3>Add Member</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <a href="index.php?page=members" class="btn btn-primary">Back</a>
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
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $data['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="<?= $data['nik'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?= $data['address'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" value ="<?= $data['phone'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $data['email'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>