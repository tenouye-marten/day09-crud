<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $kelurahan = $_POST['kelurahan'];
    $distrik = $_POST['disrik'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];


    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',mobile='$mobile',kelurahan='$kelurahan',distrik='$distrik',kabupaten='$kabupaten',provinsi='$provinsi' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['name'];
    $email = $user_data['email'];
    $mobile = $user_data['mobile'];
    $kelurahan = $user_data['kelurahan'];
    $distrik = $user_data['distrik'];
    $kabupaten = $user_data['kabupaten'];
    $provinsi = $user_data['provinsi'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name; ?>></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email; ?>></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile; ?>></td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td><input type="text" name="kelurahan" value=<?php echo $kelurahan; ?>></td>
            </tr>
            <tr>
                <td>Distrik</td>
                <td><input type="text" name="distrik" value=<?php echo $distrik; ?>></td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td><input type="text" name="kabupaten" value=<?php echo $kabupaten; ?>></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td><input type="text" name="provinsi" value=<?php echo $provinsi; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>