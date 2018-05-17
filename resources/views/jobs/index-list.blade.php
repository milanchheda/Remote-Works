@extends('layouts.application')
@section('content')
	<?php
		$count = 0;
	?>

	@foreach($allJobs as $jobs)
		<?php
			$jobs->body = preg_replace("/&nbsp;/",'',$jobs->body);
			$colorsArray = ['orange', 'red', 'purple', 'blue', 'indigo'];
			$linkId = explode('-', $jobs->source_slug);
			switch ($jobs->jobSources->id) {
				case '1':
					$remoteUrl = 'https://remoteok.io/l';
					break;

				default:
					$remoteUrl = '/';
					break;
			}
		?>

		<div class="items-stretch w-full mx-auto my-2">
			<div class="h-full flex {{ $loop->index % 2  ? 'bg-white' : 'bg-green-lightest' }} rounded">
				<a href="{{ $jobs->apply_url }}" target="_BLANK" class="no-underline px-2 text-base apply-link flex-1 p-2">
					<div class="underline {{ $loop->index % 2  ? 'text-black' : 'text-black' }}">
						<span class="text-left font-semibold text-lg">
							{{ $jobs->title }} @ {{ ucfirst(strtolower($jobs->company->name)) }}
						</span>
						<span class="float-right text-sm lg:text-base mt-2 {{ $loop->index % 2  ? 'text-black' : 'text-black' }}">
							{{ $jobs->created_at->diffForHumans() }}
						</span>
					</div>
					<span class="text-xs mt-2 no-underline {{ $loop->index % 2  ? 'text-black' : 'text-black' }}">via {{ $jobs->jobSources->source_name }}</span>
				</a>
			</div>
		</div>
	@endforeach

	@if(isset($allJobs))
		<div class="w-full text-center mt-8 mb-4">
	    @if($allJobs->currentPage() > 1)
	         <a href="{{ $allJobs->previousPageUrl() }}" class="bg-green-lightest p-2 rounded no-underline text-black">&laquo; Previous</a>
	    @endif

	   @if($allJobs->hasMorePages())
	        <a href="{{ $allJobs->nextPageUrl() }}" class="bg-green-lightest p-2 rounded no-underline text-black">Next &raquo;</a>
	    @endif
	    </div>
	@endif
	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	<div class="modal-content">
	  <div class="modal-header">
	    <span class="close-modal mr-2">&times;</span>
	    <h2 class="modal-job-title">Modal Header</h2>
	  </div>
	  <div class="modal-body">

	  </div>
	  <div class="modal-footer">

	  </div>
	</div>

	</div>
@endsection
