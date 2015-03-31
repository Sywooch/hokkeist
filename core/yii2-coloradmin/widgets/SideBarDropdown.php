<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace siasoft\coloradmin\widgets;
use yii\helpers\Html;


/**
 * Dropdown renders a Bootstrap dropdown menu component.
 *
 * @see http://getbootstrap.com/javascript/#dropdowns
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @since 2.0
 */
class SideBarDropdown extends \yii\bootstrap\Dropdown
{
    public function init()
    {
        Html::addCssClass($this->options, 'sub-menu');
    }
}
