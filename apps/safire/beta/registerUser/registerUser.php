<?php
include_once '../resources/nDBfunct.php';
include_once '../resources/DBfunct.php';
///////////// end of file includes

session_start();
///////////started the session

if(!isset($_SESSION['createUser'])){
    header('Location: ../');
    exit();
}
else{
    unset($_SESSION['createUser']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Enrollment</title>
        <link href="registerUser.css" rel="stylesheet" type="text/css" />
        <link href="../resources/cryinMe.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        include_once "../resources/googleAnalytics.php"; 
        pageInit(); 
        ?>
        <div id="mainPage">
            <h1>User Enrollment</h1>
            <p>Hi, looks like you've not used Safire before. Please complete the form below to start using Safire. You don't have to enter your email address if you would like to stick with your institutional email.</p>
            <div id="cover">
                <table id="userInfo">
                    <tbody>
                        <tr>
                            <td>Email Address</td><td><input class="defInput" id="emailID" type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Choose a template to start with:</p>
                                <div id="templateChooser">
                                    <div id="blank" class="templateOptDiv">
                                        <input id="blankRadio" type="radio" name="template" value="blank"><p class="templateOpt">Blank</p>
                                    </div>
                                    <div id="mostCommon" class="templateOptDiv">
                                        <input id="mostCommonRadio" type="radio" name="template" value="mostCommon"><p class="templateOpt">Non 1st Year BTech/DD/MA</p>
                                    </div>
                                    <div id="templateShower">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input id="enroller" class="submitter" type="button" value="Enroll">
                <br>
                <div id="loadingInfo">
                    <img id="loadingImg" alt="" src="../resources/websiteImgs/loading.gif">
                    <p id="status">Logging you in...</p>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../resources/cryinMe.js"></script>
    <script type="text/javascript" src="registerUser.js"></script>
</html>
