<?php

namespace Bolao;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $fillable = ['campeonato_id', 'rodada', 'inicio', 'timecasa_id', 'placar_casa', 'placar_fora', 'timefora_id'];

    protected $guarded = ['id'];

    public function timecasa()
    {
        return $this->belongsTo('Bolao\Time', 'timecasa_id', 'id');
    }

    public function timefora()
    {
        return $this->belongsTo('Bolao\Time', 'timefora_id', 'id');
    }
}
