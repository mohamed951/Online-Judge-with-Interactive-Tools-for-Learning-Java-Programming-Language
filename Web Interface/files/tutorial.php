<head>
    <style>
        div{
            cursor: pointer;
        } 
        pre {
 white-space: pre-line;
  word-break: normal;
          
        }
    #categories {
        text-align: center;
        margin: 0;
        padding: 0;
        height:auto;
        max-height:600px;
        overflow:auto;
        height:500px;
        background-color: #f1f1f1;
    }

    .stylecats {
        margin: auto;
        padding: 10px;
        font-size: 20px;
    }

    .stylecats:hover {
        background-color: darkgray;
        color: white;
    }
         
    </style>
</head>
<?php
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
    
?>
<div class='page-header text-center'><h1>Tutorial</h1></div>
 	<div class="row">
		<div class="col-lg-2" style="overflow-x: auto;height:500px;background-color:#darkgray;"  id="catDiv" >
			<?php
		        $query = "select *from Tutorial";
		        $res = DB::findAllFromQuery($query);
                $i=0;
                echo "<div id='categories'>";
		        foreach ($res as $row){
                    echo "<div id='cat$i' class='stylecats' onclick='nav(event)'>";
		            echo $row[name];
			         echo "</div>";
                    $i++;
                }
			 echo "</div>";
        
            
            ?>
            
		</div>
     
            <?php   
            $query = "select *from Tutorial";
		        $res = DB::findAllFromQuery($query);
              $i=0;
           echo "<div id='contents' class='col-lg-10' style='overflow-x:auto;height:500px;'>";
		        foreach ($res as $row){
                    echo "<pre style='display:none' id='cont$i'>";
		            echo $row[statement];
			         echo "</pre>";
                    $i++;
                }
			 echo "</div>";
           
           ?>  
        </div>
<?php
} 

else {
    echo "<br/><br/><br/><div style='padding: 10px;'><h1>Lockdown Mode :(</h1>This feature is now offline as Judge is in Lockdown mode.</div><br/><br/><br/>";
}
?>
<script>
    
    var cont0= document.getElementById("cont0");
    if(cont0!=null)
        cont0.style.display="block";
    function nav(event){
        var catId=event.target.id;
        var parentCat=document.getElementById("contents");
        var allContent=parentCat.childNodes;
        for(var i =0;i<allContent.length;i++)
           allContent[i].style.display="none";  
        document.getElementById(catId.replace("cat","cont")).style.display="block";
        
    }
</script>
