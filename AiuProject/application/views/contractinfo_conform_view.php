<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet"/>
    <title>AIU</title>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        td {
           vertical-align: middle;
        }
        .center_auto {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
    <body>
        <?php if (is_null($company_data)) : ?>
        <div class="container form-group" style="font-size: 12px;">
            <?= form_open('contractstatusconform/conform_add') ?>
            <div class="clearfix" style="width: 800px; margin-left: auto; margin-right: auto;">
                <div class="pull-left" style="width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label style="font-size: 18px">◆企業情報</label>
                    <table border="0">
                        <tr><td width="120">法人名称</td><td><input class="form-control input-sm" type="text" name="corp_name" value="" size="50" /></td></tr>
                        <tr><td>法人名称(カナ)</td><td><input class="form-control input-sm" type="text" name="corp_kana" value="" size="50" /></td></tr>
                        <tr><td>郵便番号(〒)</td><td><input class="form-control input-sm" type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>所在地</td><td><input class="form-control input-sm" type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>電話番号</td><td><input class="form-control input-sm" type="text" name="phone" value="" size="50" /></td></tr>
                        <tr><td>FAX</td><td><input class="form-control input-sm" type="text" name="fax" value="" size="50" /></td></tr>
                        <tr><td>会社メールアドレス</td><td><input class="form-control input-sm" type="text" name="company_mail" value="" size="50" /></td></tr>
                        <tr><td>会社HP</td><td><input class="form-control input-sm" type="text" name="company_hp" value="" size="50" /></td></tr>
                        <tr><td>設立年月日</td><td><input class="form-control input-sm" type="text" name="establishment" value="" size="50" /></td></tr>
                        <tr><td>資本金</td><td><input class="form-control input-sm" type="text" name="capital" value="" size="50" /></td></tr>
                        <tr><td>決算月</td><td><input class="form-control input-sm" type="text" name="settling_month" value="" size="50" /></td></tr>
                        <tr><td>業種 第一</td><td><input class="form-control input-sm" type="text" name="biz_first" value="" size="50" /></td></tr>
                        <tr><td>業種 第二</td><td><input class="form-control input-sm" type="text" name="biz_second" value="" size="50" /></td></tr>
                        <tr><td>従業員数</td><td><input class="form-control input-sm" type="text" name="employees" value="" size="50" /></td></tr>
                        <tr><td>契約担当者</td><td><input class="form-control input-sm" type="text" name="contract_staff" value="" size="50" /></td></tr>
                        <tr><td>連絡先</td><td><input class="form-control input-sm" type="text" name="contact_address" value="" size="50" /></td></tr>
                        <tr><td>法人会加入有無</td><td><input class="form-control input-sm" type="text" name="corp_member" value="" size="50" /></td></tr>
                        <tr><td>法人格</td><td><input class="form-control input-sm" type="text" name="juridical_personality" value="" size="50" /></td></tr>
                    </table>
                    <label style="font-weight:bold; font-size: 18px; margin-top: 20px;">◆口座詳細</label>
                    <table>
                        <tr><td width="120">口振番号</td><td><input class="form-control input-sm" type="text" name="account_transfer_num" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　住所</td><td><inpu class="form-control input-sm"t type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　名称</td><td><input class="form-control input-sm" type="text" name="holder_name" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><input class="form-control input-sm" type="text" name="phone" value="" size="50" /></td></tr>
                        <tr><td>指定口座　銀行名</td><td><input class="form-control input-sm" type="text" name="bank_name" value="" size="50" /></td></tr>
                        <tr><td>支店名</td><td><input class="form-control input-sm" type="text" name="branch_name" value="" size="50" /></td></tr>
                        <tr><td>預金種目</td><td><input class="form-control input-sm" type="text" name="deposit_type" value="" size="50" /></td></tr>
                        <tr><td>口座番号</td><td><input class="form-control input-sm" type="text" name="account_num" value="" size="50" /></td></tr>
                        <tr><td>金融機関コード</td><td><input class="form-control input-sm" type="text" name="swift_code" value="" size="50" /></td></tr>
                        <tr><td>店番号</td><td><input class="form-control input-sm" type="text" name="branch_number" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_symbol" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_num" value="" size="50" /></td></tr>
                        <tr><td>おしらせ送付先</td><td><input class="form-control input-sm" type="text" name="mailing" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div class="pull-left" style="width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label style="font-size: 18px">◆代表者詳細</label>
                    <table>
                        <tr><td width="120">代表者氏名</td><td><input class="form-control input-sm" type="text" name="representative_name" value="" size="50" /></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="representative_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="title" value="" size="50" /></td></tr>
                        <tr><td>性別</td><td><input class="form-control input-sm" type="text" name="sex" value="" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="text" name="birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="mail" value="" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input class="form-control input-sm" type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input class="form-control input-sm" type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input class="form-control input-sm" type="text" name="home_phone" value="" size="50" /></td></tr>
                    </table>
                    <label style="font-weight:bold; font-size: 18px; margin-top: 20px;">◆契約担当者詳細</label>
                    <table>
                        <tr><td width="120">担当者氏名</td><td><input class="form-control input-sm" type="text" name="contract_name" value="" size="50" /></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="contract_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="title" value="" size="50" /></td></tr>
                        <tr><td>性別</td><td><input class="form-control input-sm" type="text" name="sex" value="" size="50" /></td></tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="text" name="birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="mail" value="" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input class="form-control input-sm" type="text" name="post" value="" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input class="form-control input-sm" type="text" name="address" value="" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input class="form-control input-sm" type="text" name="home_phone" value="" size="50" /></td></tr>
                    </table>
                </div>
            </div>
            <div class="clearfix" style="width: 800px; margin-left: auto; margin-right: auto;">
                <div style="padding-left: 10px; padding-top: 10px; width: 800px;">
                    <label style="font-weight:bold; font-size: 18px">◆その他詳細</label>
                    <table>
                        <tr><td width="120">契約手段</td><td><textarea class="form-control input-sm" style="width:650px;" name="contract_way" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>契約場所</td><td><textarea class="form-control input-sm" style="width:650px;" name="contact_place" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>連絡時間帯</td><td><textarea class="form-control input-sm" style="width:650px;" name="contact_time" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>人柄</td><td><textarea class="form-control input-sm" style="width:650px;" name="personality" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>家族構成</td><td><textarea class="form-control input-sm" style="width:650px;" name="family_structure" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>趣味</td><td><textarea class="form-control input-sm" style="width:650px;" name="taste" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                        <tr><td>状況</td><td><textarea class="form-control input-sm" style="width:650px;" name="state" cols="120" rows="5" wrap="hard"></textarea></td></tr>
                    </table>
                </div>
            </div>
            <div class="center_auto" style="margin-top: 10px; width: 150px;">
            <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
            </div>
             <?= form_close(); ?>
        </div>
        <?php else: ?>
        <div class="container" style="font-size: 12px;">
            <?= form_open('contractstatusconform/conform') ?>
            <div class="clearfix" style="border: 1px solid #e5e5e5;width: 824px; margin-left: auto; margin-right: auto;">
                <div class="pull-left" style="border: 1px solid #e5e5e5; width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label style="font-size: 18px">◆企業情報</label>
                    <?php foreach ($company_data as $row): ?>
                    <table border="0">
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
                    <?php endforeach; ?>
                    <label style="font-weight:bold; font-size: 18px; margin-top: 20px;">◆口座詳細</label>
                    <?php foreach ($bank as $row): ?>
                    <table>
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
                    <?php endforeach; ?>
                </div>
                <div class="pull-left" style="border: 1px solid #e5e5e5; width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label style="font-size: 18px">◆代表者詳細</label>
                    <?php foreach ($representative as $row): ?>
                    <table>
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
                    <?php endforeach; ?>
                    <label style="font-weight:bold; font-size: 18px; margin-top: 20px;">◆契約担当者詳細</label>
                    <?php foreach ($contract as $row): ?>
                    <table>
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
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="clearfix" style="border: 1px solid #e5e5e5;width: 824px; margin-left: auto; margin-right: auto;">
                <div style="border: 1px solid #e5e5e5; padding-left: 10px; padding-top: 10px; width: 813px;">
                    <label style="font-weight:bold; font-size: 18px">◆その他詳細</label>
                    <?php foreach ($other as $row): ?>
                    <table>
                        <tr><td width="120">契約手段</td><td><textarea class="span8" name="contract_way" rows="5" wrap="hard"><?= $row->contact_way ?></textarea></td></tr>
                        <tr><td>契約場所</td><td><textarea class="span8" name="contact_place" cols="120" rows="5" wrap="hard"><?= $row->contact_place ?></textarea></td></tr>
                        <tr><td>連絡時間帯</td><td><textarea class="span8" name="contact_time" cols="120" rows="5" wrap="hard"><?= $row->contact_time ?></textarea></td></tr>
                        <tr><td>人柄</td><td><textarea class="span8" name="personality" cols="120" rows="5" wrap="hard"><?= $row->personality ?></textarea></td></tr>
                        <tr><td>家族構成</td><td><textarea class="span8" name="family_structure" cols="120" rows="5" wrap="hard"><?= $row->family_structure ?></textarea></td></tr>
                        <tr><td>趣味</td><td><textarea class="span8" name="taste" cols="120" rows="5" wrap="hard"><?= $row->taste ?></textarea></td></tr>
                        <tr><td>状況</td><td><textarea class="span8" name="state" cols="120" rows="5" wrap="hard"><?= $row->state ?></textarea></td></tr>
                    </table>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="center_auto" style="border: 1px solid #e5e5e5;width: 150px;">
            <input style="width:150px" type="submit" value="完了"/>
            </div>
            <?= form_close(); ?>
        <?php endif; ?>
        </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>