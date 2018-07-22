
		<style>
			#container {
			  width: 500px;
			  height: 500px;
			  position: relative;
				display: inline;
				 float:left;
               

			}
			#animate {
			  width: 93px;
			  height: 93px;
			  top:  0px;
			  position: absolute;
			  
			}
			.codeContainer{
				width:100px;
				height: 100px;
				display: inline;
				 float:left;
				
			}
            .obstacleicon{
                width: 20%;
			  height: 20%;
			  top: 208px;
                left:208px;
			  position: absolute;
            }
            .obstacleicon2{
                width: 20%;
			  height: 20%;
			  top: 108px;
                left:308px;
			  position: absolute;
            }
            .obstacleicon3{
                width: 20%;
			  height: 20%;
			  top: 208px;
                left:108px;
			  position: absolute;
            }
            #icon{
                width: 20%;
			  height: 20%;
			  top: 208px;
                left:308px;
			  position: absolute;
			  
            }
            #icon2{
               width: 20%;
			  height: 20%;
			  top: 208px;
                left:0px;
			  position: absolute;
			  
            }
            #icon3{
                width: 20%;
			  height: 20%;
			  top: 5px;
                left:408px;
			  position: absolute;
			  
            }
            #icon4{
                width: 20%;
			  height: 20%;
			  top: 408px;
                left:208px;
			  position: absolute;
			  
            }
            #score{
                width:100%;
                text-align: center;
                display: inline;
                
            }
            #scoreimgicon{
                
			 position: absolute;
            }
            #tablegame{
                background-color: darkslategray;
            }
            #buttonsubmit{
                display: inline-block;
            }
            #textbroblem{
                text-align: center;
                color: white;
               background-color: darkslategray;
            }
		</style>	
	

    <div id="textbroblem"><h3>Help Hero to reach the flag by using blocks .</h3></div>

<div id="score"><pre style="text-align:center;"><h4><img src="img/coin-clipart-animated-gif-4.gif" style="display:inline;width:3%;height:1.8%;" id="scoreimgicon" >   <span id="hoba">0</span></h4></pre></div>

	<div id ="container">
	<table border="1"width="500"height="500" id="tablegame">
	  <tr>
		<th><div style="top:5px;left:5px" id ="animate"><img src="img/36_by_genbaku-d8fh6oo.gif" width="100%" hight="100%?" id="elementimg" ></div></th>
		<th></th>
		<th></th>
		<th></th>
        <th><div id="icon3"><img src="img/coin-clipart-animated-gif-4.gif" width="90%" hight="90%" id="imgicon3"></div></th>
	  </tr>
	  <tr>
		<th></th>
		<th></th>
		<th></th>
          <th><div class="obstacleicon2"><img src="img/1252_-_Barrier-512.png" width="100%" hight="100%" ></div></th>
        <th></th>
	  </tr>
	  <tr>
		<th><div id="icon2"><img src="img/coin-clipart-animated-gif-4.gif" width="90" hight="90" id="imgicon2"></div></th>
		<th><div class="obstacleicon3"><img src="img/1252_-_Barrier-512.png" width="100%" hight="100%" id="imgiconobstacle"></div></th>
		<th><div class="obstacleicon"><img src="img/1252_-_Barrier-512.png" width="100%" hight="100%" id="imgiconobstacle"></div></th>
		<th><div id="icon"><img src="img/coin-clipart-animated-gif-4.gif" width="90" hight="90" id="imgicon"></div></th>
          <th></th>
	  </tr>
        
	  
      <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
        <th></th>
	  </tr>
        <tr>
		<th></th>
		<th></th>
		<th><div id="icon4"><img src="img/coin-clipart-animated-gif-4.gif" width="90" hight="90" id="imgicon4"></div></th>
          <th></th>
            <th background='img/CheckFlag.png' id="flag"></th>
	  </tr>
	</table>

	</div>
		<div class="codeContainer" id="blocklyDiv" style="height: 500px;width:470px;">
		</div>
                <xml id="toolbox" style="display:none">
			
				<block type="move"></block>
				<block type="repeat">
					<value name="Number">
						<shadow type="math_number">
							<field name="NUM">0</field>
						</shadow>
					</value>
				</block>
			
		</xml>
	  <textarea id="code" name="code" style="display:none"></textarea>
	<div style="clear:both;">

	<br>
		<input type="submit"  value='Run' class='col-lg-3 btn btn-large btn-primary' id="buttonsubmit" name="gamesubmit"/>
            <br>
	</div>
    
