    <script src="<?php echo SITE_URL ?>/js/blockly_compressed.js"></script>
	<script src="<?php echo SITE_URL ?>/js/blocks_compressed.js"></script>
	<script src="<?php echo SITE_URL ?>/js/javascript_compressed.js"></script>
	<!--<script src="<?php echo SITE_URL ?>/js/GameCustomBlock.js"></script>-->
	<script src="<?php echo SITE_URL ?>/js/customblock.js?version=2"></script>	  
	<script src="<?php echo SITE_URL ?>/js/run.js"></script>	
	<!--<script src="<?php echo SITE_URL ?>/js/runblock.js"></script> -->
	<script src="<?php echo SITE_URL ?>/js/en.js"></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>/codemirror/lib/codemirror.js'></script>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/codemirror/lib/codemirror.css">
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/clike/clike.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/pascal/pascal.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/perl/perl.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/php/php.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/python/python.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/mode/ruby/ruby.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/addon/edit/closebrackets.js"></script>
    <script src="<?php echo SITE_URL; ?>/codemirror/addon/edit/matchbrackets.js"></script>
    <!--mena-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<style>
  div{  cursor: pointer;
        }
</style>
<?php
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
    
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        if (isAdmin()) {
            $query = "select * from problems where code = '$_GET[code]'";
        } else {
            $query = "select * from problems where code = '$_GET[code]' and status != 'Deleted'";
        }
        $result = DB::findOneFromQuery($query);
        if ($result == NULL) {
            echo errorMessageHTML("<b>Problem not found!</b>");
        } else {
            if(isAdmin()){
                 if($result["pcat"]=="game"){
               
            }
                else{
                     echo "<a class='btn btn-default pull-right' style='margin-top: 10px;' href='" . SITE_URL . "/adminproblem/$_GET[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                }
                }
            if ($result['contest'] == 'contest' && !isAdmin()) {
                $query = "select starttime from contest where code = '$result[pgroup]'";
                $check = DB::findOneFromQuery($query);
                if ($check['starttime'] > time()) {
                    echo errorMessageHTML("<b>Contest not yet started!</b>");
                    $flag = 1;
                } 
                else { $flag = 0;}
            } 
            
            else {$flag = 0;}
            if ($flag == 0) {
                $statement = stripslashes($result["statement"]);
                $statement = preg_replace("/\n/", "<br>", $statement);
                $statement = preg_replace("/<image \/>/", "<img src='data:image/jpeg;base64,$result[image]' />", $statement);
                echo "<div class='page-header text-center'><h1>$result[name]</h1></div>";
                echo "<div style='text-align:left'>";
                
                if($result['contest'] == 'contest'){
                    echo "<span class='btn-group'>".
                        "<a class='btn btn-default' href='". SITE_URL . "/contests/$result[pgroup]'><span class='glyphicon glyphicon-chevron-left'></span> Problems</a>".
                        "</span>";
            }
            
        
    //----------------------------------------------------------------------------------------------------------------------------
            
                if($result["pcat"]=="blockly"){
                    echo "<span class='btn-group' style='float:right;'>" . ((isset($_SESSION['loggedin'])) ? ("<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]," . $_SESSION['team']['name'] . "'>My Submissions</a>") : ("")) . "<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]'>All Submissions</a></span></div>
                    <br/><br/>".$statement."<br/><br/>";
                    
                    if ($result[sampleinput] && $result[sampleoutput]) {
                echo "<div class='row'>
                    <div class='col-md-6' style='overflow-x: auto;'><h4>Sample Input</h4><div class='limit'><pre class='brush: text'>$result[sampleinput]</pre></div></div>
                    <div class='col-md-6' style='overflow-x: auto;'><h4>Sample Output</h4><div class='limit'><pre class='brush: text'>$result[sampleoutput]</pre></div></div>
                </div>";
            }   
                ?>
         <div class="row">
             <div class='col-md-12'>
             <form id='form' action='<?php echo SITE_URL; ?>/process.php' method='post' enctype='multipart/form-data'>
                     <div class="col-md-7" style="overflow-x:auto;height:500px;"  id="blocklyDiv" ></div>
                     <textarea class="col-md-5" id="sub" name="sub" ></textarea>
                    <input type="hidden" value="<?php echo ((isset($_GET['code']) && $_GET['code'] != "")?($_GET['code']):($prob['code'])); ?>" name="probcode"/>
                 <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <input type='submit' value='Submit' class='btn btn-large btn-primary' name='submitcode'/>   
                </form> 
             </div>  
            </div> 
                <div class='row'>
                          <div class='col-md-12'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body text-center'>
            
<?php     echo $result["blocks"]; ?>
                  <script>
                        var myCodeMirror,output = '';
                             $(document).ready(function() {
                                myCodeMirror = CodeMirror.fromTextArea(document.getElementById('sub'), {'matchBrackets': true, 'autoCloseBrackets': true, 'lineWrapping': true, 'mode': 'text/x-java', 'lineNumbers': true,
                                            'readOnly': false,'indentUnit': 4});
                                myCodeMirror.setValue(output);   
                            });
   
                            var workspace = Blockly.inject('blocklyDiv', {
                                toolbox: document.getElementById('toolbox')
                            });
                            workspace.addChangeListener(print);
                            var defaultBlocks = document.getElementById('default');
                            Blockly.Xml.domToWorkspace(workspace, defaultBlocks);
                            function print() {
                                output = '';
                                var arr = workspace.getTopBlocks();
                                if (arr.length != 0) {
                                    var t = arr[0].type;
                                    output += Blockly.JavaScript[t](arr[0], ' ');
                                     myCodeMirror.setValue(output);   
                                } else {
                                    document.getElementById('sub').value = '';
                                    myCodeMirror.setValue('');   
                                }
                                myCodeMirror.refresh();
                            }
                        </script>
    
                   <?php     }
 //----------------------------------------------------------------------------------------------------------------------------
     else if($result["pcat"]=="game"){
                       echo "<span class='btn-group' style='float:right;'>" . ((isset($_SESSION['loggedin'])) ? ("<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]," . $_SESSION['team']['name'] . "'>My Submissions</a>") : ("")) . "<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]'>All Submissions</a></span></div>
                    <br/><br/><br/>";
               
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    ?>
                     <form id="gameForm" action="<?php echo SITE_URL ; ?>/process.php" >  
                    <input type='hidden' name='tid' value='<?php echo $_SESSION['team']['id']; ?>' />
                    <input type='hidden' name='pcode' value='<?php echo $_GET["code"]; ?>' />
        
                     <script>
                    $( "#gameForm" ).submit(function( event ) {
                          // Stop form from submitting normally
                          event.preventDefault();
                          run();
                        });
                        function SubmitGame(status){
                          var $form = $( "#gameForm" ),
                            term = (status==0)?"WA":"AC",
                            url = $( "#gameForm" ).attr("action"),
                            tid=$form.find( "input[name='tid']" ).val(),
                            pcode=$form.find( "input[name='pcode']" ).val();
                          // Send the data using post /process.php
                          var posting = $.post( url, { tid : tid , pcode: pcode , gamestatus : term } );
                          // Put the results in a div
                          posting.done(function( response ) {
                              window.location.href=response;
                            //var content = $( data ).find( "#content" );
                            //$( "#result" ).empty().append( content );
                          });
                        }
                    </script>    
                    <?php     
                    
                    $filecontent= file_get_contents(SITE_URL."/games/".$_GET["code"].".php");
                    $filecontent=str_replace("img/",SITE_URL."/games/img/",$filecontent);
                    echo $filecontent;
            echo "</form><br>";
         echo " <div class='row'>
                          <div class='col-md-12'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body text-center'>";
                        
                }
//--------------------------------------------mena-----------------------------------------------------------------------
                    else if($result["pcat"]=="Text"){
                        
                   echo "<span class='btn-group' style='float:right;'>" . ((isset($_SESSION['loggedin'])) ? ("<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]," . $_SESSION['team']['name'] . "'>My Submissions</a>") : ("")) . "<a class='btn btn-default' href='" . SITE_URL . "/status/$_GET[code]'>All Submissions</a></span></div>
            <br/><br/>" . $statement . "<br/><br/>";
            if ($result[sampleinput] && $result[sampleoutput]) {
                echo "<div class='row'>
                    <div class='col-md-6' style='overflow-x: auto;'><h4>Sample Input</h4><div class='limit'><pre class='brush: text'>$result[sampleinput]</pre></div></div>
                    <div class='col-md-6' style='overflow-x: auto;'><h4>Sample Output</h4><div class='limit'><pre class='brush: text'>$result[sampleoutput]</pre></div></div>
                </div>";
            }
            echo "<strong>Languages: </strong>$result[languages]<br/><br/>
                <div class='row'>
                <div class='col-md-4'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body'>
                            <strong>Time Limit: </strong>$result[timelimit] Second(s)<br/>
                            <strong>Score: </strong>$result[score] Point(s)<br/>
                            <strong>Input File Limit: </strong>$result[maxfilesize] Bytes<br/><br/>
                            ". (($result['status'] == 'Active' || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == "Admin")) ? ("<a class='btn btn-block btn-success' href='" . SITE_URL . "/submit/$_GET[code]'>Submit <span class='glyphicon glyphicon-cloud-upload'></span></a>") : ('')) . "
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body text-center'>";}
//----------------------------------------------------------------------------------------------------------------------------
                else if ($result["pcat"]=="Expect"){
                     echo "<span class='btn-group' style='float:right;'></span></div>";
                     echo "<h1>What Output Should Be Produced By This Code</h1><br/>
                <div class='row'>
                <div class='col-md-12'>
                        <pre class='panel-body'>
                          $result[statement]
                          </pre></div></div>";  ?>
                
                <b>Enter your answer :</b>
                <div class='row'>
                <div class='col-md-12'>
                    <div class='panel-default'>
                        <form class='form-horizontal' role='form' method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                    <textarea class='form-control' name='output' style='width: 100%; height: 100px;'></textarea>
                        <br>
                         <input type='submit' class='btn btn-default btn-block' value='Submit' name='ExpectedOutputSubmit' />
                             <input type="hidden" value="<?php echo ((isset($_GET['code']) && $_GET['code'] != "")?($_GET['code']):($prob['code'])); ?>" name="probcode"/>
                         </form>
                    </div></div></div>
                             <br>
                   <div class='row'>
                          <div class='col-md-12'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body text-center'>
                <?php 
                 
                 }     
//----------------------------------------------------------------------------------------------------------------------------
               else if ($result["pcat"]=="Find"){
                    echo "<span class='btn-group' style='float:right;'></span></div>";
                     echo "<h1>Find errors in code by using click and you have 3 times error</h1><br/>
                      <div class='row'>
                    <div class='col-md-12'>
                    <i class='fa fa-heart' id='heart1' style='font-size:36px;color:red'></i>
                <i class='fa fa-heart' id='heart2' style='font-size:36px;color:red'></i>
                <i class='fa fa-heart' id='heart3' style='font-size:36px;color:red'></i>
            <pre id='findError' class='panel-body'>
                          $result[statement]
                </pre> </div>
                        </div>";
                            ?>
                
            <input type="hidden" value="<?php echo ((isset($_GET['code']) && $_GET['code'] != "")?($_GET['code']):($prob['code'])); ?>" name="probcode" id="probcode"/>
                <input type='hidden' value="<?php $temp=((isset($_GET['code']) && $_GET['code'] != "")?($_GET['code']):($prob['code'])); $res = DB::findOneFromQuery("Select output from problems where code='$temp'"); 
                                            echo $res["output"]; ?>" name="sol" id="sol"/><br>
                       <div class='row'>
                          <div class='col-md-12'>
                    <div class='panel2 panel-default'>
                        <div class='panel-body text-center'>
     <script>
         var errorArr=document.getElementsByTagName('e');
         var sol=document.getElementById('sol').value;
         var probcode=document.getElementById('probcode').value;
         var solArray;
         if(sol.includes("\r\n"))
             solArray=sol.split("\r\n");
         else solArray=sol.split("\n");
         var lives=3;
         function CheckForWin(){
             var count=0;
             //errorArr=document.getElementsByTagName('e');
             for(var i=0;i<errorArr.length;i++){
                 if(errorArr[i].style.color=="blue")
                     count++;
             }
             if(count>=errorArr.length)
                 return true;
             else false;
         }
         
         function RightClick(event){
			event.stopPropagation();
            var ind,elem;
            if(event.target.id != "" && event.target.id != null)
               elem=event.target;
            else  
               elem=event.target.parentNode;
			for (var i =0;i<errorArr.length;i++)
                    if(elem==errorArr[i])
                        ind=i;
            elem.textContent=solArray[ind];
            elem.style.color="blue";
            if(CheckForWin()){
                 $.ajax({
                     data:{FindErrorCode:probcode,status:"AC"},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                         window.location.href=result;
                     }
                 });
             }
		}
		function FaultClick(event){
            document.getElementById('heart'+lives).style.display="none";
            lives--;
            if(lives<=0){
                $.ajax({
                     data:{FindErrorCode:probcode,status:"WA"},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                         window.location.href=result;
                     }
                 });
            }
        }
		for (var i =0;i<errorArr.length;i++)
			errorArr[i].addEventListener('click',RightClick);
		document.getElementById('findError').addEventListener('click',FaultClick);
		
	</script>
                
                <?php }
    
                
  //-------------------------------------------------------------------------------------------------------------------              
                

                if (isset($_SESSION['loggedin'])) {
                    ?>
                            <form action="<?php echo SITE_URL; ?>/process.php" role='form' method="post">
                                <input type="hidden" value="<?php echo $result['pid']; ?>" name="pid" />
                                <textarea class='form-control' style="" name="query" placeholder="Post clarification..."></textarea><br/>
                                <input name="clar" type="submit" class="btn btn-default btn-block" value="Send" />
                            </form>
                    <?php
                }
                else{
                    echo "<h3 class='text-center'>Login to post clarification.</h3>";
                }?>
                        </div>
                    </div>
                </div> </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel2 panel-default">
                        <div class="panel-body">
                                    <?php
                            $query = "select * from clar where pid =".$result["pid"];
                            if($_SESSION['team']['status'] != 'Admin')
                            $query .= " and (access = 'Public' or (access = 'Private' and tid =".$_SESSION['team']['id'].") ) ";
                            $clar = DB::findAllFromQuery($query);
                            if ($clar != NULL) {
                                $id = 0;
                                foreach ($clar as $row) {
                                    if($id != 0)
                                        echo '<hr>';
                                    $id++;
                                    $query = "select teamname from teams where tid = $row[tid]";
                                    $team = DB::findOneFromQuery($query);
                                    $rowquery = preg_replace("/\n/", " ",htmlspecialchars($row['query']));
                                    $rowreply = preg_replace("/\n/", " ", htmlspecialchars($row['reply']));
                                    echo "<b><a href='" . SITE_URL . "/teams/$team[teamname]'>$team[teamname]</a>:<br/>Q. $rowquery</b><br/>" . (($rowreply != "") ? ("A. $rowreply") : (''));
                                    if (isAdmin()) {
                                        echo "<form role='form' method='post' action='" . SITE_URL . "/process.php'>";
                                        echo "<input type='hidden' name='tid' value='$row[tid]' /><input type='hidden' name='pid' value='$row[pid]' /><input type='hidden' name='time' value='$row[time]' />
                                                <textarea class='form-control' name='reply' placeholder='Enter response...'>$row[reply]</textarea><br/>
                                                    <div class='form-inline'><select style='width: 250px;' class='form-control' name='access'><option value='public' " . (($row['access'] == "public") ? ("selected='selected' ") : ("")) . ">Public</option><option value='private' " . (($row['access'] == "private") ? ("selected='selected' ") : ("")) . ">Private</option><option value='deleted' " . (($row['access'] == "deleted") ? ("selected='selected' ") : ("")) . ">Deleted</option></select>  <input type='submit' class='btn btn-success' name='clarreply' value='Reply / Change Reply'/></div>
                                            </form>";
                                    }
                                }
                            }
                            else{
                              echo "<h3 class='text-center'>No Clarifications.</h3>";
                            }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
            }
        }
    } 
    else {
        $button_drop="<div class=\"btn-group\">

            <button data-toggle=\"dropdown\" class=\"btn btn-default dropdown-toggle\"><span class=\"caret\"></span></button>
            <ul class=\"dropdown-menu\">
                <li id=\"prob_tag\"><a>Hide/Show Tag</a></li>
            </ul>
        </div>";
        echo '<script src="'.SITE_URL.'/js/custom.js" type="text/javascript"></script>';
        echo '<div class="page-header text-center"><h1>Practice Problems&nbsp;'.$button_drop.'</h1></div>';

        if (isset($_SESSION['loggedin'])){
            $solved = array();
            $query = "select distinct(pid) as pid from runs where result = 'AC' and tid = ".$_SESSION['team']['id'];
            $res = DB::findAllFromQuery($query);
            foreach($res as $row){
                $solved[$row['pid']] = true;
            }
        }
        $editorial = array();
        $query = "select pid from editorials";
        $res = DB::findAllFromQuery($query);
        foreach($res as $row){
            $editorial[$row['pid']] = 1;
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == "Admin") {
            $query = "select pid, name, code, status, pgroup, type, score, solved, total from problems where contest='practice' order by pgroup asc";
        } else {
            $query = "select pid, name, code, status, pgroup, type, score, solved, total from problems where status != 'Deleted' and contest='practice' order by pgroup asc";
        }
        $res = DB::findAllFromQuery($query);
        $lastgroup = "";
        $counter=0;
        if(empty($res)){
            echo "<h3 class='text-center'>No problems available :( Check back later</h3>";
        }
        foreach ($res as $row) {
            if ($row['pgroup'] != $lastgroup){
                if($lastgroup!="") echo "</table></div>";
                echo "<div class=\"text-center\"><h3>$row[pgroup]</h3></div>";
                echo '<div id="table_prob_tag">';
                echo "<table  class='table table-hover'>";
                echo "<thead><tr><th>Name</th><th class='tabletaghidden'>Type</th><th>ID</th><th>Submissions</th><th>Score</th><th>Editorial</th></tr></thead>";
                $counter=$counter++;
                $lastgroup = $row['pgroup'];
            }
            echo "<tr ".((isset($solved[$row['pid']]))?("class='success'"):(""))."><td><a href='" . SITE_URL . "/problems/$row[code]'>$row[name]</a></td><td class='tabletaghidden' >$row[type]</td><td><a href='" . SITE_URL . "/submit/$row[code]'>$row[code]</a></td><td><a href='" . SITE_URL . "/status/$row[code]'>$row[solved]/$row[total]</a></td><td><span class='badge'>$row[score] pt</span></td><td>" . (isset($editorial[$row['pid']])?("<a href='" . SITE_URL . "/editorial/$row[code]'>Link</a>"):(($_SESSION['team']['status'] == 'Admin')?"<a href='". SITE_URL . "/admineditorial/$row[code]'>Add</a>":"None")) . "</td></tr>";
            $counter=$counter+1;
        }
        if(!empty($res)) echo "</table></div>"; //in the rare event there is NOTHING, need to remove divs to avoid fucking up layout
    }
} 

else {
    echo "<br/><br/><br/><div style='padding: 10px;'><h1>Lockdown Mode :(</h1>This feature is now offline as Judge is in Lockdown mode.</div><br/><br/><br/>";
}
?>
