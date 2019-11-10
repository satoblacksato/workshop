<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Bouncer;
use \App\User;
use DB;
class AsignaRol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:bouncer {--role= :El nombre del rol sin espacio} {--permiso=* :los nombres de permiso sin espacio}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna Roles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Asignacion de Roles");
        
        $role=$this->option('role');
        $permiso=$this->option('permiso');
        $idUser=$this->ask('Código del usuario PK');
        
        $user=User::findOrFail((int)$idUser);
        $this->info("Usuario a procesar ".$user->name);

        DB::transaction(function() use($role,$permiso,$user){
            foreach ($permiso as $item) {
                 $this->info("Asginando al Rol {$role} la habilidad {$item}");
                 Bouncer::allow($role)->to($item);
            }
            $this->info("Asignando al Usuario {$user->name} el rol {$role}");
            $user->assign($role);
        });
        $this->info("Proceso finalizado");
    }
}
