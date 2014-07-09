<?php

/* global vars */
$current_menu = '';
$current_page = '';
$project_pages = array(
    'graffiti', 'manyval', 'mobilelook', 'lsbrochure', 'pins', 'happy2011', 'snowflake',
    'alvorada', 'nashflood', 'ligamasiva', 'fishing', 'sugary', 'peterreid',
    'barista', 'staycool', 'bna-vie', 'stamps', 'happyholidays', 'vielendank'
);

$teaching_pages = array(
    'typejournal', 'gridalphabet', 'modularalphabet', 'typographicpattern',
    'monogram', 'bembo', 'calligrams', 'wordimage'
);

$navigation_lists = array(
    'teaching' => $teaching_pages,
    'project' => $project_pages
);

function images_root() {
    //return "https://s3-eu-west-1.amazonaws.com/giadacoppi/images/";
    return "images/";
}

/**
 * Check if the passed in value is equal to the reference value.
 * if true, it will return the string "selected".
 * used in the markup for visually marking elements as 'selected'
 */
function check_selection($valueToCheck, $valueToCheckAgainst) {
    return ($valueToCheck == $valueToCheckAgainst ? 'selected' : '');
}

function render_menu($current) {
    $current_menu = $current;
    include 'partials/_header.php';
}

function render_head($page='') {
    $current_page = $page;
    include 'partials/_head.php';
}

function render_navigation($project = 'graffiti') {
    render_nav($project, 'project');
}

function render_project($project) {
    render_page($project, 'projects');
}


function render_page($page, $menu = '') {
    render_head();

    echo '
    <body>
        <div id="container" class="page page-'. $page . '">';

        render_menu($menu == '' ? $page : $menu);
        include 'partials/'. $menu . '/_'.$page.'.php';

    echo'
        </div> <!-- #container -->
    </body>';
}

function render_nav($node = '', $context = 'teaching') {
    global $navigation_lists;
    $pages = $navigation_lists[$context];

    echo '
<nav id="side-nav" class="'. $context .'-nav">
    <ul>
        <li class="prev"><a href="'.$context.'-'. prev_element($node, $pages) .'.php">&lsaquo;</a></li>
        <li class="next"><a href="'.$context.'-'. next_element($node, $pages) .'.php">&rsaquo;</a></li>
    </ul>
</nav>';
}

function next_element($current, $list) {
    //find the current element in the list
    $total = count($list);
    $idx = intval(array_search($current, $list));
    //next
    return ($idx == ($total-1) ? $list[0] : $list[$idx+1]);
}

function prev_element($current, $list) {
    //find the current element in the list
    $total = count($list);
    $idx = intval(array_search($current, $list));
    //prev
    return ($idx == 0 ? $list[$total-1] : $list[$idx-1]);
}


?>