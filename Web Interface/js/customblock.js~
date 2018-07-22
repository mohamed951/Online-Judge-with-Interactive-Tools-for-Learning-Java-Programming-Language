var getUrl = window.location;
//var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
Blockly.Blocks['set_number'] = {
    init: function () {
        this.appendDummyInput();
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["long", "long"], ["String", "String"], ["boolean", "boolean"]]), "Type")
            .appendField(new Blockly.FieldTextInput("var"), "Name")
            .appendField("=");
        this.appendValueInput("Number")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(270);
        this.setTooltip("Variable");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['set_number2'] = {
    init: function () {
        this.appendDummyInput();
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["long", "long"], ["String", "String"], ["boolean", "boolean"]]), "Type")
            .appendField(new Blockly.FieldTextInput("var"), "Name");
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(270);
        this.setTooltip("Variable");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['do_while'] = {
    init: function () {
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
        this.setColour(345);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['while_loop'] = {
    init: function () {
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
        this.setColour(345);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['for_loop'] = {
    init: function () {
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
        this.setColour(345);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['for_initialization_value'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["long", "long"]]), "Type")
            .appendField(new Blockly.FieldTextInput("i"), "Initialization")
            .appendField("=");
        this.appendValueInput("NAME")
            .setCheck("Number");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(270);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['condition_block'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput(""), "value1")
            .appendField(new Blockly.FieldDropdown([["==", "=="], [">", ">"], ["<", "<"], [">=", ">="], ["<=", "<="]]), "operation")
            .appendField(new Blockly.FieldTextInput(""), "value2");
        this.setOutput(true, null);
        this.setColour(225);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['condition_block2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput(""), "value1")
            .appendField(new Blockly.FieldDropdown([["<", "<"], [">", ">"], [">=", ">="], ["<=", "<="], ["==", "=="]]), "operation");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.setInputsInline(true);
        this.setOutput(true);
        this.setColour(225);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['for_iteration'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput(""), "variable")
            .appendField(new Blockly.FieldDropdown([["++", "++"], ["--", "--"]]), "iteration");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("For Iteration");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['for_iteration2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput(""), "value1")
            .appendField(new Blockly.FieldDropdown([["+", "+"], ["-", "-"], ["*", "*"], ["/", "/"]]), "operation")
            .appendField(" = ")
            .appendField(new Blockly.FieldTextInput(""), "value2");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("For_Iteration");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['main_class'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("public class Main  { ");
        this.appendStatementInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setPreviousStatement(true, null);
        this.setColour(180);
        this.setTooltip("main class");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['main_method'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("public static void main (String [ ] args)  {");
        this.appendStatementInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(120);
        this.setTooltip("main method");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['print'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("System.out.")
            .appendField(new Blockly.FieldDropdown([["println", "println"], ["print", "print"], ["printf", "printf"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(");");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['var'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var/op"), "var");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['import_scanner'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.util.Scanner;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(0);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

var aa;
Blockly.Blocks['array'] = {
    init: function () {
        this.setHelpUrl(Blockly.Msg.LISTS_CREATE_WITH_HELPURL);
        this.setColour(Blockly.Blocks.lists.HUE);
        this.itemCount_ = 2;
        this.setInputsInline(true);
        this.updateShape_();
        this.setOutput(!0, "Array");
        this.setMutator(new Blockly.Mutator(["lists_create_with_item"]));
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_TOOLTIP)
    },
    mutationToDom: function () {
        var a = document.createElement("mutation");
        a.setAttribute("items", this.itemCount_);
        return a
    },
    domToMutation: function (a) {
        this.itemCount_ = parseInt(a.getAttribute("items"),
            10);
        this.updateShape_()
    },
    decompose: function (a) {
        var b = a.newBlock("lists_create_with_container");
        b.initSvg();
        for (var c = b.getInput("STACK").connection, d = 0; d < this.itemCount_; d++) {
            var e = a.newBlock("lists_create_with_item");
            e.initSvg();
            c.connect(e.previousConnection);
            c = e.nextConnection
        }
        return b
    },
    compose: function (a) {
        var b = a.getInputTargetBlock("STACK");
        for (a = []; b;) a.push(b.valueConnection_), b = b.nextConnection && b.nextConnection.targetBlock();
        for (b = 0; b < this.itemCount_; b++) {
            var c = this.getInput("ADD" + b).connection.targetConnection;
            c && -1 == a.indexOf(c) && c.disconnect()
        }
        this.itemCount_ = a.length;
        this.updateShape_();
        for (b = 0; b < this.itemCount_; b++) Blockly.Mutator.reconnect(a[b], this, "ADD" + b)
    },
    saveConnections: function (a) {
        a = a.getInputTargetBlock("STACK");
        for (var b = 0; a;) {
            var c = this.getInput("ADD" + b);
            a.valueConnection_ = c && c.connection.targetConnection;
            b++;
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    updateShape_: function () {

        this.itemCount_ && this.getInput("EMPTY") ? this.removeInput("EMPTY") || this.removeInput("hoba" + aa) : this.itemCount_ || this.getInput("EMPTY") || this.removeInput("hoba" + aa) ||
            this.appendDummyInput("EMPTY").appendField("{ }");
        for (var a = 0; a < this.itemCount_; a++)
            if (!this.getInput("ADD" + a)) {
                if (a > 0) {
                    this.appendDummyInput("comma" + a).appendField(",");

                    this.removeInput("hoba" + (a - 1));
                    for (var x = Number(aa); x > 0; x--) {
                        this.removeInput("hoba" + (x));

                    }
                }
                var b = this.appendValueInput("ADD" + a);
                0 == a && b.appendField("{");
                this.appendDummyInput("hoba" + a).appendField("}");
                aa = a;
            }
        //this.appendDummyInput("EMPTY2").appendField("}");

        for (; this.getInput("ADD" + a);) {
            this.removeInput("ADD" + a);
            this.removeInput("comma" + a);
            a++;
        }
    }
};

Blockly.Blocks['multi1'] = {
    init: function () {
        this.setHelpUrl(Blockly.Msg.LISTS_CREATE_WITH_HELPURL);
        this.setColour(Blockly.Blocks.lists.HUE);
        this.itemCount_ = 2;
        this.setInputsInline(true);
        this.updateShape_();
        this.setOutput(!0, "Array");
        this.setMutator(new Blockly.Mutator(["lists_create_with_item"]));
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_TOOLTIP)
    },
    mutationToDom: function () {
        var a = document.createElement("mutation");
        a.setAttribute("items", this.itemCount_);
        return a
    },
    domToMutation: function (a) {
        this.itemCount_ = parseInt(a.getAttribute("items"),
            10);
        this.updateShape_()
    },
    decompose: function (a) {
        var b = a.newBlock("lists_create_with_container");
        b.initSvg();
        for (var c = b.getInput("STACK").connection, d = 0; d < this.itemCount_; d++) {
            var e = a.newBlock("lists_create_with_item");
            e.initSvg();
            c.connect(e.previousConnection);
            c = e.nextConnection
        }
        return b
    },
    compose: function (a) {
        var b = a.getInputTargetBlock("STACK");
        for (a = []; b;) a.push(b.valueConnection_), b = b.nextConnection && b.nextConnection.targetBlock();
        for (b = 0; b < this.itemCount_; b++) {
            var c = this.getInput("ADD" + b).connection.targetConnection;
            c && -1 == a.indexOf(c) && c.disconnect()
        }
        this.itemCount_ = a.length;
        this.updateShape_();
        for (b = 0; b < this.itemCount_; b++) Blockly.Mutator.reconnect(a[b], this, "ADD" + b)
    },
    saveConnections: function (a) {
        a = a.getInputTargetBlock("STACK");
        for (var b = 0; a;) {
            var c = this.getInput("ADD" + b);
            a.valueConnection_ = c && c.connection.targetConnection;
            b++;
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    updateShape_: function () {

        this.itemCount_ && this.getInput("EMPTY") ? this.removeInput("EMPTY") : this.itemCount_ || this.getInput("EMPTY")
        for (var a = 0; a < this.itemCount_; a++)
            if (!this.getInput("ADD" + a)) {
                if (a > 0) {
                    this.appendDummyInput("op" + a)
                        .appendField(new Blockly.FieldDropdown([["+", "+"], ["-", "-"], ["*", "*"], ["/", "/"], ["%", "%"], ["&", "&"], ["|", "|"], ["&&", "&&"], ["||", "||"], ["^", "^"], ["~", "~"], ["<<", "<<"], [">>", ">>"], [">>>", ">>>"]]), "NAME" + a);

                }
                var b = this.appendValueInput("ADD" + a);
                0 == a;
            }
        //this.appendDummyInput("EMPTY2").appendField("}");

        for (; this.getInput("ADD" + a);) {
            this.removeInput("ADD" + a);
            this.removeInput("op" + a);
            a++;
        }
    }
};

var aa2;
Blockly.Blocks['multi2'] = {
    init: function () {
        this.setHelpUrl(Blockly.Msg.LISTS_CREATE_WITH_HELPURL);
        this.setColour(Blockly.Blocks.lists.HUE);
        this.itemCount_ = 2;
        this.setInputsInline(true);
        this.updateShape_();
        this.setOutput(!0, "Array");
        this.setMutator(new Blockly.Mutator(["lists_create_with_item"]));
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_TOOLTIP)
    },
    mutationToDom: function () {
        var a = document.createElement("mutation");
        a.setAttribute("items", this.itemCount_);
        return a
    },
    domToMutation: function (a) {
        this.itemCount_ = parseInt(a.getAttribute("items"),
            10);
        this.updateShape_()
    },
    decompose: function (a) {
        var b = a.newBlock("lists_create_with_container");
        b.initSvg();
        for (var c = b.getInput("STACK").connection, d = 0; d < this.itemCount_; d++) {
            var e = a.newBlock("lists_create_with_item");
            e.initSvg();
            c.connect(e.previousConnection);
            c = e.nextConnection
        }
        return b
    },
    compose: function (a) {
        var b = a.getInputTargetBlock("STACK");
        for (a = []; b;) a.push(b.valueConnection_), b = b.nextConnection && b.nextConnection.targetBlock();
        for (b = 0; b < this.itemCount_; b++) {
            var c = this.getInput("ADD" + b).connection.targetConnection;
            c && -1 == a.indexOf(c) && c.disconnect()
        }
        this.itemCount_ = a.length;
        this.updateShape_();
        for (b = 0; b < this.itemCount_; b++) Blockly.Mutator.reconnect(a[b], this, "ADD" + b)
    },
    saveConnections: function (a) {
        a = a.getInputTargetBlock("STACK");
        for (var b = 0; a;) {
            var c = this.getInput("ADD" + b);
            a.valueConnection_ = c && c.connection.targetConnection;
            b++;
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    updateShape_: function () {

        this.itemCount_ && this.getInput("EMPTY") ? this.removeInput("EMPTY") || this.removeInput("hoba" + aa2) : this.itemCount_ || this.getInput("EMPTY") || this.removeInput("hoba" + aa2) ||
            this.appendDummyInput("EMPTY").appendField("( )");
        for (var a = 0; a < this.itemCount_; a++)
            if (!this.getInput("ADD" + a)) {
                if (a > 0) {
                    this.appendDummyInput("op" + a).appendField(new Blockly.FieldDropdown([["+", "+"], ["-", "-"], ["*", "*"], ["/", "/"], ["%", "%"], ["&", "&"], ["|", "|"], ["&&", "&&"], ["||", "||"], ["^", "^"], ["~", "~"], ["<<", "<<"], [">>", ">>"], [">>>", ">>>"]]), "NAME" + a);

                    this.removeInput("hoba" + (a - 1));
                    for (var x = Number(aa2); x > 0; x--) {
                        this.removeInput("hoba" + (x));

                    }
                }
                var b = this.appendValueInput("ADD" + a);
                0 == a && b.appendField("(");
                this.appendDummyInput("hoba" + a).appendField(")");
                aa2 = a;
            }
        //this.appendDummyInput("EMPTY2").appendField("}");

        for (; this.getInput("ADD" + a);) {
            this.removeInput("ADD" + a);
            this.removeInput("op" + a);
            a++;
        }
    }
};

var aa3;
Blockly.Blocks['multi3'] = {
    init: function () {
        this.setHelpUrl(Blockly.Msg.LISTS_CREATE_WITH_HELPURL);
        this.setColour(Blockly.Blocks.lists.HUE);
        this.itemCount_ = 2;
        this.setInputsInline(true);
        this.updateShape_();
        this.setOutput(!0, "Array");
        this.setMutator(new Blockly.Mutator(["lists_create_with_item"]));
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_TOOLTIP)
    },
    mutationToDom: function () {
        var a = document.createElement("mutation");
        a.setAttribute("items", this.itemCount_);
        return a
    },
    domToMutation: function (a) {
        this.itemCount_ = parseInt(a.getAttribute("items"),
            10);
        this.updateShape_()
    },
    decompose: function (a) {
        var b = a.newBlock("lists_create_with_container");
        b.initSvg();
        for (var c = b.getInput("STACK").connection, d = 0; d < this.itemCount_; d++) {
            var e = a.newBlock("lists_create_with_item");
            e.initSvg();
            c.connect(e.previousConnection);
            c = e.nextConnection
        }
        return b
    },
    compose: function (a) {
        var b = a.getInputTargetBlock("STACK");
        for (a = []; b;) a.push(b.valueConnection_), b = b.nextConnection && b.nextConnection.targetBlock();
        for (b = 0; b < this.itemCount_; b++) {
            var c = this.getInput("ADD" + b).connection.targetConnection;
            c && -1 == a.indexOf(c) && c.disconnect()
        }
        this.itemCount_ = a.length;
        this.updateShape_();
        for (b = 0; b < this.itemCount_; b++) Blockly.Mutator.reconnect(a[b], this, "ADD" + b)
    },
    saveConnections: function (a) {
        a = a.getInputTargetBlock("STACK");
        for (var b = 0; a;) {
            var c = this.getInput("ADD" + b);
            a.valueConnection_ = c && c.connection.targetConnection;
            b++;
            a = a.nextConnection && a.nextConnection.targetBlock()
        }
    },
    updateShape_: function () {

        this.itemCount_ && this.getInput("EMPTY") ? this.removeInput("EMPTY") || this.removeInput("hoba" + aa3) : this.itemCount_ || this.getInput("EMPTY") || this.removeInput("hoba" + aa3) ||
            this.appendDummyInput("EMPTY").appendField("");
        for (var a = 0; a < this.itemCount_; a++)
            if (!this.getInput("ADD" + a)) {
                if (a > 0) {

                    this.appendDummyInput("comma" + a).appendField(",");

                }
                var b = this.appendValueInput("ADD" + a);
                0 == a && b.appendField("");
                aa3 = a;
            }
        //this.appendDummyInput("EMPTY2").appendField("}");

        for (; this.getInput("ADD" + a);) {
            this.removeInput("ADD" + a);
            this.removeInput("comma" + a);
            a++;
        }
    }
};

Blockly.Blocks['lists_create_with'] = {
    /**
     * Block for creating a list with any number of elements of any type.
     * @this Blockly.Block
     */
    init: function () {
        this.setHelpUrl(Blockly.Msg.LISTS_CREATE_WITH_HELPURL);
        this.setColour(Blockly.Blocks.lists.HUE);
        this.itemCount_ = 2;
        this.updateShape_();
        this.setOutput(true, 'Array');
        this.setMutator(new Blockly.Mutator(['lists_create_with_item']));
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_TOOLTIP);
    },
    /**
     * Create XML to represent list inputs.
     * @return {!Element} XML storage element.
     * @this Blockly.Block
     */
    mutationToDom: function () {
        var container = document.createElement('mutation');
        container.setAttribute('items', this.itemCount_);
        return container;
    },
    /**
     * Parse XML to restore the list inputs.
     * @param {!Element} xmlElement XML storage element.
     * @this Blockly.Block
     */
    domToMutation: function (xmlElement) {
        this.itemCount_ = parseInt(xmlElement.getAttribute('items'), 10);
        this.updateShape_();
    },
    /**
     * Populate the mutator's dialog with this block's components.
     * @param {!Blockly.Workspace} workspace Mutator's workspace.
     * @return {!Blockly.Block} Root block in mutator.
     * @this Blockly.Block
     */
    decompose: function (workspace) {
        var containerBlock = workspace.newBlock('lists_create_with_container');
        containerBlock.initSvg();
        var connection = containerBlock.getInput('STACK').connection;
        for (var i = 0; i < this.itemCount_; i++) {
            var itemBlock = workspace.newBlock('lists_create_with_item');
            itemBlock.initSvg();
            connection.connect(itemBlock.previousConnection);
            connection = itemBlock.nextConnection;
        }
        return containerBlock;
    },
    /**
     * Reconfigure this block based on the mutator dialog's components.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    compose: function (containerBlock) {
        var itemBlock = containerBlock.getInputTargetBlock('STACK');
        // Count number of inputs.
        var connections = [];
        while (itemBlock) {
            connections.push(itemBlock.valueConnection_);
            itemBlock = itemBlock.nextConnection &&
                itemBlock.nextConnection.targetBlock();
        }
        // Disconnect any children that don't belong.
        for (var i = 0; i < this.itemCount_; i++) {
            var connection = this.getInput('ADD' + i).connection.targetConnection;
            if (connection && connections.indexOf(connection) == -1) {
                connection.disconnect();
            }
        }
        this.itemCount_ = connections.length;
        this.updateShape_();
        // Reconnect any child blocks.
        for (var i = 0; i < this.itemCount_; i++) {
            Blockly.Mutator.reconnect(connections[i], this, 'ADD' + i);
        }
    },
    /**
     * Store pointers to any connected child blocks.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    saveConnections: function (containerBlock) {
        var itemBlock = containerBlock.getInputTargetBlock('STACK');
        var i = 0;
        while (itemBlock) {
            var input = this.getInput('ADD' + i);
            itemBlock.valueConnection_ = input && input.connection.targetConnection;
            i++;
            itemBlock = itemBlock.nextConnection &&
                itemBlock.nextConnection.targetBlock();
        }
    },
    /**
     * Modify this block to have the correct number of inputs.
     * @private
     * @this Blockly.Block
     */
    updateShape_: function () {
        if (this.itemCount_ && this.getInput('EMPTY')) {
            this.removeInput('EMPTY');
        } else if (!this.itemCount_ && !this.getInput('EMPTY')) {
            this.appendDummyInput('EMPTY')
                .appendField(Blockly.Msg.LISTS_CREATE_EMPTY_TITLE);
        }
        // Add new inputs.
        for (var i = 0; i < this.itemCount_; i++) {
            if (!this.getInput('ADD' + i)) {
                var input = this.appendValueInput('ADD' + i);
                if (i == 0) {
                    input.appendField(Blockly.Msg.LISTS_CREATE_WITH_INPUT_WITH);
                }
            }
        }
        // Remove deleted inputs.
        while (this.getInput('ADD' + i)) {
            this.removeInput('ADD' + i);
            i++;
        }
    }
};

Blockly.Blocks['lists_create_with_container'] = {
    /**
     * Mutator block for list container.
     * @this Blockly.Block
     */
    init: function () {
        this.setColour(Blockly.Blocks.lists.HUE);
        this.appendDummyInput()
            .appendField(Blockly.Msg.LISTS_CREATE_WITH_CONTAINER_TITLE_ADD);
        this.appendStatementInput('STACK');
        this.setTooltip("Blockly.Msg.LISTS_CREATE_WITH_CONTAINER_TOOLTIP");
        this.contextMenu = false;
    }
};

Blockly.Blocks['lists_create_with_item'] = {
    /**
     * Mutator block for adding items.
     * @this Blockly.Block
     */
    init: function () {
        this.setColour(Blockly.Blocks.lists.HUE);
        this.appendDummyInput()
            .appendField(Blockly.Msg.LISTS_CREATE_WITH_ITEM_TITLE);
        this.setPreviousStatement(true);
        this.setNextStatement(true);
        this.setTooltip(Blockly.Msg.LISTS_CREATE_WITH_ITEM_TOOLTIP);
        this.contextMenu = false;
    }
};


Blockly.defineBlocksWithJsonArray([ // Mutator blocks. Do not extract.
  // Block representing the if statement in the controls_if mutator.
    {
        "type": "controls_if",
        "message0": "%{BKY_CONTROLS_IF_MSG_IF} %1",
        "args0": [
            {
                "type": "input_value",
                "name": "IF0",
                "check": "Boolean"
      }
    ],
        "message1": "%{BKY_CONTROLS_IF_MSG_THEN} %1",
        "args1": [
            {
                "type": "input_statement",
                "name": "DO0"
      }
    ],
        "previousStatement": null,
        "nextStatement": null,
        "colour": "%{BKY_LOGIC_HUE}",
        "helpUrl": "%{BKY_CONTROLS_IF_HELPURL}",
        "mutator": "controls_if_mutator",
        "extensions": ["controls_if_tooltip"]
  },
    {
        "type": "controls_if_if",
        "message0": "%{BKY_CONTROLS_IF_IF_TITLE_IF}",
        "nextStatement": null,
        "enableContextMenu": false,
        "colour": "%{BKY_LOGIC_HUE}",
        "tooltip": "%{BKY_CONTROLS_IF_IF_TOOLTIP}"
  },
  // Block representing the else-if statement in the controls_if mutator.
    {
        "type": "controls_if_elseif",
        "message0": "%{BKY_CONTROLS_IF_ELSEIF_TITLE_ELSEIF}",
        "previousStatement": null,
        "nextStatement": null,
        "enableContextMenu": false,
        "colour": "%{BKY_LOGIC_HUE}",
        "tooltip": "%{BKY_CONTROLS_IF_ELSEIF_TOOLTIP}"
  },
  // Block representing the else statement in the controls_if mutator.
    {
        "type": "controls_if_else",
        "message0": "%{BKY_CONTROLS_IF_ELSE_TITLE_ELSE}",
        "previousStatement": null,
        "enableContextMenu": false,
        "colour": "%{BKY_LOGIC_HUE}",
        "tooltip": "%{BKY_CONTROLS_IF_ELSE_TOOLTIP}"
  }
]);

Blockly.Blocks['switch'] = {
    elseifCount_: 0,
    elseCount_: 0,
    init: function () {
        this.appendDummyInput()
            .appendField("case");
        this.appendValueInput("condition_S0")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(":");
        this.appendStatementInput("statement_S0")
            .setCheck(null);
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setColour(225);
        this.setTooltip("");
        this.setHelpUrl("");
        this.setMutator(new Blockly.Mutator(['addcase', 'default']));
    },
    /**
     * Create XML to represent the number of else-if and else inputs.
     * @return {Element} XML storage element.
     * @this Blockly.Block
     */
    mutationToDom: function () {
        if (!this.elseifCount_ && !this.elseCount_) {
            return null;
        }
        var container = document.createElement('mutation');
        if (this.elseifCount_) {
            container.setAttribute('addcase', this.elseifCount_);
        }
        if (this.elseCount_) {
            container.setAttribute('default', 1);
        }
        return container;
    },
    /**
     * Parse XML to restore the else-if and else inputs.
     * @param {!Element} xmlElement XML storage element.
     * @this Blockly.Block
     */
    domToMutation: function (xmlElement) {
        this.elseifCount_ = parseInt(xmlElement.getAttribute('addcase'), 10) || 0;
        this.elseCount_ = parseInt(xmlElement.getAttribute('default'), 10) || 0;
        this.updateShape_();
    },
    /**
     * Populate the mutator's dialog with this block's components.
     * @param {!Blockly.Workspace} workspace Mutator's workspace.
     * @return {!Blockly.Block} Root block in mutator.
     * @this Blockly.Block
     */
    decompose: function (workspace) {
        var containerBlock = workspace.newBlock('startcase');
        containerBlock.initSvg();
        var connection = containerBlock.nextConnection;
        for (var i = 1; i <= this.elseifCount_; i++) {
            var elseifBlock = workspace.newBlock('addcase');
            elseifBlock.initSvg();
            connection.connect(elseifBlock.previousConnection);
            connection = elseifBlock.nextConnection;
        }
        if (this.elseCount_) {
            var elseBlock = workspace.newBlock('default');
            elseBlock.initSvg();
            connection.connect(elseBlock.previousConnection);
        }
        return containerBlock;
    },
    /**
     * Reconfigure this block based on the mutator dialog's components.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    compose: function (containerBlock) {
        var clauseBlock = containerBlock.nextConnection.targetBlock();
        // Count number of inputs.
        this.elseifCount_ = 0;
        this.elseCount_ = 0;
        var valueConnections = [null];
        var statementConnections = [null];
        var elseStatementConnection = null;
        while (clauseBlock) {
            switch (clauseBlock.type) {
                case 'addcase':
                    this.elseifCount_++;
                    valueConnections.push(clauseBlock.valueConnection_);
                    statementConnections.push(clauseBlock.statementConnection_);
                    break;
                case 'default':
                    this.elseCount_++;
                    elseStatementConnection = clauseBlock.statementConnection_;
                    break;
                default:
                    throw 'Unknown block type.';
            }
            clauseBlock = clauseBlock.nextConnection &&
                clauseBlock.nextConnection.targetBlock();
        }
        this.updateShape_();
        // Reconnect any child blocks.

        for (var i = 1; i <= this.elseifCount_; i++) {
            Blockly.Mutator.reconnect(valueConnections[i], this, 'condition_S' + i);
            Blockly.Mutator.reconnect(statementConnections[i], this, 'statement_S' + i);
        }
        Blockly.Mutator.reconnect(elseStatementConnection, this, 'Default_S');
    },
    /**
     * Store pointers to any connected child blocks.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    saveConnections: function (containerBlock) {
        var clauseBlock = containerBlock.nextConnection.targetBlock();
        var i = 1;
        while (clauseBlock) {
            switch (clauseBlock.type) {
                case 'addcase':
                    var inputIf = this.getInput('condition_S' + i);
                    var inputDo = this.getInput('statement_S' + i);
                    clauseBlock.valueConnection_ =
                        inputIf && inputIf.connection.targetConnection;
                    clauseBlock.statementConnection_ =
                        inputDo && inputDo.connection.targetConnection;
                    i++;
                    break;
                case 'default':
                    var inputDo = this.getInput('Default_S');
                    clauseBlock.statementConnection_ =
                        inputDo && inputDo.connection.targetConnection;
                    break;
                default:
                    throw 'Unknown block type.';
            }
            clauseBlock = clauseBlock.nextConnection &&
                clauseBlock.nextConnection.targetBlock();
        }
    },
    /**
     * Modify this block to have the correct number of inputs.
     * @this Blockly.Block
     * @private
     */
    updateShape_: function () {
        // Delete everything.
        if (this.getInput('Default_S1')) {
            this.removeInput('Default_S1');
            this.removeInput('Default_S2');
        }
        var i = 1;
        while (this.getInput('condition_S' + i)) {
            this.removeInput('condition_S' + i);
            this.removeInput('semi_S' + i);
            this.removeInput('statement_S' + i);
            i++;
        }
        // Rebuild block.
        for (var i = 1; i <= this.elseifCount_; i++) {
            this.appendValueInput('condition_S' + i)
                .setCheck(null)
                .appendField("case");
            this.appendDummyInput("semi_S" + i)
                .appendField(":");
            this.appendStatementInput('statement_S' + i);
            this.setInputsInline(true);
        }
        if (this.elseCount_) {
            this.appendDummyInput('Default_S1')
                .appendField("default :");
            this.appendStatementInput('Default_S2');

        }
    }
};

Blockly.Blocks['case'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("case");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(":");
        this.appendStatementInput("NAME")
            .setCheck(null);
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(105);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['startcase'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("case");
        this.setNextStatement(true, null);
        this.setColour(105);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['addcase'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("case");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(105);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['default'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("default");
        this.setPreviousStatement(true, null);
        this.setColour(105);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['if'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("if (");
        this.appendValueInput("condition_if0")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") {");
        this.appendStatementInput("statement_if0")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(225);
        this.setTooltip("");
        this.setHelpUrl("");
        this.setMutator(new Blockly.Mutator(['else_if', 'else']));
    },
    /**
     * Create XML to represent the number of else-if and else inputs.
     * @return {Element} XML storage element.
     * @this Blockly.Block
     */
    mutationToDom: function () {
        if (!this.elseifCount_ && !this.elseCount_) {
            return null;
        }
        var container = document.createElement('mutation');
        if (this.elseifCount_) {
            container.setAttribute('else_if', this.elseifCount_);
        }
        if (this.elseCount_) {
            container.setAttribute('else', 1);
        }
        return container;
    },
    /**
     * Parse XML to restore the else-if and else inputs.
     * @param {!Element} xmlElement XML storage element.
     * @this Blockly.Block
     */
    domToMutation: function (xmlElement) {
        this.elseifCount_ = parseInt(xmlElement.getAttribute('else_if'), 10) || 0;
        this.elseCount_ = parseInt(xmlElement.getAttribute('else'), 10) || 0;
        this.updateShape_();
    },
    /**
     * Populate the mutator's dialog with this block's components.
     * @param {!Blockly.Workspace} workspace Mutator's workspace.
     * @return {!Blockly.Block} Root block in mutator.
     * @this Blockly.Block
     */
    decompose: function (workspace) {
        var containerBlock = workspace.newBlock('start_if');
        containerBlock.initSvg();
        var connection = containerBlock.nextConnection;
        for (var i = 1; i <= this.elseifCount_; i++) {
            var elseifBlock = workspace.newBlock('else_if');
            elseifBlock.initSvg();
            connection.connect(elseifBlock.previousConnection);
            connection = elseifBlock.nextConnection;
        }
        if (this.elseCount_) {
            var elseBlock = workspace.newBlock('else');
            elseBlock.initSvg();
            connection.connect(elseBlock.previousConnection);
        }
        return containerBlock;
    },
    /**
     * Reconfigure this block based on the mutator dialog's components.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    compose: function (containerBlock) {
        var clauseBlock = containerBlock.nextConnection.targetBlock();
        // Count number of inputs.
        this.elseifCount_ = 0;
        this.elseCount_ = 0;
        var valueConnections = [null];
        var statementConnections = [null];
        var elseStatementConnection = null;
        while (clauseBlock) {
            switch (clauseBlock.type) {
                case 'else_if':
                    this.elseifCount_++;
                    valueConnections.push(clauseBlock.valueConnection_);
                    statementConnections.push(clauseBlock.statementConnection_);
                    break;
                case 'else':
                    this.elseCount_++;
                    elseStatementConnection = clauseBlock.statementConnection_;
                    break;
                default:
                    throw 'Unknown block type.';
            }
            clauseBlock = clauseBlock.nextConnection &&
                clauseBlock.nextConnection.targetBlock();
        }
        this.updateShape_();
        // Reconnect any child blocks.

        for (var i = 1; i <= this.elseifCount_; i++) {
            Blockly.Mutator.reconnect(valueConnections[i], this, 'condition_if' + i);
            Blockly.Mutator.reconnect(statementConnections[i], this, 'statement_if' + i);
        }
        Blockly.Mutator.reconnect(elseStatementConnection, this, 'else_ifc');
    },
    /**
     * Store pointers to any connected child blocks.
     * @param {!Blockly.Block} containerBlock Root block in mutator.
     * @this Blockly.Block
     */
    saveConnections: function (containerBlock) {
        var clauseBlock = containerBlock.nextConnection.targetBlock();
        var i = 1;
        while (clauseBlock) {
            switch (clauseBlock.type) {
                case 'else_if':
                    var inputIf = this.getInput('condition_if' + i);
                    var inputDo = this.getInput('statement_if' + i);
                    clauseBlock.valueConnection_ =
                        inputIf && inputIf.connection.targetConnection;
                    clauseBlock.statementConnection_ =
                        inputDo && inputDo.connection.targetConnection;
                    i++;
                    break;
                case 'else':
                    var inputDo = this.getInput('else_ifc');
                    clauseBlock.statementConnection_ =
                        inputDo && inputDo.connection.targetConnection;
                    break;
                default:
                    throw 'Unknown block type.';
            }
            clauseBlock = clauseBlock.nextConnection &&
                clauseBlock.nextConnection.targetBlock();
        }
    },
    /**
     * Modify this block to have the correct number of inputs.
     * @this Blockly.Block
     * @private
     */
    updateShape_: function () {
        // Delete everything.
        if (this.getInput('else_ifc')) {
            this.removeInput('else_ifc');
            this.removeInput('}-inp');
            this.removeInput('{-inp');
        }
        var i = 1;
        while (this.getInput('statement_if' + i)) {
            //	alert("hoba");
            this.removeInput('condition_if' + i);
            this.removeInput(') {-inp' + i);
            this.removeInput('}-inp' + i);
            this.removeInput('statement_if' + i);
            this.removeInput("else if (-inp" + i);
            i++;
        }
        // Rebuild block.
        for (var i = 1; i <= this.elseifCount_; i++) {
            this.appendDummyInput("else if (-inp" + i)
                .appendField("else if (");
            this.appendValueInput("condition_if" + i)
                .setCheck(null);
            this.appendDummyInput(") {-inp" + i)
                .appendField(") {");
            this.appendStatementInput("statement_if" + i)
                .setCheck(null);
            this.appendDummyInput("}-inp" + i)
                .appendField("}");
        }
        if (this.elseCount_) {
            this.appendDummyInput("{-inp")
                .appendField("else {");
            this.appendStatementInput('else_ifc')
                .appendField("");
            this.appendDummyInput("}-inp")
                .appendField("}");
        }
        this.setInputsInline(true);
    }
};

Blockly.Blocks['start_if'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("if");
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['else_if'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("else if");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['else'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("else");
        this.setPreviousStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['next_scanner'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("key"), "variable")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["nextInt()", "nextInt()"], ["nextDouble()", "nextDouble()"], ["nextI()", "nextI()"], ["nextLine()", "nextLine()"]]), "choice")
            .appendField(";");
        this.setOutput(true, null);
        this.setColour(315);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['set_array'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["Long", "long"], ["String", "String"]]), "Type")
            .appendField("[ ]")
            .appendField(new Blockly.FieldTextInput("arr"), "Name")
            .appendField("=");
        this.appendValueInput("Number")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true);
        this.setNextStatement(true);
        this.setColour(45);
        this.setTooltip("Variable");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['break'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("break;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(345);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['continue'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("continue;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(105);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['convert'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["Integer.parseInt", "Integer.parseInt"], ["Double.parseDouble", "Double.parseDouble"], ["Long.parseLong", "Long.parseLong"]]), "NAME")
            .appendField("(")
            .appendField(new Blockly.FieldTextInput("str"), "variable")
            .appendField(")");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['switch_con'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("switch (")
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(") {");
        this.appendStatementInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(225);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['scanner'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Scanner ")
            .appendField(new Blockly.FieldTextInput("key"), "variable")
            .appendField("= new Scanner(System.in);");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_array2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["float", "float"], ["String", "String"]]), "NAME1")
            .appendField("[ ]")
            .appendField(new Blockly.FieldTextInput("arr"), "NAME")
            .appendField(" =  new")
            .appendField(new Blockly.FieldDropdown([["int", "int"], ["double", "double"], ["float", "float"], ["String", "String"]]), "NAME2")
            .appendField("[");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("] ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['array_operation'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("arr"), "arr")
            .appendField("[");
        this.appendValueInput("NAME1")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("]")
            .appendField(new Blockly.FieldDropdown([["=", "="], ["+=", "+="], ["-=", "-="], ["*=", "*="], ["/=", "/="]]), "NAME");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['length'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "NAME")
            .appendField(".length");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['equals'] = {
    init: function () {
        this.appendValueInput("NAME1")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(".equals (");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['decimal_format'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("DecimalFormat ")
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField("= new DecimalFormat (");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(");");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['format'] = {
    init: function () {
        this.appendValueInput("NAME1")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(".format (");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(")");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['random_define'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Random ")
            .appendField(new Blockly.FieldTextInput("R"), "var")
            .appendField("= new Random ( ) ;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['random_define2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Random")
            .appendField(new Blockly.FieldTextInput("R"), "var")
            .appendField("= new Random (");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true);
        this.setNextStatement(true);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_variable2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(new Blockly.FieldDropdown([["=", "="], ["+=", "+="], ["-=", "-="], ["*=", "*="], ["/=", "/="], ["%=", "%="]]), "Type");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(270);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['next'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["next()", "next()"], ["nextInt()", "nextInt()"], ["nextLine()", "nextLine()"], ["nextDouble()", "nextDouble()"], ["nextFloat()", "nextFloat()"], ["nextLong()", "nextLong()"], ["nextShort()", "nextShort()"], ["nextByte()", "nextByte()"]]), "NAME");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['not'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("!");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(359);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['test_condition'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Character .")
            .appendField(new Blockly.FieldDropdown([["isDigit", "isDigit"], ["isLetter", "isLetter"], ["isLetterOrDigit", "isLetterOrDigit"], ["isLowerCase", "isLowerCase"], ["isUpperCase", "isUpperCase"], ["isSpaceChar", "isSpaceChar"], ["isWhiteSpace", "isWhiteSpace"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setOutput(true);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['string_functions'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["charAt", "charAt"], ["toString", "toString"], ["toUpperCase", "toUpperCase"], ["toLowerCase", "toLowerCase"], ["compareTo", "compareTo"], ["concat", "concat"], ["contains", "contains"], ["endsWith", "endsWith"], ["indexOf", "indexOf"], ["isEmpty", "isEmpty"], ["lastIndexOf", "lastIndexOf"], ["matches", "matches"], ["replace", "replace"], ["replaceAll", "replaceAll"], ["replaceFirst", "replaceFirst"], ["split", "split"], ["startWith", "startWith"], ["subSequence", "subSequence"], ["subString", "subString"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(")");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['tokenizer_define'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("StringTokenizer")
            .appendField(new Blockly.FieldTextInput("str"), "var")
            .appendField("= new StringTokenizer (");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['tokenizer_functions'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("str"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["hasMoreTokens()", "hasMoreTokens()"], ["nextToken()", "nextToken()"], ["hasMoreElements()", "hasMoreElements()"], ["nextElement()", "nextElement()"], ["countTokens()", "countTokens()"]]), "NAME");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_define'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("ArrayList <")
            .appendField(new Blockly.FieldDropdown([["Integer", "Integer"], ["Double", "Double"], ["String", "String"], ["Float", "Float"], ["Long", "Long"], ["Short", "Short"], ["Boolean", "Boolean"]]), "NAME1")
            .appendField("> ")
            .appendField(new Blockly.FieldTextInput("var"), "NAME2")
            .appendField("= new ArrayList <")
            .appendField(new Blockly.FieldDropdown([["Integer", "Integer"], ["Double", "Double"], ["String", "String"], ["Float", "Float"], ["Long", "Long"], ["Short", "Short"], ["Boolean", "Boolean"]]), "NAME3")
            .appendField("> (");
        this.appendValueInput("NAME4")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_define2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("ArrayList <")
            .appendField(new Blockly.FieldDropdown([["Integer", "Integer"], ["Double", "Double"], ["String", "String"], ["Float", "Float"], ["Long", "Long"], ["Short", "Short"], ["Boolean", "Boolean"]]), "NAME1")
            .appendField("> ")
            .appendField(new Blockly.FieldTextInput("default"), "NAME2")
            .appendField("= new ArrayList <")
            .appendField(new Blockly.FieldDropdown([["Integer", "Integer"], ["Double", "Double"], ["String", "String"], ["Float", "Float"], ["Long", "Long"], ["Short", "Short"], ["Boolean", "Boolean"]]), "NAME3")
            .appendField("> ( ) ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(320);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_functions'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["add", "add"], ["clear", "clear"], ["remove", "remove"], ["get", "get"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_functions2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["get", "get"], ["indexOf", "indexOf"], ["lastIndexOf", "lastIndexOf"], ["toArray", "toArray"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(")");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_functions3'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".")
            .appendField(new Blockly.FieldDropdown([["size()", "size()"], ["isEmpty()", "isEmpty()"], ["lastIndexOf()", "lastIndexOf()"], ["toArray()", "toArray()"]]), "NAME1");
        this.setInputsInline(true);
        this.setOutput(true);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['arraylist_clear'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("var"), "var")
            .appendField(".clear ( ) ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true);
        this.setNextStatement(true);
        this.setColour(45);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['math_functions'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Math.")
            .appendField(new Blockly.FieldDropdown([["max", "max"], ["min", "min"], ["abs", "abs"], ["sqrt", "sqrt"], ["cbrt", "cbrt"], ["pow", "pow"], ["exp", "exp"], ["expm1", "expm1"], ["log", "log"], ["log10", "log10"], ["log1p", "log1p"], ["sin", "sin"], ["cos", "cos"], ["tan", "tan"], ["asin", "asin"], ["acos", "acos"], ["atan", "atan"], ["sinh", "sinh"], ["cosh", "cosh"], ["tanh", "tanh"], ["toRadians", "toRadians"], ["toDegrees", "toDegrees"], ["ulp", "ulp"], ["copySign", "copySign"], ["getExponent", "getExponent"]]), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(")");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(210);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['math_functions2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Math.")
            .appendField(new Blockly.FieldDropdown([["PI", "PI"], ["E", "E"]]), "NAME");
        this.setInputsInline(true);
        this.setOutput(true);
        this.setColour(210);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['try_catch'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("try {");
        this.appendStatementInput("NAME1")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("} catch (")
            .appendField(new Blockly.FieldDropdown([["Exception", "Exception"], ["ArithmaticException", "ArithmaticException"], ["ArrayIndexOutOfBound", "ArrayIndexOutOfBound"], ["NumberFormatException", "NumberFormatException"], ["NullPointerException", "NullPointerException"], ["IllegalArgumentException", "IllegalArgumentException"], ["IllegalStateException", "IllegalStateException"]]), "NAME2")
            .appendField(new Blockly.FieldTextInput("e"), "e");
        this.appendDummyInput()
            .appendField(") {");
        this.appendStatementInput("NAME3")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['try_catch_finally'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("try {");
        this.appendStatementInput("NAME1")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("} catch (")
            .appendField(new Blockly.FieldDropdown([["Exception", "Exception"], ["ArithmaticException", "ArithmaticException"], ["ArrayIndexOutOfBound", "ArrayIndexOutOfBound"], ["NumberFormatException", "NumberFormatException"], ["NullPointerException", "NullPointerException"], ["IllegalArgumentException", "IllegalArgumentException"], ["IllegalStateException", "IllegalStateException"]]), "NAME2")
            .appendField(new Blockly.FieldTextInput("e"), "e");
        this.appendDummyInput()
            .appendField(") {");
        this.appendStatementInput("NAME3")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("} finally {");
        this.appendStatementInput("NAME4")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['error_msg'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("e"), "e")
            .appendField(".getMessage()");
        this.setOutput(true, null);
        this.setColour(230);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['new_method'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("Public Static")
            .appendField(new Blockly.FieldDropdown([["void", "void"], ["int", "int"], ["String", "String"], ["boolean", "boolean"], ["double", "double"], ["float", "float"], ["long", "long"], ["short", "short"]]), "NAME1")
            .appendField(new Blockly.FieldTextInput("NAME"), "NAME2")
            .appendField(" (");
        this.appendValueInput("NAME3")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(")   {");
        this.appendStatementInput("NAME4")
            .setCheck(null);
        this.appendDummyInput()
            .appendField("}");
        this.setInputsInline(true);
        this.setPreviousStatement(true);
        this.setNextStatement(true);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['call_method'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("methodName"), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ;");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['call_method2'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("methodName"), "NAME1")
            .appendField("(");
        this.appendValueInput("NAME2")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(") ");
        this.setInputsInline(true);
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['return'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("return");
        this.appendValueInput("NAME")
            .setCheck(null);
        this.appendDummyInput()
            .appendField(";");
        this.setInputsInline(true);
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_math'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.lang.Math;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_random'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.util.Random;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_scanner'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.util.Scanner;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_stringtokenizer'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.util.StringTokenizer;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_decimalformat'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.text.DecimalFormat;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['define_arraylist'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("import java.util.ArrayList;");
        this.setPreviousStatement(true, null);
        this.setNextStatement(true, null);
        this.setColour(180);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['true'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("true");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['false'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("false");
        this.setOutput(true, null);
        this.setColour(359);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['string'] = {
    init: function () {
        this.appendDummyInput()
            .appendField("\"")
            .appendField(new Blockly.FieldTextInput("Hello"), "NAME")
            .appendField("\"");
        this.setOutput(true, null);
        this.setColour(120);
        this.setTooltip("");
        this.setHelpUrl("");
    }
};

Blockly.Blocks['num'] = {
    init: function () {
        this.appendDummyInput()
            .appendField(new Blockly.FieldTextInput("0"), "NAME");
        this.setOutput(true, null);
        this.setColour(210);
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
Blockly.Blocks['move_forwardjs'] = {
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
Blockly.Blocks['move'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Move")
        .appendField(new Blockly.FieldDropdown([["Up","Up"], ["Down","Down"], ["Right","Right"], ["Left","Left"]]), "Type");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['turn'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("turn")
        .appendField(new Blockly.FieldDropdown([["Left ↺","Left"], ["Right ↻","Right"]]), "Type");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['turnjs'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("turn")
        .appendField(new Blockly.FieldDropdown([["Left ↺","Left"], ["Right ↻","Right"]]), "Type");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['repeat'] = {
  init: function() {
    this.appendValueInput("Number")
        .setCheck("Number")
        .appendField("repeat");
    this.appendDummyInput()
        .appendField("times");
    this.appendStatementInput("statment")
        .setCheck(null)
        .appendField("do");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(105);
 this.setTooltip("Variable");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['repeatjs'] = {
  init: function() {
    this.appendValueInput("Number")
        .setCheck("Number")
        .appendField("repeat");
    this.appendDummyInput()
        .appendField("times");
    this.appendStatementInput("statment")
        .setCheck(null)
        .appendField("do");
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(105);
 this.setTooltip("Variable");
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
        .appendField(new Blockly.FieldImage(baseUrl+"/games/img/Diamond.png", 20, 20, "*"));
    this.appendStatementInput("NAME")
        .setCheck(null)
        .appendField("do");
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};
Blockly.Blocks['repeat_untilcar'] = {    
  init: function() {
    this.appendDummyInput()
        .appendField("Repeat until")
        .appendField(new Blockly.FieldImage(baseUrl+"/games/img/download (1).png", 20, 20, "1"));
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
