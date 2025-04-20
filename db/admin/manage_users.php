<?php include '../../components/header.php'; ?>

<?php
session_start();
if (!isset($_SESSION["username"])) {
    echo "Vous n'êtes pas connecté.";
    exit;
}

echo "Bienvenue, " . $_SESSION["username"];

if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == "2") {
    echo " - Vous êtes Administrateur.";
} else {
    echo " - Accès utilisateur standard.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <section class="slidebar">
        <!-- bouton pour afficher le menu avec trois barres -->
        <div class="fixed top-4 left-4">
            <button class="p-2 text-gray-900 bg-gray-100 rounded-md hover:bg-gray-200 dark:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600" id="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- drawer component -->
        <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li class="mb-[15px]">
                        <a href="../../index.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-[15px]">
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>

                        </a>
                    </li>
                    <li class="mb-[15px]">
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Tickets</span>

                        </a>
                    </li>
                    <li class="mb-[15px]">
                        <a href="./db/admin/manage_users.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-1 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li class="mb-[15px]">
                        <a href="/form/sign_in.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            </svg>
                            <span class="flex-1 ms-1 whitespace-nowrap">Sign In</span>
                        </a>
                    </li>
                    <li>
                        <a href="/form/sign_up.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                            </svg>
                            <span class="flex-1 ms-1 whitespace-nowrap">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- SECTION: Contenu principal -->
    <!-- SECTION: Contenu principal -->
    <section class="main-content p-8 ml-80">
        <style>
            .main-content {
                padding: 20px;
                max-width: 800px;
                margin: auto;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            h2 {
                text-align: center;
                color: #333;
                font-size: 24px;
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background: #fff;
                border-radius: 8px;
                overflow: hidden;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background: #007bff;
                color: white;
                font-weight: bold;
            }

            td {
                background: #f9f9f9;
            }

            a {
                text-decoration: none;
                color: #007bff;
                font-weight: bold;
                margin-right: 8px;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require_once '../db_connect.php';

        // Vérifier si l'utilisateur est administrateur
        if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] !== 2) {
            die("<p style='color: red; text-align: center;'>Accès refusé.</p>");
        }

        // Récupérer les utilisateurs
        $stmt = $conn->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2>Gestion des utilisateurs</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Banni jusqu'au</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user["id"] ?></td>
                    <td><?= htmlspecialchars($user["username"]) ?></td>
                    <td><?= htmlspecialchars($user["email"]) ?></td>
                    <td><?= $user["role_id"] ?></td>
                    <td><?= $user["banned_until"] ? $user["banned_until"] : "Non banni" ?></td>
                    <td>
                        <a href="./edit_users.php?id=<?= $user['id'] ?>">Modifier</a> |
                        <a href="/db/admin/ban_users.php?id=<?= $user['id'] ?>&duration=7">Bannir 7 jours</a> |
                        <a href="./ban_user.php?id=<?= $user['id'] ?>&duration=permanent">Bannir à vie</a> |
                        <a href="./delete_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>


    <!-- JavaScript pour afficher et cacher le menu -->
    <script>
        // Écouteur pour afficher le drawer via les trois barres
        document.querySelector("#menu-icon").addEventListener("click", function() {
            const drawer = document.getElementById("drawer-navigation");
            drawer.style.transform = "translateX(0)";
        });

        // Écouteur pour cacher le drawer via la croix
        document.querySelector("[data-drawer-hide]").addEventListener("click", function() {
            const drawer = document.getElementById("drawer-navigation");
            drawer.style.transform = "translateX(-100%)";
        });
    </script>

</body>

</html>