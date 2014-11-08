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
        <?=form_open('corpinfolist/contractInfo_conform')?>
        <div class="page-header text-center">
            <p class="h2">契約者情報一覧画面 <span class="small">契約者情報の閲覧・登録が可能</span></p>
        </div>
        <div class="table-responsive">
        <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th class="table-style">選択</th>
                <th class="table-style">契約元</th>
                <th class="table-style">火災保険</th>
                <th class="table-style">傷害保険</th>
                <th class="table-style">賠償保険</th>
                <th class="table-style">生命保険</th>
                <th class="table-style">その他</th>
                <th class="table-style">事故状況</th>
                <th class="table-style">担当者</th>
            </tr>
            </thead>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td class="table-style"><input type="radio" name="check_radio" value="<?= $row->company_id ?>" /></td>
                    <td class="table-style">
                        <?php if (3 == $row->contracter_type) : ?>
                          <?= $row->representative_name ?>
                        <?php else: ?>
                          <?= $row->corp_name ?>
                        <?php endif; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($fire as $row_fire): ?>
                        <?php if ($row_fire->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($accident as $row_acc): ?>
                        <?php if ($row_acc->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($liability as $row_liability): ?>
                        <?php if ($row_liability->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($large as $row_large): ?>
                        <?php if ($row_large->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($other as $row_other): ?>
                        <?php if ($row_other->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style">
                        <?php foreach ($count_acc as $row_acc): ?>
                        <?php if ($row_acc->company_id == $row->company_id) : ?><span class="label label-danger">事故あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table-style"><?= $row->upd_user ?></td>
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
            <input class="btn btn-primary" type="submit" name="move" value="契約者情報登録画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約者情報変更画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約者情報照会画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="顧客カード"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約状況一覧画面へ"/>
            <!-- 切り替えボタンの設定 -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">契約者情報削除</a>
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