<?php 

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
* @author heinhtet
*/
class BatchRequest extends Request
{
	public function authorize()
    {
        return true;
    }
    public function rules()
    {
    	return [
            'batch_name' => 'unique:batches,batch_name',
        ];
    }
}