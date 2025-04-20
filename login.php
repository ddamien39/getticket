<?php 
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(isset($_POST) && $username && $password)
    {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_conn.php");
        require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        $userResults = $stmt->fetchAll();

        if ($stmt->rowCount() != 0) {
            if(password_verify($password, $userResults[0]["password"]))
            {
                setCurrentUser($userResults[0]["id"]);
                header("Location: /tickets.php");
            }
        }


        die("invalid username/password");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTicket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body >
    <main class="bg-slate-900">



        <form class="max-w-sm mx-auto" method="POST" action="/login.php">
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-white">Your username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></input>
        </form>


        
    </main>
</body>
</html>