<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAgxCeLZ\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAgxCeLZ/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerAgxCeLZ.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerAgxCeLZ\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerAgxCeLZ\App_KernelDevDebugContainer([
    'container.build_hash' => 'AgxCeLZ',
    'container.build_id' => '13368e35',
    'container.build_time' => 1585221366,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAgxCeLZ');
