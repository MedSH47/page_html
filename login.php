
<?php
 $errorMessage = "";
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    include("connexion.php");

    // Assuming email is the column name for the username
    $user = $_POST['nom_utilisateur'];
    $pswd = $_POST['pswd'];

    // Use prepared statements to avoid SQL injection
    $data = "SELECT * FROM client WHERE email = ?";
    $stmt = $connexion->prepare($data);

    // Check if the prepare statement succeeded
    if ($stmt) {
        // Bind parameters and execute the query
        $stmt->bind_param("s", $user);
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];

            // Verify the password
            if ($pswd== $hashedPassword) {
                // Password is correct, redirect to result.php
                header("Location: page1.html");
                exit();
            } else {
                // Password is incorrect
                $errorMessage = "Mot de passe incorrect";
            }
        } else {
            // Email not found
            $errorMessage="Invalid email";

        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in the prepared statement.";
    }

    // Close the database connection
    $connexion->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <title>Document</title>
</head>
<body>
    <div class="login-container">
        <h2>Page de Login</h2>
        <form method="post" action="login.php">
            <?php
            if (!empty($errorMessage)) {
                echo "<p>$errorMessage</p>";
            }
            ?>
            <label for="nom_utilisateur">Nom d'utilisateur :</label>
            <input type="text" name="nom_utilisateur" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="pswd" required>
            <a href="form.html">Crée un compte?</a> <br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
