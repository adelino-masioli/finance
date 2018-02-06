<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get(
        '/pays', function () use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('pay.repository');
            $auth = $app->service('auth');
            $pays = $repository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'pays/list.html.twig', [
                'pays' => $pays
                ]
            );
        }, 'pays.list'
    )
    ->get(
        '/pays/new', function () use ($app) {
            $view = $app->service('view.renderer');
            $auth = $app->service('auth');
            $categoryRepository = $app->service('category.repository');
            $categories = $categoryRepository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'pays/create.html.twig', [
                'categories' => $categories
                ]
            );
        }, 'pays.new'
    )
    ->post(
        '/pays/store', function (ServerRequestInterface $request) use ($app) {
            $data = $request->getParsedBody();
            $repository = $app->service('pay.repository');
            $categoryRepository = $app->service('category.repository');
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $data['category_id'] = $categoryRepository->findOneBy(
                [
                'id' => $data['category_id'],
                'user_id' => $auth->user()->getId()
                ]
            )->id;
            $repository->create($data);
            return $app->route('pays.list');
        }, 'pays.store'
    )
    ->get(
        '/pays/{id}/edit', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            $categoryRepository = $app->service('category.repository');
            $categories = $categoryRepository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'pays/edit.html.twig', [
                'pay' => $bill,
                'categories' => $categories
                ]
            );
        }, 'pays.edit'
    )
    ->post(
        '/pays/{id}/update', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('pay.repository');
            $categoryRepository = $app->service('category.repository');
            $id = $request->getAttribute('id');
            $data = $request->getParsedBody();
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $data['category_id'] = $categoryRepository->findOneBy(
                [
                'id' => $data['category_id'],
                'user_id' => $auth->user()->getId()
                ]
            )->id;
            $repository->update(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ], $data
            );
            return $app->route('pays.list');
        }, 'pays.update'
    )
    ->get(
        '/pays/{id}/show', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'pays/show.html.twig', [
                'pay' => $bill
                ]
            );
        }, 'pays.show'
    )
    ->get(
        '/pays/{id}/delete', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $repository->delete(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $app->route('pays.list');
        }, 'pays.delete'
    );