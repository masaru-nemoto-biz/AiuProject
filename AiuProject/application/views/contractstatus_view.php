<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        <div style="font-size: 12px; position: relative; margin-right:auto; margin-left:auto; width: 1024px">
            <div style="position: relative; top: 10px; left: 10px; font-size: 28px">
                <table border="0" align="center" height="50">
                    <tr bgcolor="#cccccc"><td align="center" width="700"><b>契約情報一覧画面</b></td></tr>
                </table>
            </div>           
        <?=form_open('contractstatuslist/contractInfo_conform')?>
        <div style="position: absolute; top: 100px; left: 30px;">
            <table border="1">
                <tr>
                    <td align="center" width="70">契約者名</td>
                    <td align="center" width="200">株式会社テスト１　東京都練馬区南大泉３－１９－５　エステート泉</td>
                </tr>
                <tr>
                    <td>所在地</td>
                    <td>東京都練馬区南大泉３－１９－５　エステート泉</td>
                </tr>
                <tr>
                    <td>連絡先</td>
                    <td>03-1111-2222</td>
                </tr>
                <tr>
                    <td>業種</td>
                    <td>SI</td>
                </tr>
                <tr>
                    <td>決算月</td>
                    <td>３月</td>
                </tr>
            </table>
        </div>
        <div style="position: absolute; top: 100px; left: 370px;">
            <table border="1">
                <tr>
                    <td align="center" width="70">契約担当者</td>
                    <td align="center" width="200">根本　賢</td>
                </tr>
                <tr>
                    <td align="center" width="70">連絡先</td>
                    <td align="center" width="200">090-0000-1111</td>
                </tr>
            </table>
        </div>
        <div style="position: absolute; top: 100px; left: 705px;">
            <table border="1">
                <tr>
                    <td align="center" width="70">月P合計</td>
                    <td align="center" width="200">\10000</td>
                </tr>
                <tr>
                    <td align="center" width="70">年払い合計</td>
                    <td align="center" width="200">\100000</td>
                </tr>
                <tr>
                    <td align="center" width="70">合計ANP</td>
                    <td align="center" width="200">\100000</td>
                </tr>
            </table>
        </div>
        <div style="position: absolute; top: 200px; left: 10px;">
        <table border="3">
            <tr bgcolor="#cccccc">
                <th>選択</th>
                <th>保険種別</th>
                <th>保険会社</th>
                <th>企業No</th>
                <th>商品名</th>
                <th>区分</th>
                <th>証券番号</th>
                <th>保険期間</th>
                <th>契約期間</th>
                <th>月P</th>
                <th>年払い</th>
                <th>ANP</th>
                <th>合計ANP</th>
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
        </div>
        </div>
    </body>
</html>