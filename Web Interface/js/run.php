<?php 
	$JAVA_HOME = "C:\Program Files\Java\jdk1.8.0_111";
	$PATH = "$JAVA_HOME\bin;".getenv('PATH');
	putenv("JAVA_HOME=$JAVA_HOME");
	putenv("PATH=$PATH");
	
	$my_file='sample.java';
	$handle=fopen($my_file,'w') or die('Cannot open file: '.$my_file);
	$data= $_POST['code'];
	fwrite($handle,$data);
	
	shell_exec("javac run.java 2>&1");
	$OUTPUT = shell_exec("java run 2>&1");
	echo $OUTPUT;
?>