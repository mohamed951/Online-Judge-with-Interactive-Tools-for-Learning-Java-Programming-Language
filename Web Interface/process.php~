<?php

require_once 'config.php';
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
function customhash($str) {
    return md5($str); // To help change the hashing for password saving if needed.
}
  function prepare($code){
        $code = preg_replace('!\s+!', ' ', $code);
        $code="import java.util.Scanner; ".$code;
        $pos=0;
        $main="public static void main";
        $pos=strpos($code,$main ,$pos);
        while($pos!=false){

        if(!isString($code,$pos)){
         while($pos<strlen($code) && $code[$pos]!='{')$pos++;
        $z=" int fjaoihfewaohdakshadkjdfha; Scanner jfldskjasflkdsfj = new
        Scanner(System.in); fjaoihfewaohdakshadkjdfha=jfldskjasflkdsfj.nextInt();
        for(int jlfksahfjahsdfkjsdhf=0;jlfksahfjahsdfkjsdhf<fjaoihfewaohdakshadkjdfha;jlfksahfjahsdfkjsdhf++) {";
         $code=substr($code,0, $pos+1).$z.substr($code,$pos+1);
         while($pos<strlen($code)&& $code[$pos]!='}')$pos++;
         $code=substr($code,0, $pos+1)."}".substr($code,$pos+1);
        }
        $pos++;
        $pos=strpos($code,$main,$pos);	
        }
        return $code;
	}
	function isString($code,$pos){
        $n1=0;$n2=0;
        for($i=0;$i<=$pos&& $i<strlen($code);$i++){
            if($code[$i]=='"')
                $n1++;
        }
        for($i=$pos+1;$i<strlen($code);$i++){
            if($code[$i]=='"')
                $n2--;
        }
        if($n1%2!=0&&$n2%2!=0)
            return true;
        return false;
	}
$query = "select value from admin where variable='mode'";

$judge = DB::findOneFromQuery($query);
$query = "insert into logs value ('" . time() . "', '$_SERVER[REMOTE_ADDR]', '" . addslashes(print_r($_SESSION, TRUE)) . "', '" . addslashes(print_r($_REQUEST, TRUE)) . "' )";
DB::query($query);
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') || isset($_POST['login'])) {
// ------------------ LOGIN ------------------- //
    if (isset($_POST['login'])) {
        if (!isset($_POST['teamname']) || $_POST['teamname'] == '') {
            $_SESSION['msg'] = "Teamname missing";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } else if (!isset($_POST['password']) || $_POST['password'] == '') {
            $_SESSION['msg'] = "Teamname missing";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } else {
            $_POST['teamname'] = addslashes($_POST['teamname']);
            $_POST['password'] = customhash(addslashes($_POST['password']));
            $query = "select * from teams where teamname  = '$_POST[teamname]' and pass = '$_POST[password]'";
            echo $query;
            $res = DB::findOneFromQuery($query);
            if ($res && ($res['status'] == 'Normal' || $res['status'] == 'Admin')) {
                $save = $_SESSION;
                session_destroy();
                session_regenerate_id(true);
                session_start();
                $_SESSION = $save;
                $_SESSION['team']['id'] = $res['tid'];
                $_SESSION['team']['name'] = $res['teamname'];
                $_SESSION['loggedin'] = "true";
                $_SESSION['team']['status'] = $res['status'];
                $_SESSION['team']['time'] = time();
                $_SESSION['team']['root'] = $res['root'];
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            } else if ($res) {
                $_SESSION['msg'] = "You can not log in as your current status is : $res[status]";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            } else {
                $_SESSION['msg'] = "Incorrect Username/Password";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        }
// ---------------------- LOG OUT -------------------------- //
    } 
    else if (isset($_GET['logout'])) {
        session_destroy();
        redirectTo(SITE_URL);
    }
    else if (isset($_GET['rid'])) {
        $_GET['rid'] = addslashes($_GET['rid']);
        $query = "select displayio, access, runs.tid, runs.pid, runs.rid, result, runs.language as language, subs_code.code as code, subs_code.output as output, problems.output as correct, input from runs, subs_code, problems where runs.rid = $_GET[rid] and runs.rid = subs_code.rid and problems.pid = runs.pid";
        $runs = DB::findOneFromQuery($query);
        if ($_GET['file'] == "code" && ($runs['access'] == "public" || (isset($_SESSION['loggedin']) && $runs['tid'] == $_SESSION['team']['id']) || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == "Admin"))) {
            $ext = $valtoext[$runs['language']];
            header("Content-type: text/plain");
            header("Content-Disposition: attachment; filename=code-$_GET[rid].$ext");
            print $runs['code'];
        } else if (($runs['displayio'] == 1 && $runs['access'] == "public") || ($runs['displayio'] == 1 && isset($_SESSION['loggedin']) && $runs['tid'] == $_SESSION['team']['id']) || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == "Admin")) {
            header("Content-type: text/plain");
            header("Content-Disposition: attachment; filename=$_GET[file].txt");
            if ($_GET['file'] == "input") {
                print $runs['input'];
            } else if ($_GET['file'] == "correct") {
                print $runs['correct'];
            } else if ($_GET['file'] == "output") {
                if ($runs['result'] == "WA" || $runs['result'] == "PE") {
                    print $runs['output'];
                } else if ($runs['result'] == "AC") {
                    print $runs['correct'];
                }
            }
        }

    }    
