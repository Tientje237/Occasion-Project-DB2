<?php
/* Smarty version 5.1.0, created on 2024-06-27 11:28:44
  from 'file:AdminList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667d4cecb7b128_46274499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61f3ec0708486ac25af9f4e4cf33e034a3d5f0e8' => 
    array (
      0 => 'AdminList.tpl',
      1 => 1719487478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d4cecb7b128_46274499 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1454138847667d4cecb6d335_76136653', "content");
?>

<?php }
/* {block "content"} */
class Block_1454138847667d4cecb6d335_76136653 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
?>

    <title>Admin Dashboard</title>
    <br>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cars'), 'car');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('car')->value) {
$foreach0DoElse = false;
?>
        <div>
            <h2><?php echo $_smarty_tpl->getValue('car')->getBrand();?>
 <?php echo $_smarty_tpl->getValue('car')->getModel();?>
</h2>
            <p>€<?php echo $_smarty_tpl->getValue('car')->getPrice();?>
 | <?php echo $_smarty_tpl->getValue('car')->getYear();?>
 | <?php echo $_smarty_tpl->getValue('car')->getMileage();?>
km</p>
            <form method="POST" action="index.php?action=verwijderen">
                <input type="hidden" name="car_id" value="<?php echo $_smarty_tpl->getValue('car')->getID();?>
">
                <button type="submit" name="verwijderen">Verwijderen</button>
            </form>
        </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