<div style="clear:both;"></div>
     
<script>
	function run(){
		output="OUTPUT = ''; "+output;
		eval(output);
		arr=OUTPUT.split("-");
		arr.splice(-1,1);
		//alert(arr);
		play(1);
	}
    
   var sheck=true;
    var checkimgeicon=true;
    var checkimgeicon2=true;
    var checkimgeicon3=true;
    var checkimgeicon4=true;
    var anim;
    var pos=0;
    var lastX=0;
    var lastY=0;
	var OUTPUT="";
    var elem = document.getElementById("animate");  
    var elemimg=document.getElementById("elementimg");
    var flagicon=document.getElementById("flag");
    var ic=document.getElementById("icon");
    var ic2=document.getElementById("icon2");
    var ic3=document.getElementById("icon3");
    var ic4=document.getElementById("icon4");
	var arr=[];
	var i=0;
    
    function reset1(resetarr=1){           
		// location.reload(true/false);
		i=0;
        elem.style.left=5+"px";
        elem.style.top=5+"px";
        elem.style.backgroundColor ="";
        elem.style.backgroundImage="";
         flagicon.style.background="";
       elem.innerHTML='<img src="img/36_by_genbaku-d8fh6oo.gif" width="100" hight="100" id="elementimg"/>';
       // elem.innerHTML="";
        if($('#elementimg').css({ transform: 'scaleX(-1)' })){$('#elementimg').css({ transform: 'scaleX(1)' });}
        flagicon.style.background="CheckFlag.png";
            if(checkimgeicon==false){
                var image = document.createElement("img");
                image.id = "imgicon";
                image.src = "img/coin-clipart-animated-gif-4.gif";            // image.src = "IMAGE URL/PATH"
                image.width="80";
                image.height="60";
                ic.appendChild(image);
                checkimgeicon=true;
            }
        if(checkimgeicon2==false){
                var image = document.createElement("img");
                image.id = "imgicon2";
                image.src = "img/coin-clipart-animated-gif-4.gif";            // image.src = "IMAGE URL/PATH"
                image.width="80";
                image.height="60";
                ic2.appendChild(image);
                checkimgeicon2=true;
            }
        if(checkimgeicon3==false){
                var image = document.createElement("img");
                image.id = "imgicon3";
                image.src = "img/coin-clipart-animated-gif-4.gif";            // image.src = "IMAGE URL/PATH"
                image.width="80";
                image.height="60";
                ic3.appendChild(image);
                checkimgeicon3=true;
            }
        if(checkimgeicon4==false){
                var image = document.createElement("img");
                image.id = "imgicon4";
                image.src = "img/coin-clipart-animated-gif-4.gif";            // image.src = "IMAGE URL/PATH"
                image.width="80";
                image.height="60";
                ic4.appendChild(image);
                checkimgeicon4=true;
            }
        document.getElementById("hoba").innerHTML=0;
         document.getElementById("buttonsubmit").style.display="none";
		if(resetarr==1)
			arr=[];
        //window.history.back();
    }
