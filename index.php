<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Document</title>
</head>
<body>
    <h3>Create Account</h3>
    <form action="includes/usercreate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Create</button>
    </form>

    <h3>Delete account</h3>
    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button>Delete</button>
    </form>

    <form class="searchform" action="search.php" method="post">
        <h3 for="search">Search for user:</h3>
        <input id="search" type="text" name="usersearch" placeholder="Search...">
        <button>Search</button>
    </form>
</body>
</html>