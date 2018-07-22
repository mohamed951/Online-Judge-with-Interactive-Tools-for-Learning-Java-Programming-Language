Blockly.JavaScript['move'] = function (block, spaces) {
   var ret = "OUTPUT += '"+block.getFieldValue("Type")+"-' ; \n";
    var next = block.getNextBlock();
    if (next != null)
        ret +=  Blockly.JavaScript[next.type](next, spaces);
    return ret;
};

var index=0,index2=0;	
Blockly.JavaScript['repeat'] = function (block, spaces){
	var ret = spaces + "for(var i"+index+"=0;i"+index+"<";
	ret += Blockly.JavaScript.valueToCode(block, "Number", Blockly.JavaScript.ORDER_ASSIGNMENT) || "0";
  	ret +=  ";i"+index+++"++){\n";
	var x = block.getInputTargetBlock("statment");
	ret += Blockly.JavaScript[x.type](x, spaces);
	ret += spaces + "}\n";
    if (block.getNextBlock() != null) {
        var next = block.getNextBlock();
        ret += Blockly.JavaScript[next.type](next, spaces);
    }
	return ret;
};

var arr="forward-print('hoba','forward-forward-print('hoba','forward-forward-print('fakes','hoba');');');";

Blockly.JavaScript['move_forward'] = function (block, spaces) {
  var ret = "OUTPUT += 'forward-' ; \n";
    var next = block.getNextBlock();
    if (next != null)
        ret += Blockly.JavaScript[next.type](next, spaces);
    return ret;
};
Blockly.JavaScript['be_Invisible'] = function (block, spaces) {
  var ret = "OUTPUT += 'Invisible-' ; \n";
    var next = block.getNextBlock();
    if (next != null)
        ret += Blockly.JavaScript[next.type](next, spaces);
    return ret;
};
Blockly.JavaScript['if_do'] = function(block, spaces) {
  var dropdown_name = block.getFieldValue('NAME');
    var ret = "";
    if (dropdown_name != null){
         ret += "havePath(\""+dropdown_name+"\",\"";
    }
    var child= block.getInputTargetBlock("STATEMENT");
    if(child!=null)
         ret += Blockly.JavaScript[child.type](child, spaces) ;
         
  ret += '\")-';
    if (block.getNextBlock() != null) {
        var next = block.getNextBlock();
        ret += Blockly.JavaScript[next.type](next, spaces);
    }
  return ret;
};
Blockly.JavaScript['repeat_until'] = function (block, spaces){
	var ret = spaces + "for(var i"+index2+"=0;i"+index2+"<";
	ret += "3";
  	ret +=  ";i"+index2+++"++){\n";
	var children = block.getChildren();
    for (var i = 0; i < children.length; i++) {
        if (InputBlock[children[i].type] != 1) {
            if (block.getNextBlock() == null || (children[i].id != block.getNextBlock().id)) {
                ret += Blockly.JavaScript[children[i].type](children[i], spaces + "  ") ;
            }
        }
    }
	ret += spaces + "}\n";
    if (block.getNextBlock() != null) {
        var next = block.getNextBlock();
        ret += Blockly.JavaScript[next.type](next, spaces);
    }
	return ret;
};
