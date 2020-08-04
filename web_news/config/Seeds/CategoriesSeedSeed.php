<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * CategoriesSeed seed.
 */
class CategoriesSeedSeed extends AbstractSeed
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
        $data = [
            [
                'name' => 'Thế giới',
                'description' => 'Bản tin thể giới', 
            ],
            [
                'name' => 'Trong nước',
                'description' => 'Bản tin trong nước',
            ]
        ];
        
        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
