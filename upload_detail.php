<html>
    <head>
        <title>Upload Details</title>
        <link rel="stylesheet" href="upload_details.css">  
    </head>
    <body>
        <h1>Upload Details</h1>
        
        <?php session_start(); $user_id=$_SESSION['user_id']; ?>     
        
        <form action="upload_details.php" method="post">
            
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" readonly >
        <div class="main">
            <p>
                First Name:<br>
                <input type="text" name="firstname" required="">
            </p>
            <p>
                Last Name:<br>
                <input type="text" name="lastname" required="">
            </p>
            <p>
                Address:<br>
                <input type="text" name="address" required="">
            </p>
            <p>
                Contact Number:<br>
                <input type="number" name="phone" required="">
            </p>
            <p>
                Marital Status:<br>
                <select name="marital_status">
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select>
            </p>
        </div>
        <input type=submit value="Submit">
    </form>
</body>
</html>