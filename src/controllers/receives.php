<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Psr\Http\Message\ServerRequestInterface;


$app
    ->get(
        '/receives', function () use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('receive.repository');
            $auth = $app->service('auth');
            $receives = $repository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'receives/list.html.twig', [
                'receives' => $receives
                ]
            );
        }, 'receives.list'
    )
    ->get(
        '/receives/new', function () use ($app) {
            $view = $app->service('view.renderer');
            return $view->render('receives/create.html.twig');
        }, 'receives.new'
    )
    ->post(
        '/receives/store', function (ServerRequestInterface $request) use ($app) {
            $data = $request->getParsedBody();
            $repository = $app->service('receive.repository');
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $repository->create($data);
            return $app->route('receives.list');
        }, 'receives.store'
    )
    ->get(
        '/receives/{id}/edit', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('receive.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'receives/edit.html.twig', [
                'receive' => $bill
                ]
            );
        }, 'receives.edit'
    )
    ->post(
        '/receives/{id}/update', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('receive.repository');
            $id = $request->getAttribute('id');
            $data = $request->getParsedBody();
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $repository->update(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ], $data
            );
            return $app->route('receives.list');
        }, 'receives.update'
    )
    ->get(
        '/receives/{id}/show', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('receive.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'receives/show.html.twig', [
                'receive' => $bill
                ]
            );
        }, 'receives.show'
    )
    ->get(
        '/receives/{id}/delete', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('receive.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $repository->delete(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $app->route('receives.list');
        }, 'receives.delete'
    );