<?php
$targetFolder = '/home/tlcomge/tl/storage/app/public';
$linkFolder = '/home/tlcomge/public_html/storage';

symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';
