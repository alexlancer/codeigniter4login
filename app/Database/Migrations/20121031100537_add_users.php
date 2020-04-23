<?php namespace App\Database\Migrations;

class AddUsers extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'firstname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'lastname'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '50',
                         ],
                         'email'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '50',
                           ],
                           'password'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
                        ],
                        'created_at'       => [
                            'type'           => 'DATETIME',
                            // 'default'        => 'current_timestamp()',
                        ],
                        'updated_at'       => [
                            'type'           => 'DATETIME',
                            // 'default'        => 'current_timestamp()',
                        ]
                        ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}