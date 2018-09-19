<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenderRequest extends Model
{
  public function tender()
  {
    return $this->belongsTo(Tender::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
