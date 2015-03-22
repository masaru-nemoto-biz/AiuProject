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
        <?= form_open('contractapproach/approach_conform') ?>
        <div class="page-header text-center">
            <p class="h2">アプローチ状況</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:100px">証券番号</td>
                        <td>
                            <?php foreach ($contract_list as $row): ?>
                              <?= $row->policy_number ?><?= '-'.$row->policy_branch_number ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <?php foreach ($list1 as $row): ?>
                    <tr><td style="width:70px">契約者名</td><td><?= $row->corp_name ?></td></tr>
                    <tr><td>所在地</td><td><?= $row->address ?></td></tr>
                    <tr><td>連絡先</td><td><?= $row->phone ?></td></tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-4">
                <?php foreach ($list1 as $row): ?>
                <table class="table table-condensed">
                    <tr><td width="70">契約担当者</td><td width="200"><?= $row->contract_name. "　様" ?></td></tr>
                    <tr><td>連絡先</td><td width="200"><?= $row->mobile_phone ?></td></tr>
                </table>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">日時</th>
                  <th class="table-style">状況</th>
                  <th class="table-style">担当者</th>
                </tr>
              </thead>
                <?php if (!empty($approach_list)) : ?>
                <?php foreach ($approach_list as $row): ?>
                <tr>
                  <td class="table-style">
                    <input class="form-control input-sm" type="date" name="upd_date<?= $row->approach_id ?>" value="<?= $row->upd_date ?>" />
                  </td>
                  <td class="table-style">
                    <textarea class="form-control input-sm" name="approach_content<?= $row->approach_id ?>" cols="120" rows="7" wrap="hard"><?= $row->approach_content ?></textarea>
                  </td>
                  <td class="table-style"><input type="text" name="upd_user<?= $row->approach_id ?>" value="<?= $row->upd_user ?>" /></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                  <td class="table-style">
                    <input class="form-control input-sm" type="date" name="upd_date_new" value="" />
                  </td>
                  <td class="table-style">
                    <textarea class="form-control input-sm" name="approach_content_new" cols="120" rows="7" wrap="hard"></textarea>
                  </td>
                  <td class="table-style"><input type="text" name="upd_user_new" value="" /></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="center_auto" style="margin-top: 10px; width: 310px;">
            <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="戻る"/>
            <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="登録"/>
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