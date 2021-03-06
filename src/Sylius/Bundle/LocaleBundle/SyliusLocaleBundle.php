<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\LocaleBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Locale\Model\LocaleInterface;

/**
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
class SyliusLocaleBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
            SyliusResourceBundle::DRIVER_DOCTRINE_MONGODB_ODM,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelInterfaces()
    {
        return [
            LocaleInterface::class => 'sylius.model.locale.class',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Sylius\Component\Locale\Model';
    }
}
