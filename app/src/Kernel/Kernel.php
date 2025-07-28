<?php

namespace App\Kernel;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\YamlFileLoader as RoutingYamlLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Config\FileLocator;

class Kernel extends BaseKernel
{
    public function registerBundles(): array
    {
        return [];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load($this->getProjectDir() . '/config/services.yaml');
    }

    public function getProjectDir(): string
    {
        return dirname(__DIR__, 2);
    }

    public function getCacheDir(): string
    {
        return $this->getProjectDir() . '/cache';
    }

    public function getLogDir(): string
    {
        return $this->getProjectDir() . '/logs';
    }

    /**
     * Загружает маршруты из YAML файла
     */
    public function loadRoutes(): RouteCollection
    {
        $fileLocator = new FileLocator($this->getProjectDir() . '/config');
        $loader = new RoutingYamlLoader($fileLocator);
        return $loader->load('routes.yaml');
    }

    /**
     * Переопределяем метод для установки параметров в контейнере
     */
    protected function buildContainer(): ContainerBuilder
    {
        $container = parent::buildContainer();
        
        // Устанавливаем параметры вручную
        $container->setParameter('kernel.project_dir', $this->getProjectDir());
        $container->setParameter('kernel.cache_dir', $this->getCacheDir());
        $container->setParameter('kernel.logs_dir', $this->getLogDir());
        
        return $container;
    }
} 