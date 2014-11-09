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
        .table-style {
            white-space: nowrap;
        }
    </style>
</head>
    <body>
        <div class="container" style="font-size: 12px;">
        <?= form_open('login/index') ?>
        <div style="text-align: right; ">
            <input class="btn btn-primary" type="submit" name="move" value="logout"/>
        </div>
        <?=form_close();?>
        <?=form_open('user_table/user_Info_conform')?>
        <div class="page-header text-center">
            <p class="h2">ユーザー一覧<span class="small">ユーザー情報の閲覧・登録が可能</span></p>
        </div>
        <div class="table-responsive">
        <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th class="table-style">選択</th>
                <th class="table-style">ユーザーID</th>
                <th class="table-style">パスワード</th>
                <th class="table-style">ユーザー名</th>
                <th class="table-style">ユーザー名(カナ)</th>
                <th class="table-style">権限</th>
                <th class="table-style">登録日時</th>
                <th class="table-style">更新日時</th>
                <th class="table-style">登録ユーザーID</th>
                <th class="table-style">更新ユーザーID</th>
            </tr>
            </thead>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td class="table-style"><input type="radio" name="check_radio" value="<?= $row->user_num ?>" /></td>
                    <td class="table-style"><?= $row->user_id ?></td>
                    <td class="table-style"><?= $row->password ?></td>
                    <td class="table-style"><?= $row->user_name ?></td>
                    <td class="table-style"><?= $row->user_name_kana ?></td>
                    <td class="table-style"><?= $row->authority ?></td>
                    <td class="table-style"><?= $row->registration_time_and_date ?></td>
                    <td class="table-style"><?= $row->renovate_time_and_date ?></td>
                    <td class="table-style"><?= $row->registration_user_id ?></td>
                    <td class="table-style"><?= $row->renovate_user_id ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" style="width: 300px; margin-top: 25px">
            <a class="close" data-dismiss="alert">×</a>
        <?= $message ?>
        </div>
        <?php endif; ?>
        <div style="margin-top: 25px">
            <input class="btn btn-primary" type="submit" name="move" value="ユーザー情報登録画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="ユーザー情報変更画面へ"/>
            <!-- 切り替えボタンの設定 -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">ユーザー情報削除</a>
        </div>
        <!-- モーダルの設定 -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">閉じる</span></button>
                <h5 class="modal-title" id="myModalLabel">削除確認</h5>
              </div>
              <div class="modal-body">
                <p>削除してもよろしいですか?</p>
              </div>
              <div class="modal-footer">
                <input class="btn btn-primary" type="submit" name="move" value="削除"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?=form_close();?>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script>
        $("#table_id1").dataTable( {
                    "aoColumnDefs": [
                        { "bVisible": false, "aTargets": [  ] }
                    ] } );
    </script>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>