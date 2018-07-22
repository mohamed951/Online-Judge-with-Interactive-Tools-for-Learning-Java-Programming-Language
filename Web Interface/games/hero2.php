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
                width: 90px;
			  height: 90px;
			  top: 8px;
                left:408px;
			  position: absolute;
            }
            .obstacleicon2{
                width: 90px;
			  height: 90px;
			  top: 108px;
                left:308px;
			  position: absolute;
            }
            .obstacleicon3{
                width: 90px;
			  height: 90px;
			  top: 208px;
                left:108px;
			  position: absolute;
            }
            .tdblack{
                background-color: white;
            }
            .sora{
            width: 100px;
			  height: 100px;
                top: 300px;
                left:300px;
			  position: absolute;
            }
            .home1{
                background-image: url(img/home1.png);
                border-style: none;
            }
            .home2{
                background-image: url(img/home2.png);
                border-style: none;
            }
            .home3{
                background-image: url(img/home3.png);
                border-style: none;
            }
            .home4{
                background-image: url(img/home4.png);
                border-style: none;
            }
            .home5{
                background-image: url(img/home5.png);
                border-style: none;
            }
            .home6{
                background-image: url(img/home6.png);
                border-style: none;
            }
            .home7{
                background-image: url(img/home7.png);
                border-style: none;
            }
            .home8{
                background-image: url(img/home8.png);
                border-style: none;
            }
            .home9{
                background-image: url(img/home9.png);
                border-style: none;
            }
            .home10{
                background-image: url(img/home10.png);
                border-style: none;
            }
            .home11{
                background-image: url(img/home11.png);
                border-style: none;
            }
            .home12{
                background-image: url(img/home12.png);
                border-style: none;
            }
            .home13{
                background-image: url(img/home13.png);
                border-style: none;
            }
            .home14{
                background-image: url(img/home14.png);
                border-style: none;
            }
            .home15{
                background-image: url(img/home15.png);
                border-style: none;
            }
            #icon{
                width: 90px;
			  height: 90px;
			  top: 108px;
                left:308px;
			  position: absolute;
			  
            }
            #icon2{
                 width: 90px;
			  height: 90px;
			  top: 8px;
                left:220px;
			  position: absolute;
			  
            }
            #icon3{
                width: 90px;
			  height: 90px;
			  top: 5px;
                left:408px;
			  position: absolute;
			  
            }
            #icon4{
                width: 90px;
			  height: 90px;
			  top: 408px;
                left:208px;
			  position: absolute;
			  
            }
            #icon1green{
                 width: 90px;
			  height: 90px;
			  top: 8px;
                left:220px;
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
                border-style: solid;
                border-color: black;
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
		<td><div style="top:5px;left:5px"id ="animate"><img src="img/36_by_genbaku-d8fh6oo.gif" width="100" hight="100" id="elementimg" ></div></td>
		<td></td>
		<td><div id="icon2"><img src="img/hazard-poison-sign-animated-gif-5.gif" width="55" hight="55" id="imgicon2"></div></td>
		<td></td>
        <td><div class="obstacleicon"><img src="img/fire.png" width="90" hight="90" id="imgiconobstacle"></div></td>
	  </tr>
	  <tr>
		<td class="home1"></td>
		<td class="home2"></td>
		<td class="home3"></td>
		<td><div id="icon"><img src="img/coin-clipart-animated-gif-4.gif" width="90" hight="90" id="imgicon"></div></td>
        <td></td>
	  </tr>
	  <tr>
		<td class="home4"></td>
		<td class="home5"></td>
		<td class="home6"></td>
		<td class="home7"></td>
          <td></td>
	  </tr>
        
	  
      <tr>
		<td class="home8"></td>
		<td class="home9"></td>
		<td class="home10"></td>
		<td class="home11"></td>
        <td></td>
	  </tr>
        <tr>
		<td class="home12"></td>
		<td class="home13"></td>
		<td class="home14"></td>
		
          <td class="home15"></td>
            <td background='img/CheckFlag.png' id="flag"></td>
	  </tr>
	</table>

	</div>
		<div class="codeContainer" id="blocklyDiv" style="height: 500px;width:470px;">
		</div>
        <xml id="toolbox" style="display:none">
			
				<block type="move"></block>
            <block type="be_Invisible"></block>
				<block type="repeat">
					<value name="Number">
						<shadow type="math_number">
							<field name="NUM">0</field>
						</shadow>
					</value>
				</block>
		</xml>
	  <textarea id="code" name="code" style="display:none;"></textarea>
	<div style="clear:both;">
	<br>
	<input type="submit" value="Run" id="buttonsubmit"class='col-lg-3 btn btn-large btn-primary' onclick="reset1()"/>
        
	
	
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
   var elem = document.getElementById("animate");  
    var elemimg=document.getElementById("elementimg");
    var flagicon=document.getElementById("flag");
    var ic=document.getElementById("icon");
    var ic2=document.getElementById("icon2");
    var ic3=document.getElementById("icon3");
    var ic4=document.getElementById("icon4");
	var arr=["down","down","right","right","down","down"];
	var i=0;
    function reset1(resetarr=1){
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
                image.src = "img/coin-clipart-animated-gif-4.gif";        
                image.width="80";
                image.height="60";
                ic.appendChild(image);
                checkimgeicon=true;
            }
        if(checkimgeicon2==false){
                var image = document.createElement("img");
                image.id = "imgicon2";
                image.src = "img/hazard-poison-sign-animated-gif-5.gif";            // image.src = "IMAGE URL/PATH"
                image.width="55";
                image.height="88";
                ic2.appendChild(image);
                checkimgeicon2=true;
            }
        if(checkimgeicon3==false){
                var image = document.createElement("img");
                image.id = "imgicon3";
                image.src = "img/coin-clipart-animated-gif-4.gif";            // image.src = "IMAGE URL/PATH"
                image.width="55";
                image.height="88";
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
    }
