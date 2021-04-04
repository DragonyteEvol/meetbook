<?php

use App\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
private $arrayBooks=array(
	array(
		'title'=>'La divina comedia',
	       	'id_author'=> 1,
		'saga' => false,
		'synopsis'=>'La Divina Comedia relata el viaje de Dante por el Infierno, el Purgatorio y el Paraíso, guiado por el poeta romano Virgilio. El poema comienza con el encuentro de Virgilio con Dante, que se ha perdido en una selva y tropieza con bestias salvajes. Virgilio le confiesa al poeta que ha venido en nombre de Beatriz, una dama virtuosa, y lo conduce por un largo viaje de redención que comienza en el Averno: aquí, van pasando por círculos infernales; en el primero, están "los infelices que nunca estuvieron vivos", los niños que no pudieron recibir el bautismo antes de morir y personas de grandeza espiritual como Virgilio, que intuyeron la revelación cristiana.',
		'sheets'=>274,
		'date' => '1472-02.25',
		'languages' => 'español,ingles,frances',
		'reads' => 256,
		'image'=>'la_divina_comedia.jpg'
	),
	array(
		'title'=> 'Todo se desmorona',
		'id_author'=>2,
		'saga'=>true,
		'name_saga'=>'The African Trilogy',
		'synopsis'=>'Okonkwo es un gran guerrero, cuya fama se extiende por toda el África Occidental, pero cuando mata accidentalmente a un prohombre de su clan es obligado a expiar su culpa con el sacrificio de su hijastro y el exilio. Cuando por fin puede regresar a su aldea, la encuentra repleta de misioneros y gobernadores británicos; su mundo se desintegra, y él no puede más que precipitarse hacia la tragedia.',
		'sheets'=>244,
		'date'=>'2010-05-01',
		'languages'=>'español,ingles',
		'reads'=>12,
		'image'=>'todo_se_desmorona.jpg'
	),
	array(
		'title'=>'Orgullo y prejuicio',
		'id_author'=>3,
		'synopsis'=>'Orgullo y prejuicio es una novela de amor o, mejor, una novela de enamorados. Bingley y Jane, Darcy y Elisabeth, Lydia y Wickham luchan para obtener el objeto de su pasión, deben jugar el juego que la sociedad en que viven les propone y deben ganarlo. Sin saltarse las reglas, pero con un tesón capaz de vencer cualquier barrera, llegarán a toda costa a ese matrimonio que para ellos habrá de marcar el inicio de la felicidad soñada.',
		'sheets'=>854,
		'date'=>'1813-01-23',
		'languages'=>'ingles',
		'reads'=>9699,
		'image'=>'orgullo_y_prejuicio.jpg'
	)
);
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
	self::books();
    }
    public static function books(){
		
    }
}
