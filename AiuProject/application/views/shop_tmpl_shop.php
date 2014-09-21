<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url();?>css/shop.css" type="text/css" />
    <title>CIショップ</title>
</head>
    
<body>
    <!--?=$this->load->view('shop_ci_header');?-->
    
    <div id="main">
        <div class="header"><?=$header?></div>
        <div class="menu"><?=$menu?></div>
        <div class="main_shop"><?=$main?></div>
    </div>
    
    <?=$this->load->view('ci_footer');?>
</body>
</html>