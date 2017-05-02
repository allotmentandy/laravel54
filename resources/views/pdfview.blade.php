<div class="container">

	<table>

		@foreach ($items as $key => $item)
		<tr>
			<td>{{ $item['reg'] }}</td>
			<td>{{ $item['type'] }}</td>
			<td>{{ $item['conNumber'] }}</td>
		</tr>
		@endforeach
	</table>
</div>