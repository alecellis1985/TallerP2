<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-27 12:01:09
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276854f086b5dbb433-12109124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cc7b08b058169aafa9d586d776e281382af123c' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1424368719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276854f086b5dbb433-12109124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mainVideo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f086b64a6700_38607739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f086b64a6700_38607739')) {function content_54f086b64a6700_38607739($_smarty_tpl) {?><!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="faviconMovie.jpg">

    </head>

    <body>
        <!-- Navigation -->
        <div id="header"></div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
        <div class="container" style="margin-top: 70px;">

            <div class="row">
                <div class="col-md-6 portfolio-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['url'];?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        <a href="#"><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['client'];?>
</a>
                    </h3>
                    <p><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['description'];?>
</p>
                </div>
            </div>

        </div>

        <div class="footer"></div>
        
        <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-1.11.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="js/jquery.js"><\/script>')<?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="css/bootstrap.css">');
        <?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="js/plugins.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
>
            $(function () {
                $("#header").load("header.html");
                $(".footer").load("footer.html");
            });
        <?php echo '</script'; ?>
> 

    </body>
</html>
<?php }} ?>
