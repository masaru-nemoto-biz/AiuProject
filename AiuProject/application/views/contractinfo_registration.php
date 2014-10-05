<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        <?= form_open('contractstatuslist/registration_add') ?>
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
                    <tr><th width="120" bgcolor="#cccccc">保険種別</th><td><input type="text" name="user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">保険会社</th><td><input type="password" name="password" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">企業No</th><td><input type="text" name="user_name" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">商品名(カナ)</th><td><input type="text" name="user_name_kana" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">区分</th><td><input type="text" name="authority" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">証券番号</th><td><input type="text" name="registration_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">保険期間</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">契約期間</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">月P</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">年払い</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">ANP</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">合計ANP</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                </table>
            </div>
        </div>
        <?= form_close(); ?>
    </body>
</html>