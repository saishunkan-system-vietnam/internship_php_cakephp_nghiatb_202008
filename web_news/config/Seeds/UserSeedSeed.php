<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * UserSeed seed.
 */
class UserSeedSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     [
        //     'email'=>'admin@gmail.com',
        //     'password'=> Cake\Utility\Security::hash('123456'),
        //     'name'=>'nghia',
        //     'phone'=>'123456789',
        //     'level'=>1
        //     ],
        //     [
        //         'email'=>'mod@gmail.com',
        //         'password'=> Cake\Utility\Security::hash('123456'),
        //         'name'=>'mod',
        //         'phone'=>'123456789',
        //         'level'=>1
        //     ],
        //     [
        //         'email'=>'author@gmail.com',
        //         'password'=> Cake\Utility\Security::hash('123456'),
        //         'name'=>'author',
        //         'phone'=>'123456789',
        //         'level'=>2
        //     ]
        // ];
        // $table = $this->table('users');
        // $table->insert($data)->save();
    }
}
