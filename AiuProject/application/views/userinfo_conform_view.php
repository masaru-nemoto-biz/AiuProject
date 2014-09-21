<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        <?php if (is_null($user_data)) : ?>
            <?= form_open('user_table/conform_add') ?>
                <div style="margin-right:auto; margin-left:auto; width:800px; font-size:12px">
                    <table border="3">
                        <caption align=center><h2>ユーザー情報登録画面</h2></caption>
                        <tr><th width="120" bgcolor="#cccccc">ユーザーID</th><td><input type="text" name="user_id" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">パスワード</th><td><input type="password" name="password" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">ユーザー名</th><td><input type="text" name="user_name" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">ユーザー名(カナ)</th><td><input type="text" name="user_name_kana" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">権限</th><td><input type="text" name="authority" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">登録ユーザーID</th><td><input type="text" name="registration_user_id" value="" size="50" /></td></tr>
                        <tr><th bgcolor="#cccccc">更新ユーザーID</th><td><input type="text" name="renovate_user_id" value="" size="50" /></td></tr>
                        <table border="0">
                            <tr><td><input type="submit" value="完了"/></td></tr>
                        </table>
                    </table>
                </div>
            <?= form_close(); ?>
        <?php else: ?>
            <?= form_open('user_table/conform') ?>
                <?php foreach ($user_data as $row): ?>
        <div style="font-size: 12px">
                <div style="margin-right:auto; margin-left:auto; width:800px; font-size:12px">
                <table border="3">
                    <caption align=center><h2>ユーザー情報変更画面</h2></caption>
                    <tr><th width="120" bgcolor="#cccccc">ユーザーID</th><td><input type="text" name="user_id" value="<?= $row->user_id ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">パスワード</th><td><input type="password" name="password" value="<?= $row->password ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">ユーザー名</th><td><input type="text" name="user_name" value="<?= $row->user_name ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">ユーザー名(カナ)</th><td><input type="text" name="user_name_kana" value="<?= $row->user_name_kana ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">権限</th><td><input type="text" name="authority" value="<?= $row->authority ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">登録ユーザーID</th><td><input type="text" name="registration_user_id" value="<?= $row->registration_user_id ?>" size="50" /></td></tr>
                    <tr><th bgcolor="#cccccc">更新ユーザーID</th><td><input type="text" name="renovate_user_id" value="<?= $row->renovate_user_id ?>" size="50" /></td></tr>
                    <table border="0">
                        <tr><td><input type="submit" value="完了"/></td></tr>
                    </table>
                </table>
                </div>
            </div>
                <?php endforeach; ?>
            <?= form_close(); ?>
        <?php endif; ?>
    </body>
</html>