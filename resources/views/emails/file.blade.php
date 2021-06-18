@component('mail::message')

    # Dear {{$appointment->name}}

            ✔ Doctor Assigned :  {{$appointment->doctor->user->name}}
            ✔ Doctor Specialist : {{$appointment->doctor->specialization}}
            ✔ Message : {{$appointment->message}}
            ✔ Appointment scheduled for :  {{$appointment->scheduled_for}}


    You are receiving this email because we received a appointment request for your this mail account.

    **Thanks,**

    **{{ config('app.name') }}**

@endcomponent
