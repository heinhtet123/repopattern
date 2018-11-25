<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnrolledStudents;
use App\Models\Batch;
use App\Models\Groups;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        //Groups::
        // $data=["group_name"=>"hein","batch_id"=>1,"status"=>1];
        $group=Groups::find(1);
        $user=User::find(9);

        $user_group=$group->users()->save($user,["status"=>1]);
        
        // dd($user_group);
        // $user_group->pivot->status=1;
        // $user_group->pivot->user_id=1;
        // $user_group->pivot->group_id=$group->id;
     
        // dd(get_class_methods($group->users));
        
        
        // $user = EnrolledStudents::find(11);
        // $user_batch=$user->batches()->where('enrolledstudents_id',11)->get()->first();
        // $user_batch->pivot->student_bill=111;
        // $user_batch->pivot->save();

        // $enrolledstudents->name="sth";
        // $enrolledstudents->email="sthomething@gmail.com";
        // $enrolledstudents->phone="12345";
        // $enrolledstudents->address="sth";
        // $enrolledstudents->save();
        // $user=Batch::where('id',1)->find();
        // dd($user->id);
       
        // $enrolledstudents->batches()->save($batch,['student_bill' => 299,'numbers_of_payment'=>2,'status'=>2000]);


        //$enrolledstudents->batches()->save();

        Model::reguard();
    }
}
