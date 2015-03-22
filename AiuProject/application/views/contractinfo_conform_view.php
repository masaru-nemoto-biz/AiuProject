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
        <?= form_open('contractinfoconform/conform') ?>
        <div class="page-header text-center">
            <?php if (empty($contract_list)) : ?>
            <p class="h2">契約情報登録画面</p>
            <?php else: ?>
            <p class="h2">契約情報変更画面</p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php if (empty($contract_list)) : ?>
            <div class="table-responsive">
            <table border="0" class="table">
                <tr>
                    <td width="70px">証券番号</td>
                    <td><input id="policy_number" class="form-control input-sm" type="text" name="policy_number" value="" /></td>
                    <td><input id="policy_branch_number" class="form-control input-sm" style="width:40px" type="text" name="policy_branch_number" value="" /></td>
                    <td width="70px">商品名</td>
                    <td><input class="form-control input-sm" type="text" name="brand_name" value="" /></td>
                    <td width="70px">担当者</td>
                    <td><input id="contract_owner" class="form-control input-sm" type="text" name="contract_owner" value="" /></td>
                </tr>
                </table>
                <table border="0" class="table">
                <tr>
                    <td width="70px">保険種別</td>
                    <td width="110px">
                        <select class="form-control input-sm" name="insurance_classification_id">
                            <?php foreach ($insurance_classification_mst as $row): ?>
                            <option value="<?= $row->insur_class_id ?>"><?= $row->insur_class_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="70px">保険会社</td>
                    <td width="110px">
                        <select class="form-control input-sm" name="insurance_company_id">
                            <?php foreach ($insurance_company_mst as $row): ?>
                            <option value="<?= $row->insur_corp_id ?>"><?= $row->insur_corp_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="50px">区分</td>
                    <td width="125px">
                        <select class="form-control input-sm" name="division">
                            <?php foreach ($corp_division_mst as $row): ?>
                            <option value="<?= $row->corp_div_id ?>"><?= $row->corp_div_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="70px">契約期間</td>
                    <td><input id="contract_period_y" class="form-control input-sm" type="text" name="contract_period_y" value="" /></td>
                    <td align="center" style="vertical-align: bottom">年</td>
                    <td><input id="contract_period_m" class="form-control input-sm" type="text" name="contract_period_m" value="" /></td>
                    <td align="center" style="vertical-align: bottom">ヶ月</td>
                    <td><input id="contract_period_d" class="form-control input-sm" type="text" name="contract_period_d" value="" /></td>
                    <td align="center" style="vertical-align: bottom">日</td>
                </tr>
                </table>
                <table border="0" class="table">
                <tr><td nowrap>保険期間</td>
                    <td><input id="insurance_period" class="form-control input-sm" type="date" name="insurance_period_start" value="" /></td>
                    <td><p style="text-align: center; vertical-align: bottom; margin-top: 6px;">～</p></td>
                    <td><input id="after" class="form-control input-sm" type="date" name="insurance_period_end" value="" readonly /></td>
                    <td nowrap>月額保険料</td>
                    <td width="125px"><input id="month_p" class="form-control input-sm" type="text" name="month_p" value="" /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>一時払い</td>
                    <td width="125px"><input id="yearly_payment" class="form-control input-sm" type="text" name="yearly_payment" value="" /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>年間保険料</td>
                    <td width="125px"><input id="anp" class="form-control input-sm" type="text" name="anp" value="" readonly /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>ステータス</td>
                    <td width="130px">
                        <select id="contract_status" class="form-control input-sm" name="contract_status">
                          <?php foreach ($contract_status_mst as $row_mst): ?>
                            <option value="<?= $row_mst->contract_status_id ?>"><?= $row_mst->contract_status_name ?></option>
                          <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            </div>
            <?php else: ?>
            <?php foreach ($contract_list as $row): ?>
            <div class="table-responsive">
            <table border="0" class="table">
                <tr>
                    <td width="70px">商品名</td>
                    <td><input class="form-control input-sm" type="text" name="brand_name" value="<?= $row->brand_name ?>" /></td>
                    <td width="70px">証券番号</td>
                    <td><input id="policy_number" class="form-control input-sm" type="text" name="policy_number" value="<?= $row->policy_number ?>" /></td>
                    <td><input id="policy_branch_number" class="form-control input-sm" style="width:40px" type="text" name="policy_branch_number" value="<?= $row->policy_branch_number ?>" /></td>
                    <td width="70px">担当者</td>
                    <td><input id="contract_owner" class="form-control input-sm" type="text" name="contract_owner" value="<?= $row->contract_owner ?>" /></td>
                </tr>
            </table>
            <table border="0" class="table">
                <tr>
                    <td width="70">保険種別</td>
                    <td width="110px">
                        <select class="form-control input-sm" name="insurance_classification_id">
                            <?php foreach ($insurance_classification_mst as $row_mst): ?>
                            <option value="<?= $row_mst->insur_class_id ?>" <?php if ($row_mst->insur_class_id == $row->insurance_classification_id) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->insur_class_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="70">保険会社</td>
                    <td width="110px">
                        <select class="form-control input-sm" name="insurance_company_id">
                            <?php foreach ($insurance_company_mst as $row_mst): ?>
                            <option value="<?= $row_mst->insur_corp_id ?>" <?php if ($row_mst->insur_corp_id == $row->insurance_company_id) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->insur_corp_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="50px">区分</td>
                    <td width="125px">
                        <select class="form-control input-sm" name="division">
                            <?php foreach ($corp_division_mst as $row_mst): ?>
                            <option value="<?= $row_mst->corp_div_id ?>" <?php if ($row_mst->corp_div_id == $row->division) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->corp_div_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="70px">契約期間</td>
                    <td><input id="contract_period_y" class="form-control input-sm" type="text" name="contract_period_y" value="<?= $row->contract_period_y ?>" /></td>
                    <td align="center" style="vertical-align: bottom">年</td>
                    <td><input id="contract_period_m" class="form-control input-sm" type="text" name="contract_period_m" value="<?= $row->contract_period_m ?>" /></td>
                    <td align="center" style="vertical-align: bottom">ヶ月</td>
                    <td><input id="contract_period_d" class="form-control input-sm" type="text" name="contract_period_d" value="<?= $row->contract_period_d ?>" /></td>
                    <td align="center" style="vertical-align: bottom">日</td>
                </tr>
            </table>
            <table border="0" class="table">
                <tr>
                    <td nowrap>保険期間</td>
                    <td><input id="insurance_period" class="form-control input-sm" type="date" name="insurance_period_start" value="<?= $row->insurance_period_start ?>" />
                    </td>
                    <td><p style="text-align: center; vertical-align: bottom; margin-top: 6px;">～</p></td>
                    <td><input id="after" class="form-control input-sm" type="date" name="insurance_period_end" value="<?= $row->insurance_period_end ?>" readonly /></td>
                    <td nowrap>月額保険料</td>
                    <td width="125px"><input id="month_p" class="form-control input-sm" type="text" name="month_p" value="<?= $row->month_p ?>" /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>一時払い</td>
                    <td width="125px"><input id="yearly_payment" class="form-control input-sm" type="text" name="yearly_payment" value="<?= $row->yearly_payment ?>" /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>年間保険料</td>
                    <td width="125px"><input id="anp" class="form-control input-sm" type="text" name="anp" value="<?= $row->anp ?>" readonly /></td>
                    <td align="center" style="vertical-align: bottom">円</td>
                    <td nowrap>ステータス</td>
                    <td width="130px">
                        <select id="contract_status" class="form-control input-sm" name="contract_status">
                            <?php foreach ($contract_status_mst as $row_mst): ?>
                            <option value="<?= $row_mst->contract_status_id ?>" <?php if ($row_mst->contract_status_id == $row->contract_status) :?>selected="selected"<?php endif; ?>>
                                        <?= $row_mst->contract_status_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th width="150px">車名</th>
                  <th width="150px">登録番号/車種</th>
                  <th width="120px">対人</th>
                  <th width="120px">対物</th>
                  <th width="120px">搭乗者</th>
                  <th width="150px">人身傷害</th>
                  <th width="150px">車両</th>
                  <th width="150px">備考</th>
                  <th width="100px">増車日/廃車日</th>
                  <th width="120px">保険料</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($car_list)) : ?>
                <?php foreach ($car_list as $rows => $row): ?>
                <tr>
                  <td><?= $rows+1 ?></td>
                  <td><input id="car_name" class="form-control input-sm" type="text" name="car_name<?= $row->carinfo_no ?>" value="<?= $row->car_name ?>" /></td>
                  <td>
                      <input id="regist_num" class="form-control input-sm" type="text" name="regist_num<?= $row->carinfo_no ?>" value="<?= $row->regist_num ?>" />
                      <input id="car_type" class="form-control input-sm" type="text" name="car_type<?= $row->carinfo_no ?>" value="<?= $row->car_type ?>" />
                  </td>
                  <td><input id="int_person" class="form-control input-sm" type="text" name="int_person<?= $row->carinfo_no ?>" value="<?= $row->int_person ?>" /></td>
                  <td><textarea class="form-control input-sm" name="int_object<?= $row->carinfo_no ?>" cols="120" rows="3" wrap="hard"><?= $row->int_object ?></textarea></td>
                  <td><input id="passenger" class="form-control input-sm" type="text" name="passenger<?= $row->carinfo_no ?>" value="<?= $row->passenger ?>" /></td>
                  <td><textarea class="form-control input-sm" name="personal_injury<?= $row->carinfo_no ?>" cols="120" rows="3" wrap="hard"><?= $row->personal_injury ?></textarea></td>
                  <td><textarea class="form-control input-sm" name="vehicle<?= $row->carinfo_no ?>" cols="120" rows="3" wrap="hard"><?= $row->vehicle ?></textarea></td>
                  <td><textarea class="form-control input-sm" name="remarks<?= $row->carinfo_no ?>" cols="120" rows="3" wrap="hard"><?= $row->remarks ?></textarea></td>
                  <td>
                      <input class="form-control input-sm" type="date" name="add_date<?= $row->carinfo_no ?>" value="<?= $row->add_date ?>" />
                      <input class="form-control input-sm" type="date" name="scrap_date<?= $row->carinfo_no ?>" value="<?= $row->scrap_date ?>" />
                  </td>
                  <td><input id="insurance" class="form-control input-sm" type="text" name="insurance<?= $row->carinfo_no ?>" value="<?= $row->insurance ?>" /></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                  <td><?php if (!empty($car_list)) : ?><?= $rows+2 ?><?php else: ?>1<?php endif; ?></td>
                  <td><input id="car_name" class="form-control input-sm" type="text" name="car_name" value="" /></td>
                  <td>
                      <input id="regist_num" class="form-control input-sm" type="text" name="regist_num" value="" />
                      <input id="car_type" class="form-control input-sm" type="text" name="car_type" value="" />
                  </td>
                  <td><input id="int_person" class="form-control input-sm" type="text" name="int_person" value="" /></td>
                  <td><textarea class="form-control input-sm" name="int_object" cols="120" rows="3" wrap="hard"></textarea></td>
                  <td><input id="passenger" class="form-control input-sm" type="text" name="passenger" value="" /></td>
                  <td><textarea class="form-control input-sm" name="personal_injury" cols="120" rows="3" wrap="hard"></textarea></td>
                  <td><textarea class="form-control input-sm" name="vehicle" cols="120" rows="3" wrap="hard"></textarea></td>
                  <td><textarea class="form-control input-sm" name="remarks" cols="120" rows="3" wrap="hard"></textarea></td>
                  <td>
                      <input class="form-control input-sm" type="date" name="add_date" value="" />
                      <input class="form-control input-sm" type="date" name="scrap_date" value="" />
                  </td>
                  <td><input id="insurance" class="form-control input-sm" type="text" name="insurance" value="" /></td>
                </tr>
              </tbody>
            </table>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
        <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="戻る"/>
        <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="登録"/>
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
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#contract_period_m").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#contract_period_d").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
        $("#insurance_period").blur(function(){
            var date1 = new Date($("#insurance_period").val());
            date1.setYear(date1.getFullYear()+Number($("#contract_period_y").val()));
            date1.setMonth(date1.getMonth()+Number($("#contract_period_m").val()));
            date1.setDate(date1.getDate() + Number($("#contract_period_d").val()));
            $("#after").val([date1.getFullYear(), ("0"+(date1.getMonth() + 1)).slice(-2), ("0"+date1.getDate()).slice(-2)].join('-'));
        });
//-->
</script>
</html>