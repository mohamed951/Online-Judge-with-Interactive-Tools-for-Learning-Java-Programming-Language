<?php
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        if($_SESSION['team']['status'] == 'Admin'){
            $query = "select * from contest where code = '$_GET[code]'";
            $contest = DB::findOneFromQuery($query);
        }else {
          //   $query = "select contest.* from contest,teamgroups,teams teamgroups.tid=teams.tid and contest where code = '$_GET[code]'";
            /* $query = "select * from contest,groups,teamgroups where groups.gid=teamgroups.gid and teamgroups.tid=".$_SESSION['team']['id']." and (contest.groupname=groups.groupname or contest.groupname='public' ) and contest.code = '$_GET[code]'";
            */
            
            $query="SELECT * FROM contest, groups, teamgroups WHERE ( contest.groupname = 'public' OR ( groups.gid = teamgroups.gid AND teamgroups.tid =".$_SESSION['team']['id']."
AND ( contest.groupname = groups.groupname OR contest.groupname = 'public' ) ) ) AND contest.code = '$_GET[code]'";
             $contest = DB::findOneFromQuery($query);
        }
        if ($contest) {
            ?>
                        <script type='text/javascript'>
                var ctime = <?php echo $contest['starttime'] - time(); ?>;
                var conttime = <?php echo $contest['endtime'] -time(); ?>;
                
                 $("div#conttimer").html("<h4>Starts in: "+conttime+"</h4>");

                function zeroPad(num, places) {
                    var zero = places - num.toString().length + 1;
                    return Array(+(zero > 0 && zero)).join("0") + num;
                   // var conttime = < ?php  echo $contest['starttime']- time();?>;

                }
                function timer() {
                    if (ctime > 0) {
                        $("div#contesttimer").html("<h4>Starts in: " + parseInt(ctime / 3600) + ":" + zeroPad(parseInt((ctime / 60)) % 60,2) + ":" + zeroPad(ctime % 60, 2) + "</h4>");
                        ctime--;
                        window.setTimeout("timer();", 1000);
                    } else {
                        $("div#contesttimer").html("<h4>Starts in: N/A</h4>");
                        if(conttime>0){
                            $("div#conttimer").html("<h4>Ends at : " + parseInt(conttime / 3600) + ":" + zeroPad(parseInt((conttime / 60)) % 60,2) + ":" + zeroPad(conttime % 60, 2)+"</h4>");
                        conttime--;
                        window.setTimeout("timer();", 1000);
                        }
                        else{
                        $("div#conttimer").html("<h4>Ends at : Ended</h4>");
                          window.setTimeout("timer();", 1000);
                        }
                        
                    }
                }
                timer();
            </script>


           <div class='contestheader'><h1 class='text-center'><?php echo $contest[name]; ?></h1><div id='contesttimer'><h4>Starts in: N/A</h4></div> <div id='conttimer'><h4 id='timer'>Ends at : --</h4></div> 
            </div>
            <?php
        //   echo "<div class='contestheader'><h1 class='text-center'>$contest[name]</h1><div id='contesttimer'><h4>Starts in: N/A</h4></div></div>";
            if (isset($contest['starttime'])|| (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
                if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') {
                    if ($contest['starttime'] > time())
                        echo "<a class='btn btn-default pull-right' style='margin: 10px 0;' href='" . SITE_URL . "/preparecontest/$_GET[code]'><i class='glyphicon glyphicon-edit'></i>Prepare Contest</a>";
                    $query = "select * from problems where pgroup = '$_GET[code]' order by code";
                    echo "<a class='btn btn-default pull-right' style='margin: 10px 0;' href='" . SITE_URL . "/admincontest/$_GET[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                } else {
                    $query = "select * from problems where pgroup = '$_GET[code]' and status != 'Deleted' order by code";
                }
            } else {
                $query = "";
            }
            $prob = DB::findAllFromQuery($query);
            echo "<table class='table table-hover'><thead><tr><th>Name</th><th>Score</th><th>Code</th><th>Submissions</th></tr></thead>";
            if ($prob) {
				foreach ($prob as $row) {
                	echo "<tr><td><a href='" . SITE_URL . "/problems/$row[code]'>$row[name]</a></td><td><a href='" . SITE_URL . "/problems/$row[code]'>$row[score]</a></td><td><a href='" . SITE_URL . "/submit/$row[code]'>$row[code]</a></td><td><a href='" . SITE_URL . "/status/$row[code]'>$row[solved]/$row[total]</a></td></tr>";
            	}
			}
            echo "</table><h3>Announcements</h3>$contest[announcement]";
        } else {
            echo "<br/><br/><br/><div style='padding: 10px;'><h1>Contest not Found :(</h1>The contest you are looking for is not found or you don't have access to enter this Contest.</div><br/><br/><br/>";
        }
    } else {
        echo "<div class='text-center page-header'><h1>Contests</h1></div>";
        $query = "select * from contest order by starttime desc";
        $result = DB::findAllFromQuery($query);
        echo "<table class='table table-hover'>
            <thead><tr><th>Code</th><th>Name</th><th>Start Time</th><th>End Time</th><th></th></tr></thead>";
        foreach ($result as $row) {
            echo "<tr><td><a href='" . SITE_URL . "/contests/$row[code]'>$row[code]</a></td><td><a href='" . SITE_URL . "/contests/$row[code]'>$row[name]</a></td><td><a href='" . SITE_URL . "/contests/$row[code]'>" . date("d-M-Y, h:i:s a", $row['starttime']) . "</a></td><td><a href='" . SITE_URL . "/contests/$row[code]'>" . date("d-M-Y, h:i:s a", $row['endtime']) . "</a></td><td><a class='btn btn-primary' href='" . SITE_URL . "/admincontest/$row[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a></td></tr>";
        }
        echo "</table>";
    }
} else {
    echo "<br/><br/><br/><div style='padding: 10px;'><h1>Lockdown Mode :(</h1>This feature is now offline as Judge is in Lockdown mode.</div><br/><br/><br/>";
}
?>
