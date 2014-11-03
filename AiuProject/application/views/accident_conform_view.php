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
        .table-style {
            white-space: nowrap;
        }
    </style>
</head>
    <body>
        <div class="container form-group" style="font-size: 12px;">
            <?= form_open('accidentconform/conform_add') ?>
        <div class="page-header text-center">
            <p class="h2">事故進捗状況の明細画面</p>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="table-responsive">
            <?php if (empty($acc_list)) : ?>
            <?php foreach ($contract_list as $row): ?>
                証券番号：<?= $row->policy_number ?>
            <?php endforeach; ?>
            <table border="0" class="table">
                    <tr><th class="table-style">事故受付番号</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_id" value="" /></td></tr>
                    <tr><th class="table-style">事故</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_contents" value="" /></td></tr>
                    <tr><th class="table-style">状況</th><td colspan="6"><textarea class="form-control input-sm" name="status_quo" cols="120" rows="7" wrap="hard"></textarea></td></tr>
                    <tr><th class="table-style">発生日時</th><td colspan="6"><input class="form-control input-sm" type="date" name="occurrence_date" value="" /></td></tr>
                    <tr><th class="table-style">損サ担当</th><td colspan="6"><input class="form-control input-sm" type="text" name="sonsa" value="" /></td></tr>
                    <tr><th class="table-style">連絡先</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_phone" value="" /></td></tr>
                    <tr><th class="table-style">支払い</th><td colspan="6"><input class="form-control input-sm" type="text" name="payment" value="" /></td></tr>
                    <tr><th class="table-style">ステータス</th>
                        <td colspan="6">
                            <select class="form-control input-sm" name="acc_status_id">
                                <?php foreach ($accident_status_mst as $row): ?>
                                <option value="<?= $row->acc_status_id ?>"><?= $row->acc_status_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
            </table>
            <?php else: ?>
            <?php foreach ($acc_list as $row): ?>
            <?php foreach ($contract_list as $row1): ?>
                証券番号：<?= $row1->policy_number ?>
            <?php endforeach; ?>
            <table border="0" class="table">
                    <tr><th class="table-style">事故受付番号</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_id" value="<?= $row->acc_id ?>" readonly="readonly" /></td></tr>
                    <tr><th class="table-style">事故</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_contents" value="<?= $row->acc_contents ?>" /></td></tr>
                    <tr><th class="table-style">状況</th>
                        <td colspan="6">
                            <textarea class="form-control input-sm" name="status_quo" cols="120" rows="7" wrap="hard"><?= $row->status_quo ?></textarea>
                        </td>
                    </tr>
                    <tr><th class="table-style">発生日時</th><td colspan="6"><input class="form-control input-sm" type="date" name="occurrence_date" value="<?= $row->occurrence_date ?>" /></td></tr>
                    <tr><th class="table-style">損サ担当</th><td colspan="6"><input class="form-control input-sm" type="text" name="sonsa" value="<?= $row->sonsa ?>" /></td></tr>
                    <tr><th class="table-style">連絡先</th><td colspan="6"><input class="form-control input-sm" type="text" name="acc_phone" value="<?= $row->acc_phone ?>" /></td></tr>
                    <tr><th class="table-style">支払い</th><td colspan="6"><input class="form-control input-sm" type="text" name="payment" value="<?= $row->payment ?>" /></td></tr>
                    <tr><th class="table-style">ステータス</th>
                        <td colspan="6">
                            <select class="form-control input-sm" name="acc_status_id">
                                <?php foreach ($accident_status_mst as $row_accident_status): ?>
                                <option value="<?= $row_accident_status->acc_status_id ?>" <?php if ($row_accident_status->acc_status_id == $row->acc_status_id) :?>selected="selected"<?php endif; ?>>
                                    <?= $row_accident_status->acc_status_name ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
            </table>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
        <div class="center_auto" style="margin-top: 10px; width: 150px;">
            <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
        </div>
        <?= form_close(); ?>
        </div>
        </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script>
        $("#table_id").dataTable();
    </script>
</html>