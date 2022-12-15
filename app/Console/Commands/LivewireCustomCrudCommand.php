<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use illuminate\Support\Str;
use illuminate\Filesystem\Filesystem;

class LivewireCustomCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire:crud
    {NomeDaClasse? : O nome da classe que será criada. },
    {NomeDoModeloDaClasse? : O nome do modelo da classe que será criada. }';


    /**
     * Create a new command instance
     *
     * @var string
     */

     public function __construct()
     {
         parent::__construct();
         $this->file=new Filesystem();
     }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um Crud customizado';

    /**
     * Propriedades da classe
     *
     * 
     */

     protected $NomeDaClasse;
     protected $NomeDoModeloDaClasse;
     protected $file;
     
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
       //Guardar os parametros
            $this->gatherParameters();


       //Gerar o ficheiro da classe

            $this->generateLivewireCrudClassFile();
       //Gerar o finheiro de visualização
            $this->generateLivewireCrudViewFile();
    }

    /**
     * Guardar os parametros
     *
     * @return void
     */
    protected function gatherParameters()
    {
        $this->NomeDaClasse = $this->argument('NomeDaClasse');
        $this->NomeDoModeloDaClasse = $this->argument('NomeDoModeloDaClasse');

        //Se nao der output do nome da classe
        if(!$this->NomeDaClasse){
            $this->NomeDaClasse = $this->ask('Qual o nome da classe?');
        }

        //Se nao der output do nome do modelo da classe
        if(!$this->NomeDoModeloDaClasse){
            $this->NomeDoModeloDaClasse = $this->ask('Qual o nome do modelo da classe?');
        }

        //Converter para studly case
        $this->NomeDaClasse= Str::studly($this->NomeDaClasse);
        $this->NomeDoModeloDaClasse= Str::studly($this->NomeDoModeloDaClasse);

        
    }


    /**
     * Gerar o ficheiro da classe
     *
     * @return void
     */
    protected function generateLivewireCrudClassFile()
    {
        // Defenir a origem e o destino do ficheiro da classe
        $fileOrigin=base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination=base_path('/app/Http/Livewire/'.$this->NomeDaClasse.'.php');

        //Verificar se o ficheiro existe
        if($this->file->exists($fileDestination)){
            $this->error('O ficheiro '.$this->NomeDaClasse.'.php já existe!');
            $this->info('Abortando...');
            return false;
        }

        //Pegar o conteudo do ficheiro original
        $fileOriginalString=$this->file->get($fileOrigin);


        //Substituir as strings sequencialmente do array
        $replaceFileOriginalString=Str::replaceArray('{{}}',
        
        [
            $this->NomeDoModeloDaClasse,//Nome do modelo da classe
            $this->NomeDaClasse, //Nome da classe
            $this->NomeDoModeloDaClasse, //Nome do modelo da classe
            $this->NomeDoModeloDaClasse, //Nome do modelo da classe
            $this->NomeDoModeloDaClasse, //Nome do modelo da classe
            $this->NomeDoModeloDaClasse, //Nome do modelo da classe
            $this->NomeDoModeloDaClasse, //Nome do modelo da classe
            Str::kebab($this->NomeDaClasse), //De foobar para foo-bar
        ],
        $fileOriginalString
        
    );

        //Escrever os dados do ficheiro no diretorio de destino
        $this->file->put($fileDestination,$replaceFileOriginalString);
        $this->info('Ficheiro criado com sucesso!'. $fileDestination);
    }  

    protected function generateLivewireCrudViewFile()
    {
        // Defenir a origem e o destino do ficheiro da classe
        $fileOrigin=base_path('/stubs/custom.livewire.crud.view.stub');
        $fileDestination=base_path('/resources/views/livewire/'. Str::kebab($this->NomeDaClasse).'.blade.php');

        //Verificar se o ficheiro existe
        if($this->file->exists($fileDestination)){
            $this->error('O ficheiro '.$this->NomeDaClasse.'.blade.php já existe!');
            $this->info('Abortando...');
            return false;
        }

        //Copia o ficheiro de origem para o destino
        $this->file->copy($fileOrigin,$fileDestination);
        $this ->info('Visualização criado com sucesso!'. $fileDestination);
    }    
}
