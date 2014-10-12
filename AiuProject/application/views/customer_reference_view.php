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
    </style>
</head>
    <body>
        <div class="container" style="font-size: 12px;">
            <div class="page-header text-center">
                <p class="h2">顧客カード <span class="small"></span></p>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <?php foreach ($contract_detail as $row): ?>
                    <a href="#" class="thumbnail">
                        <img src="<?=base_url();?>uploads/<?= $row->business_card ?>" alt="..."/>
                    </a>
                    <?php endforeach; ?>
                    <?php if (!empty($file_name)) : ?>
                    <div class="alert alert-success" style="width: 300px; margin-top: 25px">
                        <a class="close" data-dismiss="alert">×</a>
                        <?= $file_name ?>アップロード完了
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($message)) : ?>
                    <div class="alert alert-danger" style="width: 300px; margin-top: 25px">
                        <a class="close" data-dismiss="alert">×</a>
                        <?= $message ?>
                    </div>
                    <?php endif; ?>
                    <?= form_open_multipart('corpinfolist/do_upload')?>
                    <input type="file" name="userfile" size="20" />
                    <input style="margin-top: 10px" type="submit" value="upload" />
                    <?= form_close();?>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="table-responsive">
                <table  class="table table-striped table-bordered table-hover table-condensed">
                    <tr><td width="120" align="center" rowspan="2"><b>企業名</b></td>
                        <td align="center" width="60"><b>カナ</b></td><td colspan="2">参照したいデータ１</td></tr>
                    <tr>
                        <td align="center" width="60"><b>漢字</b></td><td colspan="2">参照したいデータ２</td>
                    </tr>
                    <tr><td align="center" rowspan="2"><b>氏名</b></td>
                        <td align="center"><b>カナ</b></td><td colspan="2">参照したいデータ３</td></tr>
                    <tr>
                        <td align="center"><b>漢字</b></td><td colspan="2">参照したいデータ４</td>
                    </tr>
                    <tr><td align="center"><b>肩書き</b></td><td colspan="3">参照したいデータ５</td></tr>
                    <tr><td align="center"><b>所在地</b></td><td align="center" width="60"><b>〒</b></td><td width="60">参照したいデータ６</td><td width="560">参照したいデータ７</td></tr>
                    <tr><td align="center" rowspan="3"><b>連絡先</b></td>
                        <td align="center"><b>TELL</b></td><td colspan="2">参照したいデータ８</td></tr>
                        <tr><td align="center"><b>FAX</b></td><td colspan="2">参照したいデータ９</td></tr>
                        <tr><td align="center"><b>携帯</b></td><td colspan="2">参照したいデータ１０</td>
                    </tr>
                </table>
                <table  class="table table-striped table-bordered table-hover table-condensed">
                    <tr><td width="120" align="center"><b>アプローチ</b></td><td width="60" align="center"><b>回数</b></td>
                        <td width="60" align="center">参照したいデータ11</td><td width="560">参照したいデータ12</td>
                    </tr>
                </table>
                <table  class="table table-striped table-bordered table-hover table-condensed">
                    <tr><td width="120" align="center"><b>生年月日</b></td><td width="280">参照したいデータ13</td>
                        <td width="120" align="center"><b>人柄</b></td><td width="280">参照したいデータ15</td>
                    </tr>
                    <tr><td align="center"><b>趣味</b></td><td colspan="3">参照したいデータ16</td></tr>
                </table>
                <table  class="table table-striped table-bordered table-hover table-condensed">
                    <tr><td width="120" align="center"><b>業種</b></td><td width="280">参照したいデータ17</td>
                        <td width="120" align="center"><b>設立</b></td><td width="280">参照したいデータ18</td>
                    </tr>
                    <tr><td align="center"><b>仕事内容</b></td><td colspan="3">参照したいデータ19</td></tr>
                    <tr><td align="center"><b>決算月</b></td><td>参照したいデータ17</td>
                        <td align="center"><b>連絡時間帯</b></td><td>参照したいデータ18</td>
                    </tr>
                </table>
                <table  class="table table-striped table-bordered table-hover table-condensed">
                    <tr><td width="120" align="center"><b>今後のフォロー</b></td><td colspan="3" width="680">参照したいデータ19</td></tr>
                    <tr><td align="center"><b>備考</b></td><td colspan="3">参照したいデータ20</td></tr>
                </table>
                </div>
                <?= form_open('corpinfolist/contractInfo_conform') ?>
                <input class="btn btn-primary" type="submit"　name="move" value="企業情報一覧画面へ"/>
                <?= form_close();?>
            </div>
         </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>