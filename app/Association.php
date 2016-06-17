<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Association extends Model
{

    protected $table = 'association';
    public $timestamps = true;
    protected $guarded = ['id'];
    use SoftDeletes;
    use AuditingTrait;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($association) {

//            $association->clubs
            //TODO Unlink all clubs/users from assoc
//            foreach ($tournament->categoryTournaments as $ct) {
//                $ct->delete();
//            }
//            $tournament->invites()->delete();

        });
        static::restoring(function ($tournament) {

//            foreach ($tournament->categoryTournaments()->withTrashed()->get() as $ct) {
//                $ct->restore();
//            }

        });

    }

    public function president()
    {
        return $this->hasOne(User::class, 'id', 'president_id');
    }

    public function clubs()
    {
        return $this->hasMany('Club');
    }

    public function federation()
    {
        return $this->belongsTo(Federation::class);
    }

    public function scopeForUser($query, User $user)
    {
        if (!$user->isSuperAdmin()) {
            $query->whereHas('federation', function ($query) use ($user) {
                $query->where('country_id', $user->country_id);
            });
        }
    }

    public function belongsToFederationPresident(User $user)
    {
        if ($user->isFederationPresident() &&
            $user->federationOwned != null &&
            $this->federation->id == $user->federationOwned->id){

            return true;
        }
        return false;
    }

    public function belongsToAssociationPresident(User $user)
    {
        if ($user->isAssociationPresident() &&
            $user->associationOwned != null &&
            $this->id == $user->associationOwned->id
        ) {
        }
        return true;

    }

}