function right() { 
  lastX=elem.style.left;
    anim = setInterval(MoveR, 20);
    if($('#elementimg').css({ transform: 'scaleX(-1)' })){$('#elementimg').css({ transform: 'scaleX(1)' });}
    
       function MoveR() {
          // $('#elementimg').css({ transform: 'scaleX(1)' });
		elem.style.left= parseInt(elem.style.left)+5+'px';
		//debugger;
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
           else if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
          else if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
		else if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){
			//document.getElementById("hoba").innerHTML=Math.abs(parseInt(lastX)-parseInt(elem.style.left));   
		 clearInterval(anim);
            
		 play();
		} 
	}
}
    function left() { 
  lastX=elem.style.left;
  anim = setInterval(MoveR, 20);
        if($('#elementimg').css({ transform: 'scaleX(1)' })){$('#elementimg').css({ transform: 'scaleX(-1)' });}
        
       function MoveR() {
           
		elem.style.left= parseInt(elem.style.left)-5+'px';
		//debugger;
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
            clearInterval(anim);
            return 0; 
        }
		else if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==205){
            elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
           
           else if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
        else if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){
			//document.getElementById("hoba").innerHTML=Math.abs(parseInt(lastX)-parseInt(elem.style.left));   
		 clearInterval(anim);
		 play();
		} 
	}
}
function down() { 
  lastY=elem.style.top;
  anim = setInterval(MoveD, 20);
       function MoveD() {
		elem.style.top= parseInt(elem.style.top)+5+'px';
		//debugger;
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
            elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
              // elem.style.background="black";
            clearInterval(anim);
            return 0; 
               
        }
           else if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==205){
                elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
               //elem.style.background="black";
               
               clearInterval(anim);
            return 0; 
            
        }
           else if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
		else if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
			//document.getElementById("hoba").innerHTML=Math.abs(parseInt(lastY)-parseInt(elem.style.top));
		 clearInterval(anim);
		 play();
		} 
	}
}
      function up() { 
  lastY=elem.style.top;
  anim = setInterval(MoveD, 20);
       function MoveD() {
		elem.style.top= parseInt(elem.style.top)-5+'px';
		//debugger;
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
            elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
            clearInterval(anim);
            return 0; 
        }
           else if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
           else if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            //elem.style.background="black";
               clearInterval(anim);
            return 0; 
            
        }
		else if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
			//document.getElementById("hoba").innerHTML=Math.abs(parseInt(lastY)-parseInt(elem.style.top));
		 clearInterval(anim);
		 play();
		} 
	}
}
 function play(playtimes=0){
	 if(playtimes==1)
     	reset1(0);
        if(parseInt(elem.style.top)==205 && parseInt(elem.style.left)==305 && checkimgeicon) {
              /* var imgiconn= document.getElementById("imgicon");
            imgiconn.parentNode.removeChild(imgiconn);*/
            $('#imgicon').remove();
            checkimgeicon=false;
                document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
     if(parseInt(elem.style.top)==205 && parseInt(elem.style.left)==5 && checkimgeicon2) {
              /* var imgiconn= document.getElementById("imgicon");
            imgiconn.parentNode.removeChild(imgiconn);*/
            $('#imgicon2').remove();
            checkimgeicon2=false;
                document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
     if(parseInt(elem.style.top)==5 && parseInt(elem.style.left)==405 && checkimgeicon3) {
              /* var imgiconn= document.getElementById("imgicon");
            imgiconn.parentNode.removeChild(imgiconn);*/
            $('#imgicon3').remove();
            checkimgeicon3=false;
                document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
     if(parseInt(elem.style.top)==405 && parseInt(elem.style.left)==205 && checkimgeicon4) {
              /* var imgiconn= document.getElementById("imgicon");
            imgiconn.parentNode.removeChild(imgiconn);*/
            $('#imgicon4').remove();
            checkimgeicon4=false;
                document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
	if(i<arr.length){
		
        if(arr[i]=="Right" && parseInt(elem.style.left)<405)
				right();
        else if(arr[i]=="Down" && parseInt(elem.style.top)<405)
				down();
        else if(arr[i]=="Left" && parseInt(elem.style.left)>5) 
				left();
        else if(arr[i]=="Up" && parseInt(elem.style.top)>5) 
				up();
        
		else{	
            elem.style.backgroundImage="url('img/rongimge.png')";
            SubmitGame(0);}
        
		}
		else {
			if(elem.style.left==elem.style.top && parseInt(elem.style.left)>=405){
				//elem.style.backgroundColor ="green";
				elem.innerHTML=elem.innerHTML;
                flagicon.style.backgroundImage="url('img/doneimge.png')";
				SubmitGame(1);
               // document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+50;

			}
            else if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
            elem.style.background="black";
            
        }
			else {
				elem.style.backgroundImage="url('img/rongimge.png')";
                SubmitGame(0);
			}
		}
	i++;
	 
 }  
	
</script>

<script>
	var output = "";
	var workspace = Blockly.inject('blocklyDiv', {
		toolbox: document.getElementById('toolbox')
	});
	workspace.addChangeListener(print);
	//var defaultBlocks = document.getElementById('default');
	//Blockly.Xml.domToWorkspace(workspace, defaultBlocks);


	function print() {
		output = "";
		var workspaceBlock = workspace.getTopBlocks();
		if (workspaceBlock.length != 0) {
			var t = workspaceBlock[0].type;
			output += Blockly.JavaScript[t](workspaceBlock[0], " ");
			document.getElementById("code").value = output;
		} else {
			document.getElementById("code").value = "";
		}
	}
</script>

