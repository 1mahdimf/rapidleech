<?php
if (!defined('RAPIDLEECH')) {
	require_once('index.html');
	exit;
}
date_default_timezone_set("Asia/Tehran"); 
$options = array (
  'secretkey' => 'MDMwOTI3ODZlYjA4YTFlODZkMWNlZDUyNzNjZTdlNDUzNDJmYzlkMw==',
  'download_dir' => 'files/',
  'download_dir_is_changeable' => false,
  'delete_delay' => 0,
  'rename_prefix' => '',
  'rename_suffix' => '',
  'rename_underscore' => true,
  'bw_save' => true,
  'file_size_limit' => 0,
  'auto_download_disable' => false,
  'auto_upload_disable' => false,
  'notes_disable' => false,
  'upload_html_disable' => false,
  'myuploads_disable' => false,
  'login' => true,
  'users' => 
  array (
    'test' => 'testt',
  ),
  'template_used' => 'plugmod',
  'default_language' => 'fa',
  'show_all' => true,
  'server_info' => true,
  'ajax_refresh' => true,
  'new_window' => true,
  'new_window_js' => true,
  'flist_sort' => true,
  'flist_h_fixed' => true,
  'disable_actions' => false,
  'disable_deleting' => false,
  'disable_delete' => false,
  'disable_rename' => false,
  'disable_mass_rename' => false,
  'disable_mass_email' => false,
  'disable_email' => false,
  'disable_ftp' => false,
  'disable_upload' => false,
  'disable_merge' => false,
  'disable_split' => false,
  'disable_archive_compression' => false,
  'disable_tar' => false,
  'disable_zip' => false,
  'disable_unzip' => false,
  'disable_rar' => false,
  'disable_unrar' => false,
  'disable_hashing' => false,
  'disable_md5_change' => false,
  'disable_list' => false,
  'use_curl' => true,
  'redir' => true,
  'no_cache' => true,
  'ref_check' => true,
  '2gb_fix' => true,
  'forbidden_filetypes' => 
  array (
    0 => '.htaccess',
    1 => '.htpasswd',
    2 => '.php',
    3 => '.php3',
    4 => '.php4',
    5 => '.php5',
    6 => '.phtml',
    7 => '.asp',
    8 => '.aspx',
    9 => '.cgi',
  ),
  'forbidden_filetypes_block' => false,
  'rename_these_filetypes_to' => '.xxx',
  'check_these_before_unzipping' => true,
  'fgc' => 0,
); 
require_once('site_checker.php');
require_once('accounts.php');
$secretkey =& $options['secretkey'];
?>
