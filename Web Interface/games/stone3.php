		<style>
            
			#container {
			  width: 500px;
			  height: 500px;
			  position: relative;
				display: inline;
				 float:left;
               

			}
			#animate {
			 width: 110px;
			  height: 90px;
			  top:  0px;
			  position: absolute;
			  
			}
            #dimond{
                width: 50px;
			  height: 50px;
			     top:420px;
                left:325px;
			  position: absolute;
            }
			.codeContainer{
				width:100%;
				height: 100%;
				display:inline;
				 float:left;
				
			}
            
            #score{
                width:100%;
                text-align: center;
                display: inline;
                
            }
            
            .trackrow{
                background-image:url(img/plann.png);
                border-style: none;
                border-color: yellow dimgray yellow dimgray;
            }
            .tdblack3{
                background-image:url(img/rockk.png);
                border-style: none;
                border-color: aquamarine;
            }
            .tree{
                background-image:url(img/download%202.png);
                border-style: none;
                border-color: aquamarine;
            }
            #scoreimgicon{
                
			  position: absolute;
            }
            #tablegame{
               background-color: aquamarine;
                border-style: none;
                border-color:aquamarine;
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

    <div id="textbroblem"><h3>please use Stoneman to get dimonde .</h3></div>

    <div id="score"><pre style="text-align:center;"><h4><img src="img/Diamond.png" style="display:inline;width:2%;height:1.5%;" id="scoreimgicon" >   <span id="hoba">0</span></h4></pre></div>
	<div id ="container">
        
	<table border="1"width="500"height="500" id="tablegame">
	  <tr>
		<td class="tdblack3"><div style="top:195px;left:0px"id ="animate"><img src="img/ezgif.com-rotate.gif" width="100%" hight="100%ٍ" id="elementimg" ></div></td>
		<td class="tree"></td>
		<td class="tree"></td>
		<td class="tdblack3"></td>
        <td class="tdblack3"></td>
	  </tr>
	  <tr>
		<td class="tree"></td>
		<td class="tdblack3"></td>
		<td class="tdblack3"></td>
		<td class="tdblack3"></td>
        <td class="tree"></td>
	  </tr>
	  <tr>
		<td class="trackrow"></td>
		<td class="trackrow"></td>
		<td class="trackrow"></td>
		<td class="trackrow"></td>
        <td class="trackrow"></td>
	  </tr>
        
	  
      <tr>
		<td class="tdblack3"></td>
		<td class="tree"></td>
		<td class="tdblack3"></td>
		<td class="trackrow"></td>
        <td class="tree"><div id ="dimond"><img src="img/Diamond.png" width="50" hight="50" id="elementdimond" ></div></td>
	  </tr>
        <tr>
		<td class="tdblack3"></td>
		<td class="tdblack3"></td>
        <td class="tree"></td>
        <td class="trackrow"></td>
        <td class="tdblack3"></td>
	  </tr>
	</table>

	</div>
		<div class="codeContainer" id="blocklyDiv" style="height: 500px;width:470px;">
		</div>
        <xml id="toolbox" style="display:none">
			<block type="turn"></block>
				<block type="move_forward"></block>
		</xml>
	  <textarea id="code" name="code" style="display:none;"></textarea>
	<div style="clear:both;">
	<br>
	<input type="submit" value="Run" id="buttonsubmit"class='col-lg-3 btn btn-large btn-primary' onclick="reset1()"/>
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
    var sheckRF=true;
    var sheckRF2=true;
    var sheckRF3=true;
    var sheckRF4=true;
    var sheckFR=true;
    var sheckFR2=true;
    var sheckFR3=true;
    var sheckFR4=true;
    var moveRight=false;
    var moveLeft=true;
    var moveTop=true;
    var moveDown=true;
    var staticcoun=0;
    var staticcounl=0;
    var counter=0;
    var anim;
   var pos=0;
   var lastX=0;
   var lastY=0;
    var checkimgeicon=true;
   var elem = document.getElementById("animate");  
    var elemimg=document.getElementById("elementimg");
    var ic=document.getElementById("dimond");
    $('#elementimg').css({ transform: "rotate(0deg)" });
	//var arr=["down","down","right","right","down","down"];
	var i=0;
    
    function reset1(resetarr=1){
       
    sheckRF=true;
    sheckRF2=true;
    sheckRF3=true;
    sheckRF4=true;
    moveRight=false;
    moveLeft=true;
    moveTop=true;
    moveDown=true;
    staticcoun=0;
    staticcounl=0;
    counter=0;
            i=0;
        elem.style.left=0+"px";
        elem.style.top=195+"px";
        $('#elementimg').css({ transform: "rotate(0deg)" });
       elem.innerHTML='<img src="img/ezgif.com-rotate.gif" width="100" hight="100" id="elementimg"/>';
        if(resetarr==1)
			arr=[];
        if(checkimgeicon==false){
            var image = document.createElement("img");
                image.id = "elementdimond";
                image.src = "img/Diamond.png";            // image.src = "IMAGE URL/PATH"
                image.width="50";
                image.height="50";
                ic.appendChild(image);
                checkimgeicon=true;
        }
       document.getElementById("hoba").innerHTML=0;
       document.getElementById("buttonsubmit").style.display="none";
    }

    //moveforward
    
    function left() { 
        debugger;
        lastX=elem.style.left;
        lastY=elem.style.top;
        //movedown
        
        if(!moveDown){
  anim = setInterval(MoveD, 50);
       function MoveD() {
		elem.style.top= parseInt(elem.style.top)+5+'px';
        if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
		 clearInterval(anim);
		 play();
		} 
	}
    }
        //movetop
        else if(!moveTop){
  anim = setInterval(MoveD, 50);
       function MoveD() {
		elem.style.top= parseInt(elem.style.top)-5+'px';
        if(Math.abs(parseInt(lastY)-parseInt(elem.style.top))>95){
		 clearInterval(anim);
		 play();
		} 
	}
    }    
        //moveright
        
        else if(!moveRight){
  anim = setInterval(MoveR, 50);
       function MoveR() {
		elem.style.left= parseInt(elem.style.left)+5+'px';
            if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){
		 clearInterval(anim);
		 play();
		} 
	}
    }        
        //moveleft
        else if(!moveLeft){
  anim = setInterval(MoveR, 50);
        
       function MoveR() {
           
		elem.style.left= parseInt(elem.style.left)-5+'px';
         if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){
		 clearInterval(anim);
		 play();
		} 
	}
    }        
}
    //turnright
