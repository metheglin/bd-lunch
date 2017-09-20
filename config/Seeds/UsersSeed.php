<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '1',
                'name' => 'Mitsutoshi, Watanabe',
                'email' => 'mitsutoshi@reivo.co.jp',
                'password' => '$2y$10$BZnSPR7n7y9Hs064AhNDpOBwuoDa9U9.ebCf4zlB3dFGaub0G4/ey',
                'country' => 'JP',
                'isactive' => '1',
                'isdel' => NULL,
                'modified_by' => NULL,
                'created_by' => NULL,
                'modified' => '2017-06-20 08:29:59',
                'created' => '2017-06-19 04:56:54',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
