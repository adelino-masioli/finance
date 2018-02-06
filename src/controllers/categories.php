<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Psr\Http\Message\ServerRequestInterface;


$app
    ->get(
        '/category', function () use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category.repository');
            $auth = $app->service('auth');
            $categories = $repository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'category/list.html.twig', [
                'categories' => $categories
                ]
            );
        }, 'category.list'
    )
    ->get(
        '/category/new', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render('category/create.html.twig');
        }, 'category.new'
    )
    ->post(
        '/category/store', function (ServerRequestInterface $request) use ($app) {
            $data = $request->getParsedBody();
            $repository = $app->service('category.repository');
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $repository->create($data);
            return $app->route('category.list');
        }, 'category.store'
    )
    ->get(
        '/category/{id}/edit', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $category = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'category/edit.html.twig', [
                'category' => $category
                ]
            );
        }, 'category.edit'
    )
    ->post(
        '/category/{id}/update', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('category.repository');
            $id = $request->getAttribute('id');
            $data = $request->getParsedBody();
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $repository->update(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ], $data
            );
            return $app->route('category.list');
        }, 'category.update'
    )
    ->get(
        '/category/{id}/show', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('category.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $category = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'category/show.html.twig', [
                'category' => $category
                ]
            );
        }, 'category.show'
    )
    ->get(
        '/category/{id}/delete', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('category.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $repository->delete(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $app->route('category.list');
        }, 'category.delete'
    );