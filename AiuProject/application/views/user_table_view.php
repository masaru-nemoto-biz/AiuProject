<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        <?=form_open('user_table/userInfo_conform')?>
        <table border="3">
            <caption align=center><h2>ユーザー一覧</h2></caption>
            <tr bgcolor="#cccccc">
                <th>選択</th>
                <th>ユーザーID</th>
                <th>パスワード</th>
                <th>ユーザー名</th>
                <th>ユーザー名(カナ)</th>
                <th>権限</th>
                <th>登録日時</th>
                <th>更新日時</th>
                <th>登録ユーザーID</th>
                <th>更新ユーザーID</th>
            </tr>
            <?php foreach ($list as $row): ?>
                <tr>
                    <td><input type="radio" name="check_radio" value="<?= $row->user_num ?>" /></td>
                    <td><?= $row->user_id ?></td>
                    <td><?= $row->password ?></td>
                    <td><?= $row->user_name ?></td>
                    <td><?= $row->user_name_kana ?></td>
                    <td><?= $row->authority ?></td>
                    <td><?= $row->registration_time_and_date ?></td>
                    <td><?= $row->renovate_time_and_date ?></td>
                    <td><?= $row->registration_user_id ?></td>
                    <td><?= $row->renovate_user_id ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </br>
        <input type="submit" value="ユーザー情報変更画面へ"/>
        <?=form_close();?>
        <?=form_open('user_table/userInfo_add')?>
        <input type="submit" value="ユーザー情報登録画面へ"/>
        <?=form_close();?>
    </body>
</html>