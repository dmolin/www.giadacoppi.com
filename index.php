<?php
    error_reporting(E_ALL);
    $root = '/';

    include 'api/commons.php';
    render_head('index');
?>

<body>
    <div id="container" class="page-index">

    <?php
    render_menu('');
    ?>

    <?php include 'partials/home/_index.php' ?>

    </div> <!-- #container -->


</body>