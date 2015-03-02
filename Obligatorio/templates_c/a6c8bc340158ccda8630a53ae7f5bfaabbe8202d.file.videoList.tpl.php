<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-28 12:18:00
         compiled from "templates\videoList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695154e64e48930040-80581404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6c8bc340158ccda8630a53ae7f5bfaabbe8202d' => 
    array (
      0 => 'templates\\videoList.tpl',
      1 => 1425134815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695154e64e48930040-80581404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e64e48ea0814_53351998',
  'variables' => 
  array (
    'videoPages' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e64e48ea0814_53351998')) {function content_54e64e48ea0814_53351998($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>2 Col Portfolio - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/2-col-portfolio.css" rel="stylesheet">
        <link href="css/starRating.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="faviconMovie.jpg">
    </head>

    <body>

        <div id="header"></div>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Video List
                        <small>All videos</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div id="videosContainer">
                <?php echo $_smarty_tpl->getSubTemplate ("videoPage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <hr>

            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#" class="firstPage disableClick">&laquo;</a>
                        </li>
                        <li>
                            <a href="#" class="previousPage disableClick">&lsaquo;</a>
                        </li>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['videoPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['videoPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                            <li  class="<?php if ($_smarty_tpl->tpl_vars['i']->value==1) {?>active<?php }
if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['videoPages']->value) {?>lastPageBtn<?php }
if ($_smarty_tpl->tpl_vars['i']->value==1) {?> firstPageBtn<?php }?>">
                                <a href="#" class="paginationBtn" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                            </li>                   
                        <?php }} ?>
                        <li>
                            <a href="#" class="nextPage <?php if ($_smarty_tpl->tpl_vars['videoPages']->value==1) {?>disableClick<?php }?>">&rsaquo;</a>
                        </li>
                        <li>
                            <a href="#" class="lastPage <?php if ($_smarty_tpl->tpl_vars['videoPages']->value==1) {?>disableClick<?php }?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" id="totalPages" value="<?php echo $_smarty_tpl->tpl_vars['videoPages']->value;?>
">
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container -->

        <div class="footer"></div>

        <!-- jQuery -->
        <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>

        <!-- Bootstrap Core JavaScript -->
        <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

        <!-- custom scripts -->
        <?php echo '<script'; ?>
 src="js/videoList.js"><?php echo '</script'; ?>
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
