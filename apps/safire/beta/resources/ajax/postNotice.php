<?php

include_once '../DBfunct.php';
include_once '../nDBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if (isset($_POST['noticeCont']) && isset($_POST['noticeCou'])) {
    $postUniqID = uniqid("post", true);

    if (get_magic_quotes_gpc()) {
        $noticeContR = stripslashes($_POST['noticeCont']);
    } else {
        $noticeContR = $_POST['noticeCont'];
    }

    $noticeCont = htmlspecialchars($noticeContR, ENT_QUOTES);
    $noticeCont = encodeSlashes($noticeCont);


    if (addNotice($noticeCont, $_POST['noticeCou'], $_SESSION['membInfo'][0], time(), $postUniqID)) {
        emailNotice($_POST['noticeCou'], $noticeContR, $_SESSION['membInfo'][1]);
    } else {
        echo "Something has gone wrong, your notice hasn't been posted.";
    }
}
?>
