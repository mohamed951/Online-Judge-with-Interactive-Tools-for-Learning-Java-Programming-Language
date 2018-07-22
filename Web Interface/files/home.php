<head>
    <style>
        div{
            
        }
    </style>
</head>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img\d.jpg" alt="one" height="5" width="1200%">
      <div class="carousel-caption">
        <h2 style="background-color: #ffffff36;" >Start</h2>
          <h4 style="background-color: #ffffff85;">Programming Is Always So Much Fun!</h4>
      </div>
    </div>

    <div class="item">
      <img src="img\b.jpg"  alt="two" height="5" width="1200%">
      <div class="carousel-caption">
        <h2 style="background-color: #ffffff36;">Try</h2>
          <h4 style="background-color: #ffffff85;">Keep Trying Gain Experience</h4>
      </div>
    </div>

    <div class="item">
      <img src="img\c.jpg" alt="three" height="5" width="1200%" >
      <div class="carousel-caption">
        <h2  style="background-color: #ffffff85;">Success</h2>
          <h4 style="background-color: #ffffff85;">Be a Part Of This </h4>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin'){
    echo "<a class='btn btn-primary pull-right' style='margin-top: 10px;' href='".SITE_URL."/adminjudge'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
}

    
echo "<center><h1>Notice</h1></center>";
$query = "select value from admin where variable='notice'";
$result = DB::findOneFromQuery($query);
$data = $result['value'];
$data = str_replace("\r", "", $data);
$data = preg_replace("/\n\n\n*/", "\n\n", $data);
$data = preg_replace("/[\s\n]*$/", "", $data);
$data = explode("\n\n", $data);
foreach ($data as $x) {
    $y = explode("\n", $x);
    if (!isset($y[0]))
        continue;
    if (isset($y[0][0]) and $y[0][0] == "~" and $_SESSION["status"] != "Admin")
        continue;
    if (isset($y[0][0]) and $y[0][0] == "~")
        $y[0] = substr($y[0], 1);
    echo "<br><table class='table table-striped'><tr><th>" . stripslashes($y[0]) . "</th></tr><tr><td style='text-align: justify'><ul>";
    for ($i = 1; $i < count($y); $i++)
        echo "<li>" . stripslashes($y[$i]) . "</li>";
    echo "</ul></td></tr></table>";
}
?>
<style>
    #style{
        margin-top:380px;
        padding-top: 10px;
    }
</style>
<br>
<div class="row" id="style" style="background-color:RGB(245,245,245);">
<div class="col-lg-12" >
    
          <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Team</h2>
        </div>
          <br>
            <div class="col-lg-3 panel-default">
              <h4>Ebram Ehab</h4>
            </div>
        
            <div class="col-lg-3 panel-default">
              <h4>Mohamed AbdElmohsen</h4>
          </div>
            
            <div class="col-lg-3 panel-default">
              <h4>Mohamed Shawkat</h4>
          </div>
                
            <div class="col-lg-3 panel-default">
              <h4>Krolos Fawzy</h4>
              </div><br><br><br><br>
            <div class="col-lg-3 panel-default">
              <h4>Remon Rafaat</h4>
          </div>
    
            <div class="col-lg-3 panel-default">
              <h4>Mina Emad</h4><br>
            </div>
    
            <div class="col-lg-3 panel-default">
              <h4>Mina Tawfik</h4>
          </div><br><br><br>
        </div>
</div>



<div>
</div>















