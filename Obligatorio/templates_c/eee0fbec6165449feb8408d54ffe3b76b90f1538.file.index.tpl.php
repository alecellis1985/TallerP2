<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-02 22:46:23
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2489954f1d0de60cbf6-39540379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee0fbec6165449feb8408d54ffe3b76b90f1538' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1425347104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2489954f1d0de60cbf6-39540379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f1d0de6c5403_62285886',
  'variables' => 
  array (
    'mainVideo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d0de6c5403_62285886')) {function content_54f1d0de6c5403_62285886($_smarty_tpl) {?><!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MyCompany Videos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="resources/css/normalize.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="resources/img/faviconMovie.jpg">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/common.css">
    </head>

    <body>
        <!-- Navigation -->
        <div id="header"><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
        
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
                    <img class="companyLogo"src='resources/img/companyLogo.png' alt='Blast off with Bootstrap' />
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 portfolio-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['mainVideo']->value[0]['url'];?>
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

        <div class="footer"><?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

        <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-1.11.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="resources/js/jquery.js"><\/script>')<?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="resources/css/bootstrap.css">');
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/plugins.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/helper.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/main.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }} ?>
