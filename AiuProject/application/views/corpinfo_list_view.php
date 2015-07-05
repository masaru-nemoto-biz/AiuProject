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
<!-- 初期状態は非表示 -->
<style type="text/css">body { visibility: hidden; }</style>
<noscript>
<!-- スクリプトが無効な場合は以下の指定がカスケードされる -->
<style type="text/css">body { visibility: visible; }</style>
</noscript>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .table-style {
            white-space: nowrap;
        }
        .td-width {
            width :80px;
        }
        .td-name-width {
            width :130px;
        }
        .td-radio-width {
            width :40px;
        }
    </style>
<script type="text/javascript">
jQuery(function($) {
    //
    // DOM の再描画が発生する処理
    //
 
    // スクリプトから表示状態を指定する
    $("body").css({ visibility: "visible" });
});
</script>
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
        <?=form_open('corpinfolist/contractInfo_conform')?>
        <div class="page-header text-center">
            <p class="h2">契約者情報一覧画面 <span class="small">契約者情報の閲覧・登録が可能</span></p>
        </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
        <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed" style="table-layout: fixed">
            <thead>
              <tr>
                <th class="table-style small td-radio-width">選択</th>
                <th class="table-style small td-name-width">契約元</th>
                <th class="table-style small td-name-width">会社名</th>
                <th class="table-style small td-width">代表者名</th>
                <th class="table-style small td-width">代表者連絡先</th>
                <th class="table-style small td-width">証券番号</th>
                <th class="table-style small td-width">事故番号</th>
                <th class="table-style small td-width">火災保険</th>
                <th class="table-style small td-width">自動車</th>
                <th class="table-style small td-width">傷害保険</th>
                <th class="table-style small td-width">賠償保険</th>
                <th class="table-style small td-width">生命保険</th>
                <th class="table-style small td-width">パッケージ</th>
                <th class="table-style small td-width">メディカル</th>
                <th class="table-style small td-width">自賠責</th>
                <th class="table-style small td-width">その他</th>
                <th class="table-style small td-width">事故状況</th>
                <th class="table-style small td-width">担当者</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td class="small td-radio-width">
                        <?php if ($row->company_id == $corp_select_id) : ?>
                            <input type="radio" name="check_radio" value="<?= $row->company_id ?>" checked="checked" />
                        <?php else: ?>
                            <input type="radio" name="check_radio" value="<?= $row->company_id ?>" />
                        <?php endif; ?>
                    </td>
                    <td class="small td-name-width">
                        <?php if (3 == $row->contracter_type) : ?>
                          <?= $row->representative_name ?>
                        <?php else: ?>
                          <?= $row->corp_name ?>
                        <?php endif; ?>
                    </td>
                    <td class="small td-name-width"><?= $row->corp_name ?></td>
                    <td class="small td-width"><?= $row->representative_name ?></td>
                    <td class="small td-width"><?= $row->rep_mobile_phone ?></td>
                    <td class="small td-width">
                        <?php foreach ($list2 as $row_list2): ?>
                        <?php if ($row_list2->company_id == $row->company_id) : ?><?= $row_list2->policy_number ?><?= '-'.$row_list2->policy_branch_number ?><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($acc_list as $row_acc_list): ?>
                        <?php if ($row_acc_list->company_id == $row->company_id) : ?><?= $row_acc_list->acc_id ?><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($fire as $row_fire): ?>
                        <?php if ($row_fire->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($auto as $row_auto): ?>
                        <?php if ($row_auto->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($accident as $row_acc): ?>
                        <?php if ($row_acc->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($liability as $row_liability): ?>
                        <?php if ($row_liability->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($large as $row_large): ?>
                        <?php if ($row_large->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($mandatory as $row_mandatory): ?>
                        <?php if ($row_mandatory->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($package as $row_package): ?>
                        <?php if ($row_package->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($medical as $row_medical): ?>
                        <?php if ($row_medical->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($other as $row_other): ?>
                        <?php if ($row_other->company_id == $row->company_id) : ?><span class="label label-danger">3ヶ月前あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($count_acc as $row_acc): ?>
                        <?php if ($row_acc->company_id == $row->company_id) : ?><span class="label label-danger">事故あり</span><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width"><?= $row->upd_user ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
        <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" style="width: 300px; margin-top: 25px">
            <a class="close" data-dismiss="alert">×</a>
        <?= $message ?>
        </div>
        <?php endif; ?>
        <div style="margin-top: 25px">
            <input class="btn btn-primary" type="submit" name="move" value="新規登録"/>
            <input class="btn btn-primary" type="submit" name="move" value="情報変更/追加"/>
            <!-- 切り替えボタンの設定 -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">情報削除</a>
            <input class="btn btn-primary" type="submit" name="move" value="情報照会"/>
            <input class="btn btn-warning" type="submit" name="move" value="契約状況一覧"/>
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
        $("#table_id1").dataTable( {
                    "aoColumnDefs": [{ "bVisible": false, "aTargets": [ 1,3,4,5,6 ] }],
                    "bScrollInfinite":false,
                    "bStateSave": true,
                    "sScrollY": 400,
                    "iDisplayLength": 25
                } );

    </script>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>