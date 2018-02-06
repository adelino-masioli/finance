<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get(
        '/', function () use ($app) {
        $view = $app->service('view.renderer');
        if ($app->service('auth')->check()) {
            return $app->route('category.list');
        }
        return $view->render('auth/login.html.twig');
    }, 'auth.show_login_form_index'
    )
    ->get(
        '/login', function () use ($app) {
        $view = $app->service('view.renderer');
        if ($app->service('auth')->check()) {
            return $app->route('category.list');
        }
        return $view->render('auth/login.html.twig');
    }, 'auth.show_login_form'
    )
    ->post(
        '/login', function (ServerRequestInterface $request) use ($app) {
        $view = $app->service('view.renderer');
        $auth = $app->service('auth');
        $data = $request->getParsedBody();
        $result = $auth->login($data);
        if (!$result) {
            return $view->render('auth/login.html.twig');
        }
        return $app->route('category.list');
    }, 'auth.login'
    )
    ->get(
        '/logout', function () use ($app) {
        $app->service('auth')->logout();
        return $app->route('auth.show_login_form');
    }, 'auth.logout'
    );

$app->before(
    function () use ($app) {
        $route = $app->service('route');
        $auth = $app->service('auth');
        $routesWhiteList = [
            'auth.show_login_form',
            'auth.login',
            'category-costs.list'
        ];
        if (!in_array($route->name, $routesWhiteList) && !$auth->check()) {
            return $app->route('auth.show_login_form');
        }
    }
);