function down() { 
        lasttop=elem.style.top;
        lastleft=elem.style.left;
    //right >>
    if(sheckRF){
        animro=setInterval(MoveDro,20);
        function MoveDro(){
            if(counter==(90+staticcoun)){
                clearInterval(animro);
                staticcoun+=90;
                staticcounl=90;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+counterst+"deg)"
                $('#elementimg').css({ transform: rott });
                counter++;
            }
        }
       
        sheckRF=false; sheckRF2=true;
        moveLeft=true;
        moveDown=false;
        moveRight=true;
        moveTop=true;
        
    }
    ////////////down
    else if(!sheckRF && sheckRF2){
        animro=setInterval(MoveDro,20);
        function MoveDro(){
            if(counter==(90+staticcoun)){
                clearInterval(animro);
                staticcoun+=90;
                staticcounl=180;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+counterst+"deg)"
                $('#elementimg').css({ transform: rott });
                counter++;
            }
        }
       
       sheckRF2=false; sheckRF3=true;
        moveLeft=false;
        moveDown=true;
        moveRight=true;
        moveTop=true;
    }
    /////left
     else if(!sheckRF2 && sheckRF3){
        
        animro=setInterval(MoveDro,20);
        
        
        function MoveDro(){
            if(counter==(90+staticcoun)){
                clearInterval(animro);
                staticcoun+=90;
                staticcounl=270;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+counterst+"deg)"
                $('#elementimg').css({ transform: rott });
                counter++;
            }
        }
       
       sheckRF3=false; sheckRF4=true;
         moveLeft=true;
        moveDown=true;
        moveRight=true;
        moveTop=false;
    }
     
    ////////////up
    else if(!sheckRF3 && sheckRF4){
        
        animro=setInterval(MoveDro,20);
        
        
        function MoveDro(){
            if(counter==(90+staticcoun)){
                clearInterval(animro);
                staticcoun+=90;
                staticcounl=360;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+counterst+"deg)"
                $('#elementimg').css({ transform: rott });
                counter++;
            }
        }
       
       sheckRF4=false;sheckRF=true; 
        moveLeft=true;
        moveDown=true;
        moveRight=false;
        moveTop=true;
    }
}
    
    
    
    //left
      function up() { 
               lasttop=elem.style.top;
        lastleft=elem.style.left;
         
    
    ////////////down
     if(!sheckRF && sheckRF2){
        animro=setInterval(MoveDro,20);
        function MoveDro(){
            if(counter==(90-staticcoun)){
                clearInterval(animro);
                staticcoun-=90;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+(counterst)+"deg)"
                $('#elementimg').css({ transform: rott });
                counter--;
            }
        }
       
       sheckRF=true; 
        moveLeft=true;
        moveDown=true;
        moveRight=false;
        moveTop=true;
    }
    /////left
     else if(!sheckRF2 && sheckRF3){
         animro=setInterval(MoveDro,20);
        
        
        function MoveDro(){
            if(counter==(staticcoun-90)){
                clearInterval(animro);
                staticcoun-=90;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+(counterst)+"deg)"
                $('#elementimg').css({ transform: rott });
                counter--;
            }
        }
       
       sheckRF2=true; 
         sheckRF=false;
         moveLeft=true;
        moveDown=false;
        moveRight=true;
        moveTop=true;
    }
     
    ////////////up
    else if(!sheckRF3 && sheckRF4){
        
        animro=setInterval(MoveDro,20);
        
        
        function MoveDro(){
            if(counter==(staticcoun-90)){
                clearInterval(animro);
                staticcoun-=90;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+(counterst)+"deg)"
                $('#elementimg').css({ transform: rott });
                counter--;
            }
        }
       
       sheckRF3=true;
        sheckRF2=false;
        moveLeft=false;
        moveDown=true;
        moveRight=true;
        moveTop=true;
    }
          //right
          else if(sheckRF){
       
        animro=setInterval(MoveDro,20);
       
       
        function MoveDro(){
            if(counter==(staticcoun-90)){
                clearInterval(animro);
                staticcoun-=90;
                play();
            }
            else{
                counterst=counter.toString();
                rott="rotate("+(counterst)+"deg)"
                $('#elementimg').css({ transform: rott });
                counter--;
            }
        }
       
        sheckRF4=true;
        sheckRF3=false;      
        moveLeft=true;
        moveDown=true;
        moveRight=true;
        moveTop=false;
    }
}
 function play(playtimes=0){
     if(playtimes==1)
     	reset1(0);
        if(parseInt(elem.style.left)==300 && parseInt(elem.style.top)==395 && i>=arr.length){
				//elem.style.backgroundColor ="green";
				elem.innerHTML=elem.innerHTML;
                elem.innerHTML='<img src="img/ezgif.com-rotate2.gif" width="100" hight="100" id="elementimg"/>';
            $('#elementimg').css({ transform: "rotate(90deg)" });
            $('#elementdimond').remove();
            checkimgeicon=false;
 document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+50;
            SubmitGame(1);
            return 0;
			}
	if(i<arr.length){
		debugger;
        
        
        if(arr[i]=="Right" && parseInt(elem.style.top)==195 && parseInt(elem.style.left)==300 )
				down();
     if(arr[i]=="forward" && ((parseInt(elem.style.top)==195 && parseInt(elem.style.left)<300) || (parseInt(elem.style.top)<395 && parseInt(elem.style.left)==300)) ) 
			    left();
        
        else{SubmitGame(0);}
		}
		else {
			SubmitGame(0);
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
