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
      <div class="page-header text-center">
        <p class="h2">main menu<span class="small"></span></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <?=form_open('main/seach') ?>
          <table class="table table-condensed">
            <tr>
              <td>
                <select class="form-control input-sm" name="seach_column">
                  <?php foreach ($mst_seach_obj as $row): ?>
                  <option value="<?= $row->seach_column ?>"><?= $row->seach_name ?></option>
                  <?php endforeach; ?>
                </select>
              </td>
              <td><input class="form-control input-sm" type="text" name="seach_obj" value="<?= $seach_obj ?>" size="20" /></td>
              <td><input class="btn btn-sm btn-primary" type="submit" name="move" value="検索"/></td>
            </tr>
          </table>
          <?=form_close();?>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">更新情報</th>
                  <th class="table-style">日時</th>
                </tr>
              </thead>
              <?php foreach ($history_list as $row): ?>
              <tr>
                <td class=""><?= $row->history_content ?></td>
                <td class=""><?= $row->insert_date ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <?=form_open('main/main_conform') ?>
        <div class="col-md-8">
          <div class="table-responsive">
            <table id="table_id" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">選択</th>
                  <th class="table-style">証券番号</th>
                  <th class="table-style">事故受番号</th>
                  <th class="table-style">担当者</th>
                </tr>
              </thead>
              <?php foreach ($contract_list as $row): ?>
              <tr>
                <td class=""><input type="radio" name="check_radio" value="<?= $row->contract_id ?>" /></td>
                <td class=""><?= $row->policy_number ?></td>
                <td class=""><?= $row->acc_id ?></td>
                <td class=""><?= $row->contract_owner ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div style="text-align:right;">
          <input style="margin-top:10px" class="btn btn-primary" type="submit" name="move" value="契約情報追加/変更"/>
          <input style="margin-top:10px" class="btn btn-primary" type="submit" name="move" value="事故進捗状況"/>
        </div>
        <?=form_close();?>
      </div>
      <div class="col-md-12">
        <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" style="width: 300px; margin-top: 25px">
            <a class="close" data-dismiss="alert">×</a>
        <?= $message ?>
        </div>
        <?php endif; ?>
        </div>
        <?=form_open('main/main_conform') ?>
          <input class="btn btn-primary" type="submit" name="move" value="契約者情報一覧画面へ"/>
        <?=form_close();?>
      </div>

    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script>
        $("#table_id").dataTable( {
                    "aoColumnDefs": [{ "bVisible": false, "aTargets": [ ] }],
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