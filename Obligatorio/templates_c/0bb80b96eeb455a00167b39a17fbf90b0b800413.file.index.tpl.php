<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-27 12:46:55
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1224254e3e2f5486148-60738450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bb80b96eeb455a00167b39a17fbf90b0b800413' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1425052013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1224254e3e2f5486148-60738450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e3e2f5e0d688_59145839',
  'variables' => 
  array (
    'mainVideo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3e2f5e0d688_59145839')) {function content_54e3e2f5e0d688_59145839($_smarty_tpl) {?><!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MyCompany Videos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <div class="row bottom bottom-buffer">
                <div class="col-md-6 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <p> We are a film producer company that offer our clients high quality custom videos for their business. Bla
                            Bla Bla Bla Bla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla Bla
                            Bla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla Bla.</p>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <img class="companyLogo"src='img/companyLogo.png' alt='Blast off with Bootstrap' />
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 portfolio-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['url'];?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        <a href="#"><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['client'];?>
</a>
                    </h3>
                    <!-- TODO: Cambiar esto por rating con estrellas y dejar la descripcion en la siguiente columna-->
                    <p><?php echo $_smarty_tpl->tpl_vars['mainVideo']->value['description'];?>
</p>
                </div>
                
                <div class="col-md-5 col-md-offset-1">
                    <h3>
                        <i>MyCompany films</i> featured Video
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
