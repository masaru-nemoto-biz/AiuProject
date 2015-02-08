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
      <div class="page-header text-center">
        <p class="h2">main menu<span class="small"></span></p>
      </div>
      <div class="row">
        <?=form_open('printing/conform') ?>
        <div class="col-md-4">
          <div class="table-responsive" style="margin-top:28px">
            <table class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">選択</th>
                  <th class="table-style">印刷書類</th>
                </tr>
              </thead>
              <?php foreach ($mst_print_documents as $row): ?>
              <tr>
                <td class=""><input type="radio" name="check_radio1" value="<?= $row->print_doc_id ?>" /></td>
                <td class=""><?= $row->print_doc_name ?></td>
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
        </div>
        <div class="col-md-8">
          <div class="table-responsive">
            <table id="table_id" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">選択</th>
                  <th class="table-style">契約元</th>
                  <th class="table-style">担当者</th>
                </tr>
              </thead>
              <?php foreach ($list as $row): ?>
              <tr>
                <td class=""><input type="radio" name="check_radio2" value="<?= $row->company_id ?>" /></td>
                <td class=""><?= $row->corp_name ?></td>
                <td class=""><?= $row->upd_user ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div style="text-align:right;">
          <input style="margin-top:10px" class="btn btn-primary" type="submit" name="move" value="印刷"/>
        </div>
        <?=form_close();?>
      </div>
    </div>

    <script>
        $("#table_id").dataTable( {
                    "aoColumnDefs": [{ "bVisible": false, "aTargets": [ ] }],
                    "sScrollY": "500px",
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