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
        <?= form_open('ContractInfoConform/conform_add') ?>
        <div style="font-size: 12px; position: relative; margin-right:auto; margin-left:auto; width: 800px">
            <div style="position: relative; top: 10px; left: 10px; font-size: 28px">
                <table border="0" align="center" height="50">
                    <tr bgcolor="#cccccc"><td align="center" width="700"><b>契約情報登録画面</b></td></tr>
                </table>
            </div>
            <div style="position: absolute; top: 80px; left: 0px">
                <table border="0" width="800">
                    <tr><td align="right">株式会社テスト１</td></tr>
                </table>
            </div> 
            <div style="position: absolute; top: 140px; left: 10px">
                <table border="3">
                    <tr><th width="120" bgcolor="#cccccc">保険種別</th><td><input type="text" name="insurance_classification_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">保険会社</th><td><input type="password" name="insurance_company_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">商品名(カナ)</th><td><input type="text" name="brand_name" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">区分</th><td><input type="text" name="division" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">証券番号</th><td><input type="text" name="policy_number" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">保険期間</th><td><input type="text" name="insurance_period" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">契約期間</th><td><input type="text" name="contract_period" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">月P</th><td><input type="text" name="month_p" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">年払い</th><td><input type="text" name="yearly_payment" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">ANP</th><td><input type="text" name="anp" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">合計ANP</th><td><input type="text" name="total_anp" value="" size="50" /></td></tr>
                </table>
            </div>
        </div>
        <div class="center_auto" style="margin-top: 10px; width: 150px;">
            <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
        </div>
        <?= form_close(); ?>
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