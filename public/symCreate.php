<?php
$targetFolder = '/home/tllaw.site7.ge/tl/storage/app/public';
$linkFolder = '/home/tllaw.site7.ge/public_html/public/storage';

symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
