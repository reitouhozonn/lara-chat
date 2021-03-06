<?php

namespace App\Models;

use App\Http\Requests\GroupPost;
use App\Http\Requests\GroupPut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany('App\Models\GroupMessage');
    }

    public static function createGroupFromGroupPost(GroupPost $groupPost)
    {
        $validated = $groupPost->validated();

        $group = new Group();
        DB::transaction(function () use ($group, $validated) {
            $group->name = $validated['name'];
            $group->description = $validated['description'];
            $group->save();
            $group->users()->sync($validated['userIds']);
        });

        return $group;
    }

    public function updateGroupFromGroupPut(GroupPut $groupPut)
    {
        $validated = $groupPut->validated();

        DB::transaction(function () use ($validated) {
            $this->name = $validated['name'];
            $this->description = $validated['description'];
            $this->save();
            $this->users()->sync($validated['userIds']);
        });

        return $this;
    }

    public function groupDelete()
    {
        return DB::transaction(function () {
            $this->users()->detach();
            return parent::delete();
        });
    }
}
