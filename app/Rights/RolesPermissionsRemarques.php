<?php

namespace App\Rights;

class RolesPermissionsRemarques 
{
	// Boucle bonus
	// C'est canAtLeast ça

    static public function canAll($user_id, $permissions_names){

        $users = User::where('id', $user_id)->with('roles.permissions')->where('id', $user_id)->get(); // 1
        $is_Ok = false;

        foreach ($users as $user){ // 1
            foreach ($user->roles as $role){
                foreach ($role->permissions as $permission){
                    foreach ($permissions_names as $permissions_name) {
                        if ($permission->name == $permissions_name) {
                            $is_Ok = true; // 2
                        }
                    }
                }
            }
        }
        return $is_Ok;
    }

    ////////////////////////////////////////////////

    // Réutiliser c'est bien, mais ...
    // Optimiser aussi

    public static function can($user_id, $permission_name)
    {
        $permissions = \App\User::find($user_id)->permissions();

        return $permissions->contains('name', $permission_name);
    }

    public static function canAll($user_id, $permissions_names)
    {
        for ($i = 0; $i < count($permissions_names); $i++) {
            if (!Rights::can($user_id, $permissions_names[$i])) return false;
        }
        return true;
    }

    ////////////////////////////////////////////////

    // Si vrai alors vrai
    // 2 algos différents

    public static function canAll(int $id_user, array $permissions_name): bool
    {
        $countPermissions = 0;
        foreach ($permissions_name as $permission_name) {
            if (Rights::can($id_user, $permission_name)) {
                $countPermissions++;
            }
        }
        return  $countPermissions == count($permissions_name) ? true : false;
    }

    public static function canAtLeast(string $id_user, array $permissions_name): bool
    {
        foreach ($permissions_name as $permission_name) {
            if (Rights::can($id_user, $permission_name)) {
                return true;
            }
        }
        return false;
    }

    ////////////////////////////////////////////////

    // 4 lignes gratuites

    public static function canAtLeast($user_id, $permissions_names){ 
        $permissions = collect([]);
        foreach ($permissions_names as $permission_name){
            $permissions = $permissions->concat([$permission_name]);
        }
     
        foreach($permissions as $permission){
            if(Rights::can($user_id,$permission)){
                return true;
            }
        }
        return false;
    }

    ////////////////////////////////////////////////

    // (Si vrai alors vrai)
    // Requêtes gratuiiiites (optimisation) ...

    public static function can($user_id, $permission_name){

        $permission_id = Permission::where('name', $permission_name)->first()->id; // 1
        $roles = Permission::find($permission_id)->roles; // 1
        foreach ($roles as $role){ 
            if (User::find($user_id)->hasRole($role->name)){ // return $this->roles->contains('name', $role); // 2
                return true;
            }
        }
        return false;

    }

    public static function canAll($user_id, $permissions){

        $verif = 0;

        foreach ($permissions as $permission){

            $permission_id = Permission::where('name', $permission)->first()->id;
            $roles = Permission::find($permission_id)->roles;
            foreach ($roles as $role){ 
                if (User::find($user_id)->hasRole($role->name)){
                    $verif++;   //J'incrémente de 1 la verif a chaque fois que l'utilisateur possède la permission
                }
            }
        }

        if($verif == count($permissions)){
            return true;
        }
        return false;
    }

    ////////////////////////////////////////////////

    // amI($role_name)

    public static function authIs($role_name){

        Auth::loginUsingId(1);

        if(Auth::user()->hasRole($role_name)){
            return true;
        }
        else{
            return false;
        }
    }

    ////////////////////////////////////////////////

    // Belle idée le Cache
    // Simplifiable (ex:cache dans le cache) ? Durée du cache ?

    public static function getUser($user_id) {
        if(!Cache::has($user_id)) {
            Cache::put($user_id, User::find($user_id), self::$dureeCache);
        }
        return Cache::get($user_id);
    }

    public static function getRoles($user_id) {
        if(!Cache::has($user_id.'_roles')) {
            Cache::put($user_id.'_roles', self::getUser($user_id)->roles, self::$dureeCache);
        }
        return Cache::get($user_id.'_roles');
    }

    public static function getPermissions($role_id) {
        if(!Cache::has($role_id.'_permissions')) {
            Cache::put($role_id.'_permissions', Role::find($role_id)->permissions, self::$dureeCache);
        }
        return Cache::get($role_id.'_permissions');
    }

    public static function can($user_id, $permission_name) {
        $roles = self::getRoles($user_id);
        foreach($roles as $role) {
            $permissions = self::getPermissions($role->id);
            foreach($permissions as $permission) {
                if($permission->name === $permission_name) return true;
            }
        }
        return false;
    }

    ////////////////////////////////////////////////

    // Merci

    public static function canAll($user_id, $permissions_names) {
      $role_id = DB::table('user_role')->where('user_id',$user_id)->select('role_id')->get();
      $role = DB::table('roles')->where('id',$role_id[0]->role_id)->select('id')->get();
      $permissions = DB::table('permissions')->where('role_id',$role[0]->id)->select('name')->get();
      $permissions_names = explode(',',$permissions_names);
      $str_permissions = '';
      for ($i=0; $i < sizeof($permissions); $i++) {
         if ($i == sizeof($permissions)-1) {
            $str_permissions .= $permissions[$i]->name;
         } else {
            $str_permissions .= $permissions[$i]->name.',';
         }
      }
      $permissions = explode(',',$str_permissions);
      $diff = array_diff($permissions_names, $permissions);
      if (sizeof($diff) == 0) {
         return true;
      }
      return false;
   }



    


}
