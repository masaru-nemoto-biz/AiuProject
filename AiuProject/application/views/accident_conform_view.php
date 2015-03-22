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
        .table-style {
            white-space: nowrap;
        }
    </style>
</head>
    <body>
      <div class="container form-group" style="font-size: 12px;">
        <?= form_open('accidentconform/contractInfoList_conform') ?>
        <div class="page-header text-center">
            <p class="h2">事故進捗状況の明細画面</p>
        </div>
<?php foreach ($acc_list as $row_acc_list): ?>
<div >
        <div class="row">
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:100px">証券番号</td>
                        <td>
                            <?php foreach ($contract_list as $row): ?>
                              <?= $row->policy_number ?><?= '-'.$row->policy_branch_number ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr><td style="width:100px">事故受付番号</td>
                        <td>
                            <?php if (!empty($row_acc_list)) : ?>
                                <input class="form-control input-sm" type="text" name="acc_id<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->acc_id ?>" readonly="readonly" />
                            <?php else: ?>
                                <input class="form-control input-sm" type="text" name="acc_id" value="" />
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td width="70">事故</td>
                        <td width="200">
                          <?php if (!empty($row_acc_list)) : ?>
                            <input class="form-control input-sm" type="text" name="acc_contents<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->acc_contents ?>" />
                          <?php else: ?>
                            <input class="form-control input-sm" type="text" name="acc_contents" value="" />
                          <?php endif; ?>
                        </td>
                    </tr>
                    <tr><td style="width:100px">発生日時</td>
                        <td>
                          <?php if (!empty($row_acc_list)) : ?>
                              <input class="form-control input-sm" type="date" name="occurrence_date<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->occurrence_date ?>" />
                          <?php else: ?>
                              <input class="form-control input-sm" type="date" name="occurrence_date" value="" />
                          <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:100px">損サ担当</td>
                        <td colspan="2">
                            <?php if (!empty($row_acc_list)) : ?>
                              <input class="form-control input-sm" type="text" name="sonsa<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->sonsa ?>" />
                            <?php else: ?>
                              <input class="form-control input-sm" type="text" name="sonsa" value="" />
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr><td style="width:100px">連絡先</td>
                        <td colspan="2">
                            <?php if (!empty($row_acc_list)) : ?>
                              <input class="form-control input-sm" type="text" name="acc_phone<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->acc_phone ?>" />
                            <?php else: ?>
                              <input class="form-control input-sm" type="text" name="acc_phone" value="" />
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr><td style="width:100px">支払い</td>
                        <td>
                            <?php if (!empty($row_acc_list)) : ?>
                              <input class="form-control input-sm" type="text" name="payment<?= $row_acc_list->acc_id ?>" value="<?= $row_acc_list->payment ?>" />
                            <?php else: ?>
                              <input class="form-control input-sm" type="text" name="payment" value="" />
                            <?php endif; ?>
                        </td>
                        <td align="center" style="vertical-align: bottom">円</td>
                    </tr>
                    <tr><td style="width:100px">ステータス</td>
                        <td colspan="2">
                            <?php if (!empty($row_acc_list)) : ?>
                              <select class="form-control input-sm" name="acc_status_id<?= $row_acc_list->acc_id ?>">
                                <?php foreach ($accident_status_mst as $row_accident_status): ?>
                                  <option value="<?= $row_accident_status->acc_status_id ?>" <?php if ($row_accident_status->acc_status_id == $row_acc_list->acc_status_id) :?>selected="selected"<?php endif; ?>>
                                    <?= $row_accident_status->acc_status_name ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            <?php else: ?>
                              <select class="form-control input-sm" name="acc_status_id<?= $row_acc_list->acc_id ?>">
                                <?php foreach ($accident_status_mst as $row_accident_status): ?>
                                  <option value="<?= $row_accident_status->acc_status_id ?>">
                                    <?= $row_accident_status->acc_status_name ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed">
            <thead><tr><th class="table-style"><a class="btn btn-info btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $row_acc_list->acc_id ?>">状況</a></th></tr></thead>
          </table>
          <div id="collapseOne<?= $row_acc_list->acc_id ?>" class="collapse">
            <div class="table-responsive">
              <table id="table_id1" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th class="table-style">日時</th>
                  <th class="table-style">状況</th>
                  <th class="table-style">担当者</th>
                </tr>
              </thead>
                <?php if (!empty($acc_detail_list)) : ?>
                <?php foreach ($acc_detail_list as $row): ?>
                <?php if ($row->acc_id == $row_acc_list->acc_id) :?>
                <tr>
                  <td class="table-style">
                    <input class="form-control input-sm" type="date" name="upd_date<?= $row->acc_status_id ?>" value="<?= $row->upd_date ?>" />
                  </td>
                  <td class="table-style">
                    <textarea class="form-control input-sm" name="status_quo<?= $row->acc_status_id ?>" cols="120" rows="7" wrap="hard"><?= $row->status_quo ?></textarea>
                  </td>
                  <td class="table-style"><input type="text" name="upd_user<?= $row->acc_status_id ?>" value="<?= $row->upd_user ?>" /></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                  <td class="table-style">
                    <input class="form-control input-sm" type="date" name="upd_date_new<?= $row_acc_list->acc_id ?>" value="" />
                  </td>
                  <td class="table-style">
                    <textarea class="form-control input-sm" name="status_quo_new<?= $row_acc_list->acc_id ?>" cols="120" rows="7" wrap="hard"></textarea>
                  </td>
                  <td class="table-style"><input type="text" name="upd_user_new<?= $row_acc_list->acc_id ?>" value="" /></td>
                </tr>
              </table>
            </div>
          </div>
          </div>
        </div>