// ------------------ CODE SUBMISSION --------------------- //
     
    else if (isset($_POST['submitcode'])) {
        $_SESSION['subcode'] = addslashes($_POST['sub']);
        /*
         * 
         * Different levels of check ... (quite a job!)
         * Lvl 0 - User is logged in
         * Lvl 1 - Judge Active or Passive
         * Lvl 2 - All the POST value are set
         * Lvl 3 - Max Input file size
         * Lvl 4 - Problem and language combination is allowed
         * Lvl 5 - Only Contest Problem's submissions are accepted in Active mode
         * Lvl 6 - Only Practice submissions are accepted in Passive mode
         * Lvl 7 - Only Active problem are accepted
         * Also Admin can by-pass lvl 1 and lvl 7 checks.
         * 
         */
        if (isset($_SESSION['loggedin'])) {     // Lvl 0
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            if ($admin['mode'] == 'Passive' || ($admin['mode'] == 'Active' && $admin['endtime'] >= time()) || $_SESSION['team']['status'] == 'Admin') { // Lvl 1
                
                $allowed = Array('application/octet-stream', 'text/x-csrc', 'text/x-c++src', 'text/x-csharp', 'text/x-java', 'text/javascript', 'text/x-pascal', 'text/x-perl', 'text/x-php', 'text/x-python', 'text/x-ruby', 'text/plain');
                if ((isset($_POST['lang']) && $_POST['lang'] != "") && ($_FILES['code_file']['size'] > 0 || (isset($_POST['sub']) && $_POST['sub'] != "")) && (isset($_POST['probcode']) && $_POST['probcode'] != "")) {  // Lvl 2
                    
                    if ($_FILES['code_file']['size'] > 0 && $_FILES['code']['error'] == 0 && in_array($_FILES['code_file']['type'], $allowed)) {
                        $sourcecode = addslashes(file_get_contents($_FILES['code_file']['tmp_name']));
                    } else {
                        $runcode = addslashes($_POST['sub']);
                        $runcode = prepare($runcode);
                        $sourcecode = addslashes($_POST['sub']);
                    }
                    $query = "select pid, status, contest, maxfilesize, total from problems where languages like '%$_POST[lang]%' and code = '$_POST[probcode]'";
                    $res = DB::findOneFromQuery($query);
                    if (strlen(stripcslashes($sourcecode)) <= $res['maxfilesize']) { // Lvl 3
                        if ($res) { // Lvl 4
                            if ($admin['mode'] == 'Active' && $admin['endtime'] >= time() && $res['contest'] == 'practice') { // Lvl 5
                                $_SESSION['msg'] = "Submissions are only accepted for Contest Problem question right now. Come back later.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                            } else if ($admin['mode'] == 'Passive' && $res['contest'] == 'contest' && $_SESSION['team']['status'] != 'Admin') { // Lvl 6
                                $_SESSION['msg'] = "Submissions are only accepted for Practice question right now.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                            } else if ($res['status'] == 'Active' || $_SESSION['team']['status'] == 'Admin') { // Lvl 7
                                $submittime = time();
                                $query = "INSERT INTO runs (pid,tid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION['team']['id'] . "', '$_POST[lang]', 'private', '" . $submittime . "')";
                                $res2 = DB::query($query);
                                DB::query("update problems set total=".($res['total']+1)." where pid = $res[pid]");
                                $query = "select rid from runs where tid = " . $_SESSION['team']['id'] . " and pid = $res[pid] and submittime = $submittime";
                                $result = DB::findOneFromQuery($query);
                                if ($result) {
                                    $rid = $result['rid'];
                                    $query = "INSERT INTO subs_code (rid, name, code, runcode) VALUES ('$rid', 'Main', '$sourcecode', '$runcode')";
                                    $result = DB::query($query);
                                    $query = "select rid from subs_code where rid = $rid";
                                    $result = DB::findOneFromQuery($query);
                                    if ($result) {
                                        unset($_SESSION['subcode']);
                                        $_SESSION['msg'] = "Problem submitted successfully. If your problem is not judged then contact admin.";
                                        $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
                                        if ($client === false) {
                                            $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                                        }
                                        fwrite($client, $rid);
                                        fclose($client);
                                        redirectTo(SITE_URL . "/viewsolution/" . $rid);
                                    } else {
                                        DB::query("Delete from runs where rid = $rid");
                                        $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                                    }
                                } else {
                                    $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                                }
                            } else {
                                $_SESSION['msg'] = "Problem is not active for submissions.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                            }
                        } else {
                            $_SESSION['msg'] = "Either the problem does not exsits or the language is not allowed.";
                            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                        }
                    } else {
                        $_SESSION['msg'] = "Submitted code exceeds size limits.";
                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                    }
                } else {
                    $_SESSION['msg'] = "You missed some necessary values.";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }
            } else {
                $_SESSION['msg'] = "You cannot submit at this time.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        } else {
            $_SESSION['msg'] = "You should be logged in to make a submission.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }

    }
//--------------------------------Game Submission---------------------------//
     else if (isset($_POST['gamestatus'])) {
          if (isset($_SESSION['loggedin'])) {     // Lvl 0
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
                     $query = "select pid, status, contest, maxfilesize, total, output from problems where code = '$_POST[pcode]'";
                     $res = DB::findOneFromQuery($query);
                        if ($admin['mode'] == 'Active' && $admin['endtime'] >= time() && $res['contest'] == 'practice') { // Lvl 5
                                $_SESSION['msg'] = "Submissions are only accepted for Contest Problem question right now. Come back later.";
                                echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                            } else if ($admin['mode'] == 'Passive' && $res['contest'] == 'contest' && $_SESSION['team']['status'] != 'Admin') { // Lvl 6
                                $_SESSION['msg'] = "Submissions are only accepted for Practice question right now.";
                                echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                            } else if ($res['status'] == 'Active' || $_SESSION['team']['status'] == 'Admin') { // Lvl 7
                                $submittime = time();
                                $query = "INSERT INTO runs (pid,tid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION['team']['id'] . "', 'Java', 'private', '" . $submittime . "')";
                                $res2 = DB::query($query);
                                DB::query("update problems set total=".($res['total']+1)." where pid = $res[pid]");
                                $query = "select rid from runs where tid = " . $_SESSION['team']['id'] . " and pid = $res[pid] and submittime = $submittime";
                                $result = DB::findOneFromQuery($query);
                                if ($result) {
                                    $rid = $result['rid'];
                                    $query = "INSERT INTO subs_code (rid, name, code) VALUES ('$rid', 'Main', '')";
                                    $result = DB::query($query);
                                    $query = "select rid from subs_code where rid = $rid";
                                    $result = DB::findOneFromQuery($query);
                                    if ($result) {
                                        $_SESSION['msg'] = "Problem submitted successfully. If your problem is not judged then contact admin.";
                                        $query = "UPDATE runs SET time='0.1',result='$_POST[gamestatus]' WHERE rid=$rid";
                                        DB::query($query);
	                                   $query = "UPDATE subs_code SET error='',output='' WHERE rid=$rid";
                                        DB::query($query);
                                        //redirectTo(SITE_URL . "/viewsolution/" . $rid);
                                        echo SITE_URL . "/viewsolution/" . $rid;
                                    } else {
                                        DB::query("Delete from runs where rid = $rid");
                                        $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                        echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                                    }
                                } else {
                                    $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                    echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                                }
                            } else {
                                $_SESSION['msg'] = "Problem is not active for submissions.";
                                 echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                        }
                
            } 
        
        
        
        else {
            $_SESSION['msg'] = "You should be logged in to make a submission.";
            echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
        }  
    
        /* if (isset($_SESSION['loggedin'])) { 
       //    $query = "INSERT INTO runs (pid,tid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION['team']['id'] . "', '$_POST[lang]', 'private', '" . $submittime . "')";
             $submittime = time();
             $query = "select pid from problems where code = '".$_POST["pcode"]."' ;" ;
             $res = DB::findOneFromQuery($query);
             $query = "INSERT INTO runs (pid,tid,result,access,submittime) VALUES ('".$res['pid']."', '" . $_POST["tid"] . "', '" . $_POST['gamestatus'] . "', '[private]', '" . $submittime . "')";
             $res2 = DB::query($query);
             //echo $_POST["pid"]."---".$_POST["tid"]."----".$_POST["gamestatus"];
        //     $_SESSION['msg'] =      
             //redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        else {
            redirectTo("http://localhost/aurora");
            //$_SESSION['msg'] = "You should be logged in to make a submission.";
            //redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        */
}
        
//----------------------------------Expected Output Submission_______________
        else if (isset($_POST['ExpectedOutputSubmit'])) {
        /*
         * 
         * Different levels of check ... (quite a job!)
         * Lvl 0 - User is logged in
         * Lvl 1 - Judge Active or Passive
         * Lvl 2 - All the POST value are set
         * Lvl 3 - Max Input file size
         * Lvl 4 - Problem and language combination is allowed
         * Lvl 5 - Only Contest Problem's submissions are accepted in Active mode
         * Lvl 6 - Only Practice submissions are accepted in Passive mode
         * Lvl 7 - Only Active problem are accepted
         * Also Admin can by-pass lvl 1 and lvl 7 checks.
         * 
         */
        if (isset($_SESSION['loggedin'])) {     // Lvl 0
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
                if ((isset($_POST['output']))) {  // Lvl 2
                     $query = "select pid, status, contest, maxfilesize, total, output from problems where code = '$_POST[probcode]'";
                    $res = DB::findOneFromQuery($query);
                        if ($admin['mode'] == 'Active' && $admin['endtime'] >= time() && $res['contest'] == 'practice') { // Lvl 5
                                $_SESSION['msg'] = "Submissions are only accepted for Contest Problem question right now. Come back later.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                            } else if ($admin['mode'] == 'Passive' && $res['contest'] == 'contest' && $_SESSION['team']['status'] != 'Admin') { // Lvl 6
                                $_SESSION['msg'] = "Submissions are only accepted for Practice question right now.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                            } else if ($res['status'] == 'Active' || $_SESSION['team']['status'] == 'Admin') { // Lvl 7
                                $submittime = time();
                                $query = "INSERT INTO runs (pid,tid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION['team']['id'] . "', 'Java', 'private', '" . $submittime . "')";
                                $res2 = DB::query($query);
                                DB::query("update problems set total=".($res['total']+1)." where pid = $res[pid]");
                                $query = "select rid from runs where tid = " . $_SESSION['team']['id'] . " and pid = $res[pid] and submittime = $submittime";
                                $result = DB::findOneFromQuery($query);
                                if ($result) {
                                    $rid = $result['rid'];
                                    $query = "INSERT INTO subs_code (rid, name, code) VALUES ('$rid', 'Main', '')";
                                    $result = DB::query($query);
                                    $query = "select rid from subs_code where rid = $rid";
                                    $result = DB::findOneFromQuery($query);
                                    if ($result) {
                                        
                                        $ExpectOutput=$res['output'];
                                        $UserOutput=$_POST['output'];
                                        $error;
                                        //$ExpectOutput=str_replace(array("<pre>","</pre>","<br />","\r","\r\n","\n"),"",$ExpectOutput);
                                        //$UserOutput=str_replace(array("\r","\r\n","\n"),"",$UserOutput);
                                        $ExpectOutput=str_replace(array("<pre>","</pre>","<br />","\r"),"",$ExpectOutput);
                                        $UserOutput=str_replace(array("\r"),"",$UserOutput);
                                        if(!strcmp($UserOutput,$ExpectOutput)){
                                            $Result="AC";
                                            $error="";
                                            }
                                        else {
                                            $Result="WA";
                                            $error="Wrong Answer";
                                             }
                                        $_SESSION['msg'] = "Problem submitted successfully. If your problem is not judged then contact admin.".strlen($UserOutput)."---".strlen($ExpectOutput)."<br><br>".$ExpectOutput."--".$UserOutput;
                                        $query = "UPDATE runs SET time='0.1',result='$Result' WHERE rid=$rid";
                                        DB::query($query);
	                                   $query = "UPDATE subs_code SET error=\"$error\",output=\"$UserOutput\" WHERE rid=$rid";
                                        DB::query($query);
                                        redirectTo(SITE_URL . "/viewsolution/" . $rid);
                                    } else {
                                        DB::query("Delete from runs where rid = $rid");
                                        $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                                    }
                                } else {
                                    $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                                }
                            } else {
                                $_SESSION['msg'] = "Problem is not active for submissions.";
                                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                        }
                } else {
                    $_SESSION['msg'] = "You missed some necessary values.";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }
            } 
        
        
        
        else {
            $_SESSION['msg'] = "You should be logged in to make a submission.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }}
    
    
//----------------------------------Find Error Submission_______________
         else if (isset($_POST['FindErrorCode'])) {
        /*
         * 
         * Different levels of check ... (quite a job!)
         * Lvl 0 - User is logged ins
         * Lvl 1 - Judge Active or Passive
         * Lvl 2 - All the POST value are set
         * Lvl 3 - Max Input file size
         * Lvl 4 - Problem and language combination is allowed
         * Lvl 5 - Only Contest Problem's submissions are accepted in Active mode
         * Lvl 6 - Only Practice submissions are accepted in Passive mode
         * Lvl 7 - Only Active problem are accepted
         * Also Admin can by-pass lvl 1 and lvl 7 checks.
         * 
         */
        if (isset($_SESSION['loggedin'])) {     // Lvl 0
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
                     $query = "select pid, status, contest, maxfilesize, total, output from problems where code = '$_POST[FindErrorCode]'";
                    $res = DB::findOneFromQuery($query);
                        if ($admin['mode'] == 'Active' && $admin['endtime'] >= time() && $res['contest'] == 'practice') { // Lvl 5
                                $_SESSION['msg'] = "Submissions are only accepted for Contest Problem question right now. Come back later.";
                                echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                            } else if ($admin['mode'] == 'Passive' && $res['contest'] == 'contest' && $_SESSION['team']['status'] != 'Admin') { // Lvl 6
                                $_SESSION['msg'] = "Submissions are only accepted for Practice question right now.";
                                echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                            } else if ($res['status'] == 'Active' || $_SESSION['team']['status'] == 'Admin') { // Lvl 7
                                $submittime = time();
                                $query = "INSERT INTO runs (pid,tid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION['team']['id'] . "', 'Java', 'private', '" . $submittime . "')";
                                $res2 = DB::query($query);
                                DB::query("update problems set total=".($res['total']+1)." where pid = $res[pid]");
                                $query = "select rid from runs where tid = " . $_SESSION['team']['id'] . " and pid = $res[pid] and submittime = $submittime";
                                $result = DB::findOneFromQuery($query);
                                if ($result) {
                                    $rid = $result['rid'];
                                    $query = "INSERT INTO subs_code (rid, name, code) VALUES ('$rid', 'Main', '')";
                                    $result = DB::query($query);
                                    $query = "select rid from subs_code where rid = $rid";
                                    $result = DB::findOneFromQuery($query);
                                    if ($result) {
                                        $_SESSION['msg'] = "Problem submitted successfully. If your problem is not judged then contact admin.";
                                        $query = "UPDATE runs SET time='0.1',result='$_POST[status]' WHERE rid=$rid";
                                        DB::query($query);
	                                   $query = "UPDATE subs_code SET error='',output='' WHERE rid=$rid";
                                        DB::query($query);
                                        //redirectTo(SITE_URL . "/viewsolution/" . $rid);
                                        echo SITE_URL . "/viewsolution/" . $rid;
                                    } else {
                                        DB::query("Delete from runs where rid = $rid");
                                        $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                        echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                                    }
                                } else {
                                    $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
                                    echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                                }
                            } else {
                                $_SESSION['msg'] = "Problem is not active for submissions.";
                                echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
                        }
                
            } 
        
        
        
        else {
            $_SESSION['msg'] = "You should be logged in to make a submission.";
            echo "http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url'];
        }  }
    
// -------------------------------- REGISTER ---------------------------- //
     else if (isset($_POST['register'])) {
        if ((isset($_POST['teamname']) && $_POST['teamname'] != "") && (isset($_POST['password']) && $_POST['password'] != "") && (isset($_POST['repassword']) && $_POST['repassword'] != "") && (isset($_POST['email1']) && $_POST['email1'] != "")) {
            if (preg_match("/^[a-zA-Z0-9_@]+$/", $_POST['teamname'], $match) && $match[0] == $_POST['teamname']) {
                if (addslashes($_POST['password']) == addslashes($_POST['repassword'])) {
                    $query = "select * from teams where teamname='" . addslashes($_POST['teamname']) . "'";
                    $res = DB::findOneFromQuery($query);
                    $statusvalue=addslashes($_POST['status']);
                    $status="";
                    $root=0;
                    if($statusvalue=="Student"){
                        $status="Normal";
                            $root=0;
                    }else if($statusvalue=="Professor"){
                         $status="Admin";
                            $root=0;
                    }
                    else {
                         $status="Admin";
                            $root=1;
                    }
                    if ($res == NULL) {
                        $query = "Insert into teams (teamname, pass, status,email1, score, penalty,root) 
                        values ('" . addslashes($_POST['teamname']) . "', '" . customhash(addslashes($_POST['password'])) . "','$status','" . addslashes($_POST['email1']) . "','0','0',$root)";
                        $res = DB::query($query);
                        $query = "select * from teams where teamname='" . addslashes($_POST['teamname']) . "'";
                        $res = DB::findOneFromQuery($query);
                        if ($res) {
                            $_SESSION['msg'] = "Username successfully registered.";
                            redirectTo(SITE_URL);
                        } else {
                            $_SESSION['reg'] = $_POST;
//$_SESSION['msg'] = "Insert into teams (teamname, pass, status, name1, roll1, branch1, email1, phone1, name2, roll2, branch2, email2, phone2, name3, roll3, branch3, email3, phone3, score, penalty) 
//values ('" . addslashes($_POST['teamname']) . "', '" . addslashes($_POST['password']) . "', 'Normal', '" . addslashes($_POST['name1']) . "', '" . addslashes($_POST['roll1']) . "','" . addslashes($_POST['branch1']) . "','" . addslashes($_POST['email1']) . "','" . addslashes($_POST['phno1']) . "','" . addslashes($_POST['name2']) . "', '" . addslashes($_POST['roll2']) . "', '" . addslashes($_POST['branch2']) . "', '" . addslashes($_POST['email2']) . "', '" . addslashes($_POST['phno2']) . "', '" . addslashes($_POST['name3']) . "', '" . addslashes($_POST['roll3']) . "', '" . addslashes($_POST['branch3']) . "','" . addslashes($_POST['email3']) . "','" . addslashes($_POST['phno3']) . "','0','0')";
                            $_SESSION['msg'] = "Some error occured. Try again. If the problem continues contact admin.";
                            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                        }
                    } else {
                        $_SESSION['reg'] = $_POST;
                        $_SESSION['msg'] = "Username already registered.";
                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                    }
                } else {
                    $_SESSION['reg'] = $_POST;
                    $_SESSION['msg'] = "Password mismatch.";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }
            } else {
                $_SESSION['reg'] = $_POST;
                $_SESSION['msg'] = "Username should contain only alphabets numbers @ and _.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        }
// ------------------------------- ACCOUNT UPDATE ---------------------------- //
    }   
     else if (isset($_POST['update'])) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_POST['oldpass']) && isset($_POST['pass1']) && isset($_POST['repass']) && $_POST['pass1'] != "") {
                if ($_POST['pass1'] == $_POST['repass']) {
                    $query = "select * from teams where tid ='" . $_SESSION['team']['id'] . "' and pass ='" . customhash(addslashes($_POST['oldpass'])) . "'";
                    $res = DB::findOneFromQuery($query);
                    if ($res) {
                        $query = "update teams set pass = '" . customhash(addslashes($_POST['pass1'])) . "'where tid='" . $_SESSION['team']['id'] . "'";
                        $res = DB::query($query);
                        $_SESSION['msg'] = "Password Updated";
                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                    } else {
                        $_SESSION['msg'] = "Old password incorrect.";
                        redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                    }
                } else {
                    $_SESSION['msg'] = "Password do not match or password is empty.";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }
            } else if (isset($_POST['group'])) {
                if ($_POST['group'] != '') {
                    $query = "update teams set gid='" . addslashes($_POST['group']) . "' where tid='" . $_SESSION['team']['id'] . "'";
                    $res = DB::query($query);
                    $_SESSION['msg'] = "Group Updated";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                } else {
                    $_SESSION['msg'] = "Incorrect group.";
                    redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }
            } else {
                $_SESSION['msg'] = "Not enough values.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        } else {
            $_SESSION['msg'] = "You should be logged in.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
    } 
    // ------------------------------clar--------------------------------------------------------------------------//
     else if (isset($_POST['clar'])) {
        if (isset($_SESSION['loggedin'])) {
            if (isset($_POST['query']) && $_POST['query'] != "") {
                $query = "Insert into clar (time, pid, tid, query, access) 
                values ('" . time() . "', '" . addslashes($_POST['pid']) . "', '" . $_SESSION['team']['id'] . "', '" . (addslashes($_POST['query'])) . "', 'private')";
                $res = DB::query($query);
                $_SESSION['msg'] = "Clarification posted... we will reply soon.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            } else {
                $_SESSION['msg'] = "Empty Query :(";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        } else {
            $_SESSION['msg'] = "You should be logged in.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
    }
    
     else if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') {  // request only admin can make
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
         
// ------------------------------judgeupdate--------------------------------------------------------------------------//
       
        if (isset($_POST['judgeupdate'])) {
            $admin = Array();
            $admin['mode'] = $_POST['mode'];
            $admin['endtime'] = $_POST['endtime'];
            $curTime = time(); //so both start and endtime use same time
            $admin['starttime'] = $curTime;
            if ($admin['mode'] == "Active" && $admin['endtime'] == "") {
                $admin['endtime'] = ($curTime + 180 * 60);
            } else {
                $admin['endtime'] = ($curTime + $_POST['endtime'] * 60);
            }
            $admin['penalty'] = $_POST['penalty'];
            foreach ($admin as $key => $val) {
                $query = "update admin set value = '$val' where variable = '$key'";
                DB::query($query);
            }
            $_SESSION['msg'] = "Judge Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------addproblem--------------------------------------------------------------------------//
         else if (isset($_POST['addproblem'])) {
            $prob = Array();
            $prob['name'] = addslashes($_POST['name']);
            $prob['code'] = addslashes($_POST['code']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['timelimit'] = addslashes($_POST['timelimit']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['languages'] = addslashes($_POST['languages']);
            $prob['displayio'] = addslashes($_POST['displayio']);
            $prob['maxfilesize'] = addslashes($_POST['maxfilesize']);
            $prob['statement'] = addslashes(file_get_contents($_FILES['statement']['tmp_name']));
            $prob['input'] = addslashes(file_get_contents($_FILES['input']['tmp_name']));
            $prob['output'] = addslashes(addslashes(file_get_contents($_FILES['output']['tmp_name'])));
            $prob['sampleinput'] = addslashes(file_get_contents($_FILES['sampleinput']['tmp_name']));
            $prob['sampleoutput'] = addslashes(addslashes(file_get_contents($_FILES['sampleoutput']['tmp_name'])));
            $prob['solution']=addslashes(file_get_contents($_FILES["CodeSolution"]['tmp_name']));
            if($_POST['pcat']=="blockly"){
                $prob['blocks']= addslashes($_POST['blockly']);
                $prob['pcat']="blockly";
            }
            else $prob['pcat']="Text";
            $sql ="SELECT `AUTO_INCREMENT`FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'problems'";
            $pid=DB::findOneFromQuery($sql);
            $pid=$pid['AUTO_INCREMENT'];
            if ($_FILES['image']['size'] > 0) {
                $prob['image'] = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            }
            $query = "insert into problems (" . implode(array_keys($prob), ",") . ") values ('" . implode(array_values($prob), "','") . "')";
            DB::query($query);
                        if ($_FILES['input']['size'] > 0) {
                $filename= $_FILES["input"]["name"];
		$target_path = "/var/www/html/InputFilesRar/";
		if (!file_exists($target_path)) {
		    mkdir($target_path, 0777, true);
		}
                $target_path .= $filename;
                $source = $_FILES["input"]["tmp_name"];
                $type = $_FILES["input"]["type"];
                $name = explode(".", $filename);
                $accepted_types = array('application/x-rar-compressed', 'application/octet-stream');
                foreach($accepted_types as $mime_type) {
                    if($mime_type == $type) {
                        $okay = true;
                        break;
                    } 
                }
                $continue = strtolower($name[1]) == 'rar' ? true : false;
                if(!$continue) {
                    echo "The file you are trying to upload is not a .rar file. Please try again.";
                }
                else{
                    move_uploaded_file($source, $target_path);
                    $rar_file = rar_open($target_path);
                    if ($rar_file === false)
                        die("Failed to open Rar archive");

                    $entries = rar_list($rar_file); 
                    foreach ($entries as $entry) { 
                        $fileContent="";
                        $stream = $entry->getStream();
                        $filename=$entry->getName();
                        if(substr($filename,strlen($filename)-4)==".txt"){
                            if ($stream === false)
                                die("Failed to obtain stream.");
                            while (!feof($stream)) {
                            $buff=fread($stream, 8192);
                            if ($buff === false)
                                break; //fread error
                                $fileContent.=$buff;
                            }
                            $sql = "insert into testcase (pid,input) values ($pid,'".$fileContent."');";
                            DB::query($sql);
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                        }
                 }
                fclose($stream);
                rar_close($rar_file);
                $files = glob('/var/www/html/InputFilesRar/*'); // get all file names
                foreach($files as $file){ // iterate files
                  if(is_file($file))
                        unlink($file); // delete file
                    }
                  }	
                 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                 $client = socket_connect($socket, $admin['ip'], $admin['port']);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                else {
                    $in="prodoutput".$pid."\n";
                     socket_write($socket, $in, strlen($in));
                     $buf = 'This is my buffer.';
                    if (false !== ($bytes = socket_recv($socket, $buf, 2048, MSG_WAITALL))) {
                        $contents.= "Read $bytes bytes from socket_recv(). Closing socket...";
                    } else {
                        $contents.= "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
                    }
                    socket_close($socket);
                    $contents.=$buf;
                }
            }
            $_SESSION['msg'] = "Problem Added.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        // Update Problem
        else if (isset($_POST['updateproblem'])) {
            $query = "select * from admin where variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            $prob = Array();
            $pid = addslashes($_POST['pid']);
            $prob['name'] = addslashes($_POST['name']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['timelimit'] = addslashes($_POST['timelimit']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['languages'] = addslashes($_POST['languages']);
            $prob['displayio'] = addslashes($_POST['displayio']);
            $prob['maxfilesize'] = addslashes($_POST['maxfilesize']);
            $prob['statement'] = addslashes($_POST['statement']);
            if($_POST['pcat']=="blockly"){
                $prob['blocks']= addslashes($_POST['blockly']);
                $prob['pcat']="blockly";
            }
            else $prob['pcat']="Text";
            if($_FILES["CodeSolution"]['size']>0){
                $prob['solution']=addslashes(file_get_contents($_FILES["CodeSolution"]['tmp_name']));    
            }
             /*$prob['input'] = addslashes(file_get_contents($_FILES['input']['tmp_name']));
                $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                fwrite($client, "del$pid");
                fclose($client);
                */
            if ($_FILES['output']['size'] > 0) {
                $prob['output'] = addslashes(addslashes(file_get_contents($_FILES['output']['tmp_name'])));
                $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                fwrite($client, "del$pid");
                fclose($client);
            }
            if ($_FILES['sampleinput']['size'] > 0) {
                $prob['sampleinput'] = addslashes(file_get_contents($_FILES['sampleinput']['tmp_name']));
            }
            if ($_FILES['sampleoutput']['size'] > 0) {
                $prob['sampleoutput'] = addslashes(file_get_contents($_FILES['sampleoutput']['tmp_name']));
            }
            if ($_FILES['image']['size'] > 0) {
                $prob['image'] = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            }
            foreach ($prob as $key => $val) {
                $query = "update problems set $key = '$val' where pid=$pid";
                DB::query($query);
            }
                   if ($_FILES['input']['size'] > 0) {
                $sql = "delete from testcase where pid=".$pid;
                DB::query($sql);
                $filename= $_FILES["input"]["name"];
                $target_path = "/var/www/html/InputFilesRar/$filename";
                $source = $_FILES["input"]["tmp_name"];
                $type = $_FILES["input"]["type"];
                $name = explode(".", $filename);
                $accepted_types = array('application/x-rar-compressed', 'application/octet-stream');
                foreach($accepted_types as $mime_type) {
                    if($mime_type == $type) {
                        $okay = true;
                        break;
                    } 
                }
                $continue = strtolower($name[1]) == 'rar' ? true : false;
                if(!$continue) {
                    echo "The file you are trying to upload is not a .rar file. Please try again.";
                }
                else{
                    move_uploaded_file($source, $target_path);
                    $rar_file = rar_open($target_path);

                    if ($rar_file === false)
                        die("Failed to open Rar archive");

                    $entries = rar_list($rar_file); 
                    foreach ($entries as $entry) { 
                        $fileContent="";
                        $stream = $entry->getStream();
                        $filename=$entry->getName();
                        if(substr($filename,strlen($filename)-4)==".txt"){
                            if ($stream === false)
                                die("Failed to obtain stream.");
                            while (!feof($stream)) {
                            $buff=fread($stream, 8192);
                            if ($buff === false)
                                break; //fread error
                                $fileContent.=$buff;
                            }
                            $sql = "insert into testcase (pid,input) values ($pid,'".$fileContent."');";
                            DB::query($sql);
                            ini_set('display_errors', 1);
                            ini_set('display_startup_errors', 1);
                            error_reporting(E_ALL);
                        }

                 }
                fclose($stream);
                rar_close($rar_file);
                $files = glob('/var/www/html/InputFilesRar/*'); // get all file names
                foreach($files as $file){ // iterate files
                  if(is_file($file))
                        unlink($file); // delete file
                    }
                  }	
                 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                 $client = socket_connect($socket, $admin['ip'], $admin['port']);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                else {
                    $in="prodoutput".$pid."\n";
                     socket_write($socket, $in, strlen($in));
                     $buf = 'This is my buffer.';
                    if (false !== ($bytes = socket_recv($socket, $buf, 2048, MSG_WAITALL))) {
                        $contents.= "Read $bytes bytes from socket_recv(). Closing socket...";
                    } else {
                        $contents.= "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
                    }
                    socket_close($socket);
                    $contents.=$buf;
                }
            }
            if ($_POST['pid'] != $_POST['newpid']) {
                DB::query("Update runs set pid = $_POST[newpid] where pid = $pid");
                DB::query("Update clar set pid = $_POST[newpid] where pid = $pid");
                $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                fwrite($client, "del$pid");
                fclose($client);
            }
            $_SESSION['msg'] .= "Problem Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
  
// ------------------------------add Find Error problem mena--------------------------------------------------------------------------//
        
        else if (isset($_POST['addFindError'])) {
            $prob = Array();
            $prob['name'] = addslashes($_POST['name']);
            $prob['code'] = addslashes($_POST['code']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['output'] = addslashes($_POST['output']);
            $prob['statement'] = addslashes($_POST['statement']);
            $prob['statement'] = str_replace("<strong>","<e id=\"ab\" >",$prob['statement']);
            $prob['statement'] = str_replace("</strong>","</e>",$prob['statement']);
            $prob['pcat']="Find";
            $query = "insert into problems (" . implode(array_keys($prob), ",") . ") values ('" . implode(array_values($prob), "','") . "')";
            DB::query($query);
            $_SESSION['msg'] = "Problem Added.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        
        
// ------------------------------update Find Error problem mena ------------------------------------------------------------------//
        
        else if (isset($_POST['updateFindError'])) {
            $query = "select * from admin where variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            $prob = Array();
            $pid = addslashes($_POST['pid']);
            $prob['name'] = addslashes($_POST['name']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['statement'] = addslashes($_POST['statement']);
            $prob['statement'] = str_replace("<strong>","<e id=\"ab\" >",$prob['statement']);
            $prob['statement'] = str_replace("</strong>","</e>",$prob['statement']);
            $prob['output'] = addslashes($_POST['output']);
            foreach ($prob as $key => $val) {
                $query = "update problems set $key = '$val' where pid=$pid";
                DB::query($query);
            }
            $_SESSION['msg'] .= "Problem Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
        
        
// ------------------------------add Expect output problem mena ------------------------------------------------------------------//

        else if (isset($_POST['addExpectoutput'])) {
            $prob = Array();
            $prob['name'] = addslashes($_POST['name']);
            $prob['code'] = addslashes($_POST['code']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['output'] = addslashes($_POST['output']);
             $prob['statement'] = addslashes($_POST['statement']);
            //$prob['statement'] = addslashes(file_get_contents($_FILES['statement']['tmp_name']));
            $prob['pcat']="Expect";
            $query = "insert into problems (" . implode(array_keys($prob), ",") . ") values ('" . implode(array_values($prob), "','") . "')";
            DB::query($query);
            $_SESSION['msg'] = "Problem Added.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
               
        
// ------------------------------update Expect output problem mena ------------------------------------------------------------------//
        
        else if (isset($_POST['updateExpectoutput'])) {
            $query = "select * from admin where variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            $prob = Array();
            $pid = addslashes($_POST['pid']);
           // $_POST['newpid'] = addslashes($_POST['newpid']);
            //$prob['pid'] = addslashes($_POST['newpid']);
            $prob['name'] = addslashes($_POST['name']);
            $prob['score'] = addslashes($_POST['score']);
            $prob['type'] = addslashes($_POST['type']);
            $prob['pgroup'] = addslashes($_POST['pgroup']);
            $prob['contest'] = addslashes($_POST['contest']);
            $prob['status'] = addslashes($_POST['status']);
            $prob['statement'] = addslashes($_POST['statement']);
            $prob['output'] = addslashes($_POST['output']);
            foreach ($prob as $key => $val) {
                $query = "update problems set $key = '$val' where pid=$pid";
                DB::query($query);
            }
            /*if ($_POST['pid'] != $_POST['newpid']) {
                DB::query("Update runs set pid = $_POST[newpid] where pid = $pid");
                DB::query("Update clar set pid = $_POST[newpid] where pid = $pid");
                $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
                if ($client === false) {
                    $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
                }
                fwrite($client, "del$pid");
                fclose($client);
            }*/
            $_SESSION['msg'] .= "Problem Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 

// ------------------------------add tutorial mena--------------------------------------------------------------------------//
        
        else if (isset($_POST['addtutorial'])) {
            $prob = Array();
            $prob['name'] = addslashes($_POST['name']);
            $prob['code'] = addslashes($_POST['code']);
            $prob['statement'] = addslashes($_POST['statement']);
            //$prob['statement'] = addslashes(file_get_contents($_FILES['statement']['tmp_name']));
            if ($_FILES['image']['size'] > 0) {
                $prob['image'] = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            }
            $query = "insert into Tutorial (" . implode(array_keys($prob), ",") . ") values ('" . implode(array_values($prob), "','") . "')";
            DB::query($query);
            $_SESSION['msg'] = "Tutorial Added.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        
// ------------------------------update tutorial mena-----------------------------------------------------------------------//
        else if (isset($_POST['updateTutorial'])) {
            $query = "select * from admin where variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            $prob = Array();
            $Tid = addslashes($_POST['Tid']);
            $prob['name'] = addslashes($_POST['name']);
            $prob['statement'] = addslashes($_POST['statement']);
            if ($_FILES['image']['size'] > 0) {
                $prob['image'] = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            }
            foreach ($prob as $key => $val) {
                $query = "update Tutorial set $key = '$val' where Tid=$Tid";
                DB::query($query);
            }
            $_SESSION['msg'] .= "Tutorial Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }   

// ------------------------------delete tutorial mena-----------------------------------------------------------------------//
         else if(isset($_POST['statusdeleteTutorial'])){
            $Tid = addslashes($_POST['Tid']);
            DB::query("delete from Tutorial where Tid =$Tid");
            echo $Tid;
        }
// ------------------------------add contest--------------------------------------------------------------------------//
        else if (isset($_POST['addcontest'])) {
            $newcontest['code'] = addslashes($_POST['code']);
            $newcontest['ranktable'] = addslashes($_POST['code']);
            $newcontest['name'] = addslashes($_POST['name']);
            $date = new DateTime($_POST['starttime']);
            $newcontest['starttime'] = $date->getTimestamp();
            $date = new DateTime($_POST['endtime']);
            $newcontest['endtime'] = $date->getTimestamp();
            $newcontest['announcement'] = addslashes($_POST['announcement']);
            $newcontest['groupname'] = addslashes ($_POST['groupname']);
            $query = "insert into contest (" . implode(array_keys($newcontest), ",") . ") values ('" . implode(array_values($newcontest), "','") . "')";
            echo $query;
            DB::query($query);
            $_SESSION['msg'] = "Contest Added.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------Update contest--------------------------------------------------------------------------//
         else if (isset($_POST['updatecontest'])) {
            $id = addslashes($_POST['id']);
            $newcontest['name'] = addslashes($_POST['name']);
            $date = new DateTime($_POST['starttime']);
            $newcontest['starttime'] = $date->getTimestamp();
            $date = new DateTime($_POST['endtime']);
            $newcontest['endtime'] = $date->getTimestamp();
            $newcontest['groupname'] = addslashes ($_POST['groupname']);
            $newcontest['announcement'] = addslashes($_POST['announcement']);
            foreach ($newcontest as $key => $val) {
                $query = "update contest set $key = '$val' where id=$id";
                DB::query($query);
            }
            $_SESSION['msg'] = "Contest Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------update team--------------------------------------------------------------------------//
         else if (isset($_POST['updateteam'])) {
            $tid = addslashes($_POST['tid']);
            $team['teamname'] = $_POST['teamname'];
            if (preg_match("/^[a-zA-Z0-9_@]+$/", $team['teamname'], $match) && $match[0] == $team['teamname']) {
                if($_POST['password']!=$_POST['oldpassword'])
                    $team['pass'] = customhash(addslashes($_POST['password']));
                $team['status'] = addslashes($_POST['status']);
                $team['email1'] = addslashes($_POST['email1']);
                $query1 = "select teamname from teams where tid=$tid";
               $res1= DB::findOneFromQuery($query1);
                $query = "select teamname from teams where teamname='$team[teamname]'";
               $res = DB::findOneFromQuery($query);
                if ($res==""||$res==null||$res1[teamname]==$team['teamname']){
                    foreach ($team as $key => $val) {
                    $query = "update teams set $key = '$val' where tid=$tid";
                    DB::query($query);
                     
                }
                $_SESSION['msg'] = "User Updated.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                }else{
                    $_SESSION['msg'] = "Username is already exsit.";
                 redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);

                }
                
               
            }
             else {
                $_SESSION['msg'] = "Username didn't satisfy the criteria.";
                redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
            }
        } 
// ------------------------------rejudge--------------------------------------------------------------------------//  
         else if (isset($_POST['rejudge'])) {
            $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
            $check = DB::findAllFromQuery($query);
            $admin = Array();
            foreach ($check as $row) {
                $admin[$row['variable']] = $row['value'];
            }
            if (isset($_POST['filter'])) {
                $sql = "select rid from runs where result='$_POST[filter]' and access != 'deleted'";
                if (isset($_POST['tid'])) {
                    $sql .= "and tid=$_POST[tid]";
                } else {
                    $sql .= "and pid=$_POST[pid]";
                }
                $res = DB::findAllFromQuery($sql);
                $rids = array();
                foreach ($res as $row) {
                    array_push($rids, $row['rid']);
                }
                $query = "update runs set result = NULL, time = NULL where rid in (" . implode(',', $rids) . ")";
            } else {
                $query = "update runs set result = NULL, time = NULL where ";
                if (isset($_POST['rid'])) {
                    $query .= "rid = " . addslashes($_POST['rid']);
                }
                if (isset($_POST['tid']) && isset($_POST['rid'])) {
                    $query .= " and tid=" . addslashes($_POST['tid']);
                } else if (isset($_POST['tid'])) {
                    $query .= "tid=" . addslashes($_POST['tid']);
                }
                if (isset($_POST['pid']) && (isset($_POST['rid']) || isset($_POST['tid']))) {
                    $query .= " and pid=" . addslashes($_POST['pid']);
                } else if (isset($_POST['pid'])) {
                    $query .= "pid=" . addslashes($_POST['pid']);
                }
            }
            $contents="";
            DB::query($query);
            //$client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $client = socket_connect($socket, $admin['ip'], $admin['port']);
            //stream_set_blocking ( $client , false );
            if ($client === false) {
                $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
            }
            else {
                //fwrite($client, 'rejudge\n');
                //stream_set_timeout($client, 2);
                $in="rejudge\n";
                 socket_write($socket, $in, strlen($in));
                 $buf = 'This is my buffer.';
                if (false !== ($bytes = socket_recv($socket, $buf, 2048, MSG_WAITALL))) {
                    $contents.= "Read $bytes bytes from socket_recv(). Closing socket...";
                } else {
                    $contents.= "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
                }
                socket_close($socket);
                $contents.=$buf;
            }
           /* while (!feof($client)) {
                $contents .= fread($client, 8192);    
            }
            
             echo "Reading response:\n\n";
            $buf = 'This is my buffer.';
            if (false !== ($bytes = socket_recv($client, $buf, 2048, MSG_WAITALL))) {
                echo "Read $bytes bytes from socket_recv(). Closing socket...";
                $error="no";
            } else {
                $error=socket_strerror(socket_last_error($client));
                echo "socket_recv() failed; reason: " . socket_strerror(socket_last_error($client)) . "\n";
            }
            
            
            }*/
          //  $hoba=fgets($client, 1024);
            //fclose($client);
            $_SESSION['msg'] .= "Problem(s) set to rejudge.----1".$contents."____".utf8_decode($contents);//.$hoba
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------DQ--------------------------------------------------------------------------//  
         else if (isset($_POST['dq'])) {
            $query = "update runs set result = 'DQ' where rid = " . addslashes($_POST['rid']);
            DB::query($query);
            $_SESSION['msg'] = "Solution Disqualified.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------runaccess--------------------------------------------------------------------------//    
         else if (isset($_POST['runaccess'])) {
            $query = "update runs set access = '" . addslashes($_POST['access']) . "' where rid = " . addslashes($_POST['rid']);
            DB::query($query);
            $_SESSION['msg'] = "Access Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------judgesocket--------------------------------------------------------------------------//    
         else if (isset($_POST['judgesocket'])) {
            $_POST['ip'] = addslashes($_POST['ip']);
            $query = "update admin set value='$_POST[ip]' where variable='ip'";
            DB::query($query);
            $_POST['port'] = addslashes($_POST['port']);
            $query = "update admin set value='$_POST[port]' where variable='port'";
            DB::query($query);
            $_SESSION['msg'] = "Socket Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------judgenotice--------------------------------------------------------------------------//    
         else if (isset($_POST['judgenotice'])) {
            $_POST['notice'] = addslashes($_POST['notice']);
            $query = "update admin set value='$_POST[notice]' where variable='notice'";
            DB::query($query);
            $_SESSION['msg'] = "Notice Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------clarreply--------------------------------------------------------------------------//    
         else if (isset($_POST['clarreply'])) {
            $tid = addslashes($_POST['tid']);
            $pid = addslashes($_POST['pid']);
            $time = addslashes($_POST['time']);
            $reply = addslashes($_POST['reply']);
            $access = addslashes($_POST['access']);
            $query = "update clar set reply='$reply', access='$access' where tid=$tid and pid=$pid and time=$time";
            DB::query($query);
            $_SESSION['msg'] = "Reply Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
// ------------------------------addgroup--------------------------------------------------------------------------//    
                
//-----------------------------------add group -------------------------------------------------------------------------------//
        else if (isset($_POST['addgroup'])) {
            $groupname = addslashes($_POST['groupname']);
            $query = "select groupname from groups";
            $isfound=false;
            $res = DB::findAllFromQuery($query);
                foreach($res as $row){
                 if($groupname==$row['groupname']){
                     $isfound=true;
                 } }
            if($isfound==true){
                $_SESSION['msg'] = "Group is found.";
            }
            
            else{
                $query2 = "insert into groups (groupname) values ('$groupname')";
                DB::query($query2);
                $_SESSION['msg'] = "Group Created.";
            }
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
        
//--------------update group ----------------------------------------------------------------------------------//
         else if (isset($_POST['updategroup'])) {
            $gid = addslashes($_POST['updategroup']);
            $groupname = addslashes($_POST['name']);
            $query = "select groupname from groups where gid=$gid";
            $oldname=DB::findOneFromQuery($query);
            $query = "update groups set groupname ='$groupname' where gid=$gid";
            DB::query($query);
            $query = "update contest set groupname ='$groupname' where groupname='$oldname[groupname]'";
            DB::query($query);
            $_SESSION['msg'] = "Group Updated.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
             } 
        
//------------------------------delete group  ------------------------------------------------------------------------------------//
        else if (isset($_POST['deletegroup'])) {
            $gid = addslashes($_POST['deletegroup']);
            $query = "delete from groups where gid=$gid";
            DB::query($query);
            $query2 = "delete from teamgroups where gid=$gid";
            DB::query($query2);
            $_SESSION['msg'] = "Group Deleted.";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);  
        } 
        
//------------------------------add user in group smith -----------------------------------------------------------------------//
             else if (isset($_POST['adduser'])) {
            $teamname = addslashes($_POST['teamname']);
            $groupname = addslashes($_POST['groupname']);
            $query = "select * from groups where  groupname = '$groupname'";
            $res1= DB::findOneFromQuery($query);
            $query = "select * from teams where teamname='$teamname'";
            $res2 = DB::findOneFromQuery($query);
                 if($res2[teamname]==$teamname){
                     $query = "insert into teamgroups (gid,tid) values ($res1[gid],$res2[tid])";
            DB::query($query);    
            $_SESSION['msg'] = " $res2[teamname] added to ".$groupname ." group ";
                      redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                 }
                 else{
                 $_SESSION['msg'] = " $teamname is not username";
                 redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
                 }
                       
        }
         //---------------------addusers-------------------------------
         else if (isset($_POST['addusers'])) {
     //       echo "HOOOOba";
             var_dump(extension_loaded ('zip'));
             ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $add_all_users =   true;         
 
// Include Spout library 
         //require_once 'spout-2.4.3\src\Spout\Autoloader\autoload.php';
require_once 'spout-2.4.3/src/Spout/Autoloader/autoload.php';
// check file name is not empty
if (!empty($_FILES['file']['name'])) {
      
    // Get File extension eg. 'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES["file"]["name"]);
     
    // check file has extension xlsx, xls and also check 
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
           && $_FILES['file']['size'] > 0 ) {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name']; 
    
        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);
 
        // Open file
        $reader->open($inputFileName);
        $count = 1;
       $count1=0;
       
 
        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {
             
            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as  $rowNumber => $row) {
   
                // It reads data after header. In the my excel sheet, 
                // header is in the first row. 

                if ($rowNumber > 1) { 

                    // Data of excel sheet
                   
                
                   $query ="select teamname from teams where teamname = '" .$row[0]."' ";
//$sql = mysqli_query($conn,$query);
                    $result1= DB::findOneFromQuery($query);

         // $_SESSION['msg']=  $result1["teamname"];
//$recResult = mysqli_fetch_array($sql);

                  
//$existName = $recResult['teamname'];
// echo $existName;   
                    if($result1["teamname"]=="") {
                        
                        
$insertTable= "insert into teams (teamname, pass,email1,status,Score,root) values('".$row[0]."', '".customhash($row[1])."',
'".$row[2]."','Normal',0,0);";
DB::query($insertTable);
                    
                    }
                    else {
  $add_all_users =   false;                   
}
//if(add_all_users)
                    
                    //Here, You can insert data into database. 
                 //   print_r($data);
                     
                }
                $count++;
            }
        }
 
        // Close excel file
        $reader->close();
       if($add_all_users==true)
 $msg= " All users in the file have been added  ";
       else $msg= "Some users already exist ";
    } else {
 
        $_SESSION['msg']= "Please Select Valid Excel File";
    }
 
} else {
 
    $_SESSION['msg'] ="Please Select Excel File";
     
}
$_SESSION['msg']= "$msg";

        //    $_SESSION['msg'] = " $result2[teamname] deleted from ".$groupname ."group" ;
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
             
//------------------------------delete user in group mena -----------------------------------------------------------------------//
            else if(isset($_POST['deleteusers'])){
            $teamname= $_POST['deleteusers'];
            $gid = $_POST['deletegid'];
            $query="select * from teams where teamname = '$teamname'";
            $tid =DB::findOneFromQuery($query);
            $query = "delete from teamgroups where gid=$gid and tid=$tid[tid]";
            DB::query($query);       
            $_SESSION['msg'] =$teamname." is deleted";
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }     
        
//------------------------------cont. delete user in group mena -------------------------------------------------------------//     
        else if(isset($_POST['showgroupuser'])){
             $query2 = "select teams.teamname as teamname from teams,teamgroups,groups where teams.tid=teamgroups.tid and teamgroups.gid=groups.gid and  groups.gid='$_POST[showgroupuser]'";
             $result2 = DB::findAllFromQuery($query2);
            $res="";
            foreach ($result2 as $row2){
                $res.= "<option value='$_POST[showgroupuser]' selected='selected'>$row2[teamname]</option>";
            }
            echo $res;
        }       
    //------------------------------check code of problem mena -------------------------------------------------------------//     

        else if(isset($_POST['checkcode'])){
            $content= addslashes($_POST['checkcode']); 
            $query = "select code from problems";
            $isfound=false;
                $res = DB::findAllFromQuery($query);
                foreach($res as $row){
                 if($content==$row['code']){
                     $isfound=true;
                 } }
            if($isfound==true)
                echo "found";
            else echo "notfound";
        }
        
    //------------------------------check code of Tutorial mena -------------------------------------------------------------//     

                else if(isset($_POST['checkcodeTuto'])){
            $content= addslashes($_POST['checkcodeTuto']); 
            $query = "select code from Tutorial";
            $isfound=false;
                $res = DB::findAllFromQuery($query);
                foreach($res as $row){
                 if($content==$row['code']){
                     $isfound=true;
                 } }
            if($isfound==true)
                echo "found";
            else echo "notfound";
        }
        
//------------------------------check code of contest mena -------------------------------------------------------------//     

                else if(isset($_POST['checkcodecontest'])){
            $content= addslashes($_POST['checkcodecontest']); 
            $query = "select code from contest";
            $isfound=false;
                $res = DB::findAllFromQuery($query);
                foreach($res as $row){
                 if($content==$row['code']){
                     $isfound=true;
                 } }
            if($isfound==true)
                echo "found";
            else echo "notfound";
        }
        

        else if (isset($_POST['statusupdate'])) {
            $pid = addslashes($_POST['pid']);
            $status = addslashes($_POST['status']);
            $res = DB::query("update problems set status = '$status' where pid = '$pid'");
            echo ($res) ? ("1") : ("0");
        }
        
         else if(isset($_POST['statusdelete'])){
            $pid = addslashes($_POST['pid']);
            DB::query("delete from problems where pid =$pid");
            echo $pid;
        }
         
         else if (isset($_POST['addbmsg'])) {
            $bcast['title'] = addslashes($_POST['btitle']);
            $bcast['msg'] = addslashes($_POST['bmsg']);
            DB::insert('broadcast', $bcast);
            $_SESSION['msg'] = 'Message queued for delievery.';
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
         
         else if (isset($_POST['delbmsg'])) {
            $id = addslashes($_POST['id']);
            DB::delete('broadcast', "id=$id");
            $_SESSION['msg'] = 'Message deleted.';
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        } 
         
         else if (isset($_GET['freeze'])) {
            require_once 'components.php';
            if (!in_array(strtolower($_GET['freeze']), array("admin", "broadcast", "clar", "contest", "groups", "logs", "problems", "teams", "runs", "subs_code"))) {
                DB::query("Drop table if exists $_GET[freeze]");
                DB::query("CREATE TABLE $_GET[freeze] (
  rank int(11) NOT NULL,
  teamname text NOT NULL,
  time int(11) NOT NULL,
  penalty int(11) NOT NULL,
  score int(11) NOT NULL,
  solved int(11) NOT NULL,
  PRIMARY KEY (rank)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                $rank = getrankings($_GET['freeze']);
                $i = 1;
                $sql = "INSERT INTO $_GET[freeze] (rank, teamname, time, penalty, score, solved) VALUES";
                $row = array();
                foreach ($rank as $val) {
                    array_push($row, "($i, '$val[teamname]', $val[time], $val[penalty], $val[score], $val[solved])");
                    $i++;
                }
                $row = implode(",", $row);
                DB::query($sql . $row);
                DB::query("update contest set ranktable='$_GET[freeze]' where code = '$_GET[freeze]'");
            } else {
                $_SERVER['msg'] = "Contest code not allowed. Please change contest's code";
            }
            redirectTo("http://" . $_SERVER['HTTP_HOST'] . $_SESSION['url']);
        }
       ///Compliation of Code
        else if(isset($_POST["compilation"])){
                $codeToCompile=addslashes(file_get_contents($_FILES["file"]['tmp_name']));
                $sql = "INSERT INTO compilation (code,language,name) VALUES ('".$codeToCompile."','Java','Main')";
                DB::query($sql);
                $sql ="SELECT `AUTO_INCREMENT`FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'compilation'";
                $cid=DB::findOneFromQuery($sql);
                $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                $client = socket_connect($socket, $admin['ip'], $admin['port']);
                $result="";
                if ($client === false) {
                    $result = "<br/>Cannot connect to Judge: Contact Admin".$cid;
                }
                else {
                    $in="compile".(intval($cid['AUTO_INCREMENT'])-1)."\n";
                     socket_write($socket, $in, strlen($in));
                     $buf = 'This is my buffer.';
                    if (false !== ($bytes = socket_recv($socket, $buf, 50, MSG_WAITALL))) {
                        $result = "Success";
                    } else {
                        $result= "Failed";
                    }
                    socket_close($socket);
                    
                }
               if($result=="Success"){
                        echo $buf;
                    }
                else echo "Cannot connect to Judge: Contact Admin".$result;
            }
         
        else if(isset($_POST["InputTestCases"])){
                $codeToCompile=addslashes(file_get_contents($_FILES["file"]['tmp_name']));
                $rar_file = rar_open('abcde.rar');
                if ($rar_file === false)
                    die("Failed to open Rar archive");

                $entries = rar_list($rar_file); 
                foreach ($entries as $entry) { 
                    $fileContent="";
                    $stream = $entry->getStream();
                    $filename=$entry->getName();
                    if(substr($filename,strlen($filename)-4)==".txt"){
                        if ($stream === false)
                            die("Failed to obtain stream.");
                        while (!feof($stream)) {
                        $fileContent.=fread($stream, 8192);
                            if ($buff === false)
                            break; //fread error
                        }
                    echo $fileContent."<br><br>";
                    }

                    } 
                rar_close($rar_file); 
                $sql = "INSERT INTO compilation (code,language,name) VALUES ('".$codeToCompile."','Java','Main')";
                DB::query($sql);
                $sql ="SELECT `AUTO_INCREMENT`FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'compilation'";
                $cid=DB::findOneFromQuery($sql);
                $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                $client = socket_connect($socket, $admin['ip'], $admin['port']);
                $result="";
                if ($client === false) {
                    $result = "<br/>Cannot connect to Judge: Contact Admin".$cid;
                }
                else {
                    $in="compile".(intval($cid['AUTO_INCREMENT'])-1)."\n";
                     socket_write($socket, $in, strlen($in));
                     $buf = 'This is my buffer.';
                    if (false !== ($bytes = socket_recv($socket, $buf, 50, MSG_WAITALL))) {
                        $result = "Success";
                    } else {
                        $result= "Failed";
                    }
                    socket_close($socket);
                    
                }
               if($result=="Success"){

                        echo $buf;
                    }
                else echo "Cannot connect to Judge: Contact Admin".$result;
            }
            
} 
    else {
    $_SESSION['msg'] = "Judge is in Lockdown mode and so no requests are being processed.";
}
}
?>
