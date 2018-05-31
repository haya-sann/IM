<?php
//todo ## Set the valid path to the file 'INTER-Mediator.php'
require_once('im_build/INTER-Mediator/INTER-Mediator.php');

IM_Entry(array (
  0 => 
  array (
    'name' => 'atmos_list',
    'table' => 'atmos_test',
    'records' => 5,
    'maxrecords' => 100,
    'key' => 'id',
    'sort' => 
    array (
      0 => 
      array (
        'field' => 'date',
        'direction' => 'desc',
      ),
    ),
    'calculation' => 
    array (
      0 => 
      array (
        'field' => 'color_lux',
        'expression' => 'if (lux > 5000, \'red\', if(lux >500, \'blue\', (if (lux >250, \'black\', \'silver\'))))',
      ),
      1 => 
      array (
        'field' => 'color_temp',
        'expression' => 'if (temp >30, \'red\', if ( temp >10, \'green\', \'blue\'))',
      ),
      2 => 
      array (
        'field' => 'photourl',
        'expression' => '\'defSandBox.php?media=\'+memo',
      ),
    ),
    'paging' => true,
    0 => 
    array (
    ),
    'view' => 'atmos_test',
    'navi-control' => 'master-hide',
  ),
  1 => 
  array (
    'name' => 'atmos_detail',
    'table' => 'atmos_test',
    'view' => 'atmos_test',
    'key' => 'id',
    'records' => 1,
    'maxrecords' => 1,
    'navi-control' => 'detail-top',
  ),
),
array (
  'formatter' => 
  array (
    0 => 
    array (
      'field' => 'atmos_test@date',
      'converter-class' => 'MySQLDateTime',
      'parameter' => '%Y-%m-%d %H:%M',
    ),
    1 => 
    array (
      'field' => 'atmos_test@temp',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    2 => 
    array (
      'field' => 'atmos_test@pressure',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    3 => 
    array (
      'field' => 'atmos_test@humid',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    4 => 
    array (
      'field' => 'atmos_test@cpu_temp',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    5 => 
    array (
      'field' => 'atmos_test@lux',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    6 => 
    array (
      'field' => 'atmos_test@v0',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    7 => 
    array (
      'field' => 'atmos_test@v1',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    8 => 
    array (
      'field' => 'atmos_test@outer_temp',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    9 => 
    array (
      'field' => 'atmos_test@outer_pressure',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    10 => 
    array (
      'field' => 'atmos_test@outer_humid',
      'converter-class' => 'Number',
      'parameter' => '2',
    ),
    // 11 => //データコンバータークラスで改行を,br />に置き換えようと試みたが、失敗
    // array (
    //   'field' => 'atmos_test@log',
    //   'converter-class' => 'HTMLString',
    //   'parameter' => '',
    // ),
  ),
  'media-root-dir' => '/home/mochimugi/www/seasonShots/daily_timelapseSandbox',
),
array (
  'db-class' => 'PDO',
  'dsn' => 'mysql:host=mysql714.db.sakura.ne.jp;dbname=mochimugi_field;charset=utf8mb4',
  'user' => 'mochimugi',
  'password' => 'hayaTanaka3',
),
0);