</div>
<?php endforeach; ?>
<div >
        <div class="row">
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:100px">証券番号</td>
                        <td>
                            <?php foreach ($contract_list as $row): ?>
                              <?= $row->policy_number ?><?= '-'.$row->policy_branch_number ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr><td style="width:100px">事故受付番号</td>
                        <td>
                            <input class="form-control input-sm" type="text" name="acc_id_new" value="" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td width="70">事故</td>
                        <td width="200">
                            <input class="form-control input-sm" type="text" name="acc_contents_new" value="" />
                        </td>
                    </tr>
                    <tr><td style="width:100px">発生日時</td>
                        <td>
                            <input class="form-control input-sm" type="date" name="occurrence_date_new" value="" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-condensed">
                    <tr><td style="width:100px">損サ担当</td>
                        <td colspan="2">
                            <input class="form-control input-sm" type="text" name="sonsa_new" value="" />
                        </td>
                    </tr>
                    <tr><td style="width:100px">連絡先</td>
                        <td colspan="2">
                            <input class="form-control input-sm" type="text" name="acc_phone_new" value="" />
                        </td>
                    </tr>
                    <tr><td style="width:100px">支払い</td>
                        <td>
                            <input class="form-control input-sm" type="text" name="payment_new" value="" />
                        </td>
                        <td align="center" style="vertical-align: bottom">円</td>
                    </tr>
                    <tr><td style="width:100px">ステータス</td>
                        <td colspan="2">
                            <select class="form-control input-sm" name="acc_status_id_new">
                              <?php foreach ($accident_status_mst as $row_accident_status): ?>
                                <option value="<?= $row_accident_status->acc_status_id ?>">
                                  <?= $row_accident_status->acc_status_name ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div>
        <div class="center_auto" style="margin-top: 10px; width: 310px;">
            <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="戻る"/>
            <input class="btn btn-primary" style="width:150px" type="submit" name="move" value="登録"/>
        </div>
        <?= form_close(); ?>
        </div>
      </div>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script>
        $("#table_id").dataTable();
    </script>
</html>