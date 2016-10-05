Pimple bridge for PSR-11 Container
==================================

[PSR-11](https://github.com/container-interop/fig-standards/blob/master/proposed/container.md) is 
a standardised interface to access services defined in dependency injection containers.

[Pimple](https://github.com/container-interop/fig-standards/blob/master/proposed/container.md) is
the kind of library that should implement this interface. But it can't because Silex, le micro-framework
on top of Pimple, declares a method `Silex\Application::get` that conflicts with `Psr\Container\ContainerInterface::get`

Usage
=====

Using Pimple, register the `PimpleContaineProvider` and create a new service that exposes
Pimple' services through the `Psr\Container\ContainerInterface`:

    $pimple = new Container\Pimple()
    $pimple->register(new GromNaN\Pimple\PimpleContainerProvider());
    
    // Access the services
    $pimple['container']->has('my.service');
    $pimple['container']->get('my.service');

The service `$pimple['container']` can be injected into any service that require a Standard Container implementation.