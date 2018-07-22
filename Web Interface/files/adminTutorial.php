<script type="text/javascript" src="<?php echo JS_URL; ?>/tinymce/tinymce.min.js"></script>


<?php
if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') {
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        $query = "select * from Tutorial where code = '$_GET[code]'";
        $res = DB::findOneFromQuery($query);
        ?>
<!-------------------------------update tutorial ---------------------------------------------------------------------------->
        <div class="text-center page-header"><h1>Tutorial Settings - <?php echo "$_GET[code]"; ?></h1></div>
        <form class='form-horizontal' role='form'onsubmit="return CheckRequired()" method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
            <input type='hidden' name='Tid' value='<?php echo $res['Tid']; ?>' />
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='name'>Names</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='name' id='name' value='<?php echo $res['name']; ?>' required/>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='image'>Image File</label>
                    <div class='col-lg-8'>
                        <input type='file' name='image' id='image'/>
                    </div>
                </div>
            </div>
            <div class='col-md-12'>
                <div class='form-group'>
                    <label class='control-label col-lg-2'for='statement'>Tutorial Content</label>
                     <div class='col-lg-9'>
                    <textarea class='form-control' name='statement' id="statement" style='height:500px;'><pre><?php echo $res['statement'];?></pre></textarea>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4'></label>
                    <div class='col-lg-8'>
                        <input type='submit' class='btn btn-default btn-block' value='Save' name='updateTutorial' />
                    </div>
                </div>
            </div>
        </form>
        <br/>

        <script>
            tinymce.init({
                selector:'textarea',
                plugins: "link media",
                forced_root_block : false,
                nowrap : false,
            });
            
                function CheckRequired(event){
                    if(tinymce.get("statement").getContent()==""){
                        alert("Please, Add Tutorial Content In Text Area");
                        return false;    
                    }
                    return true;
                }
        </script>
        <?php
    } else {
        $langopt = implode(',',array_keys($valtoname));
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
            $('.statusdeleteTutorial').click(function(event) {
                    Tid = event.target.id;
                    Tid = Tid.replace('probd_', '');
                    $(this).html('Processing...');
                    $.post("<?php echo SITE_URL; ?>/process.php", {
                        "statusdeleteTutorial": "",
                        "Tid": Tid,
                    }, function(result) {
                        reload();
                    });
                });   
             $("#code1").blur(function(){
            var x= document.getElementById("code1").value;
               $.ajax({
                     data:{checkcodeTuto:x},
                     type: "POST",
                     url: "<?php echo SITE_URL; ?>/process.php",
                     success: function (result){
                         if(result=="found"){
                             alert("This Code is used before");
                             document.getElementById("code1").value="";
                         }
                     }
                 });
                 });
            });   
            function update() {
                str = '';
                for (i = 0; i < this.options.length; i++)
                    if (this.options[i].selected)
                        str += ((str != '') ? ',' : '') + this.options[i].value;
            }
                    
           tinymce.init({
                                selector:'textarea',
                                plugins: "link media",
                                forced_root_block : false,
                                 required: true,
                            });
                function CheckRequired(event){
                    if(tinymce.get("statement").getContent()==""){
                        alert("Please, Add Tutorial Content In Text Area");
                        return false;    
                    }
                    return true;
                }
                  function reload() {
                location.reload(true / false);
            } 
            
        </script>

<!-----------------------------------------------------------------add tutorial ------------------------------------------------>
        <div class="text-center page-header"><h1>Tutorial Settings</h1></div>
        <div id='probadd' style='display:none;'>
            <form class='form-horizontal' role='form' onsubmit="return CheckRequired()" method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='name'>Name</label>
                        <div class='col-lg-8'>
                            <input class="form-control" type='text' name='name' id='name' required/>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='code'>Code</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='code' id='code1'  required/>
                    </div>
                </div>
            </div>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <label class="control-label col-lg-2" for='image'>Image File</label>
                        <div class='col-lg-9'>
                            <input style='width:100%; padding: 6px 12px;' type='file' name='image' id='image'/>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                <div class='form-group'>
                    <label class='control-label col-lg-2'for='statement'>Tutorial Content</label>
                     <div class='col-lg-9'>
                    <textarea class='form-control' name='statement' id='statement' rows="10" cols="20" style='overflow:hidden;height:500px;'></textarea>
                    </div>
                </div>
            </div>
                    <div class='col-md-12'>
                    <div class='form-group'>
                        <input type='submit' class='btn btn-default btn-block' value='Add Tutorial' name='addtutorial' />
                    </div>
                </div>
            </form>
            <div>
                     
                            <p>Fill the textarea with the content of the tutorial,you can style the text using the editor,photos can be added in the editor by <strong>drag and drop </strong>it into the editor in the prefered place or upload the img and inserting the (custom) "&lt;image /&gt;" tag somewhere in your code. It will be replaced by the (proper) &lt;img&gt; tag with the src attribute set appropriately. </p>
                </div>
            <br/>
            
            <div class="text-center"><a class='btn btn-default' onclick="$('#probadd').slideUp();
                            $('#list').slideDown();">Display List of Tutorial</a></div><br/>
        </div>
<!------------------------------------------------------------------------------------------------------------------------------>

        <?php
        $query = "select Tid, name, code from Tutorial order by Tid desc";
        $res = DB::findAllFromQuery($query);
        echo "<div id='list'><h3>List of Tutorial</h3><table class='table table-hover'><thead><tr><th>ID</th><th>Name</th><th>Code</th><th></th><th>Options</th></tr></thead>";
        foreach ($res as $row) {            
            echo "<tr><td>$row[Tid]</td><td>$row[name]</td><td>$row[code]</td> <td></td>
            <td><a href='#' class='btn btn-danger statusdeleteTutorial' id='probd_$row[Tid]'>Delete</a></td>
          <td> <a class='btn btn-primary' href='" . SITE_URL . "/adminTutorial/$row[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a></td></tr>";
        }
        echo "</table><div class='text-center'><a class='btn btn-default' onclick=\"$('#probadd').slideDown(); $('#list').slideUp();\">Add New Tutorial</a></div></div><br/>";
    }
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL);
}
?>
