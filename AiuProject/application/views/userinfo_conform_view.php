<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    
    <!-- dataTables ------------------------------------------------------------------------------------------------------------------------------>
      <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
      <!-- jQuery -->
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
      <!-- DataTables -->
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <!-------------------------------------------------------------------------------------------------------------------------------------------->

    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>AIU</title>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .center_auto {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
    <body>
        <div class="container form-group" style="font-size: 12px;">
        <?php if (is_null($user_data)) : ?>
        <div class="page-header text-center">
            <p class="h2">ユーザー情報登録画面</p>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="table-responsive">
            <table border="0" class="table">
            <?= form_open('user_table/conform_add') ?>
                <tr><th width="120">ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_id" value="" /></td></tr>
                <tr><th>パスワード</th><td colspan="6"><input class="form-control input-sm" type="password" name="password" value="" /></td></tr>
                <tr><th>ユーザー名</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_name" value="" /></td></tr>
                <tr><th>ユーザー名(カナ)</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_name_kana" value="" /></td></tr>
                <tr><th>権限</th><td colspan="6"><input class="form-control input-sm" type="text" name="authority" value="" /></td></tr>
                <tr><th>登録ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="registration_user_id" value="" /></td></tr>
                <tr><th>更新ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="renovate_user_id" value="" /></td></tr>
            </table>
            </div>
            </div>
                <div class="center_auto" style="margin-top: 10px; width: 150px;">
                   <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
                </div>
            </div>
            <?= form_close(); ?>
        <?php else: ?>
        <div class="page-header text-center">
            <p class="h2">ユーザー情報変更画面</p>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="table-responsive">
            <table border="0" class="table">
            <?= form_open('user_table/conform') ?>
                <?php foreach ($user_data as $row): ?>
                    <tr><th width="120">ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_id" value="<?= $row->user_id ?>" /></td></tr>
                    <tr><th>パスワード</th><td colspan="6"><input class="form-control input-sm" type="password" name="password" value="<?= $row->password ?>" /></td></tr>
                    <tr><th>ユーザー名</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_name" value="<?= $row->user_name ?>" /></td></tr>
                    <tr><th>ユーザー名(カナ)</th><td colspan="6"><input class="form-control input-sm" type="text" name="user_name_kana" value="<?= $row->user_name_kana ?>" /></td></tr>
                    <tr><th>権限</th><td colspan="6"><input class="form-control input-sm" type="text" name="authority" value="<?= $row->authority ?>" /></td></tr>
                    <tr><th>登録ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="registration_user_id" value="<?= $row->registration_user_id ?>" /></td></tr>
                    <tr><th>更新ユーザーID</th><td colspan="6"><input class="form-control input-sm" type="text" name="renovate_user_id" value="<?= $row->renovate_user_id ?>" /></td></tr>
                </table>
            </div>
            </div>
                <div class="center_auto" style="margin-top: 10px; width: 150px;">
                   <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
                </div>
            </div>
                <?php endforeach; ?>
            <?= form_close(); ?>
        <?php endif; ?>
    </body>
</html>