<?php

require("./core/ThinkPHP.php");
$member=M("member")->order("id desc")->limit(0,10)->select();

print_r ($member);


