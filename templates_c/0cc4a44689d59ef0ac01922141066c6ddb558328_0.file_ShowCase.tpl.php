<?php
/* Smarty version 5.1.0, created on 2024-06-26 15:21:52
  from 'file:ShowCase.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_667c3210da75e7_73419953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cc4a44689d59ef0ac01922141066c6ddb558328' => 
    array (
      0 => 'ShowCase.tpl',
      1 => 1719415119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667c3210da75e7_73419953 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_745813521667c3210d90ad9_62531253', "contentShowCase");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'Layout.tpl', $_smarty_current_dir);
}
/* {block "contentShowCase"} */
class Block_745813521667c3210d90ad9_62531253 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\occasion\\templates';
?>

    <h1>Alle aanbod:</h1>
    <?php if (!empty($_smarty_tpl->getValue('allCars'))) {?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('allCars'), 'car');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('car')->value) {
$foreach0DoElse = false;
?>
            <div>
                <?php echo $_smarty_tpl->getValue('car')->printVehicleInfo();?>

                <form method="post" action="index.php?action=favorieten">
                    <input type="hidden" name="car_id" value="<?php echo $_smarty_tpl->getValue('car')->getId();?>
">
                    <input type="hidden" name="addFavorite" value="<?php echo $_smarty_tpl->getValue('car')->printVehicleInfo();?>
">
                    <button type="submit">
                        <?php if ($_smarty_tpl->getValue('car')->isFavorite()) {?>Verwijder uit favorieten<?php } else { ?>Voeg toe aan favorieten<?php }?>
                    </button>
                </form>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <p>Er zijn momenteel geen auto's beschikbaar.</p>
    <?php }
}
}
/* {/block "contentShowCase"} */
}
