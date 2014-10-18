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
        <div class="text-right">
            <input class="btn btn-primary" type="submit" name="move" value="logout"/>
        </div>
        <?=form_close();?>
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
                    <tr><td>決算月</td><td><?= $row->settling_month ?></td></tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td width="70">契約担当者</td><td width="200"><?= $row->contract_name ?></td></tr>
                    <tr><td>連絡先</td><td width="200"><?= $row->mobile_phone ?></td></tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td width="70">月P合計</td><td width="200">計算する</td></tr>
                    <tr><td>年払い合計</td><td width="200">計算する</td></tr>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="table-responsive">
        <table id="table_id" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th class="table-style">選択</th>
                <th class="table-style">保険種別</th>
                <th class="table-style">保険会社</th>
                <th class="table-style">企業名</th>
                <th class="table-style">商品名</th>
                <th class="table-style">区分</th>
                <th class="table-style">証券番号</th>
                <th class="table-style">保険期間</th>
                <th class="table-style">契約期間</th>
                <th class="table-style">月P</th>
                <th class="table-style">年払い</th>
                <th class="table-style">ANP</th>
                <th class="table-style">事故</th>
            </tr>
            </thead>
            <?php foreach ($list2 as $row): ?>
                <tr>
                    <td class="table-style"><input type="radio" name="check_radio" value="<?= $row->contract_id ?>" /><?= $row->contract_id ?></td>
                    <td class="table-style"><?= $row->insur_class_name ?></td>
                    <td class="table-style"><?= $row->insur_corp_name ?></td>
                    <td class="table-style"><?= $row->corp_name ?></td>
                    <td class="table-style"><?= $row->brand_name ?></td>
                    <td class="table-style"><?= $row->corp_div_name ?></td>
                    <td class="table-style"><?= $row->policy_number ?></td>
                    <td class="table-style"><?= $row->insurance_period_start ?>～<?= $row->insurance_period_end ?></td>
                    <td class="table-style"><?= $row->contract_period_y ?>年<?= $row->contract_period_m ?>ヶ月<?= $row->contract_period_d ?>日</td>
                    <td class="table-style"><?= $row->month_p ?></td>
                    <td class="table-style"><?= $row->yearly_payment ?></td>
                    <td class="table-style"><?= $row->anp ?></td>
                    <td class="table-style">
                        <?php foreach ($acc_list as $row1): ?>
                        <?php if ($row1->contract_id == $row->contract_id) : ?><?= $row1->acc_status ?><?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    
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
        <div style="margin-top: 30px">
            <input class="btn btn-primary" type="submit" name="move" value="契約情報登録画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="事故状況登録画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="企業情報一覧画面へ"/>
        </div>
        <?=form_close();?>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script>
        $("#table_id").dataTable( {
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