<?php
    shell_exec('cd ../');
	shell_exec('git fetch');
	shell_exec('git reset --hard origin/master');
	shell_exec('find public_html/ -type d -exec chmod 0755 {} \;');
	shell_exec('find public_html/ -type f -exec chmod 0644 {} \;');
	// && find . -type f -exec chmod 0644 {} && find . -type d -exec chmod 0755 {}
?>