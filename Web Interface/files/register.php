<?php
if ( (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin'&&$_SESSION['team']['root'] == 1)) {
  //  if (isset($_SESSION['loggedin'])) {
    //    redirectTo(SITE_URL);
    //}
    
    ?>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#teamname').focus(function() {
                $('#teamname').tooltip('show');
            });
            $('#teamname').blur(function() {
                $('#teamname').tooltip('hide');
            });
            
            for(var i = 1; i <= 3; i++){
                var id = '#roll' + i;
                $(id).focus(function() {
                    console.log('sk11');
                    $(this).tooltip('show');
                });
                $(id).blur(function() {
                    $(this).tooltip('hide');
                });
            }

            
        });

        function validate(){

            var regex = /[A-Z]{2,6}[/][0-9]{4,5}[/]20[0-9]{2}$/;
                //console.log('A'.match(regex));
                var roll1 = document.getElementById("roll1").value;
                var m = regex.exec(roll1);
                console.log(roll1);
                if(m==null)
                {
                    $("#roll1").tooltip('show');
                    document.getElementById("roll1").style.borderColor="red";
                    return false;
                }
                    
                return true;

           }
        function changeFunc(){
            
             var selectBox = document.getElementById("selectBox");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            document.getElementById("users").value=selectedValue;
            
        }
    </script>
    <h1>Register</h1>
    <form method='post' class='form-horizontal'  role="form" onsubmit="return validate()" action='<?php echo SITE_URL; ?>/process.php'>
        <div class='col-lg-12'>
            <div class='form-group'>
                <label class="col-lg-2 control-label" for='teamname'>Username</label>
                <div class="col-lg-4">
                    <input class='form-control' type='text' name='teamname' id='teamname' required data-placement='right' title='Only alphabets numbers _ and @ are allowed' <?php
                    if (isset($_SESSION['reg']['teamname'])) {
                        echo "value='" . $_SESSION['reg']['teamname'] . "' ";
                        unset($_SESSION['reg']['teamname']);
                    }
                    ?>/></div>
            </div>
            <div class='form-group'>
                <label class="col-lg-2 control-label" for='pass1'>Password</label>
                <div class="col-lg-4">
                    <input class='form-control' type='password' name='password' id='pass1' required />
                </div>
            </div>
            <div class='form-group'>
                <label class="col-lg-2 control-label" for='pass2'>Re-Password</label>
                <div class='col-lg-4'><input class='form-control' type='password' name='repassword' id='pass2' required/></div>
            </div>
            <!--<div class='form-group'>
                <label class='col-lg-2 control-label' for='pass2'>Group</label>
                <div class='col-lg-4'>
                    <select name="group" class='form-control'>
                        < ?php
                        //$query = 'select * from groups';
                        //$result = DB::findAllFromQuery($query);
                        foreach ($result as $row) {
                            echo "<option value='$row[gid]'>$row[groupname]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>-->
            
            <div class='form-group'>
                <label class='col-lg-2 control-label' for='email1'>E-mail</label>
                <div class='col-lg-4'><input class='form-control' type='email' name='email1' id='email1' required <?php
                    if (isset($_SESSION['reg']['email1'])) {
                        echo "value='" . $_SESSION['reg']['email1'] . "' ";
                        unset($_SESSION['reg']['email1']);
                    }
                    ?>/></div>
            </div>
            
            <div class='form-group'>
                <label class='col-lg-2 control-label' for='pass2'>Status of user</label>
                <div class='col-lg-4'>
                    <select  class='form-control' id='selectBox' onchange='changeFunc()'>
                        <option value='Student'>Student</option>
                        <option value='Professor'>Professor</option>
                         <option value='Admin'>Admin</option>
                    </select>
                    <input type='hidden' name='status'id='users' value=''/>
                </div>
            </div>
            <tr>
            <td>
            </tr>
            <div class='col-lg-12'>
            <div class='form-group'>
                <label class='col-lg-2 control-label'></label>
                <div class='col-lg-4'><input type='submit' name='register' value='Submit' class='btn btn-primary btn-large'/></div>
            </div>
        </div>
        </div>
    </form>
    
    <form role='form' method='post' action='<?php echo SITE_URL; ?>/process.php' enctype=
            'multipart/form-data'>
        <div class='form-group'>
                <h1>Register Group Of Users</h1><br>
                <div class='col-lg-4'>
                    <input class='btn btn-danger' type='file'  name='file' > <br>
                    Upload .xlsx file,make the first row for titles,they must be in this order(username,password,email)<br>
                    ,then start enter the data of the first student in the second row (A2,B2,C2).

                </div>
            </div>
    <input class='btn btn-primary' type='submit' name='addusers' value='Upload'/><br>
    
    </form>
    <?php
}else{
    echo "<br><br><h1>Sorry, You can't have access to this page</h1>";
    
}
?>
