<?php

namespace App\Livewire\Teacher;

use App\Models\Notification;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SponsoredsRequest extends Component
{
    use LivewireAlert;

    public $mysponsored;

    public function accept(Sponsorship $sponsorship)
    {
       /*  if ($sponsorship->state == 'ignored') {
            $this->alert('info', 'لقد ألغي الطلب، مر أكثر من يومين على الطلب !!');
            return redirect()->route('welcome.teacher');
        } */
        $sponsorship->state = 'accepted';
        $sponsorship->save();
        $notification = new Notification();
        $notification->user_id = $sponsorship->student_id;
        $notification->content = 'مبارك لك! لقد وافق الأستاذ "'.$sponsorship->teacher->name.'" على مرافقتك يمكنك مراسلته الآن ';
        $notification->save();

        $notification2 = new Notification();
        $notification2->user_id = 1;
        $notification2->content = 'مرافقة جديدة! لقد وافق الأستاذ "'.$sponsorship->teacher->name.'" على مرافقت الطالب "'.$sponsorship->student->name.'".';
        $notification2->save();

        return redirect()->route('teacher.chat.messanger', [$sponsorship->student_id]);
    }

    public function refuse(Sponsorship $sponsorship)
    {
       /*  if ($sponsorship->state == 'ignored') {
            $this->alert('info', 'لقد ألغي الطلب، مر أكثر من يومين على الطلب !!');
            return redirect()->route('welcome.teacher');
        } */
        $sponsorship->state = 'refused';
        $sponsorship->save();
        $notification = new Notification();
        $notification->user_id = $sponsorship->student_id;
        $notification->content = 'لقد رفض الاستاذ "'.$sponsorship->teacher->name.'" طلبك للمرافقة قم باختيار استاذ آخر أو قم بتغيير محتوى طلبك ';
        $notification->save();

        $notification2 = new Notification();
        $notification2->user_id = 1;
        $notification2->content = 'رفض مرافقة! لقد رفض الأستاذ "'.$sponsorship->teacher->name.'" مرافقة الطالب "'.$sponsorship->student->name.'".';
        $notification2->save();
    }

    public function info(Sponsorship $sponsorship) {
        $this->alert('info', $sponsorship->content, [
            'position' => 'center',
            'timer' => '2400000',
            'toast' => true,
            'showCancelButton' => true,
            'cancelButtonText' => 'X',
           ]);
    }

    public function render()
    {
        $this->mysponsored = Sponsorship::where('teacher_id', Auth::user()->id)->where('state', 'on_standby')->get();
if (!$this->mysponsored->isEmpty()) {
  foreach ($this->mysponsored as $item) {
            

      
            if ($item->created_at->diffInMinutes() > 2880) { // tow days -> 2880 min
                $item->state = 'ignored';
                $item->save();
            }
        
        }  
}
        
        return view('livewire.teacher.sponsoreds-request');
    }
}