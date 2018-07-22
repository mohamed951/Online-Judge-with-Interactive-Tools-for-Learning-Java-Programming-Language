Blockly.Blocks['set_variable'] = {
  init: function() {
    this.appendDummyInput();
    this.appendDummyInput()
        .appendField(new Blockly.FieldDropdown([["int","int"], ["double","double"], ["long","long"]]), "Type")
        .appendField(new Blockly.FieldTextInput("default"), "Var")
        .appendField("=");
    this.appendValueInput("Number")
        .setCheck("Number");
    this.appendDummyInput()
        .appendField(";");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(300);
 this.setTooltip("Variable");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['do_while'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("do {");
    this.appendStatementInput("container")
        .setCheck(null);
    this.appendDummyInput()
        .appendField("}    while (");
    this.appendValueInput("condition")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(")  ;");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['while_loop'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("while (");
    this.appendValueInput("condition")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(")    {");
    this.appendStatementInput("container")
        .setCheck(null);
    this.appendDummyInput()
        .appendField("}");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['for_loop'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("for (");
    this.appendValueInput("For_Initialization")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(";");
    this.appendValueInput("For_Condition")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(";");
    this.appendValueInput("For_Iteration")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(")  {");
    this.appendStatementInput("For_Container")
        .setCheck(null);
    this.appendDummyInput()
        .appendField("}");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['move_forward'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("move forward");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['be_Invisible'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("be Invisible");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['repeat_until'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Repeat until")
        .appendField(new Blockly.FieldImage("img/download (1).png", 20, 20, "*"));
    this.appendStatementInput("NAME")
        .setCheck(null)
        .appendField("do");
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['if_do'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("if path")
        .appendField(new Blockly.FieldDropdown([["ahead","ahead"], ["to the left ↺","left"], ["to the right ↻","right"]]), "NAME");
    this.appendStatementInput("STATEMENT")
        .setCheck(null)
        .appendField("do");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['for_initialization_value'] = {
  init: function() {
    this.appendDummyInput()
        .appendField(new Blockly.FieldDropdown([["int","int"], ["long","long"]]), "Type")
        .appendField(new Blockly.FieldTextInput("i"), "Initialization")
        .appendField("=");
    this.appendValueInput("Number")
        .setCheck("Number");
    this.setInputsInline(true);
    this.setOutput(true, null);
    this.setColour(300);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['condition_block'] = {
  init: function() {
    this.appendDummyInput()
        .appendField(new Blockly.FieldTextInput(""), "value1")
        .appendField(new Blockly.FieldDropdown([["==","=="], [">",">"], ["<","<"], [">=",">="], ["<=","<="]]), "operation")
        .appendField(new Blockly.FieldTextInput(""), "value2");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['for_iteration'] = {
  init: function() {
    this.appendDummyInput()
        .appendField(new Blockly.FieldTextInput(""), "variable")
        .appendField(new Blockly.FieldDropdown([["++","++"], ["--","--"]]), "iteration");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("For Iteration");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['for_iteration2'] = {
  init: function() {
    this.appendDummyInput()
        .appendField(new Blockly.FieldTextInput(""), "value1")
        .appendField(new Blockly.FieldDropdown([["+","+"], ["-","-"], ["*","*"], ["/","/"]]), "operation")
        .appendField(" = ")
        .appendField(new Blockly.FieldTextInput(""), "value2");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("For_Iteration");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['main_class'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("public class ")
        .appendField(new Blockly.FieldTextInput("run"), "class_name")
        .appendField("{");
    this.appendStatementInput("NAME")
        .setCheck(null);
    this.appendDummyInput()
        .appendField("}");
   // this.setColour(180);
 this.setTooltip("main class");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['main_method'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("public static void main (String [ ] args)  {");
    this.appendStatementInput("NAME")
        .setCheck(null);
    this.appendDummyInput()
        .appendField("}");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(45);
 this.setTooltip("main method");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['println'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("System.out.println(");
    this.appendValueInput("print_value")
        .setCheck(null);
    this.appendDummyInput()
        .appendField(");");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['var'] = {
  init: function() {
    this.appendDummyInput()
        .appendField(new Blockly.FieldTextInput("var/op"), "var");
    this.setOutput(true, null);
    this.setColour(120);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['if_else'] = {
    init: function () {
        if (!this.workspace.options.useMutators) {
            var a = new Blockly.FieldClickImage(this.addPng, 17, 17, Blockly.Msg.CONTROLS_IF_ADD_TOOLTIP);
            a.setChangeHandler(this.doAddField)
        }
        this.setHelpUrl(Blockly.Msg.CONTROLS_IF_HELPURL);
        this.setColour(Blockly.Blocks.logic.HUE);
        var b = this.appendValueInput("IF0").setCheck("Boolean").appendField(Blockly.Msg.CONTROLS_IF_MSG_IF);
        this.workspace.options.useMutators || b.appendField(a, "IF_ADD");
        this.appendStatementInput("DO0").appendField(Blockly.Msg.CONTROLS_IF_MSG_THEN);
        this.setPreviousStatement(!0);
        this.setNextStatement(!0);
        this.workspace.options.useMutators && this.setMutator(new Blockly.Mutator(["controls_if_elseif", "controls_if_else"]));
        var c = this;
        this.setTooltip(function () {
            if (c.elseifCount_ || c.elseCount_) {
                if (!c.elseifCount_ && c.elseCount_) return Blockly.Msg.CONTROLS_IF_TOOLTIP_2;
                if (c.elseifCount_ && !c.elseCount_) return Blockly.Msg.CONTROLS_IF_TOOLTIP_3;
                if (c.elseifCount_ && c.elseCount_) return Blockly.Msg.CONTROLS_IF_TOOLTIP_4
            } else return Blockly.Msg.CONTROLS_IF_TOOLTIP_1;
            return ""
        });
        this.elseCount_ = this.elseifCount_ = 0
    },
    mutationToDom: function () {
        if (!this.elseifCount_ && !this.elseCount_) return null;
        var a = document.createElement("mutation");
        this.elseifCount_ && a.setAttribute("elseif", this.elseifCount_);
        this.elseCount_ && a.setAttribute("else", 1);
        return a
    },
    domToMutation: function (a) {
        this.elseifCount_ = parseInt(a.getAttribute("elseif"), 10);
        this.elseCount_ = parseInt(a.getAttribute("else"), 10);
        this.updateAddSubShape()
    },
    doAddField: function (a) {
        this.elseCount_ ? this.elseifCount_++ : this.elseCount_ =
            1;
        this.updateAddSubShape()
    },
    doRemoveElseifField: function (a) {
        var b = a.getPrivate().pos;
        a = this.elseifCount_ + 1;
        0 < this.elseifCount_ && this.elseifCount_--;
        var c = this.getInput("IF" + b);
        c && c.connection && c.connection.targetConnection && c.connection.targetConnection.sourceBlock_.unplug(!0, !0);
        var d = this.getInput("DO" + b);
        d && d.connection && d.connection.targetConnection && d.connection.targetConnection.sourceBlock_.unplug(!0, !0);
        for (b += 1; b < a; b++) {
            var e = this.getInput("IF" + b),
                f = this.getInput("DO" + b);
            if (null != e && e.connection &&
                e.connection.targetConnection) {
                var g = e.connection.targetConnection;
                g.sourceBlock_.unplug(!1, !1);
                c.connection.connect(g)
            }
            null != f && f.connection && f.connection.targetConnection && (g = f.connection.targetConnection, g.sourceBlock_.unplug(!1, !1), d.connection.connect(g));
            c = e;
            d = f
        }
        this.updateAddSubShape()
    },
    doRemoveElseField: function (a) {
        this.elseCount_ = 0;
        this.updateAddSubShape()
    },
    updateAddSubShape: function () {
        for (var a = this.elseifCount_ + 1; null != this.getInput("IF" + a);) this.removeInput("IF" + a), this.removeInput("DO" +
            a), a++;
        this.elseCount_ || null != this.getInput("ELSE") && this.removeInput("ELSE");
        var b = this.getInputIndex("DO0");
        goog.asserts.assert(-1 != b, "Named input DO0 not found.");
        if (-1 !== b) {
            b++;
            for (a = 1; a < this.elseifCount_ + 1; a++, b += 2) {
                var c = this.getInput("IF" + a);
                if (null == c) {
                    c = null;
                    this.workspace.options.useMutators || (c = new Blockly.FieldClickImage(this.subPng, 17, 17, Blockly.Msg.CONTROLS_IF_ELSEIF_REMOVE_TOOLTIP), c.setPrivate({
                        name: "IF",
                        pos: a
                    }), c.setChangeHandler(this.doRemoveElseifField));
                    var d = this.appendValueInput("IF" +
                        a).setCheck("Boolean").appendField(Blockly.Msg.CONTROLS_IF_MSG_ELSEIF);
                    c && d.appendField(c);
                    this.appendStatementInput("DO" + a).appendField(Blockly.Msg.CONTROLS_IF_MSG_THEN);
                    b < this.inputList.length - 1 && (this.moveNumberedInputBefore(this.inputList.length - 1, b), this.moveNumberedInputBefore(this.inputList.length - 1, b))
                }
            }
            this.elseCount_ && (c = this.getInput("ELSE"), null == c && (c = null, this.workspace.options.useMutators || (c = new Blockly.FieldClickImage(this.subPng, 17, 17, Blockly.Msg.CONTROLS_IF_ELSE_REMOVE_TOOLTIP),
                c.setChangeHandler(this.doRemoveElseField)), a = this.appendStatementInput("ELSE").appendField(Blockly.Msg.CONTROLS_IF_MSG_ELSE), c && a.appendField(c)))
        }
        this.rendered && (this.render(), this.bumpNeighbours_(), this.workspace.fireChangeEvent())
    },
    decompose: function (a) {
        var b = Blockly.Block.obtain(a, "controls_if_if");
        b.initSvg();
        for (var c = b.getInput("STACK").connection, d = 1; d <= this.elseifCount_; d++) {
            var e = Blockly.Block.obtain(a, "controls_if_elseif");
            e.initSvg();
            c.connect(e.previousConnection);
            c = e.nextConnection
        }
        this.elseCount_ &&
            (a = Blockly.Block.obtain(a, "controls_if_else"), a.initSvg(), c.connect(a.previousConnection));
        return b
    },
    compose: function (a) {
        this.elseCount_ && this.removeInput("ELSE");
        this.elseCount_ = 0;
        for (var b = this.elseifCount_; 0 < b; b--) this.removeInput("IF" + b), this.removeInput("DO" + b);
        this.elseifCount_ = 0;
        for (a = a.getInputTargetBlock("STACK"); a;) {
            switch (a.type) {
                case "controls_if_elseif":
                    this.elseifCount_++;
                    var b = this.appendValueInput("IF" + this.elseifCount_).setCheck("Boolean").appendField(Blockly.Msg.CONTROLS_IF_MSG_ELSEIF),
                        c = this.appendStatementInput("DO" + this.elseifCount_);
                    c.appendField(Blockly.Msg.CONTROLS_IF_MSG_THEN);
                    a.valueConnection_ && b.connection.connect(a.valueConnection_);
                    a.statementConnection_ && c.connection.connect(a.statementConnection_);
                    break;
                case "controls_if_else":
                    this.elseCount_++;
                    b = this.appendStatementInput("ELSE");
                    b.appendField(Blockly.Msg.CONTROLS_IF_MSG_ELSE);
                    a.statementConnection_ && b.connection.connect(a.statementConnection_);
                    break;
                default:
                    throw "Unknown block type.";
            }
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    saveConnections: function (a) {
        a = a.getInputTargetBlock("STACK");
        for (var b = 1; a;) {
            switch (a.type) {
                case "controls_if_elseif":
                    var c = this.getInput("IF" + b),
                        d = this.getInput("DO" + b);
                    a.valueConnection_ = c && c.connection.targetConnection;
                    a.statementConnection_ = d && d.connection.targetConnection;
                    b++;
                    break;
                case "controls_if_else":
                    d = this.getInput("ELSE");
                    a.statementConnection_ = d && d.connection.targetConnection;
                    break;
                default:
                    throw "Unknown block type.";
            }
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    typeblock: [{
            entry: Blockly.Msg.CONTROLS_IF_TYPEBLOCK
        },
        {
            entry: Blockly.Msg.CONTROLS_IF_ELSIF_TYPEBLOCK,
            mutatorAttributes: {
                elseif: 1
            }
        }, {
            entry: Blockly.Msg.CONTROLS_IF_ELSIF_ELSE_TYPEBLOCK,
            mutatorAttributes: {
                elseif: 1,
                "else": 1
            }
        }, {
            entry: Blockly.Msg.CONTROLS_IF_ELSE_TYPEBLOCK,
            mutatorAttributes: {
                "else": 1
            }
        }]
};