<?php

namespace App\Services\WebServices;


class PermissionService
{


    //不要权限就能访问的组
    public static function getIgnorePermissionGroups()
    {
        return [
            'login', 'upload_to_tester', 'logout', 'index'
        ];
    }

    //不要权限就能访问的页面
    public static function getIgnorePermissions()
    {
        return [
            'admin.dashboard.index', 'admin.upload_to_tester', 'admin.login', 'admin.index', 'admin.logout', 'admin.merchant.index'

        ];
    }

    //不是权限组的页面
    public static function getIgnoreGroups()
    {
        return [
            'dashboard', 'index'
        ];
    }

    //需要获取权限的组数组
    public static function getPermissionGroupsMap()
    {
        return [
            'list' => '模块开发示例',
//            'info' => '信息管理',
//            'company' => '企业服务管理',
//            'operation' => '运营管理',
            'system' => '系统管理',
        ];
    }

    public static function isIgnored($permission)
    {
        return in_array($permission, self::getIgnorePermissions());
    }

    public static function getAdminRoutesGroups()
    {
        // 获取组名映射表
        $groups_map = self::getPermissionGroupsMap();

        // 获取或有路由
        $all_routes = app()['router']->getRoutes()->getRoutesByName();


        // 过滤总后台路由
        $admin_routes = array_filter($all_routes, function ($route) {
            return $route->getPrefix() === '/admin';
        });

        $routes_groups = [];


        // 按模块分组
        foreach ($admin_routes as $route) {
            $group = $route->action['group'] ?? false;

            // 过滤指定组
            if ($group && array_key_exists($group, $groups_map)) {
                $routes_groups[$group][] = $route;
            }
        }

        return $routes_groups;
    }
}
