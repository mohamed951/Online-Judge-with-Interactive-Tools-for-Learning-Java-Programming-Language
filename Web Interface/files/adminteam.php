<?php
if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin'&&$_SESSION['team']['root'] ==1) {
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        $query = "select * from teams where teamname='$_GET[code]'";
        $res = DB::findOneFromQuery($query);
        ?>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#teamname').focus(function() {
                    $('#teamname').tooltip('show');
                });
                $('#teamname').blur(function() {
                    $('#teamname').tooltip('hide');
                });
            });
        </script>
<!-------------------------------------update teams---------------------------------------------------------------------------------->
        <div class="text-center page-header"><h1>User Settings - <?php echo $_GET['code']; ?></h1></div>
        <form method='post' class='form-horizontal' action='<?php echo SITE_URL; ?>/process.php'>
            <input type="hidden" value="<?php echo $res['tid']; ?>" name="tid" />
            <div class='form-group'>
                <label for='teamname' class="control-label col-lg-2">Usename</label>
                <div class='col-md-4'><input class="form-control" type='text' name='teamname' id='teamname' data-placement='right' title='Only alphabets numbers _ and @ are allowed' value="<?php echo $res['teamname']; ?>"/></div>
            </div><br>
            <div class='form-group'>
                <label class="control-label col-lg-2" for='password'>Password</label>
                <div class='col-md-4'><input class="form-control" type='text' name='password' id='password' value='<?php echo $res['pass']; ?>'/></div>
                <input class="form-control" type='hidden' name='oldpassword' id='oldpassword' value='<?php echo $res['pass']; ?>'/>
            </div><br>
            <div class='form-group'>
                <label class="control-label col-lg-2" for='status'>Status</label>
                <div class='col-md-4'>
                    <select class="form-control" name='status' id='status'>
                        <option value="Normal" <?php if ($res['status'] == "Normal") echo "selected='selected'"; ?> >Normal</option>
                        <option value="Waiting" <?php if ($res['status'] == "Waiting") echo "selected='selected'"; ?> >Waiting</option>
                        <option value="Suspended" <?php if ($res['status'] == "Suspended") echo "selected='selected'"; ?> >Suspended</option>
                        <option value="Deleted" <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?> >Deleted</option>
                        <option value="Admin" <?php if ($res['status'] == "Admin") echo "selected='selected'"; ?> >Admin</option>
                    </select>
                </div>
            </div><br>
             <div class='form-group'>
                <label class="control-label col-lg-2" for='email1'>E-mail</label>
                <div class='col-md-4'><input class="form-control" type='text' name='email1' id='email1' value="<?php echo $res['email1']; ?>" /></div>
            </div><br>
            <div class='form-group'>
                <label class='control-label col-lg-2'></label>
                <div class='col-md-8'><input type='submit' name='updateteam' value='Update User' class='btn btn-primary btn-large'/></div>
            </div>
        </form>
        <?php
    } 
    
    else {
        $query = "select tid, teamname,status,root from teams";
        $res = DB::findAllFromQuery($query);
        
        echo "<div class='text-center page-header'><h1>List of Users</h1></div><table class='table table-hover'><thead><tr><th>ID</th><th>Name</th><th>Status</th><th>Type</th><th>Options</th></tr></thead>";
        $type="";
        foreach ($res as $row) {
            if($row[root]==1 && $row[status]=="Admin"){
            $type="Admin";
        }else if($row[root]==0 && $row[status]=="Admin"){
             $type="Professor";   
            }else{
                $type="Student";
            }
            echo "<tr><td>$row[tid]</td><td>$row[teamname]</td><td>$row[status]</td><td>$type</td><td><a class='btn btn-primary' href='" . SITE_URL . "/adminteam/$row[teamname]'><i class='glyphicon glyphicon-edit'></i> Edit</a></td></tr>";
        }
        echo "</table>";
    }
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL);
}
?>
