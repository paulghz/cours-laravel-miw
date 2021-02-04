<?php

namespace App\Rights;

use App\User;

use Illuminate\Support\Facades\Auth

class Rights 
{
	private static $users = [];

	private static function loadUser($user_id) {

		if (isset(self::$users[$user_id])) {
			return
		}

		$user = User::with('roles.permissions')->findOrFail($user_id);

		foreach($user->roles as $role) {

			foreach($role->permissions as $permission) {

			}
		}

		self::$users[$user_id] = $user;
	}

    public static function can($user_id, $permission_slug) {

    	self::loadUser($user_id);
    	return self::findPermission($user_id, $permission_slug);
    }

    public static function canAtLeast($user_id, $permissions_slugs) {

    	self::loadUser($user_id);
    	foreach($permissions_slugs as $permission_slug) {
    		if (self::findPermission($user_id, $permission_slug)) {
    			return true;
    		}
    	}
    	return false;
    }

    public static function canAll($user_id, $permissions_slugs) {

    	self::loadUser($user_id);
    	foreach($permissions_slugs as $permission_slug) {
    		if (!self::findPermission($user_id, $permission_slug)) {
    			return false;
    		}
    	}
    	return true;
    }

    private static function authCan($permission_slug) {
    	return self::can(Auth::user()->id, $permission_slug);
    }

    private static function authCanAtLeast($permissions_slugs) {
    	return self::canAtLeast(Auth::user()->id, $permissions_slugs);
    }

    private static function authCanAll($permissions_slugs) {
    	return self::canAll(Auth::user()->id, $permissions_slugs);
    }

    private static function findPermission($user_id, $permission_slug) {

    	$user = self::$users[$user_id];

    	foreach($user->roles as $role) {
    		foreach($role->permissions as $permission) {
    			if ($permission->slug == $permission_slug) {
    				return true;
    			}
    		}
    	}
    	return false;
    }
}
