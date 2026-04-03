<?php
session_start();
include 'db.php';

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $password=$_POST["password"];

    $sql=$conn->prepare("select password from registration where name=?");
    $sql->bind_param("s",$name);

    $sql->execute();
    $sql->store_result();
    $sql->bind_result($pass);

    if($sql->fetch() && password_verify($password,$pass)){
        $_SESSION["name"]=$name;
        header("Location: Home.php");
    }

}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
          <div class="container mt-5 col-md-5">

    <form method="POST" class="border p-4 shadow-lg rounded bg-light">

        <h3 class="text-center mb-4 text-primary fw-bold">User Login</h3>

        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Enter Name"
                required
            />
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                placeholder="Enter Password"
                required
            />
            <label for="password">Password</label>
        </div>

        <button
            type="submit"
            class="btn btn-primary w-100 fw-bold py-2"
        >
            Login
        </button>

    </form>

</div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>