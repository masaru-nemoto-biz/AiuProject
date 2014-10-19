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
        .font_subhead {
            font-weight:bold;
            font-size: 18px; 
        }
        
    </style>
</head>
    <body>
        <div class="container" style="font-size: 12px;">
            <?= form_open('corpinfolist/index') ?>
            <div class="clearfix" style="width: 800px; margin-left: auto; margin-right: auto;">
                <div class="pull-left" style="width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label class="font_subhead">◆企業情報</label>
                    <?php foreach ($company_data as $row): ?>
                    <table border="0">
                        <tr><td width="120">法人名称</td><td>：<?= $row->corp_name ?></td></tr>
                        <tr><td>法人名称(カナ)</td><td>：<?= $row->corp_kana ?></td></tr>
                        <tr><td>郵便番号(〒)</td><td>：<?= $row->post ?></td></tr>
                        <tr><td>所在地</td><td>：<?= $row->address ?></td></tr>
                        <tr><td>電話番号</td><td>：<?= $row->phone ?></td></tr>
                        <tr><td>FAX</td><td>：<?= $row->fax ?></td></tr>
                        <tr><td>会社メールアドレス</td><td>：<a href="<?= $row->company_mail ?>"><?= $row->company_mail ?></a></td></tr>
                        <tr><td>会社HP</td><td>：<a href="<?= $row->company_hp ?>" target="_blank"><?= $row->company_hp ?></a></td></tr>
                        <tr><td>設立年月日</td><td>：<?= $row->establishment ?></td></tr>
                        <tr><td>資本金</td><td>：<?= $row->capital ?></td></tr>
                        <tr><td>決算月</td><td>：<?= $row->settling_month ?></td></tr>
                        <tr><td>業種 第一</td><td>：<?= $row->biz_first ?></td></tr>
                        <tr><td>業種 第二</td><td>：<?= $row->biz_second ?></td></tr>
                        <tr><td>従業員数</td><td>：<?= $row->employees ?></td></tr>
                        <tr><td>法人会加入有無</td><td>：<?= $row->corp_member ?></td></tr>
                        <tr><td>法人格</td><td>：<?= $row->juridical_personality ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                    <label class="font_subhead" style="margin-top: 20px;">◆口座詳細</label>
                    <?php foreach ($bank as $row): ?>
                    <table>
                        <tr><td width="120">口振番号</td><td>：<?= $row->account_transfer_num ?></td></tr>
                        <tr><td>口座名義人　住所</td><td>：<?= $row->address ?></td></tr>
                        <tr><td>口座名義人　名称</td><td>：<?= $row->holder_name ?></td></tr>
                        <tr><td>口座名義人　連絡先</td><td>：<?= $row->phone ?></td></tr>
                        <tr><td>指定口座　銀行名</td><td>：<?= $row->bank_name ?></td></tr>
                        <tr><td>支店名</td><td>：<?= $row->branch_name ?></td></tr>
                        <tr><td>預金種目</td><td>：<?= $row->deposit_type ?></td></tr>
                        <tr><td>口座番号</td><td>：<?= $row->account_num ?></td></tr>
                        <tr><td>金融機関コード</td><td>：<?= $row->swift_code ?></td></tr>
                        <tr><td>店番号</td><td>：<?= $row->branch_number ?></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td>：<?= $row->japan_post_bank_symbol ?></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td>：<?= $row->japan_post_bank_num ?></td></tr>
                        <tr><td>おしらせ送付先</td><td>：<?= $row->mailing ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                </div>
                <div class="pull-left" style="width: 400px; padding-left: 10px; padding-top: 10px;">
                    <label class="font_subhead">◆代表者詳細</label>
                    <?php foreach ($representative as $row): ?>
                    <table>
                        <tr><td width="120">代表者氏名</td><td>：<?= $row->representative_name ?></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td>：<?= $row->representative_kana ?></td></tr>
                        <tr><td>肩書</td><td>：<?= $row->title ?></td></tr>
                        <tr><td>性別</td><td>：<?= $row->sex ?></td></tr>
                        <tr><td>生年月日</td><td>：<?= $row->birthday ?></td></tr>
                        <tr><td>携帯電話</td><td>：<?= $row->mobile_phone ?></td></tr>
                        <tr><td>メールアドレス</td><td>：<a href="<?= $row->mail ?>"><?= $row->mail ?></a></td></tr>
                        <tr><td>自宅郵便番号</td><td>：<?= $row->post ?></td></tr>
                        <tr><td>自宅所在地</td><td>：<?= $row->address ?></td></tr>
                        <tr><td>自宅電話番号</td><td>：<?= $row->home_phone ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                    <label class="font_subhead" style="margin-top: 20px;">◆契約担当者詳細</label>
                    <?php foreach ($contract as $row): ?>
                    <table>
                        <tr><td width="120">担当者氏名</td><td>：<?= $row->contract_name ?></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td>：<?= $row->contract_kana ?></td></tr>
                        <tr><td>肩書</td><td>：<?= $row->title ?></td></tr>
                        <tr><td>性別</td><td>：<?= $row->sex ?></td></tr>
                        <tr><td>生年月日</td><td>：<?= $row->birthday ?></td></tr>
                        <tr><td>携帯電話</td><td>：<?= $row->mobile_phone ?></td></tr>
                        <tr><td>メールアドレス</td><td>：<a href="<?= $row->mail ?>"><?= $row->mail ?></a></td></tr>
                        <tr><td>郵便番号</td><td>：<?= $row->post ?></td></tr>
                        <tr><td>所在地</td><td>：<?= $row->address ?></td></tr>
                        <tr><td>電話番号</td><td>：<?= $row->home_phone ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                    <label class="font_subhead" style="margin-top: 20px;">◆その他詳細</label>
                    <?php foreach ($other as $row): ?>
                    <table>
                        <tr><td width="120">契約手段</td><td>：<?= $row->contract_way ?></td></tr>
                        <tr><td>契約場所</td><td>：<?= $row->contact_place ?></td></tr>
                        <tr><td>連絡時間帯</td><td>：<?= $row->contact_time ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="clearfix" style="width: 800px; margin-left: auto; margin-right: auto;">
                <div style="padding-left: 10px; padding-top: 10px; width: 800px;">
                    <label style="font-weight:bold; font-size: 18px">◆備考</label>
                    <?php foreach ($other as $row): ?>
                    <table>
                        <tr><td width="120">備考</td><td>：<?= $row->remarks ?></td></tr>
                    </table>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="center_auto" style="margin-top: 10px; width: 150px;">
            <input class="btn btn-primary" style="width:150px" type="submit" value="企業情報一覧画面へ"/>
            </div>
            <?= form_close(); ?>
        </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>