<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?= base_url(); ?>css/bootstrap.css" rel="stylesheet"/>
        <title>AIU</title>
        <!-- ビューポートの設定-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }
            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>
    </head>
    <body>
        <?=form_open('login/success')?>
        <div class="container form-group">
            <div class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" class="form-control input-sm" placeholder="User" name="user">
                <input type="password" class="form-control input-sm" placeholder="Password" name="password">

                <input class="btn btn-primary" type="submit" name="move" value="Sign in"/>
                <div style="text-align: right">
                <input class="btn btn-xs btn-primary" type="submit" name="move" value="user manage"/>
                </div>
            </div>
        </div>
        <?=form_close();?>
    </body>
    <!-- jQueryの読み込み-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Bootstrapで使うJavaScriptの読み込み-->
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
</html>