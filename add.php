<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td>Kelurahab</td>
                <td><input type="text" name="kelurahan"></td>
            </tr>
            <tr>
                <td>Distrik</td>
                <td><input type="text" name="distrik"></td>
            </tr>
            <tr>
                <td>Kabupaten/Kota</td>
                <td><input type="text" name="kabupaten"></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td><input type="text" name="provinsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $kelurahan = $_POST['kelurahan'];
        $distrik = $_POST['distrik'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = $_POST['provinsi'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile,kelurahan,distrik,kabupaten,provinsi) VALUES('$name','$email','$mobile','$kelurahan','$distrik','$kabupaten','$provinsi')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>

</html>