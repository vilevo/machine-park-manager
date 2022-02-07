<li>
	<a href="{{ route('admin.read_rdv_notif', $notification->data['rdv']['id']) }}">
		{{ $notification->data['user']['name'] }} a demandé un RDV à <strong>{{ $notification->data['rdv']['centre_de_sante'] }}</strong>
		(<small>{{ $notification->created_at->diffForHumans() }}</small>)</a>

</li>