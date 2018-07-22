
		<style>
            
			#container {
			  width: 500px;
			  height: 500px;
			  position: relative;
				display: inline;
				 float:left;
               

			}
			#animate {
			 width: 150px;
			  height: 93px;
			  top:  0px;
			  position: absolute;
			  
			}
            #car1{
                width: 150px;
			  height: 93px;
			  top:  200px;
			  position: absolute;
            }
            #car2{
                width: 150px;
			  height: 93px;
			  top:  200px;
			  position: absolute;
            }
			.codeContainer{
				width:100px;
				height: 100px;
				display: inline;
				 float:left;
				
			}
            
            #score{
                width:100%;
                text-align: center;
                display: inline;
                
            }
            .tdblack{
                background-image:url(img/6757dcfa5ef1268.jpg);
                border-style: dotted;
                border-color: green;
            }
            .tdbark1{
                background-color: gray;
                border-style: double;
                border-color:gray yellow gray yellow;
            }
            .tree{
                background-image:url(img/download.png);
                border-style: dotted;
                border-color: green;
            }
            .road3{
                background-image: url(img/road3.png);
                    border-style: none;
            }
            #gas{
                width: 20%;
			  height: 20%;
			     top:410px;
                left:230px;
			  position: absolute;
            }
            #scoreimgicon{
			  position: absolute;
            }
            #tablegame{
                background-color: gainsboro;
                border-style: dotted;
                border-color:gainsboro;
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
	
<p>

    <div id="textbroblem"><h3>move car to parking by using blocks .</h3></div>

    <div id="score"><pre style="text-align:center;"><h4><img src="img/download%20(1).png" style="display:inline;width:2%;height:2%;" id="scoreimgicon" >   <span id="hoba">0</span></h4></pre></div>
	<div id ="container">
        
	<table border="1"width="500"height="500" id="tablegame">
	  <tr>
		<td class="tdblack"></td>
		<td class="tree"></td>
		<td class="road3"><div style="top:45px;left:173px"id ="animate"><img src="img/images%20(1).png" width="100%" hight="100%ٍ" id="elementimg" ></div></td>
		<td class="tdblack"></td>
        <td class="tree"></td>
	  </tr>
	  <tr>
		<td class="tdblack"></td>
		<td class="tdblack"></td>
		<td class="road3"></td>
		<td class="tdblack"></td>
        <td class="tdblack"></td>
	  </tr>
	  <tr>
		<td class="tree"></td>
		<td class="tdblack"></td>
		<td class="road3"></td>
		<td class="tdblack"></td>
        <td class="tdblack"></td>
	  </tr>
        
	  
      <tr>
		<td class="tdblack"></td>
		<td class="tree"></td>
		<td class="tdbark1"></td>
		<td class="tree"></td>
        <td class="tdblack"></td>
	  </tr>
        <tr>
		<td class="tdblack"></td>
		<td class="tree"></td>
        <td class="tdbark1"><div id ="gas"><img src="img/download%20(1).png" width="50" hight="50" id="elementgas" ></div></td>
        <td class="tree"></td>
        <td class="tdblack"></td>
	  </tr>
	</table>

	</div>
		<div class="codeContainer" id="blocklyDiv" style="height: 500px;width:470px;">
		</div>
        <xml id="toolbox" style="display:none">
			
				
                <block type="move_forward"></block>
                
			
		</xml>
	  <textarea id="code" name="code" style="display:none;"></textarea>
	<div style="clear:both;">
	<br>
	<input type="submit" value="Run" class='col-lg-3 btn btn-large btn-primary' id="buttonsubmit"  name="gamesubmit"/>
        <br>
	
	
	</div>

     

