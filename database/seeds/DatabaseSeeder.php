<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);
         $this->truncateTables([
            "direccions",
            "parroquias",
            "municipios",
    		"ciudads",
            "estados",
    		"citas",
            "pacientes",
            "users",
            "tipo_energias",
            "tipo_piels",
            "tipo_tatuajes",
            "cargos_users",
            'autor_tatuajes'
        ]);

        
    }

    /**
	* Metodo que reinicia las secuencias de las tablas selecionadas
	* y elimina los registros de las tablas pasadas por parametros
    */
    protected function truncateTables(array $tables)
    {
    	//Reinicia la secuencia de la tabla
    	DB::statement('ALTER SEQUENCE autor_tatuajes_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE cargos_users_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE citas_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE ciudads_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE direccions_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE estados_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE frecuencias_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE municipios_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE pacientes_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE parroquias_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE tipo_energias_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE tipo_piels_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE tipo_tatuajes_id_seq RESTART WITH 1;');
        DB::statement('ALTER SEQUENCE users_id_seq RESTART WITH 1;');

    	foreach ($tables as $table) {
    		//Vacia la tabla antes de insertar nuevos registros
    		DB::table($table)->delete();
    	}
    }
}
