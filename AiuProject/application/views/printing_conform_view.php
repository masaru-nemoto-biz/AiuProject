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
        <p class="h2">印刷情報入力<span class="small"></span></p>
      </div>
      <div class="row">
        <?=form_open('printing/conform') ?>
        <div class="col-md-12">
            <table class="table table-condensed">
                <tr><td>題名</td><td><input class="form-control input-sm" type="text" name="title" value="" size="50" /></td></tr>
                <tr><td>担当者</td><td><input class="form-control input-sm" type="text" name="rep" value="" size="50" /></td></tr>
                <tr><td>書類名１</td><td><input class="form-control input-sm" type="text" name="document1" value="" size="50" /></td></tr>
                <tr><td>書類名２</td><td><input class="form-control input-sm" type="text" name="document2" value="" size="50" /></td></tr>
                <tr><td>書類名３</td><td><input class="form-control input-sm" type="text" name="document3" value="" size="50" /></td></tr>
                <tr><td>書類名４</td><td><input class="form-control input-sm" type="text" name="document4" value="" size="50" /></td></tr>
                <tr><td>書類名５</td><td><input class="form-control input-sm" type="text" name="document5" value="" size="50" /></td></tr>
                <tr><td>書類名６</td><td><input class="form-control input-sm" type="text" name="document6" value="" size="50" /></td></tr>
                <tr><td>フリーテキスト入力</td>
                    <td>
                        <input class="form-control input-sm" type="text" name="remarks1" value="" size="50" />
                        <input class="form-control input-sm" type="text" name="remarks2" value="" size="50" />
                        <input class="form-control input-sm" type="text" name="remarks3" value="" size="50" />
                        <input class="form-control input-sm" type="text" name="remarks4" value="" size="50" />
                        <input class="form-control input-sm" type="text" name="remarks5" value="" size="50" />
                    </td>
                </tr>
            </table>
        </div>
        <div style="text-align:right;">
          <input style="margin-top:10px" class="btn btn-primary" type="submit" name="move" value="印刷"/>
        </div>
        <?=form_close();?>
      </div>
    </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>