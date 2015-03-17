<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 14:42:13
         compiled from "templates\videoList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695154e64e48930040-80581404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6c8bc340158ccda8630a53ae7f5bfaabbe8202d' => 
    array (
      0 => 'templates\\videoList.tpl',
      1 => 1426614125,
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
    'videosCountInPage' => 0,
    'videoPages' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e64e48ea0814_53351998')) {function content_54e64e48ea0814_53351998($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <link href="resources/css/starRating.css" rel="stylesheet">
    </head>

    <body>
        <div id="modalCommentsContainer"><?php echo $_smarty_tpl->getSubTemplate ("modalComments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
        <div id="header"><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
        <!-- Page Content -->
        <div class="container contentContainer">
            <div class="loadingOverlay"><img src="resources/img/loading.gif" alt="Loading..." height="100%" width="100%"></div>
            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Video List
                        <small>All videos</small>
                    </h1>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['videosCountInPage']->value>0) {?>
                <!-- /.row -->
                <div id="videosContainer">
                    <?php echo $_smarty_tpl->getSubTemplate ("videoPage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                <hr>

                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination videoListPagination">
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
                                <a href="" class="nextPage<?php if ($_smarty_tpl->tpl_vars['videoPages']->value==1) {?> disableClick <?php }?>}" data-page="2" title="Next page">&rsaquo;</a>
                            </li> 
                            <li>
                                <a href="" class="lastPage<?php if ($_smarty_tpl->tpl_vars['videoPages']->value==1) {?> disableClick <?php }?>" data-page="<?php echo $_smarty_tpl->tpl_vars['videoPages']->value;?>
" title="Last page">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                    <input type="hidden" id="totalPages" value="<?php echo $_smarty_tpl->tpl_vars['videoPages']->value;?>
">
                </div>
                <!-- /.row -->
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12 portfolio-item">
                        <h2>No available videos found.</h2>
                    </div>
                </div>
            <?php }?>
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
        <?php echo '<script'; ?>
 src="resources/js/youTubePlayer.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="resources/js/comments.js"><?php echo '</script'; ?>
>        

    </body>
</html>
<?php }} ?>
