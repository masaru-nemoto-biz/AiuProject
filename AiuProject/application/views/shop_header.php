<div class="title_banner">
    <img class="img" src="<?=base_url();?>images/icons/shop_title.jpg"
         alt="ショッピング" width="580" height="70" />   
</div>

<p class="cart">
    【<?=anchor('shop/cart', '買い物カゴ');?>(<?=$item_count?>)】 &nbsp;
</p>

<div class="shop_search">
    <span>検索</span>
    <?=form_open('shop/search');?>
    <input type="text" name="q" value="" />
    <input type="submit" value="GO" />
    <?=form_close();?>
</div>