function right() { 
  lastX=elem.style.left;
    anim = setInterval(MoveR, 20);
    if($('#elementimg').css({ transform: 'scaleX(-1)' })){$('#elementimg').css({ transform: 'scaleX(1)' });}
    
       function MoveR() {
		elem.style.left= parseInt(elem.style.left)+5+'px';
           if(parseInt(elem.style.left)>=400 && parseInt(elem.style.top)==5){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
               clearInterval(anim);
            return 0; 
            
        }
         if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==5){
             
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
             elem.style.backgroundImage="url('rongimge.png')";
             did=setInterval(dide,100);
             shshs=true;
             nummm=0;
             function dide(){
                 
                 if(shshs){
                     document.getElementById("animate").style.opacity=0;
                     shshs=false;
                 }
                 else{
                     document.getElementById("animate").style.opacity=1;
                     shshs=true;
                 }
                 nummm=nummm+1;
                 if(nummm==20){
                     clearInterval(did);
                    }
             }
            
             document.getElementById("animate").style.opacity=1;
               clearInterval(anim);
            play(); 
            
        }  
         
		else if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){   
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
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
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
               clearInterval(anim);
            return 0; 
            
        }
        else if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){
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
           if(parseInt(elem.style.left)==5 && parseInt(elem.style.top)==5){
            clearInterval(anim);
            return 0; 
        }
          
		else if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
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
           if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
            elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
            clearInterval(anim);
            return 0; 
        }
           else if(parseInt(elem.style.left)==205 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
               clearInterval(anim);
            return 0; 
        }
           else if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==205){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
               clearInterval(anim);
            return 0; 
            
        }
           else if(parseInt(elem.style.left)==405 && parseInt(elem.style.top)==5){
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
               clearInterval(anim);
            return 0; 
            
        }
		else if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
		 clearInterval(anim);
		 play();
		}
           
	}
}
    ////////////////////////////////////
    function Invisible(){
        
        
        lastX=elem.style.left;
        anim = setInterval(MoveR, 20);
        if($('#elementimg').css({ transform: 'scaleX(-1)' })){$('#elementimg').css({ transform: 'scaleX(1)' });}
        shshss=true;
        if(parseInt(elem.style.left)==105 && parseInt(elem.style.top)==5 ){
            shshss=false;
        }
           function MoveR() {
            elem.style.left= parseInt(elem.style.left)+5+'px';
               if((parseInt(elem.style.left)==205|| parseInt(elem.style.left)==105 )&& parseInt(elem.style.top)==5){ document.getElementById("elementimg").style.opacity=0;
                   }
               if(parseInt(elem.style.left)==200 && parseInt(elem.style.top)==5 && shshss){
             
               elem.innerHTML='<img src="img/Capture.png" width="100" hight="100" id="elementimg"/>';
             elem.style.backgroundImage="url('rongimge.png')";
             did=setInterval(dide,100);
             shshs=true;
             nummm=0;
             function dide(){
                 
                 if(shshs){
                     document.getElementById("animate").style.opacity=0;
                     shshs=false;
                 }
                 else{
                 document.getElementById("animate").style.opacity=1;
                     shshs=true;
                 }
                 nummm=nummm+1;
                 if(nummm==20){
                     clearInterval(did);
                    }
             }
             document.getElementById("animate").style.opacity=1;
               clearInterval(anim);
            play(); 
            
        }  
            else if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>192){
             clearInterval(anim);
             document.getElementById("elementimg").style.opacity=1;
             play();
            } 
	   }
        /////////////////////////
        
        }
        
    
 function play(playtimes=0){
     if(playtimes==1)
     	reset1(0);
        if(parseInt(elem.style.top)==105 && parseInt(elem.style.left)>=300 && checkimgeicon) {
            $('#imgicon').remove();
            checkimgeicon=false;
            document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
     if(parseInt(elem.style.top)==5 && parseInt(elem.style.left)==205 && checkimgeicon2) {
         $('#imgicon2').remove();
            checkimgeicon2=false;
         return 0;
            }
     if(parseInt(elem.style.top)==5 && parseInt(elem.style.left)==200 && checkimgeicon2) {
         $('#imgicon2').remove();
            checkimgeicon2=false;
         return 0;
            }
     if(parseInt(elem.style.top)==5 && parseInt(elem.style.left)==405 && checkimgeicon3) {
            $('#imgicon3').remove();
            checkimgeicon3=false;
         document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
     if(parseInt(elem.style.top)==405 && parseInt(elem.style.left)==205 && checkimgeicon4) {
         $('#imgicon4').remove();
            checkimgeicon4=false;
                document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+20;
            }
	if(i<arr.length){
		
        
        if(arr[i]=="Right" && parseInt(elem.style.left)<400)
				right();
        else if(arr[i]=="Down" && ((parseInt(elem.style.top)<105 && parseInt(elem.style.left)>205) || (parseInt(elem.style.top)<405 && parseInt(elem.style.left)>305) ) )
				down();
        else if(arr[i]=="Left" && parseInt(elem.style.left)>305 && parseInt(elem.style.top)<105 ) 
				left();
        else if(arr[i]=="Up" && parseInt(elem.style.top)>5) 
				up();
         else if(arr[i]=="Invisible" && parseInt(elem.style.left)<300 && parseInt(elem.style.top)<105)
				Invisible();
        
		else{elem.style.backgroundImage="url('img/rongimge.png')";SubmitGame(0);}
        
		}
		else {
			if(parseInt(elem.style.top)==405 && parseInt(elem.style.left)==400){
				elem.innerHTML=elem.innerHTML;
                flagicon.style.backgroundImage="url('img/doneimge.png')";
                SubmitGame(1);
			}
            else if(parseInt(elem.style.left)==305 && parseInt(elem.style.top)==105){
            elem.style.backgroundImage="url('img/rongimge.png')";
            SubmitGame(0);
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

