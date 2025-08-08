<?php $id=$_GET['id']; ?>
<form action="image_add_conn.php" method="POST">
                <input type="hidden" name="id" autofocus required readonly value=<?php echo $id; ?>><br><br><br>
               
                <input type="file" name="uploadfile" /><br><br>
                <button type="submit" name="upload">Upload</button>
</form>