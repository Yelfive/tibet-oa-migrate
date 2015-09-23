<?php

Header('Content-Type:text/html;charset=utf-8');
include __DIR__ . '/../components/functions.php';
echo response('请求操作未找到', 404);
