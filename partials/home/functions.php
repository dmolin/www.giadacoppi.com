<?php

include '../../api/commons.php';

/* params: Array
    'linkTo' => 'project-happyholidays.html',
    'alt' => 'happy holidays',
    'src' => 'homepage/happyholidays-hp.jpg',
    'title' => 'Happy Holidays',
    'subtitle' => 'Holiday greeting cards'
*/
function make_thumb($params) {
    return '
        <a class="project-thumb" href="'.$params['linkTo'].'">
        <img alt="'.$params['alt'].'"
             class="project-image responsive-image" src="'.images_root() . $params['src'].'"/>
            <div class="project-caption">
                <div class="caption-content">
                    <h2>'.$params['title'].'</h2>
                    <h3>'.$params['subtitle'].'</h3>
                </div>
            </div>
        </a>
    ';
}

function make_thumbs($params) {
    $composed = '';
    foreach($params as $thumb) {
        $composed .= make_thumb($thumb);
    }
    return $composed;
}


?>