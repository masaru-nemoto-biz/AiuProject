<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
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
    </style>
</head>
    <body>
        <div class="container" style="font-size: 12px;">
        <?= form_open('login/index') ?>
        <div style="text-align: right; ">
            <input class="btn btn-primary" type="submit" name="move" value="logout"/>
        </div>
        <?=form_close();?>
        <?=form_open('contractstatuslist/contractInfo_conform')?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <caption align=center><h2>企業一覧</h2></caption>
            <thead>
            <tr>
                <th>選択</th>
                <th>企業No</th>
                <th>企業名</th>
                <th>火災保険</th>
                <th>事故状況</th>
                <th>障害保険</th>
                <th>事故状況</th>
                <th>賠償保険</th>
                <th>事故状況</th>
                <th>大型</th>
                <th>事故状況</th>
                <th>その他</th>
                <th>事故状況</th>
            </tr>
            </thead>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td><input type="radio" name="check_radio" value="<?= $row->company_id ?>" /></td>
                    <td><?= $row->company_id ?></td>
                    <td><?= $row->corp_name ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" style="width: 300px; margin-top: 10px">
            <a class="close" data-dismiss="alert">×</a>
        <?= $message ?>
        </div>
        <?php endif; ?>
        <div style="margin-top: 30px">
            <input class="btn btn-primary" type="submit" name="move" value="企業情報変更画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="企業情報照会画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="企業情報登録画面へ"/>
            <input class="btn btn-primary" type="submit" name="move" value="契約状況一覧画面へ"/>
        </div>
        <?=form_close();?>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>