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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => '1'
        ]);

        DB::table('status')->insert([
            'title' => 'Aguardando confirmação',
            'description' => 'Aguardando a confirmação do restaurante',
        ]);

        DB::table('status')->insert([
            'title' => 'Pedido confirmado',
            'description' => 'O pedido já foi aceito pelo restaurante e esta sendo preparado',
        ]);

        DB::table('status')->insert([
            'title' => 'Pedido enviado',
            'description' => 'Seu pedido já está sendo enviado para seu endereço',
        ]);

        DB::table('status')->insert([
            'title' => 'Pedido cancelado',
            'description' => 'O cliente cancelou o pedido',
        ]);

        DB::table('status')->insert([
            'title' => 'Pedido recusado',
            'description' => 'O restaurante não pode concluir seu pedido',
        ]);

        DB::table('status')->insert([
            'title' => 'Pedido entregue',
            'description' => 'Entraga concluída',
        ]);
    }
}
