<?php

use common\models\Members;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_contents}}`.
 */
class m220821_125722_create_add_contents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    
       for($i=1; $i<=10; $i++){

        $faker =  Faker\Factory::create();
        $this->insert('members',[
             'status_id' => rand(1,4),
             'name'=>$faker->firstName(),
             'family_name'=>$faker->lastName(),
             'address'=>$faker->address(),
             'country_of_origin'=>$faker->countryISOAlpha3(),
             'email_adress'=>$faker->email(),
             'phone_number'=>"+9989".rand(0,4).rand(100,999).rand(10,99).rand(10,99),
             'age'=>rand(19,30),
             'hired'=>rand(0,1),
        ]);

       }
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Members::deleteAll();
    }
}
