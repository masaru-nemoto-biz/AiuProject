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
        <?php if (is_null($company_data)) : ?>
            <?= form_open('contractstatuslist/conform_add') ?>
            <div style="font-size: 12px;position: relative; margin-right:auto; margin-left:auto; width: 1000px">
                <div style="position: absolute; top: 50px; left: 10px; font-size:12px">
                    <div style="font-weight:bold; font-size: 18px">◆企業情報</div>
                    <table border="1">
                        <tr><td width="120">法人名称</td><td><input type="text" name="corp_name" value="" size="50" /></td></tr>
                        <tr><td>法人名称(カナ)</td><td><input type="text" name="corp_kana" value="" size="50" /></td></tr>
                        <tr><td>郵便番号(〒)</td><td><input type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>所在地</td><td><input type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>電話番号</td><td><input type="text" name="phone" value="" size="50" /></td></tr>
                        <tr><td>FAX</td><td><input type="text" name="fax" value="" size="50" /></td></tr>
                        <tr><td>会社メールアドレス</td><td><input type="text" name="company_mail" value="" size="50" /></td></tr>
                        <tr><td>会社HP</td><td><input type="text" name="company_hp" value="" size="50" /></td></tr>
                        <tr><td>設立年月日</td><td><input type="text" name="establishment" value="" size="50" /></td></tr>
                        <tr><td>資本金</td><td><input type="text" name="capital" value="" size="50" /></td></tr>
                        <tr><td>決算月</td><td><input type="text" name="settling_month" value="" size="50" /></td></tr>
                        <tr><td>業種 第一</td><td><input type="text" name="biz_first" value="" size="50" /></td></tr>
                        <tr><td>業種 第二</td><td><input type="text" name="biz_second" value="" size="50" /></td></tr>
                        <tr><td>従業員数</td><td><input type="text" name="employees" value="" size="50" /></td></tr>
                        <tr><td>契約担当者</td><td><input type="text" name="contract_staff" value="" size="50" /></td></tr>
                        <tr><td>連絡先</td><td><input type="text" name="contact_address" value="" size="50" /></td></tr>
                        <tr><td>法人会加入有無</td><td><input type="text" name="corp_member" value="" size="50" /></td></tr>
                        <tr><td>法人格</td><td><input type="text" name="juridical_personality" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div style="position: absolute; top: 50px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆代表者詳細</div>
                    <table border="1">
                        <tr><td width="120">代表者氏名</td><td><input type="text" name="representative_name" value="" size="50" /></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><input type="text" name="representative_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input type="text" name="title" value="" size="50" /></td></tr>
                        <tr><td>性別</td><td><input type="text" name="sex" value="" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input type="text" name="birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input type="text" name="mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input type="text" name="mail" value="" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input type="text" name="home_phone" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div style="position: absolute; top: 480px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆契約担当者詳細</div>
                    <table border="1">
                        <tr><td width="120">担当者氏名</td><td><input type="text" name="contract_name" value="" size="50" /></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><input type="text" name="contract_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input type="text" name="title" value="" size="50" /></td></tr>
                        <tr><td>性別</td><td><input type="text" name="sex" value="" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input type="text" name="birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input type="text" name="mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input type="text" name="mail" value="" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input type="text" name="home_phone" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div style="position: absolute; top: 770px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆口座詳細</div>
                    <table border="1">
                        <tr><td width="120">口振番号</td><td><input type="text" name="account_transfer_num" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　住所</td><td><input type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　名称</td><td><input type="text" name="holder_name" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><input type="text" name="phone" value="" size="50" /></td></tr>
                        <tr><td>指定口座　銀行名</td><td><input type="text" name="bank_name" value="" size="50" /></td></tr>
                        <tr><td>支店名</td><td><input type="text" name="branch_name" value="" size="50" /></td></tr>
                        <tr><td>預金種目</td><td><input type="text" name="deposit_type" value="" size="50" /></td></tr>
                        <tr><td>口座番号</td><td><input type="text" name="account_num" value="" size="50" /></td></tr>
                        <tr><td>金融機関コード</td><td><input type="text" name="swift_code" value="" size="50" /></td></tr>
                        <tr><td>店番号</td><td><input type="text" name="branch_number" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><input type="text" name="japan_post_bank_symbol" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><input type="text" name="japan_post_bank_num" value="" size="50" /></td></tr>
                        <tr><td>おしらせ送付先</td><td><input type="text" name="mailing" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div style="position: absolute; top: 1330px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆その他詳細</div>
                    <table border="1">
                        <tr><td width="120">契約手段</td><td width="870"><textarea name="contract_way" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>契約場所</td><td width="870"><textarea name="contact_place" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>連絡時間帯</td><td width="870"><textarea name="contact_time" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>人柄</td><td width="870"><textarea name="personality" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>家族構成</td><td width="870"><textarea name="family_structure" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>趣味</td><td width="870"><textarea name="taste" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>状況</td><td width="870"><textarea name="state" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                    </table>
                </div>
                <div style="position: absolute; top: 1940px; left: 10px;">
                    <input type="submit" value="完了"/>
                </div>
            </div>
            <?= form_close(); ?>
        <?php else: ?>
            <?= form_open('contractstatuslist/conform') ?>
                <?php foreach ($company_data as $row): ?>
        <div style="font-size: 12px">
                <div style="position: absolute; top: 50px; left: 10px; font-size:12px">
                    <div style="font-weight:bold; font-size: 18px">◆企業情報</div>
                <table border="1">
                  <tr><td width="120">法人名称</td><td><input type="text" name="corp_name" value="<?= $row->corp_name ?>" size="50" /></td></tr>
                  <tr><td>法人名称(カナ)</td><td><input type="text" name="corp_kana" value="<?= $row->corp_kana ?>" size="50" /></td></tr>
                  <tr><td>郵便番号(〒)</td><td><input type="text" name="post" value="<?= $row->post ?>" size="50" /></td></tr>
                  <tr><td>所在地</td><td><input type="text" name="address" value="<?= $row->address ?>" size="50" /></td></tr>
                  <tr><td>電話番号</td><td><input type="text" name="phone" value="<?= $row->phone ?>" size="50" /></td></tr>
                  <tr><td>FAX</td><td><input type="text" name="fax" value="<?= $row->fax ?>" size="50" /></td></tr>
                  <tr><td>会社メールアドレス</td><td><input type="text" name="company_mail" value="<?= $row->company_mail ?>" size="50" /></td></tr>
                  <tr><td>会社HP</td><td><input type="text" name="company_hp" value="<?= $row->company_hp ?>" size="50" /></td></tr>
                  <tr><td>設立年月日</td><td><input type="text" name="establishment" value="<?= $row->establishment ?>" size="50" /></td></tr>
                  <tr><td>資本金</td><td><input type="text" name="capital" value="<?= $row->capital ?>" size="50" /></td></tr>
                  <tr><td>決算月</td><td><input type="text" name="settling_month" value="<?= $row->settling_month ?>" size="50" /></td></tr>
                  <tr><td>業種 第一</td><td><input type="text" name="biz_first" value="<?= $row->biz_first ?>" size="50" /></td></tr>
                  <tr><td>業種 第二</td><td><input type="text" name="biz_second" value="<?= $row->biz_second ?>" size="50" /></td></tr>
                  <tr><td>従業員数</td><td><input type="text" name="employees" value="<?= $row->employees ?>" size="50" /></td></tr>
                  <tr><td>契約担当者</td><td><input type="text" name="contract_staff" value="<?= $row->contract_staff ?>" size="50" /></td></tr>
                  <tr><td>連絡先</td><td><input type="text" name="contact_address" value="<?= $row->contact_address ?>" size="50" /></td></tr>
                  <tr><td>法人会加入有無</td><td><input type="text" name="corp_member" value="<?= $row->corp_member ?>" size="50" /></td></tr>
                  <tr><td>法人格</td><td><input type="text" name="juridical_personality" value="<?= $row->juridical_personality ?>" size="50" /></td></tr>
                </table>
                </div>
            <?php endforeach; ?>
        <?php foreach ($representative as $row): ?>
                <div style="position: absolute; top: 50px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆代表者詳細</div>
                    <table border="1">
                        <tr><td width="120">代表者氏名</td><td><input type="text" name="representative_name" value="<?= $row->representative_name ?>" size="50" /></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><input type="text" name="representative_kana" value="<?= $row->representative_kana ?>" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input type="text" name="title" value="<?= $row->title ?>" size="50" /></td></tr>
                        <tr><td>性別</td><td><input type="text" name="sex" value="<?= $row->sex ?>" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input type="text" name="birthday" value="<?= $row->birthday ?>" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input type="text" name="mobile_phone" value="<?= $row->mobile_phone ?>" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input type="text" name="mail" value="<?= $row->mail ?>" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input type="text" name="post" value="<?= $row->post ?>" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input type="text" name="address" value="<?= $row->address ?>" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input type="text" name="home_phone" value="<?= $row->home_phone ?>" size="50" /></td></tr>
                    </table>
                </div>
        <?php endforeach; ?>
            <?php foreach ($contract as $row): ?>
                <div style="position: absolute; top: 480px; left: 550px;">
                    <div style="font-weight:bold; font-size: 18px">◆契約担当者詳細</div>
                    <table border="1">
                        <tr><td width="120">担当者氏名</td><td><input type="text" name="contract_name" value="<?= $row->contract_name ?>" size="50" /></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><input type="text" name="contract_kana" value="<?= $row->contract_kana ?>" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input type="text" name="title" value="<?= $row->title ?>" size="50" /></td></tr>
                        <tr><td>性別</td><td><input type="text" name="sex" value="<?= $row->sex ?>" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input type="text" name="birthday" value="<?= $row->birthday ?>" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input type="text" name="mobile_phone" value="<?= $row->mobile_phone ?>" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input type="text" name="mail" value="<?= $row->mail ?>" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input type="text" name="post" value="<?= $row->post ?>" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input type="text" name="address" value="<?= $row->address ?>" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input type="text" name="home_phone" value="<?= $row->home_phone ?>" size="50" /></td></tr>
                    </table>
                </div>
            <?php endforeach; ?>
            <?php foreach ($bank as $row): ?>
                <div style="position: absolute; top: 770px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆口座詳細</div>
                    <table border="1">
                        <tr><td width="120">口振番号</td><td><input type="text" name="account_transfer_num" value="<?= $row->account_transfer_num ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　住所</td><td><input type="text" name="address" value="<?= $row->address ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　名称</td><td><input type="text" name="holder_name" value="<?= $row->holder_name ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><input type="text" name="phone" value="<?= $row->phone ?>" size="50" /></td></tr>
                        <tr><td>指定口座　銀行名</td><td><input type="text" name="bank_name" value="<?= $row->bank_name ?>" size="50" /></td></tr>
                        <tr><td>支店名</td><td><input type="text" name="branch_name" value="<?= $row->branch_name ?>" size="50" /></td></tr>
                        <tr><td>預金種目</td><td><input type="text" name="deposit_type" value="<?= $row->deposit_type ?>" size="50" /></td></tr>
                        <tr><td>口座番号</td><td><input type="text" name="account_num" value="<?= $row->account_num ?>" size="50" /></td></tr>
                        <tr><td>金融機関コード</td><td><input type="text" name="swift_code" value="<?= $row->swift_code ?>" size="50" /></td></tr>
                        <tr><td>店番号</td><td><input type="text" name="branch_number" value="<?= $row->branch_number ?>" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><input type="text" name="japan_post_bank_symbol" value="<?= $row->japan_post_bank_symbol ?>" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><input type="text" name="japan_post_bank_num" value="<?= $row->japan_post_bank_num ?>" size="50" /></td></tr>
                        <tr><td>おしらせ送付先</td><td><input type="text" name="mailing" value="<?= $row->mailing ?>" size="50" /></td></tr>
                    </table>
                </div>
            <?php endforeach; ?>
            <?php foreach ($other as $row): ?>
                <div style="position: absolute; top: 1330px; left: 10px;">
                    <div style="font-weight:bold; font-size: 18px">◆その他詳細</div>
                    <table border="1">
                        <tr><td width="120">契約手段</td><td width="870"><textarea name="contact_way" cols="120" rows="5" wrap="hard"><?= $row->contact_way ?></textarea></td></tr>
                        <tr><td>契約場所</td><td width="870"><textarea name="contact_place" cols="120" rows="5" wrap="hard"><?= $row->contact_place ?></textarea></td></tr>
                        <tr><td>連絡時間帯</td><td width="870"><textarea name="contact_time" cols="120" rows="5" wrap="hard"><?= $row->contact_time ?></textarea></td></tr>
                        <tr><td>人柄</td><td width="870"><textarea name="personality" cols="120" rows="5" wrap="hard"><?= $row->personality ?></textarea></td></tr>
                        <tr><td>家族構成</td><td width="870"><textarea name="family_structure" cols="120" rows="5" wrap="hard"><?= $row->family_structure ?></textarea></td></tr>
                        <tr><td>趣味</td><td width="870"><textarea name="taste" cols="120" rows="5" wrap="hard"><?= $row->taste ?></textarea></td></tr>
                        <tr><td>状況</td><td width="870"><textarea name="state" cols="120" rows="5" wrap="hard"><?= $row->state ?></textarea></td></tr>
                    </table>
                </div>
            <?php endforeach; ?>
                <div style="position: absolute; top: 1940px; left: 10px;">
                    <input type="submit" value="完了"/>
                </div>
            </div>
            <?= form_close(); ?>
        <?php endif; ?>
    </body>
</html>