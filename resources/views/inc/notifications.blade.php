@if(
    Auth::user()->hasRole('ins') || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0 ||
    App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null ||
    count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->can('snrStaff')
    )
    <hr>
    <center><h4><i>Notifications</i></h4></center>
    @if(Auth::user()->hasRole('ins') || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0)
        <br>
        <div class="alert alert-success">
            There is a <b>new OTS recommendation</b> that is waiting to be accepted. View the <a href="/dashboard/training/ots-center">OTS Center</a> to view more information.
        </div>
    @endif

    @if(App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null)
        <br>
        <div class="alert alert-success">
            You have a <b>new training ticket</b>. Visit <a href="/dashboard/controllers/profile">your profile</a> to view more information.
        </div>
    @endif

    @if(count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->can('snrStaff'))
        <br>
        <div class="alert alert-success">
            There is a <b>new incident report</b>. Visit <a href="/dashboard/admin/incident">incident reports</a> to view more information.
        </div>
    @endif
@endif