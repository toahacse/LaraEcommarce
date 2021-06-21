<?php
namespace App\Helpers;

use App\Models\User;
use App\Helpers;
use function GuzzleHttp\Psr7\uri_for;

class ImageHelper{

    public static function getUserImage($id){
        $user = User::find($id);
        $avatar_url = "";
        if (!is_null($user)){
            if ($user->avatar == NULL){
                if (GravatarHelper::validate_gravatar($user->email)){
                    $avatar_url = GravatarHelper::gravar_image($user->email. 100);
                }else{
                    $avatar_url = url('images/defaults/user.png');
                }
            }else{
                $avatar_url = url('images/users/'.$user->avatar);
            }
        }else{

        }
        return $avatar_url;
    }
}
?>