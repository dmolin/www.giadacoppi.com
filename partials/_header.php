<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>

<header id="main-header">

    <h1 id="logo"><a href="index.php"><img class="responsive-image" alt="Giada Coppi" src="images/header.jpg"/></a></h1>

    <nav id="primary">
        <ul>
            <li><a href="project-graffiti.php" class="<?php echo check_selection('projects', $current_menu) ?>" >Projects</a></li>
            <li><a href="teaching.php" class="<?php echo check_selection('teaching', $current_menu) ?>">Teaching</a></li>
            <li><a href="about.php"    class="<?php echo check_selection('about', $current_menu) ?>">About</a></li>
            <li><a href="contact.php"  class="<?php echo check_selection('contact', $current_menu) ?>">Contact</a> </li>
        </ul>
    </nav>
</header>

<?php if($current_menu == '') { ?>
<div id="intro">Welcome to the graphic design and typography portfolio of Giada Coppi</div>
<?php } ?>
