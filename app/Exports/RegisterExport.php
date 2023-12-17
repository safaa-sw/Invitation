<?php

namespace App\Exports;

use App\Models\Invited;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class RegisterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Inviteds = Invited::where('invitation_type', '=', 'تسجيل')->get();
        $InvitedsCollection = new Collection();
        $title = [
            "pretitle" => "اللقب1",
            "title" => "اللقب2",
            "fullname" => "الاسم",
            "mobile_no" => "الجوال",
            "email" => "الايميل",
            "organization" => "المنظمة",
            "position" => "المنصب",
            "attendance" => "تأكيد الحضور",
            "qrcode" => "qrcode",
            "seatCode" => "رمز الكرسي",
            "seatClass" => "فئة الكرسي",
            "personClass" => "الفئة",
            "is_attended" => "هل حضر الحفل",
            "req_status" => "حالة الطلب",
            "invitation_type" => "نوع الدعوة",
            "in_or_out" => "داخلي/خارجي",

        ];
        $InvitedsCollection[0] = $title;
        $i = 0;
        foreach ($Inviteds as $invited) {
            $i++;
            $newItem = [
                "pretitle" => $invited->pretitle,
                "title" => $invited->title->name,
                "fullname" => $invited->fullname,
                "mobile_no" => $invited->mobile_no,
                "email" => $invited->email,
                "organization" => $invited->organization,
                "position" => $invited->position,
                "attendance" => $invited->attendance,
                "qrcode" => $invited->qrcode,
                "seatCode" => "",
                "seatClass" => "",
                "personClass" => "",
                "is_attended" => $invited->is_attended,
                "req_status" => $invited->req_status,
                "invitation_type" => $invited->invitation_type,
                "in_or_out" => $invited->in_or_out,

            ];

            if ($invited->seat_id != null) {
                $newItem['seatCode'] = $invited->seat->code;
                $newItem['seatClass'] = $invited->seat->seat_class;
            }
            if ($invited->person_class_id != null) {
                $newItem['personClass'] = $invited->personClass->name;
            }
            if ($invited->req_status == 1) {
                $newItem['req_status'] = "قيد الدراسة";
            }
            if ($invited->req_status == 2) {
                $newItem['req_status'] = "تم التأكيد";
            }
            if ($invited->req_status == 3) {
                $newItem['req_status'] = "تم الاعتذار";
            }

            $InvitedsCollection[$i] = $newItem;
        }

        return $InvitedsCollection;
    }
}
