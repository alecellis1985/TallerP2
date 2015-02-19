<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-19 16:16:36
         compiled from "templates\videoList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1794654e48c764a8989-85069292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dfbdd5cd0504e1a029e24c63a008464d73684cd' => 
    array (
      0 => 'templates\\videoList.tpl',
      1 => 1424373394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1794654e48c764a8989-85069292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e48c765d3cf6_76181599',
  'variables' => 
  array (
    'videos' => 0,
    'pair' => 0,
    'video' => 0,
    'videoPages' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e48c765d3cf6_76181599')) {function content_54e48c765d3cf6_76181599($_smarty_tpl) {?><!DOCTYPE html>
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


            <!-- Projects Row -->
            <?php  $_smarty_tpl->tpl_vars['pair'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pair']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pair']->key => $_smarty_tpl->tpl_vars['pair']->value) {
$_smarty_tpl->tpl_vars['pair']->_loop = true;
?>
                <div class="row">
                    <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pair']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
                        <div class="col-md-6 portfolio-item">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['video']->value['url'];?>
?rel=0" frameborder="0" allowfullscreen></iframe>
                            <h3>
                                <a href="#"><?php echo $_smarty_tpl->tpl_vars['video']->value['client'];?>
</a>
                            </h3>
                            <p class="starRating"></p>
                            <p><?php echo $_smarty_tpl->tpl_vars['video']->value['description'];?>
</p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <!-- /.row -->


            <hr>

            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#" class="firstPage">&laquo;</a>
                        </li>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['videoPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['videoPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                            <li <?php if ($_smarty_tpl->tpl_vars['i']->value==1) {?> class="active"<?php }?>>
                                <a href="#" class="paginationBtn"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                            </li>                   
                        <?php }} ?> 
                        <li>
                            <a href="#" class="lastPage">&raquo;</a>
                        </li>
                    </ul>
                </div>
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
 src="js/index.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
>
            $(function () {
                $("#header").load("header.html");
                $(".starRating").load("starRating.html");
                $(".footer").load("footer.html");
            });
        <?php echo '</script'; ?>
> 

    </body>

</html>
<?php }} ?>
