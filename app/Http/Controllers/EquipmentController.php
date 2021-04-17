<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{

    public function __construct()
    {
        // @todo add middleware or gate check to all routes except for index.
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \App\Models\Team $currentTeam */
        $currentTeam = Auth::user()->currentTeam;
        $allEquipment = $currentTeam->equipmentGroupedByType();

        return view('equipment.index', [
            'equipmentGroups' => $allEquipment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //@todo available only to support rep admins.
    }
}
