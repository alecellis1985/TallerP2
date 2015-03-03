<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-03 00:26:52
         compiled from "templates\videoList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:663454f1d1c5dac580-22839531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02c05dd2c7c1bc30adde73c684ae976d3f0acba5' => 
    array (
      0 => 'templates\\videoList.tpl',
      1 => 1425350771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '663454f1d1c5dac580-22839531',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f1d1c5eccf48_06368168',
  'variables' => 
  array (
    'videoPages' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f1d1c5eccf48_06368168')) {function content_54f1d1c5eccf48_06368168($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>2 Col Portfolio - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="resources/css/2-col-portfolio.css" rel="stylesheet">
        <link href="resources/css/starRating.css" rel="stylesheet">
        <link href="resources/css/main.css" rel="stylesheet">
        <link href="resources/css/common.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="resources/img/faviconMovie.jpg">
    </head>

    <body>

        <div id="header"><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

        <!-- Page Content -->
        <div class="container">
            <div class="loadingOverlay"><img src="resources/img/loading.gif" alt="Loading..." height="100%" width="100%"></div>
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
                            <a href="" class="firstPage disableClick" data-page="1" title="First page">&laquo;</a>
                        </li>
                        <li>
                            <a href="" class="previousPage disableClick" title="Previous page">&lsaquo;</a>
                        </li>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['videoPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['videoPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>

                            <li <?php if ($_smarty_tpl->tpl_vars['i']->value==1) {?> class="active"<?php }?>>
                                <a href="" class="paginationBtn" data-page="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>

                            </li>                   
                        <?php }} ?>
                        <li>
                            <a href="" class="nextPage" data-page="2" title="Next page">&rsaquo;</a>
                        </li> 
                        <li>
                            <a href="" class="lastPage" data-page="<?php echo $_smarty_tpl->tpl_vars['videoPages']->value;?>
" title="Last page">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" id="totalPages" value="<?php echo $_smarty_tpl->tpl_vars['videoPages']->value;?>
">
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="footer"><?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
        
        <?php echo '<script'; ?>
 src="resources/js/libs/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/libs/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/jquery.loadTemplate-1.4.4.min"><?php echo '</script'; ?>
>
        <!-- custom scripts -->
        <?php echo '<script'; ?>
 src="resources/js/main.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/helper.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/videoList.js"><?php echo '</script'; ?>
>        
        
    </body>
</html>
<?php }} ?>
