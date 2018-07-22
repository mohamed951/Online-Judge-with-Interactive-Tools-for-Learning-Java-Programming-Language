<?php
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
    $query = "select * from groups";
    $result = DB::findAllFromQuery($query);
    $group = Array();
    foreach ($result as $row) {
        $group[$row['gid']] = $row['groupname'];
    }
       
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        $teamname = urldecode($_GET['code']);
        $query = "select * from teams where teamname = '$teamname'";
        $res = DB::findOneFromQuery($query);
        if ($res) {
            if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == "Admin"&&$_SESSION['team']['root'] ==1) {
                echo "<a class='btn btn-primary pull-right' style='margin-top: 10px;' href='" . SITE_URL . "/adminteam/$_GET[code]'><i class='icon-edit icon-white'></i> Edit</a>";
            }
            ?>
            <div class="text-center page-header"><h1><?php echo $teamname; ?></h1></div>
            <table class='table table-bordered'>
         <?php
            echo"<tr><th>Group</th><td>";
                    
            $tid= $_SESSION['team']['id'] ;
            $query1 = "select groups.groupname as groupname from groups,teamgroups,teams where groups.gid=teamgroups.gid and teams.tid=teamgroups.tid and teams.teamname = '$teamname'";
            $res1 = DB::findAllFromQuery($query1);
                foreach($res1 as $row1){
                    echo $row1['groupname'];echo"<br>";
                } 
                ?></td>
                </tr>
                <tr>
                    <th>Rank</th><td>
                        <?php
                        $query = "SELECT count(*)+1 as rank, (select score from teams where tid = " . $res['tid'] . ") as sco FROM `teams` WHERE score > (select score from teams where tid = " . $res['tid'] . ") and status = 'Normal' or (score = (select score from teams where tid = " . $res['tid'] . ") and penalty < (select penalty from teams where tid = " . $res['tid'] . ")) ";
                        $result = DB::findOneFromQuery($query);
                        echo $result['rank'];
                        ?></td>
                </tr>
                <tr>
                    <th>Score</th><td><?php echo $res['score']; ?></td>
                </tr>
                <tr>
                    <th>Practice Score</th><td>
                        <?php
                        $query = "select sum(score) as tot from (select distinct(pid), (select score from problems where pid = runs.pid and contest = 'practice') as score from runs where pid in (select pid from problems where contest = 'practice' and status = 'Active') and result = 'AC' and tid = $res[tid])t";
                        $sco = DB::findOneFromQuery($query);
                        echo $sco['tot'];
                        ?></td>
                </tr>
            </table>
            <div class="text-center"><a class="btn btn-default" href="<?php echo SITE_URL."/submissions/$_GET[code]"; ?>"><?php echo $_GET['code']."'s " ?>Submissions</a></div>
            <h3>Practice Problems Solved</h3>
            <div class='row'>
                <?php
                $query = "select distinct(pid), (select code from problems where pid = runs.pid and contest = 'practice' and status='Active') as code from runs where tid = $res[tid] and result = 'AC'";
                $result = DB::findAllFromQuery($query);
                $ac = Array();
                foreach ($result as $row) {
                    array_push($ac, $row['code']);
                    if ($row['code'])
                        echo "<div class='col-md-3'><a href='" . SITE_URL . "/problems/$row[code]'>$row[code]</a></div>";
                }
                $query = "select distinct(pid), (select code from problems where pid = runs.pid and contest ='practice' and status='Active') as code from runs where tid = $res[tid]";
                $result = DB::findAllFromQuery($query);
                $all = Array();
                foreach ($result as $row) {
                    array_push($all, $row['code']);
                }
                $wa = array_diff($all, $ac);
                ?>
            </div>
            <h3>To Do list</h3>
            <div class='row'>
                <?php
                foreach ($wa as $value) {
                    if ($row['code'] && $value != "")
                        echo "<div class='col-md-3'><a href='" . SITE_URL . "/problems/$value'>$value</a></div>";
                }
                ?>
            </div>    
            <?php
        } else {
            echo "<br/><br/><br/><div style='padding: 10px;'><h1>Team not Found :(</h1>The username you are looking for doesn't exsits.</div><br/><br/><br/>";
        }
    } else {
        ?>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#submit').click(function() {
                    $(location).attr('href', '<?php echo SITE_URL; ?>/teams/' + $('#teamname').val());
                });
            });
        </script>
        <?php
        echo "<center><h1>Users</h1></center>Username : <input id='teamname' type='text' /> <input style='margin-top: -10px;' id='submit' value='Search' type='button' class='btn btn-primary' />";
    }
} else {
    echo "<br/><br/><br/><div style='padding: 10px;'><h1>Lockdown Mode :(</h1>This feature is now offline as Judge is in Lockdown mode.</div><br/><br/><br/>";
}
?>
