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
        .td_head_size {
            width: 115px;
        }
        .label_size {
            font-size: 16px;
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
            <?= form_open('corpinfoconform/conform_add') ?>
            <div class="row">
                <div class="col-md-4">
                    <label class="label_size">◆契約者情報</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">契約者タイプ</td>
                            <td>
                              <select class="form-control input-sm" name="division">
                                <?php foreach ($corp_division_mst as $row): ?>
                                  <option value="<?= $row->corp_div_id ?>"><?= $row->corp_div_name ?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                        </tr>
                        <tr><td>担当者</td><td><input class="form-control input-sm" type="text" name="upd_user" value="" size="50" /></td></tr>
                    </table>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">法人名称</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_name" value="" size="50" /></td></tr>
                        <tr><td>法人名称(カナ)</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_kana" value="" size="50" /></td></tr>
                        <tr><td>郵便番号(〒)</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_post" value="" size="50" /></td></tr>
                        <tr><td>所在地</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_address" value="" size="50" /></td></tr>
                        <tr><td>電話番号</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_phone" value="" size="50" /></td></tr>
                        <tr><td>FAX</td><td colspan="2"><input class="form-control input-sm" type="text" name="corp_fax" value="" size="50" /></td></tr>
                        <tr><td>会社メールアドレス</td><td colspan="2"><input class="form-control input-sm" type="text" name="company_mail" value="" size="50" /></td></tr>
                        <tr><td>会社HP</td><td colspan="2"><input class="form-control input-sm" type="text" name="company_hp" value="" size="50" /></td></tr>
                        <tr><td>設立年月日</td><td colspan="2"><input class="form-control input-sm" type="date" name="establishment" value="" size="50" /></td></tr>
                        <tr><td>資本金</td><td><input class="form-control input-sm" type="text" name="capital" value="" size="50" /></td><td style="vertical-align: bottom">円</td></tr>
                        <tr><td>決算月</td><td><input class="form-control input-sm" type="text" name="settling_month" value="" size="50" /></td></td><td style="vertical-align: bottom">月</td></tr>
                        <tr><td>業種 第一</td><td colspan="2"><input class="form-control input-sm" type="text" name="biz_first" value="" size="50" /></td></tr>
                        <tr><td>業種 第二</td><td colspan="2"><input class="form-control input-sm" type="text" name="biz_second" value="" size="50" /></td></tr>
                        <tr><td>従業員数</td><td><input class="form-control input-sm" type="text" name="employees" value="" size="50" /></td></td><td style="vertical-align: bottom">人</td></tr>
                        <tr><td>法人会加入有無</td>
                            <td colspan="2">
                                <select class="form-control input-sm" name="corp_member">
                                    <option value="0" >無し</option>
                                    <option value="1" >有り</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td>法人格</td>
                            <td colspan="2">
                                <select class="form-control input-sm" name="juridical_personality">
                                    <?php foreach ($jurid_personal_mst as $row): ?>
                                    <option value="<?= $row->Jurid_Personal_id ?>"><?= $row->Jurid_Personal_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <label class="label_size">◆代表者詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">代表者氏名</td><td><input class="form-control input-sm" type="text" name="representative_name" value="" size="50" /></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="representative_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="rep_title" value="" size="50" /></td></tr>
                        <tr><td>性別</td>
                            <td>
                                <select class="form-control input-sm" name="rep_sex">
                                    <?php foreach ($sex_mst as $row): ?>
                                    <option value="<?= $row->sex_id ?>"><?= $row->sex_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="date" name="rep_birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="rep_mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="rep_mail" value="" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input class="form-control input-sm" type="text" name="rep_post" value="" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input class="form-control input-sm" type="text" name="rep_address" value="" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input class="form-control input-sm" type="text" name="rep_home_phone" value="" size="50" /></td></tr>
                    </table>
                    <label class="label_size">◆契約担当者詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">担当者氏名</td><td><input class="form-control input-sm" type="text" name="contract_name" value="" size="50" /></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="contract_kana" value="" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="con_title" value="" size="50" /></td></tr>
                        <tr><td>性別</td>
                            <td>
                                <select class="form-control input-sm" name="con_sex">
                                    <?php foreach ($sex_mst as $row): ?>
                                    <option value="<?= $row->sex_id ?>"><?= $row->sex_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="date" name="con_birthday" value="" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="con_mobile_phone" value="" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="con_mail" value="" size="50" /></td></tr>
                        <tr><td>郵便番号</td><td><input class="form-control input-sm" type="text" name="con_post" value="" size="50" /></td></tr>
                        <tr><td>所在地</td><td><input class="form-control input-sm" type="text" name="con_address" value="" size="50" /></td></tr>
                        <tr><td>電話番号</td><td><input class="form-control input-sm" type="text" name="con_home_phone" value="" size="50" /></td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <label class="label_size">◆口座詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">口振番号</td><td><input class="form-control input-sm" type="text" name="account_transfer_num" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　住所</td><td><input class="form-control input-sm"t type="text" name="bank_address" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　名称</td><td><input class="form-control input-sm" type="text" name="bank_holder_name" value="" size="50" /></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><input class="form-control input-sm" type="text" name="bank_phone" value="" size="50" /></td></tr>
                        <tr><td>指定口座　銀行名</td><td><input class="form-control input-sm" type="text" name="bank_name" value="" size="50" /></td></tr>
                        <tr><td>支店名</td><td><input class="form-control input-sm" type="text" name="branch_name" value="" size="50" /></td></tr>
                        <tr><td>預金種目</td>
                            <td>
                                <select class="form-control input-sm" name="deposit_type">
                                    <?php foreach ($deposits_event_mst as $row): ?>
                                    <option value="<?= $row->dep_event_id ?>"><?= $row->dep_event_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>口座番号</td><td><input class="form-control input-sm" type="text" name="account_num" value="" size="50" /></td></tr>
                        <tr><td>金融機関コード</td><td><input class="form-control input-sm" type="text" name="swift_code" value="" size="50" /></td></tr>
                        <tr><td>店番号</td><td><input class="form-control input-sm" type="text" name="branch_number" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_symbol" value="" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_num" value="" size="50" /></td></tr>
                        <tr><td>おしらせ送付先</td>
                            <td>
                                <select class="form-control input-sm" name="mailing">
                                    <?php foreach ($announcement_mst as $row): ?>
                                    <option value="<?= $row->announcement_id ?>"><?= $row->announcement_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <label class="label_size">◆その他詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">契約手段</td><td><input class="form-control input-sm" type="text" name="contract_way" value="" size="50" /></td></tr>
                        <tr><td>契約場所</td><td><input class="form-control input-sm" type="text" name="contact_place" value="" size="50" /></td></tr>
                        <tr><td>連絡時間帯</td><td><input class="form-control input-sm" type="text" name="contact_time" value="" size="50" /></td></tr>
                        <tr><td>決算書取得方法</td><td><input class="form-control input-sm" type="text" name="fin_st_acq" value="" size="50" /></td></tr>
                        <tr><td>備考</td><td><textarea class="form-control input-sm" name="remarks" cols="120" rows="7" wrap="hard"></textarea></td></tr>
                    </table>
                </div>
            </div>
            <div class="center_auto" style="margin-top: 10px; width: 150px;">
                <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
            </div>
             <?= form_close(); ?>
        <?php else: ?>
        <div class="container form-group" style="font-size: 12px;">
            <?= form_open('corpinfoconform/conform') ?>
            <div class="row">
                <div class="col-md-4">
                    <label class="label_size">◆契約者情報</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">契約者タイプ</td>
                            <td>
                              <select class="form-control input-sm" name="contracter_type">
                                <?php foreach ($corp_division_mst as $row_mst): ?>
                                  <option value="<?= $row_mst->corp_div_id ?>" <?php if ($row_mst->corp_div_id == $company_data->contracter_type) :?>selected="selected"<?php endif; ?>>
                                    <?= $row_mst->corp_div_name ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                        </tr>
                        <tr><td>担当者</td><td><input class="form-control input-sm" type="text" name="upd_user" value="<?= $company_data->upd_user ?>" size="50" /></td></tr>
                    </table>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">法人名称</td><td><input class="form-control input-sm" type="text" name="corp_name" value="<?= $company_data->corp_name ?>" size="50" /></td></tr>
                        <tr><td>法人名称(カナ)</td><td><input class="form-control input-sm" type="text" name="corp_kana" value="<?= $company_data->corp_kana ?>" size="50" /></td></tr>
                        <tr><td>郵便番号(〒)</td><td><input class="form-control input-sm" type="text" name="corp_post" value="<?= $company_data->post ?>" size="50" /></td></tr>
                        <tr><td>所在地</td><td><input class="form-control input-sm" type="text" name="corp_address" value="<?= $company_data->address ?>" size="50" /></td></tr>
                        <tr><td>電話番号</td><td><input class="form-control input-sm" type="text" name="corp_phone" value="<?= $company_data->phone ?>" size="50" /></td></tr>
                        <tr><td>FAX</td><td><input class="form-control input-sm" type="text" name="corp_fax" value="<?= $company_data->fax ?>" size="50" /></td></tr>
                        <tr><td>会社メールアドレス</td><td><input class="form-control input-sm" type="text" name="company_mail" value="<?= $company_data->company_mail ?>" size="50" /></td></tr>
                        <tr><td>会社HP</td><td><input class="form-control input-sm" type="text" name="company_hp" value="<?= $company_data->company_hp ?>" size="50" /></td></tr>
                        <tr><td>設立年月日</td><td><input class="form-control input-sm" type="date" name="establishment" value="<?= $company_data->establishment ?>" size="50" /></td></tr>
                        <tr><td>資本金</td><td><input class="form-control input-sm" type="text" name="capital" value="<?= $company_data->capital ?>" size="50" /></td><td style="vertical-align: bottom">円</td></tr>
                        <tr><td>決算月</td><td><input class="form-control input-sm" type="text" name="settling_month" value="<?= $company_data->settling_month ?>" size="50" /></td></tr>
                        <tr><td>業種 第一</td><td><input class="form-control input-sm" type="text" name="biz_first" value="<?= $company_data->biz_first ?>" size="50" /></td></tr>
                        <tr><td>業種 第二</td><td><input class="form-control input-sm" type="text" name="biz_second" value="<?= $company_data->biz_second ?>" size="50" /></td></tr>
                        <tr><td>従業員数</td><td><input class="form-control input-sm" type="text" name="employees" value="<?= $company_data->employees ?>" size="50" /></td></tr>
                        <tr><td>法人会加入有無</td>
                            <td>
                                <select class="form-control input-sm" name="corp_member">
                                    <option value="0" <?php if (0 == $company_data->corp_member) :?>selected="selected"<?php endif; ?>>無し</option>
                                    <option value="1" <?php if (1 == $company_data->corp_member) :?>selected="selected"<?php endif; ?>>有り</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td>法人格</td>
                            <td>
                                <select class="form-control input-sm" name="juridical_personality">
                                    <?php foreach ($jurid_personal_mst as $row_jurid_personal_mst): ?>
                                    <option value="<?= $row_jurid_personal_mst->Jurid_Personal_id ?>" <?php if ($row_jurid_personal_mst->Jurid_Personal_id == $company_data->juridical_personality) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_jurid_personal_mst->Jurid_Personal_name ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <label class="label_size">◆代表者詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">代表者氏名</td><td><input class="form-control input-sm" type="text" name="representative_name" value="<?= $representative->representative_name ?>" size="50" /></td></tr>
                        <tr><td>代表者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="representative_kana" value="<?= $representative->representative_kana ?>" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="rep_title" value="<?= $representative->title ?>" size="50" /></td></tr>
                        <tr><td>性別</td>
                            <td>
                                <select class="form-control input-sm" name="rep_sex">
                                    <?php foreach ($sex_mst as $row_rep_sex): ?>
                                    <option value="<?= $row_rep_sex->sex_id ?>" <?php if ($row_rep_sex->sex_id == $representative->sex) :?>selected="selected"<?php endif; ?>><?= $row_rep_sex->sex_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="date" name="rep_birthday" value="<?= $representative->birthday ?>" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="rep_mobile_phone" value="<?= $representative->rep_mobile_phone ?>" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="rep_mail" value="<?= $representative->mail ?>" size="50" /></td></tr>
                        <tr><td>自宅郵便番号</td><td><input class="form-control input-sm" type="text" name="rep_post" value="<?= $representative->post ?>" size="50" /></td></tr>
                        <tr><td>自宅所在地</td><td><input class="form-control input-sm" type="text" name="rep_address" value="<?= $representative->address ?>" size="50" /></td></tr>
                        <tr><td>自宅電話番号</td><td><input class="form-control input-sm" type="text" name="rep_home_phone" value="<?= $representative->home_phone ?>" size="50" /></td></tr>
                    </table>
                    <label class="label_size">◆契約担当者詳細</label>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">担当者氏名</td><td><input class="form-control input-sm" type="text" name="contract_name" value="<?= $contract->contract_name ?>" size="50" /></td></tr>
                        <tr><td>担当者氏名(カナ)</td><td><input class="form-control input-sm" type="text" name="contract_kana" value="<?= $contract->contract_kana ?>" size="50" /></td></tr>
                        <tr><td>肩書</td><td><input class="form-control input-sm" type="text" name="con_title" value="<?= $contract->title ?>" size="50" /></td></tr>
                        <tr><td>性別</td>
                            <td>
                                <select class="form-control input-sm" name="con_sex">
                                    <?php foreach ($sex_mst as $row_con_sex): ?>
                                    <option value="<?= $row_con_sex->sex_id ?>" <?php if ($row_con_sex->sex_id == $contract->sex) :?>selected="selected"<?php endif; ?>><?= $row_con_sex->sex_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>生年月日</td><td><input class="form-control input-sm" type="date" name="con_birthday" value="<?= $contract->birthday ?>" size="50" /></td></tr>
                        <tr><td>携帯電話</td><td><input class="form-control input-sm" type="text" name="con_mobile_phone" value="<?= $contract->mobile_phone ?>" size="50" /></td></tr>
                        <tr><td>メールアドレス</td><td><input class="form-control input-sm" type="text" name="con_mail" value="<?= $contract->mail ?>" size="50" /></td></tr>
                        <tr><td>郵便番号</td><td><input class="form-control input-sm" type="text" name="con_post" value="<?= $contract->post ?>" size="50" /></td></tr>
                        <tr><td>所在地</td><td><input class="form-control input-sm" type="text" name="con_address" value="<?= $contract->address ?>" size="50" /></td></tr>
                        <tr><td>電話番号</td><td><input class="form-control input-sm" type="text" name="con_home_phone" value="<?= $contract->home_phone ?>" size="50" /></td></tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <label class="label_size">◆口座詳細</label>
                    <?php foreach ($bank as $row): ?>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">口振番号</td><td><input class="form-control input-sm" type="text" name="account_transfer_num" value="<?= $row->account_transfer_num ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　住所</td><td><inpu class="form-control input-sm"t type="text" name="bank_address" value="<?= $row->address ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　名称</td><td><input class="form-control input-sm" type="text" name="bank_holder_name" value="<?= $row->holder_name ?>" size="50" /></td></tr>
                        <tr><td>口座名義人　連絡先</td><td><input class="form-control input-sm" type="text" name="bank_phone" value="<?= $row->phone ?>" size="50" /></td></tr>
                        <tr><td>指定口座　銀行名</td><td><input class="form-control input-sm" type="text" name="bank_name" value="<?= $row->bank_name ?>" size="50" /></td></tr>
                        <tr><td>支店名</td><td><input class="form-control input-sm" type="text" name="branch_name" value="<?= $row->branch_name ?>" size="50" /></td></tr>
                        <tr><td>預金種目</td>
                            <td>
                                <select class="form-control input-sm" name="deposit_type">
                                    <?php foreach ($deposits_event_mst as $row_deposit_type): ?>
                                    <option value="<?= $row_deposit_type->dep_event_id ?>" <?php if ($row_deposit_type->dep_event_id == $row->deposit_type) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_deposit_type->dep_event_name ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td>口座番号</td><td><input class="form-control input-sm" type="text" name="account_num" value="<?= $row->account_num ?>" size="50" /></td></tr>
                        <tr><td>金融機関コード</td><td><input class="form-control input-sm" type="text" name="swift_code" value="<?= $row->swift_code ?>" size="50" /></td></tr>
                        <tr><td>店番号</td><td><input class="form-control input-sm" type="text" name="branch_number" value="<?= $row->branch_number ?>" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　記号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_symbol" value="<?= $row->japan_post_bank_symbol ?>" size="50" /></td></tr>
                        <tr><td>ゆうちょ銀行　番号</td><td><input class="form-control input-sm" type="text" name="japan_post_bank_num" value="<?= $row->japan_post_bank_num ?>" size="50" /></td></tr>
                        <tr><td>おしらせ送付先</td>
                            <td>
                                <select class="form-control input-sm" name="mailing">
                                    <?php foreach ($announcement_mst as $row_announcement_mst): ?>
                                    <option value="<?= $row_announcement_mst->announcement_id ?>" <?php if ($row_announcement_mst->announcement_id == $row->mailing) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_announcement_mst->announcement_name ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <?php endforeach; ?>
                    <label class="label_size">◆その他詳細</label>
                    <?php foreach ($other as $row): ?>
                    <table class="table table-condensed">
                        <tr><td class="td_head_size">契約手段</td><td><input class="form-control input-sm" type="text" name="contract_way" value="<?= $row->contract_way ?>" size="50" /></td></tr>
                        <tr><td>契約場所</td><td><input class="form-control input-sm" type="text" name="contact_place" value="<?= $row->contact_place ?>" size="50" /></td></tr>
                        <tr><td>連絡時間帯</td><td><input class="form-control input-sm" type="text" name="contact_time" value="<?= $row->contact_time ?>" size="50" /></td></tr>
                        <tr><td>決算書取得方法</td><td><input class="form-control input-sm" type="text" name="fin_st_acq" value="<?= $row->fin_st_acq ?>" size="50" /></td></tr>
                        <tr><td>備考</td><td><textarea class="form-control input-sm" name="remarks" cols="120" rows="7" wrap="hard"><?= $row->remarks ?></textarea></td></tr>
                    </table>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="center_auto" style="margin-top: 10px; width: 150px;">
                <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
            </div>
            <?= form_close(); ?>
        </div>
        <?php endif; ?>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>