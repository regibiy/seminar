<?php
	set_time_limit(1800);
	
	if($_GET['page'] == 'userguide'){
		shell_exec('userguide.chm');
	}
?>