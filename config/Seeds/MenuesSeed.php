<?php
use Migrations\AbstractSeed;

/**
 * Menues seed.
 */
class MenuesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'weekday' => 4,
                'name' => 'khichuri',
                'kind' => 'main',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 4,
                'name' => 'haleem',
                'kind' => 'main',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 4,
                'name' => 'sushi',
                'kind' => 'main',
                'country' => 'JP',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 4,
                'name' => 'yakisoba',
                'kind' => 'main',
                'country' => 'JP',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 4,
                'name' => 'ilish',
                'kind' => 'sub',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'biriyani',
                'kind' => 'main',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'tahri',
                'kind' => 'main',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'tempura',
                'kind' => 'main',
                'country' => 'JP',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'nikujaga',
                'kind' => 'main',
                'country' => 'JP',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'chiken',
                'kind' => 'sub',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'greenchili-pickles',
                'kind' => 'sub',
                'country' => 'BD',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'chicken-curry',
                'kind' => 'main',
                'country' => 'IN',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            [
                'weekday' => 5,
                'name' => 'roti',
                'kind' => 'sub',
                'country' => 'IN',
                'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            ],
            // [
            //     'weekday' => null,
            //     'name' => 'tea',
            //     'kind' => 'drink',
            //     'country' => 'BD',
            //     'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            // ],
            // [
            //     'weekday' => null,
            //     'name' => 'coffee',
            //     'kind' => 'drink',
            //     'country' => 'VN',
            //     'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            // ],
            // [
            //     'weekday' => null,
            //     'name' => 'lassi',
            //     'kind' => 'drink',
            //     'country' => 'IN',
            //     'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
            // ],
            
        ];

        $table = $this->table('menues');
        $table->insert($data)->save();
    }
}
