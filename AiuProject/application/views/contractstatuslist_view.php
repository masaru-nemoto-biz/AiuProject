<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        <?=form_open('contractstatuslist/contractInfo_conform')?>
        <table border="3">
            <caption align=center><h2>企業一覧</h2></caption>
            <tr bgcolor="#cccccc">
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
    </br>
        <input type="submit" name="henkou" value="企業情報変更画面へ"/>
        <?=form_close();?>
        <?=form_open('contractstatuslist/contractInfo_add')?>
        <input type="submit" value="企業情報登録画面へ"/>
        <?=form_close();?>
        <?=form_open('contractstatuslist/reference')?>
        <input type="submit" value="企業情報照会画面へ"/>
        <?=form_close();?>
    </body>
</html>