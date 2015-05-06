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
            
        }
        .td-width {
            width :40px;
        }
        .td-width1 {
            width :60px;
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
                    <tr><td>業種</td><td><?= $row->biz_first ?></td></tr>
                    <tr><td>決算月</td><td><?= $row->settling_month. "　月" ?></td></tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:70px">契約担当者</td><td width="200"><?= $row->contract_name. "　様" ?></td></tr>
                    <tr><td>連絡先</td><td width="200"><?= $row->mobile_phone ?></td></tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td>月額保険料合計</td>
                        <td style="text-align:right">
                        <?php foreach ($month_p_sum as $row): ?>
                            <?= number_format($row->month_p). "　円" ?>
                        <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr><td>一時払い合計</td>
                        <td style="text-align:right">
                        <?php foreach ($yearly_p_sum as $row): ?>
                            <?= number_format($row->yearly_payment). "　円" ?>
                        <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr><td>年間保険料合計</td>
                        <td style="text-align:right">
                        <?php foreach ($anp_sum as $row): ?>
                            <?= number_format($row->anp). "　円" ?>
                        <?php endforeach; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
        <table id="table_id" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <th class="table-style td-width small">選択</th>
                <th class="table-style td-width small">保険種別</th>
                <th class="table-style td-width small">保険会社</th>
                <th class="table-style td-width1 small">商品名</th>
                <th class="table-style td-width small">区分</th>
                <th class="table-style td-width1 small">証券番号</th>
                <th class="table-style td-width1 small">保険期間</th>
                <th class="table-style td-width small">契約期間</th>
                <th class="table-style td-width small">月額保険料</th>
                <th class="table-style td-width small">一時払い</th>
                <th class="table-style td-width small">年間保険料</th>
                <th class="table-style td-width small">ステータス</th>
                <th class="table-style td-width small">満期お知らせ</th>
                <th class="table-style td-width small">事故受け番号</th>
                <th class="table-style td-width small">事故</th>
                <th class="table-style td-width small">担当者</th>
            </thead>
            <?php foreach ($list2 as $row): ?>
                <tr>
                    <td class="small td-width">
                        <?php if ($row->contract_id == $contract_select_id) : ?>
                            <input type="radio" name="check_radio" value="<?= $row->contract_id ?>" checked="checked" />
                        <?php else: ?>
                            <input type="radio" name="check_radio" value="<?= $row->contract_id ?>" />
                        <?php endif; ?>
                    </td>
                    <td class="small td-width"><?= $row->insur_class_name ?></td>
                    <td class="small td-width"><?= $row->insur_corp_name ?></td>
                    <td class="small td-width1"><?= $row->brand_name ?></td>
                    <td class="small td-width"><?= $row->corp_div_name ?></td>
                    <td class="small td-width1"><?= $row->policy_number ?><?= '-'.$row->policy_branch_number ?></td>
                    <td class="small td-width1"><?= $row->insurance_period_start ?></br>～<?= $row->insurance_period_end ?></td>
                    <td class="small td-width"><?= $row->contract_period_y ?>年<?= $row->contract_period_m ?>ヶ月<?= $row->contract_period_d ?>日</td>
                    <td class="small td-width"><?= number_format($row->month_p). "　円" ?></td>
                    <td class="small td-width"><?= number_format($row->yearly_payment). "　円" ?></td>
                    <td class="small td-width"><?= number_format($row->anp). "　円" ?></td>
                    <td class="small td-width"><?php foreach ($contract_status_mst as $row_mst): ?><?php if ($row_mst->contract_status_id == $row->contract_status) :?><?= $row_mst->contract_status_name ?><?php endif; ?><?php endforeach; ?></td>
                    <td class="small td-width">
                        <?php if ($row->insurance_period_end < $month_3ago) : ?>
                          <!--<input class="btn btn-xs btn-danger" type="submit" name="move" value="3か月前"/>-->
                          <?php if (2 == $row->contract_status) :?>
                            <span class="label label-success">3ヶ月前</span>
                          <?php elseif (3 == $row->contract_status) : ?>
                            <span class="label label-success">更改済み</span>
                          <?php elseif (4 == $row->contract_status) : ?>
                            <span class="label label-default">満期終了</span>
                          <?php elseif (5 == $row->contract_status) : ?>
                            <span class="label label-default">解約</span>
                          <?php elseif (6 == $row->contract_status) : ?>
                            <span class="label label-default">失効</span>
                          <?php elseif (7 == $row->contract_status) : ?>
                            <span class="label label-info">短期契約</span>
                          <?php else: ?>
                            <span class="label label-danger">3ヶ月前</span>
                          <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($acc_list as $row1): ?>
                        <?php if ($row1->contract_id == $row->contract_id) : ?><?= $row1->acc_id ?><br><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width">
                        <?php foreach ($acc_list as $row1): ?>
                        <?php if ($row1->contract_id == $row->contract_id) : ?>
                          <?php if (1 == $row1->acc_status_id) :?><span class="label label-danger"><?= $row1->acc_status_name ?></span>
                          <?php elseif (2 == $row1->acc_status_id) : ?><span class="label label-danger"><?= $row1->acc_status_name ?></span>
                          <?php elseif (3 == $row1->acc_status_id) : ?><span class="label label-success"><?= $row1->acc_status_name ?></span>
                          <?php endif; ?><br>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="small td-width"><?= $row->contract_owner ?></td>
                </tr>
            <?php endforeach; ?>
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
        <div style="margin-top: 30px">
            <input class="btn btn-primary" type="submit" name="move" value="新規契約登録"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約情報追加/変更"/>
            <!-- 切り替えボタンの設定 -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">契約情報削除</a>
            <input class="btn btn-primary" type="submit" name="move" value="企業アプローチ状況"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約状況"/>
            <input class="btn btn-primary" type="submit" name="move" value="事故進捗状況"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約者書類"/>
            <input class="btn btn-warning" type="submit" name="move" value="契約者情報一覧画面へ"/>
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
                    "aoColumnDefs": [{ "bVisible": false, "aTargets": [ 4,7,11 ] }],
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