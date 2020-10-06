<?php
if (isset($_SESSION['user_id'])) {
$output = "<div class='container mt-5 d-flex justify-content-center'><ul>";
foreach($data as $key => $value)
{
    $output .= "<div class=' column'><li>";
    $output .= ucwords($key). ': ' .$value;
    $output .= "</li></div>";
}
$output .= '<a href="edit">Edit Password(NOT WORKING)</a>';
$output .= "</ul></div>";
}else{
    redirect('index');
}
$styles = '';


include_once VIEW_ROOT . 'layout.html.php';