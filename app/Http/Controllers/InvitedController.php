<?php

namespace App\Http\Controllers;


use App\Models\Invited;
use App\Models\PersonClass;
use App\Models\Title;
use App\Models\Seat;
use App\Models\EventDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllExport;
use App\Exports\InvitedExport;
use App\Exports\RegisterExport;


class InvitedController extends Controller
{
    /**
     * Invitation Functions
     */
    public function index()
    {
        $titles=Title::all();
        $personClasses= PersonClass::all();
        $inviteds = Invited::where('invitation_type', '=', 'دعوة')->paginate(8);
        return view('admin.inviteds.index', compact('inviteds','titles','personClasses'));
    }
    

    public function create()
    {
        $titles = Title::all();
        $personClasses = PersonClass::all();
        return view('admin.inviteds.create', compact('titles', 'personClasses'));
    }


    public function store(Request $request)
    {
        $invited = new Invited();
        $invited->pretitle = $request->pretitle;
        $invited->title_id = $request->title;
        $invited->fullname = $request->fullname;
        $invited->mobile_no = $request->mobile_no;
        $invited->email = $request->email;
        $invited->password = Hash::make('12345678');
        $invited->email_other = $request->email_other;
        $invited->organization = $request->organization;
        $invited->position = $request->position;
        $invited->qrcode = null;
        $invited->attendance = $request->attendance;
        $invited->employee_id = auth()->guard('admin')->user()->id;
        $invited->person_class_id = $request->person_class;
        $invited->seat_id = null;
        $invited->notify_by_email = $request->notify_by_email;
        $invited->notify_by_whatsup = $request->notify_by_whatsup;
        $invited->is_attended = null;
        $invited->req_status = null;
        $invited->invitation_type = 'دعوة';
        $invited->invitation_lang = $request->invitation_lang;
        $invited->in_or_out = null;

        $invited->save();

        $result = SendEmailController::invitationMail($invited->id);

        //if (($invited->save()) && $result) {
        if ($invited->save()) {
            Alert::success('', 'تم إرسال الدعوة بنجاح');
            return redirect()->route('inviteds.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function show(Invited $invited)
    {
        return view('admin.inviteds.show', compact('invited'));
    }

    public function edit(Invited $invited)
    {
        $titles = Title::all();
        $personClasses = PersonClass::all();
        return view('admin.inviteds.edit', compact('invited', 'titles', 'personClasses'));
    }


    public function update(Request $request, Invited $invited)
    {
        $invited = Invited::findOrFail($invited->id);
        $invited->pretitle = $request->pretitle;
        $invited->title_id = $request->title;
        $invited->fullname = $request->fullname;
        $invited->mobile_no = $request->mobile_no;
        $invited->email = $request->email;
        $invited->password = Hash::make('12345678');
        $invited->email_other = $request->email_other;
        $invited->organization = $request->organization;
        $invited->position = $request->position;
        $invited->attendance = $request->attendance;
        $invited->person_class_id = $request->person_class;
        $invited->notify_by_email = $request->notify_by_email;
        $invited->notify_by_whatsup = $request->notify_by_whatsup;
        $invited->invitation_lang = $request->invitation_lang;


        $invited->save();

        if ($invited->save()) {
            Alert::success('', 'تم تعديل الدعوة بنجاح');
            return redirect()->route('inviteds.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }


    public function destroy(Invited $invited)
    {
        $invited = Invited::find($invited->id);
        $seat=Seat::find($invited->seat_id);
        if($seat!=null)
        {
            $seat->status=0;
            $seat->save();
        }
        if ($invited->delete()) {
            Alert::success('', 'تم حذف الدعوة بنجاح');
            return redirect()->route('inviteds.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    /*****
     * search 
     */
    public function search(Request $request)
    {
        $inviteds = null;
        if (($request->searchByName == null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::where('invitation_type', '=', 'دعوة')->paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('invitation_type', '=', 'دعوة')
                ->where('fullname', '=', $request->searchByName)
                ->where('email', '=', $request->searchByEmail)
                ->paginate(8);
        }
        if (($request->searchByName == null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('invitation_type', '=', 'دعوة')
                ->where('email', '=', $request->searchByEmail)
                ->paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::where('invitation_type', '=', 'دعوة')
                ->where('fullname', '=', $request->searchByName)
                ->paginate(8);
        }
        return view('admin.inviteds.index', compact('inviteds'));
    }

    /***
     * Event day functions
     */
    public function allInvitation()
    {
        $inviteds = Invited::paginate(8);
        return view('admin.eventday.all_invitations', compact('inviteds'));
    }

    public function showDayInvitation($id)
    {
        $invited = Invited::find($id);
        return view('admin.eventday.show', compact('invited'));
    }

    public function editDayInvitation($id)
    {
        $titles = Title::all();
        $personClasses = PersonClass::all();
        $invited = Invited::find($id);
        return view('admin.eventday.edit', compact('invited', 'titles', 'personClasses'));
    }


    public function updateDayInvitation(Request $request, $id)
    {
        $invited = Invited::findOrFail($id);
        $invited->pretitle = $request->pretitle;
        $invited->title_id = $request->title;
        $invited->fullname = $request->fullname;
        $invited->mobile_no = $request->mobile_no;
        $invited->email = $request->email;
        $invited->organization = $request->organization;
        $invited->position = $request->position;
        $invited->person_class_id = $request->person_class;
        $invited->is_attended = $request->is_attended;
        $invited->req_status = $request->req_status;
        if ($invited->save()) {
            Alert::success('', 'تم تعديل الدعوة بنجاح');
            return redirect()->route('eventday/all');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    public function destroyDayInvitation($id)
    {
        $invited = Invited::find($id);
        $seat=Seat::find($invited->seat_id);
        if($seat!=null)
        {
            $seat->status=0;
            $seat->save();
        }
        if ($invited->delete()) {
            Alert::success('', 'تم حذف الدعوة بنجاح');
            return redirect()->route('eventday/all');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function editInvitedSeat($id)
    {
        $seats = Seat::all();
        $invited = Invited::find($id);
        return view('admin.seats.invitedSeat', compact('invited', 'seats'));
    }


    public function updateInvitedSeat(Request $request, $id)
    {
        $invited = Invited::findOrFail($id);
        if ($invited->seat_id != null) {
            $oldSeat = Seat::findOrFail($invited->seat_id);
            $oldSeat->status = 0;
            $oldSeat->save();
        }

        $invited->seat_id = $request->invitedSeat;
        $seat = Seat::findOrFail($request->invitedSeat);
        $seat->status = 1;
        if (($invited->save()) && ($seat->save())) {
            Alert::success('', 'تم تعديل المقعد بنجاح');
            return redirect()->route('eventday/all');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function showSeatPlan(Request $request, $id)
    {

        $image = EventDay::first()->image;
        return view('admin.seats.seatsPlan', compact('image', 'id'));
    }

    public function searchAllInvitation(Request $request)
    {
        $inviteds = null;
        if (($request->searchByName == null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('fullname', '=', $request->searchByName)
                ->where('email', '=', $request->searchByEmail)
                ->paginate(8);
        }
        if (($request->searchByName == null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('email', '=', $request->searchByEmail)->paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::where('fullname', '=', $request->searchByName)->paginate(8);
        }
        return view('admin.eventday.all_invitations', compact('inviteds'));
    }

    /**
     * Seats Functions
     */

    public function allSeats(Request $request)
    {
        $seats = Seat::paginate(8);
        return view('admin.seats.allSeats', compact('seats'));
    }

    public function emptySeats(Request $request)
    {
        $seats = Seat::where('status', '=', 0)->paginate(8);
        return view('admin.seats.emptySeats', compact('seats'));
    }


    public function seatReports(Request $request)
    {

        $seatVIPEmpty = Seat::where('status', '=', 0)
            ->where('seat_class', '=', 'vip')
            ->get();
        $seatVIPBooked = Seat::where('status', '=', 1)
            ->where('seat_class', '=', 'vip')
            ->get();

        $seatNormalEmpty = Seat::where('status', '=', 0)
            ->where('seat_class', '=', 'Normal')
            ->get();
        $seatNormalBooked = Seat::where('status', '=', 1)
            ->where('seat_class', '=', 'Normal')
            ->get();

        $seatInviteVIP = DB::table('seats')
            ->leftJoin('inviteds', 'seats.id', '=', 'inviteds.seat_id')
            ->where('seats.seat_class', '=', 'vip')
            ->where('inviteds.invitation_type', '=', 'دعوة')
            ->get();
        $seatInviteNormal = DB::table('seats')
            ->leftJoin('inviteds', 'seats.id', '=', 'inviteds.seat_id')
            ->where('seats.seat_class', '=', 'normal')
            ->where('inviteds.invitation_type', '=', 'دعوة')
            ->get();

        $seatRegisterVIP = DB::table('seats')
            ->leftJoin('inviteds', 'seats.id', '=', 'inviteds.seat_id')
            ->where('seats.seat_class', '=', 'vip')
            ->where('inviteds.invitation_type', '=', 'تسجيل')
            ->get();
        $seatRegisterNormal = DB::table('seats')
            ->leftJoin('inviteds', 'seats.id', '=', 'inviteds.seat_id')
            ->where('seats.seat_class', '=', 'normal')
            ->where('inviteds.invitation_type', '=', 'تسجيل')
            ->get();

        $seatEmpty = Seat::where('status', '=', 0)->get();



        $seatsNo = [
            'seatVIPEmpty' => $seatVIPEmpty->count(),
            'seatVIPBooked' => $seatVIPBooked->count(),
            'seatNormalEmpty' => $seatNormalEmpty->count(),
            'seatNormalBooked' => $seatNormalBooked->count(),
            'seatInviteVIP' => $seatInviteVIP->count(),
            'seatInviteNormal' => $seatInviteNormal->count(),
            'seatRegisterVIP' => $seatRegisterVIP->count(),
            'seatRegisterNormal' => $seatRegisterNormal->count(),
            'seatEmpty' => $seatEmpty->count(),
        ];
        return view('admin.seats.seatsReport', compact('seatsNo'));
    }

    public function editSeatInvited($id)
    {
        $seat = Seat::find($id);
        $inviteds = Invited::all();
        return view('admin.seats.seatInvited', compact('inviteds', 'seat'));
    }


    public function updateSeatInvited(Request $request, $id)
    {
        $seat = Seat::findOrFail($id);
        $oldInvited = Invited::where('seat_id', '=', $id)->first();
        if ($oldInvited != null) {
            $oldInvited->seat_id = null;
            $oldInvited->save();
        }

        $invited = Invited::findOrFail($request->newInvited);
        $invited->seat_id = $id;
        $seat->status = 1;
        if (($invited->save()) && ($seat->save())) {
            Alert::success('', 'تم تعديل كرسي المدعو بنجاح');
            return redirect()->route('eventday/seat/all');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function searchSeat(Request $request)
    {
        $seats = null;
        if (($request->searchBySeatClass == null) && ($request->searchBySeatStatus == null)) {
            $seats = Seat::paginate(8);
        }
        if (($request->searchBySeatClass != null) && ($request->searchBySeatStatus != null)) {
            $seats = Seat::where('seat_class', '=', $request->searchBySeatClass)
                ->where('status', '=', $request->searchBySeatStatus)
                ->paginate(8);
        }
        if (($request->searchBySeatClass == null) && ($request->searchBySeatStatus != null)) {
            $seats = Seat::where('status', '=', $request->searchBySeatStatus)->paginate(8);
        }
        if (($request->searchBySeatClass != null) && ($request->searchBySeatStatus == null)) {
            $seats = Seat::where('seat_class', '=', $request->searchBySeatClass)->paginate(8);
        }
        return view('admin.seats.allSeats', compact('seats'));
    }

    /**********
     * qrcode
     */
    public function qrcode(Request $request)
    {
        return view('admin.inviteds.qrcode');
    }

    /**
     * User Invitation Function    
     */
    public function userInviteIndex()
    {
        $inviteds = Invited::where('invitation_type', '=', 'تسجيل')->paginate(8);
        return view('admin.inviteds.userInviteIndex', compact('inviteds'));
    }


    public function userInviteStore(Request $request)
    {
        $invited = new Invited();
        $invited->pretitle = null;
        $invited->title_id = $request->title;
        $invited->fullname = $request->fullname;
        $invited->mobile_no = $request->mobile_no;
        $invited->email = $request->email;
        $invited->password = Hash::make('12345678');
        $invited->email_other = null;
        $invited->organization = $request->organization;
        $invited->position = $request->position;
        $invited->qrcode = null;
        $invited->attendance = null;
        $invited->employee_id = 1;
        $invited->person_class_id = null;
        $invited->seat_id = null;
        $invited->notify_by_email = null;
        $invited->notify_by_whatsup = null;
        $invited->is_attended = null;
        $invited->req_status = 1;
        $invited->invitation_type = 'تسجيل';
        $invited->invitation_lang = null;
        $invited->in_or_out = null;

        $invited->save();

        $result = SendEmailController::registerMail($invited->id);

        //if (($invited->save()) && $result) {

        if ($invited->save()) {
            // Alert::success('','تم إرسال الدعوة بنجاح');
            return redirect()->route('inviteds/inviteReg');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function userInviteShow($id)
    {
        $invited = Invited::find($id);
        return view('admin.inviteds.userInviteShow', compact('invited'));
    }

    public function userInviteEdit($id)
    {
        $invited = Invited::find($id);
        $titles = Title::all();
        $personClasses = PersonClass::all();
        return view('admin.inviteds.userInviteEdit', compact('invited', 'titles', 'personClasses'));
    }


    public function userInviteUpdate(Request $request, $id)
    {
        $invited = Invited::findOrFail($id);
        $invited->pretitle = $request->pretitle;
        $invited->title_id = $request->title;
        $invited->fullname = $request->fullname;
        $invited->mobile_no = $request->mobile_no;
        $invited->email = $request->email;
        $invited->organization = $request->organization;
        $invited->position = $request->position;
        $invited->person_class_id = $request->person_class;
        $invited->notify_by_email = $request->notify_by_email;
        $invited->is_attended = $request->is_attended;
        $invited->req_status = $request->req_status;


        $invited->save();

        if ($invited->save()) {
            Alert::success('', 'تم تعديل الدعوة بنجاح');
            return redirect()->route('userInvite/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function userInviteDestroy($id)
    {
        $invited = Invited::find($id);
        $seat=Seat::find($invited->seat_id);
        if($seat!=null)
        {
            $seat->status=0;
            $seat->save();
        }
        if ($invited->delete()) {
            Alert::success('', 'تم حذف الدعوة بنجاح');
            return redirect()->route('userInvite/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
            return redirect()->back();
        }
    }

    public function userInviteSearch(Request $request)
    {
        $inviteds = null;
        if (($request->searchByName == null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::where('invitation_type', '=', 'تسجيل')->paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('invitation_type', '=', 'تسجيل')
                ->where('fullname', '=', $request->searchByName)
                ->where('email', '=', $request->searchByEmail)
                ->paginate(8);
        }
        if (($request->searchByName == null) && ($request->searchByEmail != null)) {
            $inviteds = Invited::where('invitation_type', '=', 'تسجيل')->where('email', '=', $request->searchByEmail)
                ->paginate(8);
        }
        if (($request->searchByName != null) && ($request->searchByEmail == null)) {
            $inviteds = Invited::where('invitation_type', '=', 'تسجيل')
                ->where('fullname', '=', $request->searchByName)
                ->paginate(8);
        }
        return view('admin.inviteds.userInviteIndex', compact('inviteds'));
    }

    /***
     * Export data functions
     */
    public function exportAll(Request $request){
        return Excel::download(new AllExport, 'allapplicant.xlsx');
    }
    public function exportInvited(Request $request){
        return Excel::download(new InvitedExport, 'invite.xlsx');
    }
    public function exportRegister(Request $request){
        return Excel::download(new RegisterExport, 'register.xlsx');
    }
}
