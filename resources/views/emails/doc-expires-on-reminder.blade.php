Dear {{ $user->name }},<br><br>

The following documents require your attention,<br><br>

@foreach($expiringDocs['organizationDocs'] as $expiresIn => $organizationDoc)
<p>{{ $organizationDoc->name }} expiring <b>{{ $expiresIn == 'today' ? $expiresIn : 'in ' . $expiresIn }}</b> on {{ $organizationDoc->organizations->first()->pivot->expires_on }}</p>
@endforeach

@foreach($expiringDocs['truckDocs'] as $expiresIn => $truckDoc)
<p>The truck {{ $truckDoc->trucks->first()->name }} has a document {{ $truckDoc->name }} expiring <b>{{ $expiresIn == 'today' ? $expiresIn : 'in ' . $expiresIn }}</b> on {{ $truckDoc->trucks->first()->pivot->expires_on }}</p>
@endforeach

<br><br>
Yours sincerely,<br>
The Cargo Panda Team.
