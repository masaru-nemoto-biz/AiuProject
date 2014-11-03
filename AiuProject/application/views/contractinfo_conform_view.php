<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    
    <!-- dataTables ------------------------------------------------------------------------------------------------------------------------------>
      <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
      <!-- jQuery -->
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
      <!-- DataTables -->
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <!-------------------------------------------------------------------------------------------------------------------------------------------->

    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>AIU</title>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .center_auto {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
    <body>
        <div class="container form-group" style="font-size: 12px;">
        <?= form_open('contractinfoconform/conform_add') ?>
        <div class="page-header text-center">
            <?php if (empty($contract_list)) : ?>
            <p class="h2">契約情報登録画面</p>
            <?php else: ?>
            <p class="h2">契約情報変更画面</p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <?php if (empty($contract_list)) : ?>
            <div class="table-responsive">
            <table border="0" class="table">
                <tr><th width="120">保険種別</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="insurance_classification_id">
                            <?php foreach ($insurance_classification_mst as $row): ?>
                            <option value="<?= $row->insur_class_id ?>"><?= $row->insur_class_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th width="120">保険会社</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="insurance_company_id">
                            <?php foreach ($insurance_company_mst as $row): ?>
                            <option value="<?= $row->insur_corp_id ?>"><?= $row->insur_corp_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th>商品名</th><td colspan="6"><input class="form-control input-sm" type="text" name="brand_name" value="" /></td></tr>
                <tr><th width="120">区分</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="division">
                            <?php foreach ($corp_division_mst as $row): ?>
                            <option value="<?= $row->corp_div_id ?>"><?= $row->corp_div_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th>証券番号</th><td colspan="6"><input id="policy_number" class="form-control input-sm" type="text" name="policy_number" value="" /></td></tr>
                <tr><th>契約期間</th>
                    <td><input id="contract_period_y" class="form-control input-sm" type="text" name="contract_period_y" value="" /></td>
                    <td align="center" style="vertical-align: bottom">年</td>
                    <td><input id="contract_period_m" class="form-control input-sm" type="text" name="contract_period_m" value="" /></td>
                    <td align="center" style="vertical-align: bottom">ヶ月</td>
                    <td><input id="contract_period_d" class="form-control input-sm" type="text" name="contract_period_d" value="" /></td>
                    <td align="center" style="vertical-align: bottom">日</td>
                </tr>
                <tr><th>保険期間</th>
                    <td colspan="6"><input id="insurance_period" class="form-control input-sm" style="margin-right: 10px" type="date" name="insurance_period_start" value="" />
                        <p style="text-align: center; vertical-align: bottom; margin-top: 6px;">～</p>
                        <input id="after" class="form-control input-sm" type="date" name="insurance_period_end" value="" readonly />
                    </td>
                </tr>
                <tr><th>月P</th><td colspan="6"><input id="month_p" class="form-control input-sm" type="text" name="month_p" value="" /></td></tr>
                <tr><th>年払い</th><td colspan="6"><input id="yearly_payment" class="form-control input-sm" type="text" name="yearly_payment" value="" /></td></tr>
                <tr><th>ANP</th><td colspan="6"><input id="anp" class="form-control input-sm" type="text" name="anp" value="" readonly /></td></tr>
            </table>
            </div>
            <?php else: ?>
            <?php foreach ($contract_list as $row): ?>
            <div class="table-responsive">
            <table border="0" class="table">
                <tr><th width="120">保険種別</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="insurance_classification_id">
                            <?php foreach ($insurance_classification_mst as $row_mst): ?>
                            <option value="<?= $row_mst->insur_class_id ?>" <?php if ($row_mst->insur_class_id == $row->insurance_classification_id) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->insur_class_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th width="120">保険会社</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="insurance_company_id">
                            <?php foreach ($insurance_company_mst as $row_mst): ?>
                            <option value="<?= $row_mst->insur_corp_id ?>" <?php if ($row_mst->insur_corp_id == $row->insurance_company_id) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->insur_corp_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th>商品名</th><td colspan="6"><input class="form-control input-sm" type="text" name="brand_name" value="<?= $row->brand_name ?>" /></td></tr>
                <tr><th width="120">区分</th>
                    <td colspan="6">
                        <select class="form-control input-sm" name="division">
                            <?php foreach ($corp_division_mst as $row_mst): ?>
                            <option value="<?= $row_mst->corp_div_id ?>" <?php if ($row_mst->corp_div_id == $row->division) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->corp_div_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr><th>証券番号</th><td colspan="6"><input id="policy_number" class="form-control input-sm" type="text" name="policy_number" value="<?= $row->policy_number ?>" /></td></tr>
                <tr><th>契約期間</th>
                    <td><input id="contract_period_y" class="form-control input-sm" type="text" name="contract_period_y" value="<?= $row->contract_period_y ?>" /></td>
                    <td align="center" style="vertical-align: bottom">年</td>
                    <td><input id="contract_period_m" class="form-control input-sm" type="text" name="contract_period_m" value="<?= $row->contract_period_m ?>" /></td>
                    <td align="center" style="vertical-align: bottom">ヶ月</td>
                    <td><input id="contract_period_d" class="form-control input-sm" type="text" name="contract_period_d" value="<?= $row->contract_period_d ?>" /></td>
                    <td align="center" style="vertical-align: bottom">日</td>
                </tr>
                <tr><th>保険期間</th>
                    <td colspan="6"><input id="insurance_period" class="form-control input-sm" style="margin-right: 10px" type="date" name="insurance_period_start" value="<?= $row->insurance_period_start ?>" />
                        <p style="text-align: center; vertical-align: bottom; margin-top: 6px;">～</p>
                        <input id="after" class="form-control input-sm" type="date" name="insurance_period_end" value="<?= $row->insurance_period_end ?>" readonly />
                    </td>
                </tr>
                <tr><th>月P</th><td colspan="6"><input id="month_p" class="form-control input-sm" type="text" name="month_p" value="<?= $row->month_p ?>" /></td></tr>
                <tr><th>年払い</th><td colspan="6"><input id="yearly_payment" class="form-control input-sm" type="text" name="yearly_payment" value="<?= $row->yearly_payment ?>" /></td></tr>
                <tr><th>ANP</th><td colspan="6"><input id="anp" class="form-control input-sm" type="text" name="anp" value="<?= $row->anp ?>" readonly /></td></tr>
            </table>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="center_auto" style="margin-top: 10px; width: 150px;">
            <input class="btn btn-primary" style="width:150px" type="submit" value="完了"/>
        </div>
        <?= form_close(); ?>

    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript">
<!--
        $("#month_p").blur(function(){
            if($(this).val() != ""){
            $("#anp").val($("#month_p").val() * 12);
            $("#yearly_payment").attr("disabled", "disabled");
            } else {
                $("#yearly_payment").removeAttr("disabled");
                $("#anp").val('');
            }
        });
        $("#yearly_payment").blur(function(){
            if($(this).val() != ""){
            $("#anp").val($("#yearly_payment").val());
            $("#month_p").attr("disabled", "disabled");
            } else {
                $("#month_p").removeAttr("disabled");
                $("#anp").val('');
            }
        });
        $("#contract_period_y").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()-1));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#contract_period_m").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()-1));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#contract_period_d").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()-1));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#insurance_period").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()-1));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
//-->
</script>
</html>