<script>
    function run(){
		output="OUTPUT = ''; "+output;
		eval(output);
		arr=OUTPUT.split("-");
		arr.splice(-1,1);
		play(1);
	}
   var sheck=true;
    var sheckRF=true;
    var sheckRF2=true;
    var sheckRF3=true;
    var sheckRF4=true;
    var moveRight=true;
    var moveLeft=true;
    var moveTop=true;
    var moveDown=false;
    var checkimgeicon=true;
    var staticcoun=0;
    var staticcounl=0;
    var counter=0;
    var anim;
   var pos=0;
   var lastX=0;
   var lastY=0;
   var elem = document.getElementById("animate");  
    var elemimg=document.getElementById("elementimg");
    var ic=document.getElementById("gas");
	var i=0;
    $('#elementimg').css({ transform: "rotate(90deg)" });
    function reset1(resetarr=1){
    sheckRF=true;
     sheckRF2=true;
     sheckRF3=true;
     sheckRF4=true;
     moveRight=true;
     moveLeft=true;
     moveTop=true;
     moveDown=false;
     staticcoun=0;
     staticcounl=0;
     counter=0;
        debugger;
        $('#elementimg').css({ transform: "rotate(90deg)" });
       if(checkimgeicon==false){
            var image = document.createElement("img");
                image.id = "elementgas";
                image.src = "img/download%20(1).png";            // image.src = "IMAGE URL/PATH"
                image.width="50";
                image.height="70";
                ic.appendChild(image);
                checkimgeicon=true;
        }
         document.getElementById("hoba").innerHTML=0;
            i=0;
        elem.style.left=173+"px";
        elem.style.top=45+"px";
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
            if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){   
		 clearInterval(anim);
            
		 play();
		} 
	}
}
    //moveforward
    
    function left() { 
        debugger;
        lastX=elem.style.left;
        lastY=elem.style.top;
        //movedown
        if(!moveDown){
  anim = setInterval(MoveD, 20);
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
  anim = setInterval(MoveD, 20);
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
  anim = setInterval(MoveR, 20);
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
  anim = setInterval(MoveR, 20);
       function MoveR() {
		elem.style.left= parseInt(elem.style.left)-5+'px';
         if(Math.abs(parseInt(lastX)-parseInt(elem.style.left))>95){   
		 clearInterval(anim);
		 play();
		} 
	}
    }        
}
    
function down() { 
        lasttop=elem.style.top;
        lastleft=elem.style.left;
    //right >>
    if(sheckRF){
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs(parseInt(lastleft)-parseInt(elem.style.left))==70){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)+1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==40){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)+1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==35){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)-1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==65){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)+1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==65){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)-1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==35){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)-1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==35){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)+1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==65){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)-1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==35){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)+1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==65){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)+1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==65){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)-1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==35){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)+1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs((parseInt(lastleft))-parseInt(elem.style.left))==35){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)-1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==65){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)-1+'px';
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
        anim = setInterval(MoveD, 20);
        animro=setInterval(MoveDro,20);
        anim2= setInterval(MoveD2,20);
        function MoveD(){
                if( Math.abs(parseInt(lastleft)-parseInt(elem.style.left))==65){
                    clearInterval(anim);
                }
            else{
                elem.style.left= parseInt(elem.style.left)+1+'px';
            }
        }
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
       function MoveD2(){
            if( Math.abs(parseInt(lasttop)-parseInt(elem.style.top))==35){
                    clearInterval(anim2);
                }
            else{
                elem.style.top= parseInt(elem.style.top)-1+'px';
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
        if(parseInt(elem.style.top)==345 && i>=arr.length){
				//elem.style.backgroundColor ="green";
				elem.innerHTML=elem.innerHTML;
                $('#elementgas').remove();
            checkimgeicon=false;
            document.getElementById("hoba").innerHTML=parseInt(document.getElementById("hoba").innerHTML)+50;
                SubmitGame(1);
            return 0;
			}  
	if(i<arr.length){
         if(arr[i]=="Right" && parseInt(elem.style.top)<405)
				down();
        else if(arr[i]=="forward" && parseInt(elem.style.top)<305) 
				left();
        else if(arr[i]=="Left" && parseInt(elem.style.top)<4) 
				up();
        
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
