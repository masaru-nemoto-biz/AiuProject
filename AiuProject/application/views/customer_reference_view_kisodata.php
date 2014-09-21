<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>AIU</title>
</head>
    <body>
        </br>
        </br>
        </br>
        <?php foreach ($xxxxxxxxx as $row): ?>
            <div style="font-size: 12px">
                <div style="position: absolute; top: 50px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆企業情報</div>
                    <table border="1">
                        <tr><td width="120">企業名</td><td><?= $row->corp_name ?></td></tr>
                        <tr><td>氏名</td><td><?= $row->corp_kana ?></td></tr>
                        <tr><td>肩書き</td><td><?= $row->post ?></td></tr>
                        <tr><td>所在地</td><td><?= $row->address ?></td></tr>
                        <tr><td>連絡先</td><td><?= $row->phone ?></td></tr>
                        <tr><td>メールアドレス</td><td><?= $row->fax ?></td></tr>
                        <tr><td>HP_URL</td><td><?= $row->company_mail ?></td></tr>
                    </table>
                </div>
                    <?php endforeach; ?>
                <?php foreach ($representative_list as $row): ?>
                <div style="position: absolute; top: 50px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆代表者詳細</div>
                    <table border="1">
                        <tr><td width="120">代表者氏名</td><td><?= $row->representative_name ?></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><?= $row->representative_kana ?></td></tr>
                        <tr><td>肩書</td><td><?= $row->title ?></td></tr>
                        <tr><td>性別</td><td><?= $row->sex ?></td></tr>
                        <tr><td>生年月日</td><td><?= $row->birthday ?></td></tr>
                        <tr><td>携帯電話</td><td><?= $row->mobile_phone ?></td></tr>
                        <tr><td>メールアドレス</td><td><?= $row->mail ?></td></tr>
                        <tr><td>自宅郵便番号</td><td><?= $row->post ?></td></tr>
                        <tr><td>自宅所在地</td><td><?= $row->address ?></td></tr>
                        <tr><td>自宅電話番号</td><td><?= $row->home_phone ?></td></tr>
                    </table>
                </div>
                <?php endforeach; ?>
                <?php foreach ($contract_list as $row): ?>
                <div style="position: absolute; top: 480px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆契約担当者詳細</div>
                    <table border="1">
                        <tr><td width="120">担当者氏名</td><td><?= $row->contract_name ?></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><?= $row->contract_kana ?></td></tr>
                        <tr><td>肩書</td><td><?= $row->title ?></td></tr>
                        <tr><td>性別</td><td><?= $row->sex ?></td></tr>
                        <tr><td>生年月日</td><td><?= $row->birthday ?></td></tr>
                        <tr><td>携帯電話</td><td><?= $row->mobile_phone ?></td></tr>
                        <tr><td>メールアドレス</td><td><?= $row->mail ?></td></tr>
                        <tr><td>自宅郵便番号</td><td><?= $row->post ?></td></tr>
                        <tr><td>自宅所在地</td><td><?= $row->address ?></td></tr>
                        <tr><td>自宅電話番号</td><td><?= $row->home_phone ?></td></tr>
                    </table>
                </div>
                <?php endforeach; ?>
                <?php foreach ($bank_list as $row): ?>
                <div style="position: absolute; top: 650px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆口座詳細</div>
                    <table border="1">
                        <tr><td width="120">口振番号</td><td><?= $row->account_transfer_num ?></td></tr>
                        <tr><td>口座名義人　住所</td><td><?= $row->address ?></td></tr>
                        <tr><td>口座名義人　名称</td><td><?= $row->holder_name ?></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><?= $row->phone ?></td></tr>
                        <tr><td>指定口座　銀行名</td><td><?= $row->bank_name ?></td></tr>
                        <tr><td>支店名</td><td><?= $row->branch_name ?></td></tr>
                        <tr><td>預金種目</td><td><?= $row->deposit_type ?></td></tr>
                        <tr><td>口座番号</td><td><?= $row->account_num ?></td></tr>
                        <tr><td>金融機関コード</td><td><?= $row->swift_code ?></td></tr>
                        <tr><td>店番号</td><td><?= $row->branch_number ?></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><?= $row->japan_post_bank_symbol ?></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><?= $row->japan_post_bank_num ?></td></tr>
                        <tr><td>おしらせ送付先</td><td><?= $row->mailing ?></td></tr>
                    </table>
                </div>
                <?php endforeach; ?>
                <?php foreach ($other_list as $row): ?>
                <div style="position: absolute; top: 1130px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆その他詳細</div>
                    <table border="1">
                        <tr><td width="120">契約手段</td><td width="870"><?= $row->contact_way ?></td></tr>
                        <tr><td>契約場所</td><td width="870"><?= $row->contact_place ?></td></tr>
                        <tr><td>連絡時間帯</td><td width="870"><?= $row->contact_time ?></td></tr>
                        <tr><td>人柄</td><td width="870"><?= $row->personality ?></td></tr>
                        <tr><td>家族構成</td><td width="870"><?= $row->family_structure ?></td></tr>
                        <tr><td>趣味</td><td width="870"><?= $row->taste ?></td></tr>
                        <tr><td>状況</td><td width="870"><?= $row->state ?></td></tr>
                    </table>
                </div>
                <?php endforeach; ?>
                <div style="position: absolute; top: 1730px; left: 10px;">
                    <input type="submit" value="完了"/>
                </div>
            </div>
    </body>
</html>