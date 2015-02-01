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
        
        <div style="float:right">
            <?= form_open('login/index') ?>
            <input class="btn btn-primary" type="submit" name="move" value="logout"/>
            <?=form_close();?>
        </div>
        <div style="float:right; margin-right:10px">
            <?= form_open('main/index') ?>
            <input class="btn btn-primary" type="submit" name="move" value="main menuへ"/>
            <?=form_close();?>
        </div>
        <?=form_open('contractinfolist/contractInfoList_conform')?>
        <div class="page-header text-center">
            <p class="h2">契約情報一覧画面<span class="small">契約情報の閲覧・登録が可能</span></p>
        </div>
        <?php foreach ($list1 as $row): ?>
        <div class="row">
            <div class="col-md-4">
              <table class="table table-condensed">
                <tr><td style="width:70px">契約者名</td><td><?= $row->corp_name ?></td></tr>
                <tr><td>所在地</td><td><?= $row->address ?></td></tr>
                <tr><td>連絡先</td><td><?= $row->phone ?></td></tr>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table table-condensed">
                <tr><td>業種</td><td><?= $row->biz_first ?></td></tr>
                <tr><td>決算月</td><td><?= $row->settling_month. "　月" ?></td></tr>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table table-condensed">
                <tr><td width="70">契約担当者</td><td width="200"><?= $row->contract_name. "　様" ?></td></tr>
                <tr><td>連絡先</td><td width="200"><?= $row->mobile_phone ?></td></tr>
              </table>
            </div>
        </div>
        <?php endforeach; ?>
        <a href="#" class="thumbnail">
          <img src="<?=base_url();?>uploads/nesakiスキルシート.pdf" alt="..."/>
        </a>
        <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" style="width: 300px; margin-top: 25px">
            <a class="close" data-dismiss="alert">×</a>
        <?= $message ?>
        </div>
        <?php endif; ?>
        <div style="margin-top: 30px">
            <input class="btn btn-primary" type="submit" name="move" value="契約者情報一覧画面へ"/>
            <!-- 切り替えボタンの設定 -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">契約情報削除</a>
        </div>
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
        $("#table_id").dataTable( {
                    "aoColumnDefs": [{ "bVisible": false, "aTargets": [ 3,4,7,11 ] }],
                    "sScrollY": "400px",
                    "bStateSave": true,
                    "iDisplayLength": 25
                } );

    </script>

    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>