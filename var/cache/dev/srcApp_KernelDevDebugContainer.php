<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJ85YJjf\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJ85YJjf/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJ85YJjf.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJ85YJjf\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerJ85YJjf\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'J85YJjf',
    'container.build_id' => 'fd816df2',
    'container.build_time' => 1549627267,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJ85YJjf');
