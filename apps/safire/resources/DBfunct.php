<?php

$conn = mysql_connect("localhost", "eddyhudson", "eddy12db");
mysql_select_db("students", $conn);

function resetTable2Blank($usersUniqId) {
    $lunchSlots = 'mon5,tue5,wed5,thu5,fri5,';
    $nullSlots = 'mon1,tue1,wed1,thu1,fri1,mon2,tue2,wed2,thu2,fri2,mon3,tue3,wed3,thu3,fri3,mon4,tue4,wed4,thu4,fri4,mon6,tue6,wed6,thu6,fri6,mon7,tue7,wed7,thu7,fri7,mon8,tue8,wed8,thu8,fri8,mon9,tue9,wed9,thu9,fri9,mon10,tue10,wed10,thu10,fri10,';

    if ($GLOBALS['conn']) {

        $result = mysql_query("DELETE FROM courses_safire WHERE OWNERUNIQUSERID='" . $usersUniqId . "'");
        if ($result) {
        } else {
            echo "failure";
        }

        $result = mysql_query("UPDATE users_safire SET LUNCHSLOTS='" . $lunchSlots . "', NULLSLOTS='" . $nullSlots . "' WHERE USERSUNIQID='" . $usersUniqId . "'");
        if ($result) {
        } else {
            echo "failure";
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function resetTable2MostCommon($usersUniqId) {
    $lunchSlots = 'mon5,tue5,wed5,thu5,fri5,';
    $nullSlots = 'mon10,tue10,wed10,thu10,fri10,';

    if ($GLOBALS['conn']) {

        $result = mysql_query("DELETE FROM courses_safire WHERE OWNERUNIQUSERID='" . $usersUniqId . "'");
        if ($result) {
        } else {
            echo "failure";
        }

        $result = mysql_query("UPDATE users_safire SET LUNCHSLOTS='" . $lunchSlots . "', NULLSLOTS='" . $nullSlots . "' WHERE USERSUNIQID='" . $usersUniqId . "'");
        if ($result) {
        } else {
            echo "failure";
        }

        //create all the courses' sql create strings here as an array and then feed it to createCourses.
        $defCourses[0] = "INSERT INTO courses_safire VALUES ('','', 'mon1,tue6,thu4,fri3,', '', '||##::##||', '" . uniqid("A|..|") . "', 'A', 'slotted|__|')";
        $defCourses[1] = "INSERT INTO courses_safire VALUES ('','', 'mon2,tue1,wed6,fri4,', '', '||##::##||', '" . uniqid("B|..|") . "', 'B', 'slotted|__|')";
        $defCourses[2] = "INSERT INTO courses_safire VALUES ('','', 'mon3,tue2,wed1,fri6,', '', '||##::##||', '" . uniqid("C|..|") . "', 'C', 'slotted|__|')";
        $defCourses[3] = "INSERT INTO courses_safire VALUES ('','', 'mon4,tue3,wed2,thu6,', '', '||##::##||', '" . uniqid("D|..|") . "', 'D', 'slotted|__|')";
        $defCourses[4] = "INSERT INTO courses_safire VALUES ('','', 'tue4,wed3,thu1,', '', '||##::##||', '" . uniqid("E|..|") . "', 'E', 'slotted|__|')";
        $defCourses[5] = "INSERT INTO courses_safire VALUES ('','', 'wed4,thu2,fri1,', '', '||##::##||', '" . uniqid("F|..|") . "', 'F', 'slotted|__|')";
        $defCourses[6] = "INSERT INTO courses_safire VALUES ('','', 'mon6,thu3,fri2,', '', '||##::##||', '" . uniqid("G|..|") . "', 'G', 'slotted|__|')";
        $defCourses[7] = "INSERT INTO courses_safire VALUES ('','', 'mon7,mon8,mon9,', '', '||##::##||', '" . uniqid("P|..|") . "', 'P', 'slotted|__|')";
        $defCourses[8] = "INSERT INTO courses_safire VALUES ('','', 'tue7,tue8,tue9,', '', '||##::##||', '" . uniqid("Q|..|") . "', 'Q', 'slotted|__|')";
        $defCourses[9] = "INSERT INTO courses_safire VALUES ('','', 'wed7,wed8,wed9,', '', '||##::##||', '" . uniqid("R|..|") . "', 'R', 'slotted|__|')";
        $defCourses[10] = "INSERT INTO courses_safire VALUES ('','', 'thu7,thu8,thu9,', '', '||##::##||', '" . uniqid("S|..|") . "', 'S', 'slotted|__|')";
        $defCourses[11] = "INSERT INTO courses_safire VALUES ('','', 'fri7,fri8,fri9,', '', '||##::##||', '" . uniqid("T|..|") . "', 'T', 'slotted|__|')";
        createCourses($defCourses,$usersUniqId);

        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function changeUserMetaData($usersUniqId,$metaData){
    if ($GLOBALS['conn']) {
        $result = mysql_query("UPDATE users_safire SET METADATA='" . $metaData . "' WHERE USERSUNIQID='" . $usersUniqId . "'");
        if ($result) {
        } else {
            echo "failure";
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function createUser($userName,$chosenTemplate,$emailID) {
    $template = $chosenTemplate;
    $rollNumber = $userName;
    if($emailID == ""){
        $emailID = $rollNumber . "@smail.iitm.ac.in";
    }
    $usersUniqId = uniqid($rollNumber, true);
    $metaData = "newUser==";
    $lunchSlots = 'mon5,tue5,wed5,thu5,fri5,';
    $nullSlots = 'mon1,tue1,wed1,thu1,fri1,mon2,tue2,wed2,thu2,fri2,mon3,tue3,wed3,thu3,fri3,mon4,tue4,wed4,thu4,fri4,mon6,tue6,wed6,thu6,fri6,mon7,tue7,wed7,thu7,fri7,mon8,tue8,wed8,thu8,fri8,mon9,tue9,wed9,thu9,fri9,mon10,tue10,wed10,thu10,fri10,';
    if ($GLOBALS['conn']) {
        
        $result = mysql_query("SELECT fullname FROM users WHERE username = '$userName'");
        $fullName = mysql_fetch_array($result);
        $names = explode(" ", $fullName[0]);
        
        $result = mysql_query("INSERT INTO users_safire VALUES ('$userName','" . $names[0] . "','" . end($names) . "','$lunchSlots','$nullSlots','$rollNumber','$usersUniqId','$metaData','$emailID')");
        if ($result) {
            $membInfo[0] = $usersUniqId;
            $membInfo[1] = $names[0];
            $membInfo[2] = end($names);
            $membInfo[3] = $metaData;
        } else {
            echo "failure";
            $membInfo = false;
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";

    switch ($template) {
        case "mostCommon":
            resetTable2MostCommon($usersUniqId);
            break;
        case "blank":
            resetTable2Blank($usersUniqId);
            break;
        default:
            echo "Choose a proper template";
    }
    
    return $membInfo;
}

function retrieveMembInfo($username) {
    if ($GLOBALS['conn']) {
        $result = mysql_query("SELECT usersuniqid,firstname,lastname,metadata FROM users_safire WHERE username = '$username'");
        if ($result) {
            $res = mysql_fetch_array($result);
            return $res;
        } else {
            echo "failure";
            return false;
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function checkAvail($username, $password) {
    if ($GLOBALS['conn']) {
        $result = mysql_query("SELECT COUNT(*) FROM users_safire WHERE username = '$username' OR password = '$password'");
        if ($result) {
            $res = mysql_fetch_array($result);
            if ($res[0] > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            echo "failure";
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function getCou4displayer($usersUniqId) {
    $i = 0;
    if ($GLOBALS['conn']) {
        //for all the courses a user has
        $result = mysql_query("SELECT * FROM courses_safire WHERE owneruniquserid = '$usersUniqId'");
        if ($result) {
            echo "var courses = new Array();";
            while ($res = mysql_fetch_array($result)) {
                echo "courses[" . $i . "] = new Course();";
                echo "courses[" . $i . "].code =\"" . $res[0] . "\";";
                echo "courses[" . $i . "].nameTitle =\"" . $res[1] . "\";";
                echo "courses[" . $i . "].location =\"" . $res[3] . "\";";
                echo "courses[" . $i . "].alias =\"" . $res[6] . "\";";
                echo "courses[" . $i . "].ID =\"" . $res[5] . "\";";
                $slotIDs = parseCSV($res[2]);
                foreach ($slotIDs as $slotID) {
                    echo "courses[" . $i . "].bindById(\"" . $slotID . "\");";
                }
                $i++;
            }
        } else {
            echo "job1 not done";
        }
        //for the lunch slots a user has
        $result = mysql_query("SELECT lunchslots FROM users_safire WHERE usersuniqid = '$usersUniqId'");
        if ($result) {
            echo "var lunchslot = new Lunch();";
            $res = mysql_fetch_array($result);
            $slotIDs = parseCSV($res[0]);
            foreach ($slotIDs as $slotID) {
                echo "lunchslot.bindById(\"" . $slotID . "\");";
            }
        } else {
            echo "job1 not done";
        }
        //for the null slots a user has
        $result = mysql_query("SELECT nullslots FROM users_safire WHERE usersuniqid = '$usersUniqId'");
        if ($result) {
            echo "var nullslot = new nullSlot();";
            $res = mysql_fetch_array($result);
            $slotIDs = parseCSV($res[0]);
            foreach ($slotIDs as $slotID) {
                echo "nullslot.bindById(\"" . $slotID . "\");";
            }
        } else {
            echo "job1 not done";
        }
        //close the connection
        
    } else {
        echo "I'm sorry but we couldn't connect to the database.";
    }
}

function getCou4manager($usersUniqId) {
    $i = 0;
    if ($GLOBALS['conn']) {
        //for all the courses a user has
        $result = mysql_query("SELECT * FROM courses_safire WHERE owneruniquserid = '$usersUniqId' ORDER BY alias DESC");
        if ($result) {
            echo "courses = new Array();";
            while ($res = mysql_fetch_array($result)) {
                echo "courses[" . $i . "] = new cCourse();";
                echo "courses[" . $i . "].code =\"" . $res[0] . "\";";
                echo "courses[" . $i . "].nameTitle =\"" . $res[1] . "\";";
                echo "courses[" . $i . "].bindList =\"" . $res[2] . "\";";
                echo "courses[" . $i . "].location =\"" . $res[3] . "\";";
                echo "courses[" . $i . "].alias =\"" . $res[6] . "\";";
                echo "courses[" . $i . "].metaData =\"" . $res[7] . "\";";
                echo "courses[" . $i . "].ID =\"" . $res[5] . "\";";
                echo "courses[" . $i . "].init();";
                echo "courses[" . $i . "].bindOptByID(\"opt" . $i . "\");";
                echo "courses[" . $i . "].optID = \"opt" . $i . "\";";
                $slotIDs = parseCSV($res[2]);
                foreach ($slotIDs as $slotID) {
                    echo "courses[" . $i . "].bindCellByID(\"" . $slotID . "\");";
                }
                $i++;
            }
            echo "numbCourses = courses.length;";
        } else {
            echo "job1 not done";
        }
        //for the lunch slots a user has
        $result = mysql_query("SELECT lunchslots FROM users_safire WHERE usersuniqid = '$usersUniqId'");
        if ($result) {
            echo "lunchSlot = new cLunch();";
            $res = mysql_fetch_array($result);
            $slotIDs = parseCSV($res[0]);
            echo "lunchSlot.bindList =\"" . $res[0] . "\";";
            echo "lunchSlot.init();";
            echo "lunchSlot.bindOpt();";
            foreach ($slotIDs as $slotID) {
                echo "lunchSlot.bindCellByID(\"" . $slotID . "\");";
            }
        } else {
            echo "job1 not done";
        }
        //for the null slots a user has
        $result = mysql_query("SELECT nullslots FROM users_safire WHERE usersuniqid = '$usersUniqId'");
        if ($result) {
            echo "nullSlot = new cNullSlot();";
            $res = mysql_fetch_array($result);
            $slotIDs = parseCSV($res[0]);
            echo "nullSlot.bindList =\"" . $res[0] . "\";";
            echo "nullSlot.init();";
            foreach ($slotIDs as $slotID) {
                echo "nullSlot.bindCellByID(\"" . $slotID . "\");";
            }
        } else {
            echo "job1 not done";
        }
    } else {
        echo "I'm sorry but we couldn't connect to the database";
    }
}

function getNumbCourses($usersUniqId) {
    if ($GLOBALS['conn']) {
        $result = mysql_query("SELECT COUNT(*) FROM courses_safire WHERE owneruniquserid = '$usersUniqId'");
        if ($result) {
            $res = mysql_fetch_array($result);
            return $res[0];
        } else {
            echo "failure";
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function createCourses($fullQuery, $usersUniqId) {
    if ($GLOBALS['conn']) {
        foreach ($fullQuery as $oneQuery) {
            $result = mysql_query(str_replace("||##::##||", $usersUniqId, $oneQuery));
            if ($result) {
            } else {
                echo "failure";
            }
        }
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function deleteCourses($fullQuery) {
    if ($GLOBALS['conn']) {
        foreach ($fullQuery as $oneQuery) {
            $result = mysql_query($oneQuery . $_SESSION['membInfo'][0] . "'");
            if ($result) {
            } else {
                echo "failure";
            }
        }
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function updateCourses($fullQuery) {
    if ($GLOBALS['conn']) {
        foreach ($fullQuery as $oneQuery) {
            $result = mysql_query($oneQuery . " AND OWNERUNIQUSERID='" . $_SESSION['membInfo'][0] . "'");
            if ($result) {
            } else {
                echo "failure";
            }
        }
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function updateLunchNull($query) {
    if ($GLOBALS['conn']) {
        $result = mysql_query($query . "USERSUNIQID='" . $_SESSION['membInfo'][0] . "'");
        if ($result) {
        } else {
            echo "failure";
        }
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function deleteCode($rollNumber) {
    if ($GLOBALS['conn']) {
        $result = mysql_query("DELETE FROM linkcodes WHERE rollnumber='" . $rollNumber . "'");
        
        if ($result) {
        } else {
            echo "failure";
        }
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function authUser($username, $password) {
    if ($GLOBALS['conn']) {
        $result = mysql_query("SELECT encrypted_password FROM users WHERE username = '$username'");
        if ($result) {
            $res = mysql_fetch_array($result);
            $putativePassword = $res[0];
            if($res = mysql_fetch_array($result)){//helps to prevent hacking
                return false;
            }
            else if(crypt($password."", $putativePassword) == $putativePassword){
                return true;
            }
            return $res[0];
        } else {
            echo "failure";
            return false;
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

function validateCode($code){
    if ($GLOBALS['conn']) {
        $result = mysql_query("SELECT COUNT(*) FROM linkcodes WHERE code = '$code'");
        if ($result) {
            $res = mysql_fetch_array($result);
            return $res[0];
        } else {
            echo "failure";
        }
        
    }
    else
        echo "Sorry, we couldn't connect to the database.";
}

?>