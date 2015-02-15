<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.6.0.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
Se hai qualche domanda contattaci al nostro
indirizzo email <a href="mailto:{{var store_email}}">{{var store_email}}</a>,
o telefonicamente al <a href="tel:{{var store_phone}}">{{var store_phone}}</a>,
attraverso <a title=\"Mio servizio Skype\" href=\"skype:mi.tienda?chat\" target=\"_blank\">Skype-Chat</a> (Username: mi.tienda)
o sulla <a title=\"Mia pagina fan su Facebook\" href=\"http://www.facebook.com/mi.tienda\" target=\"_blank\">nostra fan page di Facebook</a>.
EOD;

$storeId = 9;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (it)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Benvenuto su',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (it)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (it)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'Grazie ancora per la vostra fiducia!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in IT German LocalePack");
    }
}

$installer->endSetup();

?>
