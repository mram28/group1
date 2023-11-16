<?php
include "dbconfig.php";
$id = $_GET['deleteid'];
?>
<!DOCTYPE html>
        <html>
        <head>
        <h1></h1>
        </head>
    <body>
        <dialog open> Are you sure you want to delete?
        <button class="btn btn-primary"><a href="medicine.php" class="text-light">Cancel</a></button>
        <button class="btn btn-danger"><?php echo '<a "class="text-light" href=medicine.php?deleteid='.$id.'>Delete</a>'; ?></button>
        </dialog>
    </body>
</html>
