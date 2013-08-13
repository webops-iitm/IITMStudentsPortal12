<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['note'])) {
    if (get_magic_quotes_gpc()) {
        $noteSafe = stripslashes($_POST['note']);
    } else {
        $noteSafe = $_POST['note'];
    }

    $noteCont = htmlspecialchars($noteSafe, ENT_QUOTES);
    $noteCont = encodeSlashes($noteCont);

    $status = updtNote($noteCont, $_SESSION['membInfo'][0]);
    if ($status) {
        
    } else {
        echo "Something has gone wrong, your note hasn't been saved.";
    }
}
?>
