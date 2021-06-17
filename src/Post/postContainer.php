<?php

declare(strict_types=1);

use App\Core\Database;
use App\Post\Controller\PostController;
use App\Post\Repositories\Factories\PostFactory;
use App\Post\Repositories\Mappers\PostMapper;
use App\Post\Repositories\PostRepository;
use App\Post\Repositories\Readers\PostReader;
use App\Post\Repositories\Writers\PostWriter;
use App\Post\Services\PostService;
use League\Container\Container;

return function (Container $container) {

    $container->add(PostController::class)->addArgument(PostService::class);
    $container->add(PostService::class)->addArguments([PostRepository::class, PostFactory::class]);
    $container->add(PostRepository::class)->addArguments([PostReader::class, PostWriter::class, PostMapper::class]);
    $container->add(PostMapper::class)->addArgument(PostFactory::class);
    $container->add(PostFactory::class);
    $container->add(PostReader::class)->addArgument(Database::class);
    $container->add(PostWriter::class)->addArgument(Database::class);

};