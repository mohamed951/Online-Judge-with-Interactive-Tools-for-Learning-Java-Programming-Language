<head>
    <style>
        form{
            border: 10px;
            border-color: black;
        }
    </style>
</head>    
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') {
    echo "<div class=\"page-header text-center\"><h1>Groups Settings</h1></div>
        <form method='post' action='".SITE_URL."/process.php'>
        <div class='col-lg-3'><input class='form-control' type='text' id='code1' name='groupname' required placeholder='group name'/></div>
         <input class='btn btn-default' type='submit' name='addgroup'   value='Add Group' />
        </form>";
        $query = "select * from groups";
        $result = DB::findAllFromQuery($query);
    echo "<h3 class='text-center'>List of Groups</h3>";
        echo"<hr><br>
        <div class='row'>
            <div class='col-lg-6'>
            <div class='panel2 panel-default'>
            <div class='panel-body text-center'> 
            <form role='form' method='post' action='".SITE_URL."/process.php'>
           <select class='form-control'  id='updategroupname' onchange='updatgroups();'>" ;
    foreach ($result as $row){
        echo "<option value='$row[gid]' selected='selected'>$row[groupname]</option>";
    }
    echo "</select><br>";
    echo" <input class='form-control' type='text' id='update' name='groupname' required placeholder='Enter new group name'/><br>";
   echo" <input class='btn btn-primary' type='button' onclick='updategroup2(event);reload();'id='updategroup' value='Update Group'/><br>
    </form></div></div></div>";
        
        
//-----------------------------------delete group ----------------------------------------------------------------------------------
         echo"<div class='col-lg-6'>
        <div class='panel2 panel-default'>
        <div class='panel-body text-center'> 
        <form role='form' method='post' action='".SITE_URL."/process.php'>
           <select class='form-control'  id='groupname' onchange='deletegroups()'>";
    foreach ($result as $row){
        echo "<option value='$row[gid]' selected='selected'>$row[groupname]</option>";
        }
    echo "</select><br><br><br>";
    echo "<input class='btn btn-danger' type='button' onclick='deletegroup(event);reload();' id='deleteg' value='Delete Group'/><br><br>
    </form></div></div></div></div>";    
//----------------------------------------add user in group-----------------------------------------------------------------------------
     echo"<div class='row'>
     <div class='col-lg-6'>
     <div class='panel2 panel-default'>
            <div class='panel-body text-center'> 
            <form role='form' method='post' action='".SITE_URL."/process.php'>
           <select class='form-control'  name='groupname'>";
    foreach ($result as $row){
        echo "<option value='$row[groupname]' selected='selected'>$row[groupname]</option>";
    }
    echo "</select><br>";
    echo" <input type='hidden' name='gid' value='$row[gid]'/>";
  //  echo "<h4 style='text-align:left;margin:-10px;'>Username</h4>";
    echo"<br><input class='form-control' type='text' name='teamname'placeholder='Enter Username'/> <br>
    <input class='btn btn-primary' type='submit' onclick='reload();' name='adduser' value='Add Uesr'/><br>
    </form></div></div></div>";
    
//--------------------------------------------delete user from group -----------------------------------------------------------------
    
     echo"<div class='col-lg-6'>
     <div onload='changeFunc()' class='panel2 panel-default'>
                <div class='panel-body text-center'> ";
       echo" <select class='form-control' id='selectBox' onchange='changeFunc();'>";
    foreach ($result as $row){
        echo "<option value='$row[gid]'  selected='selected'>$row[groupname]</option>";  
    }
    echo "</select><br><br>";
   echo "<select class='form-control'  id='users'>";
    foreach ($result as $row){
        echo "<option value='' selected='selected'></option>";
    }echo "</select><br>";
    echo " <input class='btn btn-danger' type='button' onclick='deleteuser(event);reload();' id='delete' value='Delete Uesr'/><br>
            </div></div></div></div>";
//------------------------------------------------------------------------------------------------------------------
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL);}
?>
<script>
changeFunc();
    
function deletegroups(){ 
            var groupname = document.getElementById("groupname");
           var selectedValue = groupname.options[groupname.selectedIndex].value;
       }
    
    function deletegroup(event) { 
       if(event.target.id=="deleteg"){
            var groupname = document.getElementById("groupname");
           var selectedValue = groupname.options[groupname.selectedIndex].value;
           mydeletegroup(selectedValue);
       }}
    
  function mydeletegroup(gid) { 
       $.ajax({
                     data:{deletegroup:gid},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                     }
                 });}  
    
    
    function updatgroups() {
    var updategroupname = document.getElementById("updategroupname");
    var selectedValue = updategroupname.options[updategroupname.selectedIndex].value;
    }
        
    function updategroup2(event) { 
       if(event.target.id=="updategroup"){
             var updategroupname = document.getElementById("updategroupname");
           var selectedValue = updategroupname.options[updategroupname.selectedIndex].value;
            var update = document.getElementById("update").value;
           myupdategroup(selectedValue,update);}}
    
  function myupdategroup(gid,update) { 
       $.ajax({
                     data:{updategroup:gid,name:update},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                     }
                 });}  
    
     
function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    $.ajax({
                     data:{showgroupuser:selectedValue},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                        document.getElementById("users").innerHTML=result;
                     }
                 });}
        
    function deleteuser(event) { 
       if(event.target.id=="delete"){
            var selectBox1 = document.getElementById("users");
            var selectedValue1 = users.options[users.selectedIndex].text;
            var selectBox2 = document.getElementById("selectBox");
            var selectedValue2 = selectBox.options[selectBox.selectedIndex].value;
           mydeleteuser(selectedValue1,selectedValue2);}}
    
  function mydeleteuser(username,gid) { 
       $.ajax({
                     data:{deleteusers:username,deletegid:gid},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                     }
                 });}  
    
    function reload() {
            location.reload(true / false);
        }


</script>


