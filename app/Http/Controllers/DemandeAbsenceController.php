<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;

class DemandeAbsenceController extends Controller
{
    public function sendDemandeAbsence(){
        $authName = Auth()->user()->admin_name;
        return view('sendDemandeAbsence', compact('authName'));
    }

    public function sendDemandeAbsenceStore(Request $request){
        $newDemande = [
            "employe_id" => Auth()->user()->id,
            "employe_name" => Auth()->user()->admin_name,
            "date_from" => $request->from_year."-".$request->from_month."-". $request->from_day,
            "date_to" => $request->to_year."-".$request->to_month."-". $request->to_day,
            "reason" => $request->reason,
            "status" => "under review"
        ];
    
        $newAdd =DemandeAbsence::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }

    public function index(){
        $demandes = DemandeAbsence::get();


        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();
        $waitingDemande = DemandeAbsence::where('status', '=', 'under review')->get();
        $employes = Admin::get();

        return view('listAbsenceDemande', compact('demandes', 'waitingEmploye', 'employes', 'waitingDemande'));
    }


    public function acceptDemande(Request $request){

        $id = $request->id;

        $demande = DemandeAbsence::where('id', $id);

        $demande->update(['status' => 'accepted']);



        return redirect()->route('demande.index')->with('demandeAccepted', 'تم قبول طلب الغياب بنجاح');
    }
    

    public function refuseDemande(Request $request){

        $id = $request->id;

        $demande = DemandeAbsence::where('id', $id);

        $demande->update(['status' => 'refused']);



        return redirect()->route('demande.index')->with('demandeRefused', 'تم رفض طلب الغياب بنجاح');
    }

    public function listDemande(){
        $id = Auth()->user()->id;
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        $waitingDemande = DemandeAbsence::where('status', '=', 'under review')->get();

        $listDemande = DemandeAbsence::where('employe_id', $id)->get();

        return view('listDemande', compact('listDemande', 'waitingDemande', 'waitingEmploye'));
    }
}
