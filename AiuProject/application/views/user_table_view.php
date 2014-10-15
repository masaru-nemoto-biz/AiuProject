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
    </style>
</head>
    <body>
        <div class="container" style="font-size: 12px;">
        <?= form_open('login/index') ?>
        <div class="text-right">
            <input class="btn btn-primary" type="submit" name="move" value="logout"/>
        </div>
        <?=form_close();?>
        <?=form_open('user_table/userInfo_conform')?>
        <div class="page-header text-center">
            <p class="h2">ユーザー一覧<span class="small">ユーザー情報の閲覧・登録が可能</span></p>
        </div>
        <div class="table-responsive">
        <table id="table_id" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th>選択</th>
                <th>ユーザーID</th>
                <th>パスワード</th>
                <th>ユーザー名</th>
                <th>ユーザー名(カナ)</th>
                <th>権限</th>
                <th>登録日時</th>
                <th>更新日時</th>
                <th>登録ユーザーID</th>
                <th>更新ユーザーID</th>
            </tr>
            </thead>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td><input type="radio" name="check_radio" value="<?= $row->user_num ?>" /></td>
                    <td><?= $row->user_id ?></td>
                    <td><?= $row->password ?></td>
                    <td><?= $row->user_name ?></td>
                    <td><?= $row->user_name_kana ?></td>
                    <td><?= $row->authority ?></td>
                    <td><?= $row->registration_time_and_date ?></td>
                    <td><?= $row->renovate_time_and_date ?></td>
                    <td><?= $row->registration_user_id ?></td>
                    <td><?= $row->renovate_user_id ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </br>
        <input type="submit" value="ユーザー情報変更画面へ"/>
        <?=form_close();?>
        <?=form_open('user_table/userInfo_add')?>
        <input type="submit" value="ユーザー情報登録画面へ"/>
        <?=form_close();?>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>