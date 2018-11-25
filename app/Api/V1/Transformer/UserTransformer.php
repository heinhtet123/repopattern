<?php

namespace App\Api\V1\Transformer;

use League\Fractal\TransformerAbstract;
use App\User;
/**
* 
*/
class UserTransformer extends TransformerAbstract
{
	
	public function transform(User $user)
    {
        // Make a call to your transformation layer to transformer the given response.
        return [
 			'name' => $user->name,
 			'email' => $user->email,
 			'user_photo'=>$user->user_photo
        ];
    }
}