<?php

namespace App\Jobs;

use App\Helpers\Import\MatriculaImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MatriculaImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $filename;
    private $periodo_academico_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename, $periodo_academico_id)
    {
        $this->filename = $filename;
        $this->periodo_academico_id = $periodo_academico_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("Ejecutando JOb: ".$this->filename);
        $response = MatriculaImport::guardarDatos($this->filename, $this->periodo_academico_id);
    }
}
