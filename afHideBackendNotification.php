<?php

namespace afHideBackendNotification;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afHideBackendNotification.
 */
class afHideBackendNotification extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_hide_backend_notification.plugin_dir', $this->getPath());
        parent::build($container);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Backend_Index' => 'onBackend',
        ];
    }

    public function onBackend(\Enlight_Event_EventArgs $args)
    {
        $config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());
        $hideWarning = $config['warning'];
        $controller = $args->getSubject();
        $view = $controller->View();
        $request = $controller->Request();

        //$view->addTemplateDir($this->getPath(). '/Resources/views');
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views'
        );
        $args->getSubject()->View()->extendsTemplate('backend/afHideBackendNotification/index/index.tpl');
        $view->assign('hideGrowl', $hideWarning);
        //if($hideWarning){
        //}
    }

}
