<?php

if ($_POST) {
    $search = preg_replace('/[^a-z0-9\-\+]/i', '', $_POST['search']);
    $tags = $_POST['tags'];

    $location = "Location: /?cat=" . $id;

    if (!empty($tags)) {
        $location = $location . "&tag=" . preg_replace('/[^a-z0-9\-\+]/i', '', implode("+", $_POST['tags']));
    }

    if (!empty($search)) {
        $location = $location . "&s=" . $search;
    }

    header($location);
}

?>