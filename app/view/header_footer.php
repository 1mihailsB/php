<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mihails Borovkovs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href=<?php echo FRONTEND . '/css/styles.css' ?> >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <a href=<?php echo BASE_URL . 'home'; ?> class="navbar-brand" id="nav-title">Scandiweb test</a>
</nav>
<div class="my-container">
    <?php include VIEW . $this->view . '.php'; ?>
</div>
</body>
</html