<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
   public function index()
   {
      return success_out(Group::paginate());
   }

   public function store(GroupRequest $request)
   {
      $group = Group::create($request->all());
      return success_out($group);
   }

   public function show(Group $group)
   {
      return success_out($group);
   }

   public function update(GroupRequest $request, Group $group)
   {
      $group->update($request->all());
      return success_out($group);
   }


   public function delete(Group $group)
   {
      return success_out($group->delete());
   }
}
