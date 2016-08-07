<?php

namespace UAM\Font\SinkinSans\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * SinkinSans bundle extension.
 *
 * @author     Olivier Pichon <op@united-asian.com>
 * @copyright  2016 Olivier Pichon
 */
class SinkinSansExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        $configs = $container->getExtensionConfig($this->getAlias());
        $config = $this->processConfiguration(new Configuration(), $configs);

        if (true === isset($bundles['AsseticBundle'])) {

            switch ($config['mode']) {
                case Configuration::MODE_SINGLE :
                    $this->configureSingleFont($container);
                    break;

                case Configuration::MODE_INDIVIDUAL :
                    $this->configureIndividualFonts($container);
                    break;
            }
        }
    }

    protected function configureSingleFont($container)
    {
        $container->prependExtensionConfig(
            'assetic',
            array(
                'assets' => array(
                    'sinkin_sans' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans.css',
                        ),
                    ),
                ),
            )
        );
    }

    protected function configureIndividualFonts($container)
    {
        $container->prependExtensionConfig(
            'assetic',
            array(
                'assets' => array(
                    'sinkin_sans_100' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-100.css',
                        ),
                    ),
                    'sinkin_sans_200' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-200.css',
                        ),
                    ),
                    'sinkin_sans_300' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-300.css',
                        ),
                    ),
                    'sinkin_sans_400' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-400.css',
                        ),
                    ),
                    'sinkin_sans_500' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-500.css',
                        ),
                    ),
                    'sinkin_sans_600' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-600.css',
                        ),
                    ),
                    'sinkin_sans_700' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-700.css',
                        ),
                    ),
                    'sinkin_sans_800' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-800.css',
                        ),
                    ),
                    'sinkin_sans_900' => array(
                        'inputs' => array(
                            'bundles/sinkinsans/css/sinkin-sans-900.css',
                        ),
                    ),
                ),
            )
        );
    }
}